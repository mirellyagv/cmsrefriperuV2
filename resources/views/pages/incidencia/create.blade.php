
@php
    if ((!isset($_GET['codEquipo'])) && (!isset($_GET['dscEquipo']))) {
        $alpha = 'Debe Seleccionar un Equipo para que proceda la incidencia';
    }else if( !isset($_GET['codEquipo']) && (isset($_GET['dscEquipo']))) {
        $alpha = $_GET['dscEquipo'];
    }else{ $alpha = $_GET['codEquipo']."-".$_GET['dscEquipo']; }
    $codEquipoAux = $_GET['codEquipo'];
    use Carbon\Carbon;
@endphp

@extends('layouts.refriPeruLayout')

@section('content')
   <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        {{-- <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Adminox</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Dashboard 1</li>
                            </ol>
                        </div> --}}
                        <h4 class="page-title lineatitle"><i class="fe-file-text"></i> CREAR INCIDENCIA</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive titleform">
                        <h4 class="header-title headertitle"><i class="fe-file-plus"></i> Registro de incidente</h4>
                    </div>    
                </div>    
            </div>
            
            <form action="{{route('incidencia.registro')}}" method="post" id="form-validation">
                {{-- @method('POST')
                @csrf --}}
                {{method_field('POST')}}
                {{ csrf_field() }}


                <div class="row">
                    <div class="col-md-6">
                        <div class="card-box">
                            <div class="form-group">
                                <label for="lstcliente">Cliente</label>
                                <select class="form-control" id="lstcliente" name="lstcliente">
                                    <option value="0">[seleccione cliente]</option>
                                    @foreach($clientes as $cli)
                                        <option value="{{$cli->cod_cliente}}" selected>{{$cli->dsc_cliente}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lstlinea">Sede (*)</label>
                                <select class="form-control" id="lstlinea" name="lstlinea">
                                    <option value="0">[seleccione linea]</option>
                                    @foreach($listaSede as $sede)
                                        <option value="{{$sede->num_linea}}">{{$sede->dsc_nombre_direccion}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lstequipo">Equipo</label>
                                <input type="text" class="form-control" value="{{$alpha}}" placeholder="Equipo Seleccionado" aria-label="Recipient's username">
                                <input type="hidden" name="lstequipo" value="{{$codEquipoAux}}">
                            </div>
                            <div class="form-group">
                                <label for="lstcontacto">Responsable</label>
                                <input type="text" class="form-control" name="lstcontacto" id="lstcontacto" placeholder="" value="">                                    
                            </div>
                            <div class="form-group">
                                <label for="lsttipo">Tipo de incidente(*) </label>
                                <select class="form-control" id="lsttipo" name="lsttipo" required>
                                    <option value="0">[seleccione tipo]</option>
                                    @foreach($tipos as $tipo)
                                    <option value="{{$tipo->cod_tipoincidente}}">{{$tipo->dsc_tipoincidente}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lstsubtipo">Subtipo  de incidente(*)</label>
                                <select class="form-control" id="lstsubtipo" name="lstsubtipo" required>
                                    <option value="0">[seleccione sub-tipo]</option>
                                </select>
                            </div>                                 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-box">
                            <div class="form-group">
                                <label for="fecha_reporte">Fecha reporte</label>
                                <input type="text" class="form-control" name="fecha_reporte" id="fecha_reporte">
                            </div>
                            <div class="form-group" style="padding-bottom:0.5rem;">
                                <label for="lstarea">Detalle</label>
                                <textarea name="descripcion" id="descripcion" rows="4" cols="50" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="lstprioridad">Prioridad (*)</label>
                                <select class="form-control" id="lstprioridad" name="lstprioridad">
                                    <option value="0">[seleccione prioridad]</option>
                                    @foreach($prioridad as $prio)
                                        @if($prio->cod_prioridad=='003')
                                            <option value="{{$prio->cod_prioridad}}" selected>{{$prio->dsc_prioridad}}</option>
                                        @else
                                            <option value="{{$prio->cod_prioridad}}">{{$prio->dsc_prioridad}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div> 
                            <div class="form-group">
                                <label for="lstestado">Estado</label>
                                <select class="form-control" id="lstestado" name="lstestado">
                                    <option value="0">[seleccione estado]</option>
                                    @foreach($estado as $state)
                                        @if($state->cod_estadoincidente=='001')
                                            <option value="{{$state->cod_estadoincidente}}" selected>{{$state->dsc_estadoincidente}}</option>
                                        @else
                                            <option value="{{$state->cod_estadoincidente}}">{{$state->dsc_estadoincidente}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lstcanal">Canal reporte</label>
                                <select class="form-control" id="lstcanal" name="lstcanal">
                                    <option value="0">[seleccione canal]</option>
                                    @foreach($canales as $canal)
                                        @if($canal->cod_canalreporte=='004')
                                            <option value="{{$canal->cod_canalreporte}}" selected>{{$canal->dsc_canalreporte}}</option>
                                        @else
                                            <option value="{{$canal->cod_canalreporte}}">{{$canal->dsc_canalreporte}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>          
                    </div>
                    <div class="col-12">
                        <label class="campooblig">(*) Campos obligatorios</label>    
                    </div>
                    <div class="col-12 contenedorbuttons">
                        <div class="lineabajo">
                        <button type="button" id="btn-submit" class="btn btn-primario"><i class="fas fa-plus"></i> Guardar</button>
                        &nbsp;
                        <button type="button" class="btn btn-cancelar" id="btn-cancelar"><i class="fas fa-reply"></i> Cancelar</button>
                        </div>
                    </div>
                </div>

            </form>
            


            {{-- <form method="POST" id="form-validation" action="{{route('incidencia.registro')}}"> --}}
                {{-- {{ Form::open(['route' => 'incidencia.registro','id' => 'form-validation']) }} --}}
                {{-- {{method_field('POST')}}
                {{ csrf_field() }} --}}


                {{-- <div class="row contenedorinputs"> --}}
                    
                        {{-- <div class="col-md-6"> --}}
                            {{-- <div class="card-box"> --}}
                                <!--<h4 class="header-title mb-4">Datos generales</h4>-->
                                {{-- <div class="form-group">
                                    <label for="lstcliente">Cliente</label>
                                    <select class="form-control bordecaja" id="lstcliente" name="lstcliente" disabled>
                                        <option value="0">[seleccione cliente]</option>
                                        @foreach($clientes as $cli)
                                            <option value="{{$cli->cod_cliente}}" selected>{{$cli->dsc_cliente}}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                {{-- <div class="form-group">
                                    <label for="lstlinea">Sede (*)</label>
                                    <select class="form-control bordecaja" id="lstlinea" name="lstlinea">
                                        <option value="0">[seleccione linea]</option>
                                        @foreach($listaSede as $sede)
                                            <option value="{{$sede->num_linea}}">{{$sede->dsc_nombre_direccion}}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                {{-- <div class="form-group"> --}}
                                    {{-- <label for="lstequipo">Equipo</label> --}}
                                    {{-- <div class="input-group mb-3"> --}}
                                        {{-- @php
                                            if ((!isset($_GET['codEquipo'])) && (!isset($_GET['dscEquipo']))) {
                                                $alpha = 'Debe Seleccionar un Equipo para que proceda la incidencia';
                                            }else if( !isset($_GET['codEquipo']) && (isset($_GET['dscEquipo']))) {
                                                $alpha = $_GET['dscEquipo'];
                                            }else{ $alpha = $_GET['codEquipo']."-".$_GET['dscEquipo']; }
                                        @endphp --}}
                                        {{-- <input type="text" class="form-control" value="{{$alpha}}" placeholder="Equipo Seleccionado" aria-label="Recipient's username" disabled>
                                        <input type="hidden" name="lstequipo" value="{{$_GET['codEquipo']}}"> --}}
                                        {{-- <button class="btn btn-outline-secondary" type="button" id="buscaEquipo">Buscar <i class="dripicons-search"></i></button> --}}
                                    {{-- </div> --}}
                                {{-- </div> --}}
                                {{-- <div class="form-group">
                                    <label for="lstcontacto">Responsable</label>
                                    <input type="text"
                                        class="form-control" name="lstcontacto" id="lstcontacto" placeholder="" value="" disabled>                                    
                                </div> --}}
                                {{-- <div class="form-group">
                                    <label for="lsttipo">Tipo de incidente(*) </label>
                                    <select class="form-control bordecaja" id="lsttipo" name="lsttipo" required>
                                        <option value="0">[seleccione tipo]</option>
                                        @foreach($tipos as $tipo)
                                        <option value="{{$tipo->cod_tipoincidente}}">{{$tipo->dsc_tipoincidente}}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                {{-- <div class="form-group">
                                    <label for="lstsubtipo">Subtipo  de incidente(*)</label>
                                    <select class="form-control bordecaja" id="lstsubtipo" name="lstsubtipo" required>
                                        <option value="0">[seleccione sub-tipo]</option>
                                    </select>
                                </div>                --}}
                                {{-- <div class="form-group">
                                    <label for="lstresponsable">Responsable</label>
                                    <select class="form-control bordecaja" id="lstresponsable" name="lstresponsable">
                                        <option value="0">[seleccione responsable]</option>
                                        @foreach($respons as $respble)
                            <option value="{{$respble->cod_trabajador}}">{{ $respble->dsc_nombres.','.$respble->dsc_apellido_paterno.' '.$respble->dsc_apellido_materno }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                    
                            {{-- </div> --}}
                        {{-- </div> --}}

                        {{-- <div class="col-md-6"> --}}
                            {{-- <div class="card-box"> --}}
                                {{-- <div class="form-group">
                                    <label for="fecha_reporte">Fecha reporte</label>
                                    <input type="text" class="form-control" name="fecha_reporte" id="fecha_reporte" disabled>
                                </div> --}}
                                <!--<h4 class="header-title mb-4">Otros datos</h4>-->
                                {{-- <div class="form-group">
                                    <label for="titulo">Título (*)</label>
                                    <input type="text" class="form-control bordecaja" name="titulo" id="titulo" placeholder="titulo">
                                </div> --}}
                                {{-- <div class="form-group" style="padding-bottom:0.5rem;">
                                    <label for="lstarea">Detalle</label>
                                    <textarea name="descripcion" id="descripcion" rows="4" cols="50" class="form-control bordecaja">{{old('descripcion')}}</textarea>
                                </div> --}}
                                {{-- <div class="form-group">
                                    <label for="lstprioridad">Prioridad (*)</label>
                                    <select class="form-control bordecaja" id="lstprioridad" name="lstprioridad">
                                        <option value="0">[seleccione prioridad]</option>
                                        @foreach($prioridad as $prio)
                                        @if($prio->cod_prioridad=='003')
                                        <option value="{{$prio->cod_prioridad}}" selected>{{$prio->dsc_prioridad}}</option>
                                        @else
                                        <option value="{{$prio->cod_prioridad}}">{{$prio->dsc_prioridad}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>  --}}
                                {{-- <div class="form-group">
                                    <label for="lstestado">Estado</label>
                                    <select class="form-control bordecaja" id="lstestado" name="lstestado" disabled>
                                        <option value="0">[seleccione estado]</option>
                                        @foreach($estado as $state)
                                            @if($state->cod_estadoincidente=='001')
                                                <option value="{{$state->cod_estadoincidente}}" selected>{{$state->dsc_estadoincidente}}</option>
                                            @else
                                                <option value="{{$state->cod_estadoincidente}}">{{$state->dsc_estadoincidente}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div> --}}
                                {{-- <div class="form-group">
                                    <label for="lstcanal">Canal reporte</label>
                                    <select class="form-control bordecaja" id="lstcanal" name="lstcanal" disabled>
                                        <option value="0">[seleccione canal]</option>
                                        @foreach($canales as $canal)
                                            @if($canal->cod_canalreporte=='004')
                                                <option value="{{$canal->cod_canalreporte}}" selected>{{$canal->dsc_canalreporte}}</option>
                                            @else
                                                <option value="{{$canal->cod_canalreporte}}">{{$canal->dsc_canalreporte}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div> --}}
                            {{-- </div>           --}}
                        {{-- </div> --}}
                        {{-- <div class="col-12">
                            <label class="campooblig">(*) Campos obligatorios</label>    
                        </div> --}}
                        {{-- <div class="col-12 contenedorbuttons">
                            <div class="lineabajo">
                            <button type="submit" id="btn-submit" class="btn btn-primario"><i class="fas fa-plus"></i> Guardar</button>
                            &nbsp;
                            <button type="button" class="btn btn-cancelar" id="btn-cancelar"><i class="fas fa-reply"></i> Cancelar</button>
                            </div>
                        </div> --}}
                        
                {{-- </div> <!-- end row --> --}}
            {{-- </form> --}}
            {{-- {!! Form::close() !!} --}}

        </div> <!-- end container-fluid -->

    </div> <!-- end content -->
@endsection

@push('scripts')
<script type="text/javascript">
    // document.getElementById('buscaEquipo').addEventListener('click',()=>{
    //     window.location = "{{ url('equipo') }}"
    // });

    //Se ingresa la fecha actual - Fecha reporte
    // var date  = new Date();
    // var day   = date.getDate();
    // var month = date.getMonth() + 1;
    // var year  = date.getFullYear();

    // if (month < 10) month = "0" + month;
    // if (day < 10) day = "0" + day;

    // var today = year + "-" + month + "-" + day;

    //-------------------------------------
    $(document).ready(function(){
        
        document.getElementById('fecha_reporte').value = new Date().toLocaleString();
        //Hacemos uso del select2
        $("#lsttipo").select2();//

        $("#lstsubtipo").select2();//

        $("#lstcliente").select2();//

        $("#lstlinea").select2();//

        //$("#lstcontacto").select2();

        $("#lstprioridad").select2();//

        // $("#lstequipo").select2();

        // $("#lstresponsable").select2();

        $("#lstestado").select2();//

        $("#lstcanal").select2();//

        //Busqueda de subtipos -----------------
        $('#lsttipo').change(function(){
          var idtipo = $(this).val();
          //alert('---' + idtipo + '----');
          $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"{{ url('subtipo/buscar')}}",
            type:'post',
            data:'idtipo='+ idtipo,
            cache: false,
            processData: false,
            success:function(data){
              $('#lstsubtipo').html(data);
              $('#lstsubtipo').trigger('change');
                    
            }
          });
        });

        //Busqueda del numero de linea por cliente
        $('#lstcliente').change(function(){
          var idcli = $(this).val();
          //alert('---' + idcli + '----');
          $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"{{ url('clientedireccion/numlinea')}}",
            type:'post',
            data:'idcli='+ idcli,
            cache: false,
            processData: false,
            success:function(data){
              $('#lstlinea').html(data);
              $('#lstlinea').trigger('change');
                    
            }
          });
        });

        //Busqueda de contacto por cliente
        $('#lstlinea').change(function(){
            
          var sede = $(this).val();
          //alert('---' + idcli + '----');
          $.ajax({
            type:'GET',
            url:"{{ url('clientedireccion/responsable')}}",            
            data:{
                    'sede': sede
                },
            success:function(data){ 
                data.forEach(element => {
                    document.getElementById('lstcontacto').value = `${element.dsc_nombres} ${element.dsc_apellido_paterno} ${element.dsc_apellido_materno}`;
                });      
            }
          });
        });

        $("#form-validation").validate();

        $('#btn-submit').on('click',function(e){
            //se valida los campos obligatorios
            var $i=0;
            if($('#lsttipo').val()=='0'){
                $i=1;
            }
            if($('#lstsubtipo').val()=='0'){
                $i=1;
            }
            if($('#fecha_reporte').val()==''){
                $i=1;
            }
            if($('#lstcliente').val()=='0'){
                $i=1;
            }
            if($('#lstlinea').val()=='0'){
                $i=1;
            }
            // if($('#lstcontacto').val()=='0'){
            //     $i=1;
            // }
            if($('#lstprioridad').val()=='0'){
                $i=1;
            }
            if($('#titulo').val()==''){
                $i=1;
            }
            if($('#lstestado').val()=='0'){
                $i=1;
            }
            if($('#lstcanal').val()=='0'){
                $i=1;
            }
            //
            if($i!=1){
                if($("#form-validation").valid()){
                    $("#form-validation").submit();
                    $("#btn-submit").attr("disabled", true);
                    //$("#clientes-body").LoadingOverlay("show");
                }
            }else{
                Swal.fire(
                'Aviso',
                'Debe ingresar los campos obligatorios',
                'warning'
                );

                return false;
            }

        });

        //boton cancelar
        $("#btn-cancelar").on('click',function(){
            window.location = "{{ url('incidencia') }}";
        });

        

    });

</script>
@endpush