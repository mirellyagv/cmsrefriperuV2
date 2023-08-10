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


class CicloController extends Controller
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
    
    public function getIndexCiclo(Request $request){
        $cod_cliente = $request->session()->get('cod_cli');
       
        $listado  = DB::table('sgema_ciclo as ciclo')
                  ->select('ciclo.cod_ciclo', 'ciclo.dsc_ciclo','ciclo.dsc_observacion','ciclo.flg_activo')
                  ->get();
          
        //Sacamos el total de incidedentes
        $ctotal   = IncidenciaController::totalIncidencias();   

        return view('pages.ciclo.index',compact('listado','ctotal','cod_cliente'));
    }

    public function getProcedmiento(Request $Request){

      $sede = $Request->sede;
      $mesIni = $Request->mesIni;
      $mesFin = $Request->mesFin;
      $anio = $Request->anio;
      $cliente = $Request->session()->get('cod_cli');  

          $fila = DB::select('EXEC usp_Consultar_ProgramacionTrabajo ?,?,?,?,?,?,?,?,?,?,?',[1,$cliente,$sede,'',$anio,'','','',0,$mesIni,$mesFin]);
         
          foreach ($fila as $key) {
            if($key->num_equipo != 0){
              $key->porcOp = round(($key->num_equipo_operativo*100)/$key->num_equipo,0).'%';
            } else{
              $key->porcOp = '100%';
            }
            $key->enero = ($key->enero == 0) ? '-' : $key->enero_t.'/'.$key->enero;
            $key->febrero = ($key->febrero == 0) ? '-' : $key->febrero_t.'/'.$key->febrero;
            $key->marzo = ($key->marzo == 0) ? '-' : $key->marzo_t.'/'.$key->marzo;
            $key->abril = ($key->abril == 0) ? '-' : $key->abril_t.'/'.$key->abril;
            $key->mayo = ($key->mayo == 0) ? '-' : $key->mayo_t.'/'.$key->mayo;
            $key->junio = ($key->junio == 0) ? '-' : $key->junio_t.'/'.$key->junio;
            $key->julio = ($key->julio == 0) ? '-' : $key->julio_t.'/'.$key->julio;
            $key->agosto = ($key->agosto == 0) ? '-' : $key->agosto_t.'/'.$key->agosto;
            $key->septiembre = ($key->septiembre == 0) ? '-' : $key->septiembre_t.'/'.$key->septiembre;
            $key->octubre = ($key->octubre == 0) ? '-' : $key->octubre_t.'/'.$key->octubre;
            $key->noviembre = ($key->noviembre == 0) ? '-' : $key->noviembre_t.'/'.$key->noviembre;
            $key->diciembre = ($key->diciembre == 0) ? '-' : $key->diciembre_t.'/'.$key->diciembre;
            $key->intervenciones = ($key->num_programado == 0) ? '-' : $key->total_t.'/'.$key->num_programado;
            
            if($key->num_programado != 0){
              $key->porcAv = round(($key->total_t*100)/$key->num_programado,0).'%';
            } else{
              $key->porcAv = '100%';
            }

            if(is_null($key->imp_total_ejecucion)){
              $key->imp_total_ejecucion = 'S/.0,00';
            }else{
              $key->imp_total_ejecucion = 'S/.'.number_format($key->imp_total_ejecucion, 2, ',', '.');
            }
            if(is_null($key->imp_total_plan)){
              $key->imp_total_plan = 'S/.0,00';
            }else{
              $key->imp_total_plan = 'S/.'.number_format($key->imp_total_plan, 2, ',', '.');
            }
          }
          return $fila;
    }


    public function getListadoPlan(Request $Request){

      $mesIni = $Request->mesIni;
      $mesFin = $Request->mesFin;
      $anio = $Request->anio; 
      $cliente = $Request->session()->get('cod_cli');  
      $sede = $Request->sede;

        $filas = DB::select('EXEC usp_mto_web_Consultar_Plan ?,?,?,?,?,?,?',[1,$mesIni,$mesFin,$anio,$cliente,$sede,'']);
        
        
        foreach ($filas as $key) {
            if($key->imp_avance == 0){
              $key->porcAv = '0%'; 
              } else{
                $key->porcAv = round($key->imp_avance,0).'%';
            }
            if(is_null($key->imp_total_soles)){
              $key->imp_total_soles = 'S/.0,00';
              }else{
              $key->imp_total_soles = 'S/.'.number_format($key->imp_total_soles, 2, ',', '.');
            }
            if($key->dsc_pdf_IT == null || $key->dsc_pdf_IT == ''){
              $key->VerIT='<button type="button" class="btn btn-warning"  title="No hay Informe Técnico adjuntado" disabled><i class="dripicons-wrong"></i></button>';
           
            }else
            {
                $ArchivoIT= $key->idArchivoIT;
                $ArchivoA1= $key->idArchivoA1;
                $ArchivoA2= $key->idArchivoA2;
                
                if($ArchivoIT==NULL || $ArchivoIT==''){$ArchivoIT='NN'; }
                if($ArchivoA1==NULL || $ArchivoA1==''){$ArchivoA1='NN'; }
                if($ArchivoA2==NULL || $ArchivoA2==''){$ArchivoA2='NN'; }
                $key->VerIT='<button type="button" class="btn btn-warning"  title="Ver Informe Técnico" onclick="VerInformeTecnico('."'".$ArchivoIT."'".','."'".$ArchivoA1."'".','."'".$ArchivoA2."'".','."'".$key->webUrl_IT."'".','."'".$key->webUrl_A1."'".','."'".$key->webUrl_A2."'".')"><i class="dripicons-document"></i></button>';
           
               // $key->VerIT ='<a class="urlicon" title="Ver Informe Técnico" href="javascript:void(0)" style="font-size:14px" onclick="VerInformeTecnico('."'".$ArchivoIT."'".','."'".$ArchivoA1."'".','."'".$ArchivoA2."'".','."'".$key->webUrl_IT."'".','."'".$key->webUrl_A1."'".','."'".$key->webUrl_A2."'".')" ><i class="dripicons-preview"></i></a>';
            }

            if($key->dsc_pdf_CO == null || $key->dsc_pdf_CO == ''){
              $key->VerCO='<button type="button" class="btn btn-success"  title="No hay Certificado Adjuntado" disabled><i class="dripicons-wrong"></i></button>';
           
            }else
            {
              $ArchivoCO= $key->idArchivoCO;
                if($ArchivoCO==NULL || $ArchivoCO==''){$ArchivoCO='NN'; }
                $key->VerCO='<button type="button" class="btn btn-success"  title="Ver Certificado Operativo" onclick="VerCertificadoOperativo('."'".$ArchivoCO."'".','."'".$item->webUrl_CO."'".')"><i class="dripicons-document"></i></button>';
           
                //$key->VerCO='<a class="urlicon" title="Ver Certificado Operativo" href="javascript:void(0)" style="font-size:14px" onclick="VerCertificadoOperativo('."'".$ArchivoCO."'".','."'".$key->webUrl_CO."'".')" ><i class="dripicons-preview"></i></a>';
            }
            }
           
            
        return $filas;
    }


    public function getIndicador(Request $Request){

      $sede = $Request->sede;
      $mesIni = $Request->mesIni;
      $mesFin = $Request->mesFin;
      $anio = $Request->anio;
      $cliente = $Request->session()->get('cod_cli');  

      $indicador = DB::select('EXEC usp_ConsultarVarias_DetalleProgramacion ?,?,?,?,?,?,?,?,?,?,?,?',[6,$cliente,$sede,$anio,0,'','','',0,'',$mesIni,$mesFin]);

      return $indicador;   
  }


    public function getDetalleEquipo(Request $request){
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
      }else{
        $listaSede  = DB::table('vtade_cliente_direccion as direccion')
                      ->select('direccion.dsc_nombre_direccion', 'direccion.num_linea')
                      ->where('direccion.flg_plan_activo','=','SI')
                      ->where('direccion.cod_cliente', '=', $codCliente)
                      ->orderBy('direccion.dsc_nombre_direccion')
                      ->get();
      }
      $cliente  = Cliente::where('cod_cliente', $codCliente)->firstOrFail(); 

      return view('pages.ciclo.index',compact( 'listaSede','codCliente','cliente'));    
  }

}
