<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Http\Middleware\RoleHelper;

//---> Para la validacion del usuario
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Cache\RateLimiter;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller{

public function __construct(){
    $this->middleware('guest',['only'=>'showLoginForm']);
}

public function showLoginForm(){
    return view('auth.login');
}
    
public function login(Request $request){
    
    $this->validateLogeo($request);
    
    //AQui es donde se llama al procedimiento almacenado
    $admin='NO';

   // $rol = $request->lstrol;
    $rol = '1';
    $ruc = $request->ruc;
    $user= $request->user;
    $pwd = $request->password;





    
    //
    switch ($rol) {
        case '2':
            $fila = DB::table('scfma_usuario')
            ->select('cod_usuario as usuario')
            ->where('cod_usuario','=',$user)
            ->where('dsc_clave','=',$pwd)
            ->where('flg_activo','=','SI')
            ->get();            
            $msg='20547386176';
            break;
        
        default:
        $fila = DB::table('vtama_cliente as a')
        ->select('a.cod_cliente as Codigo', 'a.dsc_documento as RUC', 'b.cod_usuario_reg', 'b.cod_usuario_web','b.num_linea','c.cod_responsable_cuenta','c.dsc_nombre_direccion','d.dsc_tipo_direccion','b.dsc_nombre','b.dsc_apellidos')
        ->join('vtade_cliente_direccion_contacto as b','a.cod_cliente','=','b.cod_cliente')
        ->join('vtade_cliente_direccion as c', function (JoinClause $join) {
            $join->on('c.cod_cliente', '=', 'b.cod_cliente')->on('b.num_linea','=','c.num_linea');
        })
        ->join('vtama_tipo_direccion as d', 'c.cod_tipo_direccion', '=', 'd.cod_tipo_direccion')
        ->where('a.cod_tipo_documento','=','DI004')
        ->where('a.dsc_documento','=',$ruc)
        ->where('b.cod_usuario_web','=',$user)
        ->where('b.cod_clave_web','=',$pwd)
        ->get();

        if($fila->count()==0)
        {
            $fila = DB::table('vtama_cliente as a')
            ->select('a.cod_cliente as Codigo', 'a.dsc_documento as RUC', 'b.cod_usuario_reg', 'b.cod_usuario_web','b.dsc_nombre','b.dsc_apellidos')
            ->join('vtade_cliente_contacto as b','a.cod_cliente','=','b.cod_cliente')
            ->where('a.cod_tipo_documento','=','DI004')
            ->where('a.dsc_documento','=',$ruc)
            ->where('b.cod_usuario_web','=',$user)
            ->where('b.cod_clave_web','=',$pwd)
            ->get();

            $admin='SI';
        }

        $msg = $fila[0]->RUC;
        break;
    };

    $num  = sizeof($fila);   
    
    if($num>0){
        //console.log($fila[0]->dsc_nombre);
     
       if($msg!='Error'){
        //Se hace la validacion de los roles
        if($rol=='1'){              //Cliente
            //Se captura la data:
           
            $code       = $fila[0]->Codigo;                  //Codigo de cliente
            $ruc_ses    = $fila[0]->RUC;                     //Ruc de cliente
            $coduser    = $fila[0]->cod_usuario_reg;         //Cod. usuario registrado  
            $usuario    = $fila[0]->cod_usuario_web;         //Cod. usuario web
            $dsc_sede   = 'ACCESO A TODAS LAS SEDES';
            $sede       = '0';
            $supervisor = 'TRA00001';
            $dsc_usuario    = $fila[0]->dsc_nombre.' '.$fila[0]->dsc_apellidos; 
            if ($admin=='NO')
            {  
               $dsc_sede   = $fila[0]->dsc_nombre_direccion ;
               $sede       = $fila[0]->num_linea;               //Cod. Sede
               $supervisor = $fila[0]->cod_responsable_cuenta;  //Cod. resposanble cuenta
            }

            if($supervisor==null ||$supervisor=='')
            {
                $supervisor = 'TRA00001';
            }
            
            
            //Se debe crear la session...
            $request->session()->regenerate();

            $this->clearLoginAttempts($request);

            //Definimos las sesiones
            Session::put('cod_cli', $code);
            Session::put('coduser_reg', $coduser);
            Session::put('usuario', $usuario);
            Session::put('numeruc', $ruc_ses);
            Session::put('sede', $sede);
            Session::put('dsc_sede', $dsc_sede);
            Session::put('supervisor', $supervisor);
            Session::put('admin', $admin);
            Session::put('dsc_usuario', $dsc_usuario);
            Session::put('rol', 'Cliente');

        }else if($rol=='2'){        //Trabajador
            //Se captura la data:
            $usuario = $fila[0]->usuario;
            $ruc_ses = $ruc;
            //$ruc_ses = $fila[0]->RUC;

            //Se debe crear la session...
            $request->session()->regenerate();

            $this->clearLoginAttempts($request);

            //Definimos las sesiones
            Session::put('usuario', $usuario);
            Session::put('numeruc', $ruc_ses);

            Session::put('rol', 'Trabajador');

        }else{                      //Proveedor
            //Falta definir
            return redirect('/'); 
        }

        if (RoleHelper::hasAnyRole('Cliente|Trabajador'))
                return redirect("/");
        
        return $this->authenticated($request, $this->guard()->user())
                    ?: redirect('home');

       }else{
        //return 'RUC invalido';
        return back()
            ->withErrors(['ruc' => trans('auth.fallo')])
            ->withInput(request($request->lstrol))
            ->withInput(request($request->ruc))
            ->withInput(request($request->user)); 
       }
    }else{
        //return 'Credenciales invalidos'; 
        return back()
            ->withErrors(['msg' => trans('auth.error')])
            ->withInput(request($request->lstrol))
            ->withInput(request($request->ruc))
            ->withInput(request($request->user)); 
    }

}

public function logout(Request $request){

    Session::flush();

    $this->guard()->logout();

    $request->session()->invalidate();

    return $this->loggedOut($request) ?: redirect('/');
}


protected function clearLoginAttempts(Request $request){
    $this->limiter()->clear($this->throttleKey($request));
}

protected function throttleKey(Request $request){
    return Str::lower($request->input($this->username())).'|'.$request->ip();
}

protected function limiter(){
    return app(RateLimiter::class);
}

protected function username(){
    return 'user';
}

protected function validateLogeo(Request $request){
    $request->validate([
        'ruc'      => 'required|string',
        'user'     => 'required|string',
        'password' => 'required|string',
    ]);
}

protected function authenticated(Request $request, $user){
        
}

protected function loggedOut(Request $request){
//
}

protected function guard(){
    return Auth::guard();
}



}
