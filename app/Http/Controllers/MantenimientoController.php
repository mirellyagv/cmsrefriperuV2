<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use App\Models\Ciclo;
use App\Models\Incidencia;
use App\Models\Cliente;
use App\Http\Controllers\IncidenciaController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class MantenimientoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('autenticado');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    
    public function getIndexMantenimiento(Request $request){
        $cod_cliente = $request->session()->get('cod_cli');

        return view('pages.mantenimiento.index',compact('cod_cliente'));
    }

    
    public function getListadoSede(Request $request){
        $codCliente = $request->session()->get('cod_cli');
        $admin=$request->session()->get('admin');
        $sede=$request->session()->get('sede');


        if($admin=='NO'){
        $listaSede  = DB::table('vtade_cliente_direccion as direccion')
                        ->select('direccion.dsc_nombre_direccion', 'direccion.num_linea')
                        ->where('direccion.flg_plan_activo','=','SI')
                        ->where('direccion.cod_cliente', '=', $codCliente)
                        ->where('direccion.num_linea', '=', $sede)
                        ->orderBy('direccion.dsc_nombre_direccion')
                        ->get();
        }
        else{
          $listaSede  = DB::table('vtade_cliente_direccion as direccion')
                          ->select('direccion.dsc_nombre_direccion', 'direccion.num_linea')
                          ->where('direccion.flg_plan_activo','=','SI')
                          ->where('direccion.cod_cliente', '=', $codCliente)
                          ->orderBy('direccion.dsc_nombre_direccion')
                          ->get();
          
          }
        $cliente  = Cliente::where('cod_cliente', $codCliente)->firstOrFail(); 
        $estados  = DB::table('mtoma_estado_mantenimiento as estado')
        ->select('estado.cod_estado', 'estado.dsc_estado')
        ->get();

        $planes = DB::table('mtoca_plan_anual as plan')
        ->select('plan.num_plan','plan.dsc_plan')
        ->get();

        return view('pages.mantenimiento.index',compact( 'listaSede','codCliente','cliente','estados','planes'));    
    }

    public function getListadoPlan(Request $Request){

        $mesIni = $Request->mesIni;
        $mesFin = $Request->mesFin;
        $anio = $Request->anio; 
        $cliente = $Request->session()->get('cod_cli');  
        $sede = $Request->sede;
        
        
          $filas = DB::select('EXEC usp_mto_web_Consultar_Plan ?,?,?,?,?,?,?',[1,$mesIni,$mesFin,$anio,$cliente,$sede,'']);
          
          
          foreach ($filas as $key) {

            $botonVerDetalle='<button type="button" class="btn btn-primary"  title="Ver todos los equipos relacionado" onclick="BuscarEquipos('.$key->num_plan.')"><i class="dripicons-search"></i></button>';
            $botonCertificado=''; 
            $botonIT=''; 

              if($key->imp_avance == 0){
                $key->porcAv = '0%'; 
                } else{
                  $key->porcAv = round($key->imp_avance,0).'%';
              }
              if(is_null($key->imp_total_soles)){
                $key->imp_total_soles = 'S/.0,00';
                }else{
                $key->imp_total_soles ='S/'.number_format($key->imp_total_soles, 2, ',', '.');
              }
              if($key->dsc_pdf_IT == null || $key->dsc_pdf_IT == ''){
                $botonCertificado ='';
              }else
              {
                $ArchivoIT= $key->idArchivoIT;
                $ArchivoA1= $key->idArchivoA1;
                $ArchivoA2= $key->idArchivoA2;
                
                if($ArchivoIT==NULL || $ArchivoIT==''){$ArchivoIT='NN'; }
                if($ArchivoA1==NULL || $ArchivoA1==''){$ArchivoA1='NN'; }
                if($ArchivoA2==NULL || $ArchivoA2==''){$ArchivoA2='NN'; }
                
               // $botonIT ='<a class="urlicon" title="Ver Informe Técnico" href="javascript:void(0)" style="font-size:14px" onclick="VerInformeTecnico('."'".$ArchivoIT."'".','."'".$ArchivoA1."'".','."'".$ArchivoA2."'".','."'".$key->webUrl_IT."'".','."'".$key->webUrl_A1."'".','."'".$key->webUrl_A2."'".')" ><i class="dripicons-preview"></i></a>';
                $botonIT='<button type="button" class="btn btn-success"  title="Ver Informe Técnico" onclick="VerInformeTecnico('."'".$ArchivoIT."'".','."'".$ArchivoA1."'".','."'".$ArchivoA2."'".','."'".$key->webUrl_IT."'".','."'".$key->webUrl_A1."'".','."'".$key->webUrl_A2."'".')"><i class="dripicons-document"></i></button>';
            
              }
  
              
              if($key->dsc_pdf_CO == null || $key->dsc_pdf_CO == ''){
                $key->VerCO ='';
              }else
              {
                $ArchivoCO= $key->idArchivoCO;
                if($ArchivoCO==NULL || $ArchivoCO==''){$ArchivoCO='NN'; }

                $key->VerCO='<a class="urlicon" title="Ver Certificado Operativo" href="javascript:void(0)" style="font-size:14px" onclick="VerCertificadoOperativo('."'".$ArchivoCO."'".','."'".$key->webUrl_CO."'".')" ><i class="dripicons-preview"></i></a>';
              }
              
              $key->VerIT= $botonVerDetalle.$botonIT;
              }
      
          return $filas;
      }


    public function getListadoEquipo(Request $Request){

        //$mesIni = $Request->mesIni;
        //$mesFin = $Request->mesFin;
       $mesIni = $Request->mesIni;
       $mesFin = $Request->mesFin;
       $anio = $Request->anio; 
       $cliente = $Request->session()->get('cod_cli');  
       $sede = $Request->sede;
       $num_plan = $Request->num_plan;
       $cod_item = $Request->cod_item;
       $opcion=1;
       if($num_plan!=0){$opcion=2;}
       if($cod_item!=0){$opcion=3;}
  
  
          $filas = DB::select('EXEC usp_mto_web_Consultar_PlanDetalle ?,?,?,?,?,?,?,?',[$opcion,$cliente,$sede,$anio,$mesIni,$mesFin,$num_plan,$cod_item]);
          
          $data = [];
          foreach ($filas as $key) {
              
              if(is_null($key->imp_costo_programado)){
                $key->imp_costo_programado = '0,00';
                }else{
                $key->imp_costo_programado = number_format($key->imp_costo_programado, 2, ',', '.');
              }

              if(is_null($key->imp_costo_ejecutado)){
                $key->imp_costo_ejecutado = '0,00';
                }else{
                $key->imp_costo_ejecutado = number_format($key->imp_costo_ejecutado, 2, ',', '.');
              }
              
              $botonVerDetalle='<button type="button" class="btn btn-primary"  title="Ver mas información" onclick="VerDetalleEquipo('.$key->num_plan.','.$key->cod_item.')"><i class="dripicons-search"></i></button>';
              $botonCertificado='';
              if($key->dsc_pdf_CO == null || $key->dsc_pdf_CO == ''){
                $botonCertificado='';
              }else
              {
                $ArchivoCO= $key->idArchivoCO;
                if($ArchivoCO==NULL || $ArchivoCO==''){$ArchivoCO='NN'; }

                $botonCertificado='<button type="button" class="btn btn-success"  title="Ver Certificado Operativo" onclick="VerCertificadoOperativo('."'".$ArchivoCO."'".','."'".$key->webUrl_CO."'".')"><i class="dripicons-document"></i></button>';
              }


              array_push($data, [
                "dsc_plan"        => $key->dsc_plan,
                "fch_programacion"        => $key->fch_programacion,
                "dsc_equipo"      => $key->dsc_equipo,
                "num_serie"     => $key->num_serie,
                "dsc_tipo_equipo"  => $key->dsc_tipo_equipo,
                "dsc_marca"      => $key->dsc_marca,
                "dsc_modelo"    => $key->dsc_modelo,
                "dsc_ubicacion"       => $key->dsc_ubicacion,
                "imp_costo_ejecutado"   =>'S/'.$key->imp_costo_ejecutado,
                "dsc_estado_tareo"        => $key->dsc_estado_tareo,
                "VerCO"       => $botonVerDetalle.$botonCertificado,
                "dsc_subtipo_equipo"  => $key->dsc_subtipo_equipo,
                "cod_equipo"  => $key->cod_equipo,
                "cod_activo"  => $key->cod_activo,
                "cod_inventario"  => $key->cod_inventario,
                "dsc_capacidad"  => $key->dsc_capacidad,
                "dsc_sede"  => $key->dsc_sede,
                "dsc_estado_encontrado"  => $key->dsc_estado_encontrado,
                "dsc_estado_entregado"  => $key->dsc_estado_entregado,
                "dsc_observacion_encontrado"  => $key->dsc_observacion_encontrado,
                "dsc_observacion_actual"  => $key->dsc_observacion_actual,
                "flg_observacion"  => $key->flg_observacion,
                "fch_ejecutado"        => $key->fch_ejecutado,
               
              ]);

              }
            
              
          return $data;
      }

      public function getListaParametro(Request $Request){
        $num_plan = $Request->num_plan;
        $cod_item = $Request->cod_item;
        try{
            $fila = DB::select('EXEC usp_mto_web_Consultar_OrdenDetalle ?,?,?',[1,$num_plan,$cod_item]);
          
          $num = sizeof($fila);   
          
          if($num>0){
            return $fila;
          }else{
            $code   = 'No se encontraron registros';
            return $code;
          }
        }catch(\Exception $e){
            DB::rollback();
            return $this->redirectToHome();    
        }
    }

    public function getListaObservacion(Request $Request){
      $cod_item = $Request->cod_item;
      try{
          $fila = DB::select('EXEC usp_mto_web_Consultar_OrdenDetalle ?,?,?',[2,0,$cod_item]);
        
        $num = sizeof($fila);   
        
        if($num>0){
          return $fila;
        }else{
          $code   = 'No se encontraron registros';
          return $code;
        }
      }catch(\Exception $e){
          DB::rollback();
          return $this->redirectToHome();    
      }
  }
}
