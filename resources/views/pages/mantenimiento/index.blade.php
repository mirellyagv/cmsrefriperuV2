@extends('layouts.refriPeruLayout')

@section('content')
<?php
header("Access-Control-Allow-Origin: http://cmsrefriperuv2.test:8080");
?>

    <div class="content" id="mantenimiento-body">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title lineatitle"><i class="fe-file-text"></i> PLANES DE MANTENIMIENTO</h4>
                    </div>
                </div>
            </div>
            
            <div class="row fondocabecera">

                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                        <div class="mb-1">
                                            <label for="" class="form-label">Cliente</label>
                                            <input type="text" @disabled(true) class="form-control"
                                                name="dsc_razon_social" value="{{$cliente->dsc_razon_social}}"
                                                aria-describedby="helpId" placeholder="">
                                            {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                        </div>

                                        <div class="mb-1">
                                            <label for="" class="form-label">Sede:</label>
                                            <select class="form-select form-select-md" name="sedeCiclo" id="sedeCiclo" onChange="creaTabla();">
                                                <option selected disabled>Seleccione...</option>
                                                @foreach($listaSede as $list)
                                                    <option value="{{ $list->num_linea }}">{{ $list->dsc_nombre_direccion }}</option>
                                                @endforeach 
                                            </select>
                                        </div>

                                   
                                        <div class="col-md-4">
                                            <label for="" class="form-label">Año</label>
                                            <select class="form-select form-select-md" name="anioCiclo" id="anioCiclo" onChange="creaTabla();">
                                                <option value="2024">2030</option>
                                                <option value="2024">2029</option>
                                                <option value="2024">2028</option>
                                                <option value="2024">2027</option>
                                                <option value="2024">2026</option>
                                                <option value="2024">2024</option>
                                                <option value="2023">2023</option>
                                                <option value="2022">2022</option>
                                                <option value="2021">2021</option>
                                                <option value="2020">2020</option>
                                            </select>
                                        </div>
                                  
                                    <div class="col-md-4">
                                        <label for="" class="form-label">Desde:</label>
                                        <select class="form-select form-select-md" name="mesInicio" id="mesInicio" onChange="creaTabla();">
                                            <option value="1" >Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5" >Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="" class="form-label">Hasta:</label>
                                        <select class="form-select form-select-md" name="mesFin" id="mesFin" onChange="creaTabla();">
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </select>
                                    </div>
                                    
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-8">
                        <div class="card">
                            <h5 class="page-title"><i class="fe-file-text"></i>Planes de mantenimiento relacionadas:</h5>
                                    <div class="table-responsive-md">

                                        <table id="datatablePlan" class="table  table-bordered">
                                        <thead class="headtable">
                                        <tr>
                                        <th scope="col" style="background:#ED3D3B;text-align: center !important">Programado</th>
                                        <th scope="col" style="background:#ED3D3B;text-align: center !important">Descripcion</th>
                                        <th scope="col" style="background:#A52929;text-align: center !important">Equipos</th>
                                        <th scope="col" style="background:#A52929;text-align: center !important">Atendido</th>
                                        <th scope="col" style="background:#A52929;text-align: center !important">Avance</th>
                                        <th scope="col" style="text-align: center !important">Costo</th>
                                        <th scope="col" style="text-align: center !important">Acciones</th>
                                        </tr>
                                        </thead>
                                        </table>
                                    </div>
                        
                        </div>
                    </div>

           
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title lineatitle"><i class="fe-file-text"></i>EQUIPOS EN MANTENIMIENTO</h4>
                    </div>
                </div>
            </div>


       

            <div class="tabla1">
                                        <table id="datatableEquipo" class="table  table-bordered">
                                        <thead class="headtable">
                                        <tr>
                                        <th scope="col" style="background:#ED3D3B;text-align: center ">Plan</th>
                                        <th scope="col" style="background:#ED3D3B;text-align: center !important">Fecha</th>
                                        <th scope="col" style="background:#ED3D3B;text-align: center !important">Equipo</th>
                                        <th scope="col" style="background:#ED3D3B;text-align: center !important">Serie</th>
                                        <th scope="col" style="background:#ED3D3B;text-align: center !important">Tipo</th>
                                        <th scope="col" style="background:#ED3D3B;text-align: center !important">Marca</th>
                                        <th scope="col" style="background:#ED3D3B;text-align: center !important">Modelo</th>
                                        <th scope="col" style="background:#ED3D3B;text-align: center !important">Ubicación</th>
                                        <th scope="col" style="text-align: center !important">Obs</th>
                                        <th scope="col" style="text-align: center !important">Costo</th>
                                        <th scope="col" style="text-align: center !important">Estado</th>
                                        <th scope="col" style="text-align: center !important" width="8%">Acciones</th>
                                        </tr>
                                        </thead>
                                        </table>
            </div>

            <div class="tabla2">
                                        <table id="datatableEquipo2" class="table  table-bordered">
                                        <thead class="headtable">
                                        <tr>
                                        <th scope="col" style="background:#ED3D3B;text-align: center !important">Fecha</th>
                                        <th scope="col" style="background:#ED3D3B;text-align: center !important">Equipo</th>
                                        <th scope="col" style="background:#ED3D3B;text-align: center !important">Serie</th>
                                        <th scope="col" style="background:#ED3D3B;text-align: center !important">Tipo</th>
                                        <th scope="col" style="background:#ED3D3B;text-align: center !important">Marca</th>
                                        <th scope="col" style="background:#ED3D3B;text-align: center !important">Modelo</th>
                                        <th scope="col" style="background:#ED3D3B;text-align: center !important">Ubicación</th>
                                        <th scope="col" style="text-align: center !important">Obs</th>
                                        <th scope="col" style="text-align: center !important">Costo</th>
                                        <th scope="col" style="text-align: center !important">Estado</th>
                                        <th scope="col" style="text-align: center !important" width="8%">Acciones</th>
                                        </tr>
                                        </thead>
                                        </table>
            </div>

        </div> <!-- end container-fluid -->

    </div> <!-- end content -->



    {{-- ---------------------Modal detalle equipo------------------------------- --}}
    <div class="modal fade" id="modalDetalleEquipo" tabindex="-1" role="dialog" aria-labelledby="modalDetalleEquipoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="max-width:80% !important">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalDetalleEquipoLabel"></h3>
                    <h3 class="modal-title" id="EstadoDetalleEquipo"></h3>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="nav-item">
                            <a href="#detalleEquipo" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                                <span class="d-none d-sm-block">Detalle</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#parametros" data-toggle="tab" aria-expanded="true" class="nav-link">
                                <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                                <span class="d-none d-sm-block">Parámetros</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#observacion" data-toggle="tab" aria-expanded="true" class="nav-link">
                                <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                                <span class="d-none d-sm-block">Observaciones</span>
                            </a>
                        </li>
                      
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="detalleEquipo">
                            <div id="detalleEquipo-content">

                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="mb-1 mt-3 text-muted">N° de Serie:</label>
                                        <input type="text" name="numSerieEquipo" id="numSerieEquipo"
                                            class="form-control" value="" disabled>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="mb-1 mt-3 text-muted">Act. Fijo:</label>
                                        <input type="text" name="actFijoEquipo" id="actFijoEquipo"
                                            class="form-control" value="" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="mb-1 mt-3 text-muted">Inventario:</label>
                                        <input type="text" name="inventarioEquipo" id="inventarioEquipo"
                                            class="form-control" value="" disabled>
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="mb-1 mt-3 text-muted">Capacidad:</label>
                                        <input type="text" name="dsc_capacidad" id="dsc_capacidad"
                                            class="form-control" value="" disabled>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="mb-1 mt-3 text-muted">Fecha Ejecutado:</label>
                                        <input type="text" name="fch_ejecutado" id="fch_ejecutado"
                                            class="form-control" value="" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="mb-1 mt-3 text-muted">Costo Total:</label>
                                        <input type="text" name="imp_costo_ejecutado" id="imp_costo_ejecutado"
                                            class="form-control" value="" disabled>
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="mb-1 mt-3 text-muted">Tipo:</label>
                                        <input type="text" name="tipoEquipo" id="tipoEquipo" class="form-control"
                                            value="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-1 mt-3 text-muted">Subtipo:</label>
                                        <input type="text" name="subtipoEquipo" id="subtipoEquipo"
                                            class="form-control" value="" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="mb-1 mt-3 text-muted">Marca:</label>
                                        <input type="text" name="marcaEquipo" id="marcaEquipo" class="form-control"
                                            value="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-1 mt-3 text-muted">Modelo:</label>
                                        <input type="text" name="modeloEquipo" id="modeloEquipo" class="form-control"
                                            value="" disabled>
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="mb-1 mt-3 text-muted">Sede:</label>
                                        <input type="text" name="sedeEquipo" id="sedeEquipo" class="form-control"
                                            value="" disabled>
                                        <input type="hidden" name="codSede" id="codSede" class="form-control"
                                            value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-1 mt-3 text-muted">Ubicación:</label>
                                        <input type="text" name="ubicacionEquipo" id="ubicacionEquipo"
                                            class="form-control" value="" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="mb-1 mt-3 text-muted">Estado Encontrado:</label>
                                        <input type="text" name="estadoEncontrado" id="estadoEncontrado" class="form-control"
                                            value="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-1 mt-3 text-muted">Estado Post-mantenimiento:</label>
                                        <input type="text" name="estadoEntregado" id="estadoEntregado" class="form-control"
                                            value="" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="parametros">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="parametros-content" style="margin-top: -1rem;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="observacion">
                            <div id="observacion-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="mb-1 mt-3 text-muted">Observación Post-mantemimiento:</label>
                                        <textarea  name="dsc_observacion_encontrado" id="dsc_observacion_encontrado" class="form-control" rows="3" disabled></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-1 mt-3 text-muted">Observación Actual:</label>
                                        <textarea  name="dsc_observacion_actual" id="dsc_observacion_actual" class="form-control"  rows="3" disabled> </textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="tableObservacion" style="margin-top: -1rem;"></div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')
    <script type="text/javascript">
        
        var Token='NO';

        //solo numeros
        function soloNumeros(e) {
            var key = window.Event ? e.which : e.keyCode
            return ((key >= 48 && key <= 57) || (key == 8) || (key == 45))
        }
       
        var minDate, maxDate;

        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                //console.log('data',data);
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[1] );
        
                if (
                    ( min === null && max === null ) ||
                    ( min === null && date <= max ) ||
                    ( min <= date   && max === null ) ||
                    ( min <= date   && date <= max )
                ) {
                    return true;
                }
                return false;
            }
        );
        window.onload= function(){
        $(".tabla2").hide();
        var currentDate = new Date();
        var mes_actual =  currentDate.getMonth()+1;
        var anho_actual =  currentDate.getFullYear();

       //console.log(mes_actual);
        var fch_anho=document.getElementById("anioCiclo") ;
        fch_anho.value=anho_actual;

        var fch_inicio=document.getElementById("mesInicio") ;
        fch_inicio.value=mes_actual;
        
        var fch_fin=document.getElementById("mesFin") ;
        fch_fin.value=mes_actual;

        }
        
        minDate = new DateTime(document.getElementById('min'),{
            locale: 'es-mx',
            format: 'DD/MM/YYYY',
            i18n:{
                clear: 'Limpiar',
                previous: 'Anterior',
                next: 'Proximo',
                months: [
                    'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
                }

        });
        maxDate = new DateTime(document.getElementById('max'),{
            locale: 'es-mx',
            format: 'DD/MM/YYYY',
            i18n:{
                clear: 'Limpiar',
                previous: 'Anterior',
                next: 'Proximo',
                months: [
                    'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
                }
        });

      
           
            function VerInformeTecnico(idArchivoIT,idArchivoA1,idArchivoA2,webUrlIT,webUrlA1,webUrlA2) {
           


            if(Token=='NO'){
                $.ajax({
                    type : "GET",
                    url:"https://webapigeneraleskunaq.azurewebsites.net/api/OneDrive/ObtenerUrlInformeTecnico/20547386176/"+idArchivoIT+"/"+idArchivoA1+"/"+idArchivoA2,
                    dataType: 'json',
                    success: function(result) {
                        var webIT= result["response"]["webUrlIT"];
                        var webA1= result["response"]["webUrlA1"];
                        var webA2= result["response"]["webUrlA2"];
                        console.log(result);
                        window.open(webIT,'_blank'); 
                        if(webA1==null || webA1==''){}else{window.open(webA1,'_blank'); }
                        if(webA2==null || webA2==''){}else{window.open(webA2,'_blank'); }
                        Token='SI';
                        }
                });
            }else{
                window.open(webUrlIT,'_blank');
                if(webUrlA1==null || webUrlA1==''){}else{window.open(webUrlA1,'_blank'); }
                if(webUrlA2==null || webUrlA2==''){}else{window.open(webUrlA2,'_blank'); }
            }
          
        }
            
        

        function VerCertificadoOperativo(idArchivoCO,webUrlCO) {
            if(Token=='NO'){
                $.ajax({
                    type : "GET",
                    url:"https://webapigeneraleskunaq.azurewebsites.net/api/OneDrive/ObtenerUrlDocumento/20547386176/"+idArchivoCO,
                    dataType: 'json',
                    success: function(result) {
                        var webCO= result["response"]["webUrl"];
                        console.log(result);
                        window.open(webCO,'_blank'); 
                        Token='SI';
                        }
                });
            }else{
                window.open(webUrlCO,'_blank');
            }
        }


        function VerImagen(item,idArchivo,webUrl) {
            if(Token=='NO'){
                $.ajax({
                    type : "GET",
                    url:"https://webapigeneraleskunaq.azurewebsites.net/api/OneDrive/ObtenerUrlDocumento/20547386176/"+idArchivo,
                    dataType: 'json',
                    success: function(result) {
                        var webCO= result["response"]["webUrl"];
                        console.log(result);
                        window.open(webCO,'_blank'); 
                        Token='SI';
                        }
                });
            }else{
                window.open(webUrl,'_blank');
            }
        }

        


        $('#sedeCiclo').select2();

       
    
        function creaTabla(){
            //Aqui se valida si existe la dTable para reinicializarse...
            $(".tabla2").hide();
            $(".tabla1").show();
            

            if ($.fn.dataTable.isDataTable('#datatablePlan')) {
                $('#datatablePlan').DataTable().clear();
                $('#datatablePlan').DataTable().destroy();        
            }

            if ($.fn.dataTable.isDataTable('#datatableEquipo')) {
                $('#datatableEquipo').DataTable().clear();
                $('#datatableEquipo').DataTable().destroy();          
            }
           
           
            var sede = $('#sedeCiclo').val();
            var mesIni = $('#mesInicio').val();
            var mesFin = $('#mesFin').val();
            var anio = $('#anioCiclo').val();
            const valores =  [];
            valores['sede']=sede;
            valores['mesIni']=mesIni;
            valores['mesFin']=mesFin;
            valores['anio']=anio;
            valores['num_plan']=0;
            valores['cod_item']=0;
            

            var listadoplan = $('#datatablePlan').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                },
                processing: true,
                ajax: {
                    type: 'GET',
                    url:   "{{ url('mantenimiento/listadoplan') }}",
                    data: {
                            'sede': sede,
                            'mesIni': mesIni,
                            'mesFin': mesFin,
                            'anio': anio,
                         },
                    dataSrc: '',
                },
                columns: [
                    {
                        data: 'fch_programado',
                        class: 'centrado'
                    },
                    {
                        data: 'dsc_plan',
                    },
                    {
                        data: 'cant_equipo',
                        class: 'centrado'
                    },
                    {
                        data: 'num_terminado',
                        class: 'centrado'
                    },
                    {
                        data: 'porcAv',
                        class: 'centrado'
                    },
                    {
                        data: 'imp_total_soles',
                        class: 'derecha'
                    },
                    {
                        data: 'VerIT',
                        class: 'centrado'
                    }
                ],
                createdRow: function(row, data, index) {
                    //color avance
                    var newPorAv = data.porcAv.slice(0,-1);
                    newPorAv = parseFloat(newPorAv);
                    if (newPorAv >= 100 ) {
                        $('td:eq(4)', row).css('background-color', '#2E8B57');
                        $('td:eq(4)', row).css('color', 'White'); 
                    }else if (newPorAv < 100 && newPorAv > 80) {
                        $('td:eq(4)', row).css('background-color', '#98FB98');
                        $('td:eq(4)', row).css('color', 'Black'); 
                    }else if (newPorAv <= 80 && newPorAv > 50) {
                        $('td:eq(4)', row).css('background-color', '#ffd700');
                    }else if (newPorAv <= 50 && newPorAv > 20) {
                        $('td:eq(4)', row).css('background-color', '#FFA000');
                    }else if (newPorAv <= 20  && newPorAv > 0) {
                        $('td:eq(4)', row).css('background-color', '#ff4500');
                        $('td:eq(4)', row).css('color', 'White'); 
                    }else if (newPorAv == 0) {
                        $('td:eq(4)', row).css('background-color', 'White'); 
                    }
                    
                },
                

                rowReorder: false,
                select: true,
                responsive: true,
                filter: false,
                lengthChange: true,
                ordering: false,
                orderMulti: false,
                paging: false,
                info: false,
                // rowReorder: true
            });



            

            tabla =  $('#datatableEquipo').DataTable(
            {
            language: {
            url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
            },
            //dom: '<"top"Plp>tr<>tr<"bottom"Bf>' ,
            //dom: '<"bottom"Bf>tr<"top"Plp>',
            dom: 'PtriBfp',
            buttons: [
                    {
                        extend: "excel",                    // Extend the excel button
                        text: 'Excel',
                        className: 'btn btn-success',
                        excelStyles: {                      // Add an excelStyles definition
                            cells: "2",                     // to row 2
                            style: {                        // The style block
                                font: {                     // Style the font
                                    name: "Arial",          // Font name
                                    size: "14",             // Font size
                                    color: "FFFFFF",        // Font Color
                                    b: false,               // Remove bolding from header row
                                },
                                fill: {                     // Style the cell fill (background)
                                    pattern: {              // Type of fill (pattern or gradient)
                                        color: "457B9D",    // Fill color
                                    }
                                }
                            }
                        },
                    },
                ],

            searchPanes: {
                initCollapsed: true,
                i18n: {
                    //mensaje cuando no hay datos.. 
                    emptyMessage: "</i></b>No hay Registros que mostrar..</b></i>",
                    loadMessage: 'Cargando las opciones de filtros...',
                    collapseMessage: 'Ocultar Todos',
                    showMessage: 'Mostrar Todos',
                    clearMessage: 'Limpiar Filtros',
                title: {
                        _: 'Filtros Seleccionados - %d',
                        0: 'Sin filtros Activos',
                        1: 'Un filtro Activo'
                    }   
                }
            },
            processing: true,
            // serverSide: true,
            ajax: {
                type: 'GET',
                url: '{{url('mantenimiento/listadoequipo')}}',
                data: {
                                        'sede': sede,
                                        'mesIni': mesIni,
                                        'mesFin': mesFin,
                                        'anio': anio
                    },
                dataSrc: '',
            },
            columns: [
                        {
                            data: 'dsc_plan'
                        },
                        {
                            data: 'fch_programacion',
                            class: 'centrado'
                        },
                        {
                            data: 'dsc_equipo'
                        },
                        {
                            data: 'num_serie',
                            class: 'centrado'
                        },
                        {
                            data: 'dsc_tipo_equipo'
                        },
                        {
                            data: 'dsc_marca'
                        },
                        {
                            data: 'dsc_modelo'
                        },
                        {
                            data: 'dsc_ubicacion'
                        },
                        {
                            data: 'flg_observacion',
                            class: 'centrado'
                        },
                        {
                            data: 'imp_costo_ejecutado',
                            class: 'derecha'
                        },
                        {
                            data: 'dsc_estado_tareo',
                            class: 'centrado'
                        },
                        {
                            data: 'VerCO',
                            class: 'centrado'
                        }
                   ],
                columnDefs: [
                    {
                        searchPanes: {
                            show: false
                        },
                        targets: [2,3,5,6,9,11]
                        //render: DataTable.render.datetime('DD/MM/YYYY', 'es-mx'),
                    },
                    {
                        searchPanes: {
                            show: true
                        },
                        targets: [0,1,4,7,8,10]
                        //render: DataTable.render.datetime('DD/MM/YYYY', 'es-mx'),
                    }
                    ],  
                        createdRow: function(row, data, index) {

                            var estado = data.dsc_estado_tareo;
                            
                            if (estado == 'ATENDIDO' ) {
                                $('td:eq(10)', row).css('background-color', '#2E8B57');
                                $('td:eq(10)', row).css('color', 'White'); 
                            }else if (estado == 'PENDIENTE') {
                                $('td:eq(10)', row).css('background-color', '#FF4601');
                                $('td:eq(10)', row).css('color', 'White'); 
                            }else if (estado=='EN PROCESO') {
                                $('td:eq(10)', row).css('background-color', '#FFD603');
                                $('td:eq(10)', row).css('color', 'Black'); 
                            }else{
                                
                            }
                            
                        },
            rowReorder: true,
            select:true,
            responsive: true,
            scrollX:false,
            filter: true,
            lengthChange: true,
            ordering: true,
            orderMulti: false,
            paging : false,
            info: true,
            // rowReorder: true
            });                   

       
        }


        



        
    


        function BuscarEquipos(num_plan){
  
            $(".tabla1").hide();
            $(".tabla2").show();
            if ($.fn.dataTable.isDataTable('#datatableEquipo2')) {
                $('#datatableEquipo2').DataTable().clear();
                $('#datatableEquipo2').DataTable().destroy();          
            }
           
          
            var sede = $('#sedeCiclo').val();
            var mesIni = $('#mesInicio').val();
            var mesFin = $('#mesFin').val();
            var anio = $('#anioCiclo').val();
            const valores =  [];
            valores['sede']=sede;
            valores['mesIni']=mesIni;
            valores['mesFin']=mesFin;
            valores['anio']=anio;
            valores['num_plan']=num_plan;
            valores['cod_item']=0;
            tabla2 =  $('#datatableEquipo2').DataTable(
               
            {
                
            language: {
            url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
            },
            //dom: '<"top"Plp>tr<>tr<"bottom"Bf>' ,
            //dom: '<"bottom"Bf>tr<"top"Plp>',
            dom: 'PtriBfp',
            buttons: [
                    {
                        extend: "excel",                    // Extend the excel button
                        text: 'Excel',
                        className: 'btn btn-success',
                        excelStyles: {                      // Add an excelStyles definition
                            cells: "2",                     // to row 2
                            style: {                        // The style block
                                font: {                     // Style the font
                                    name: "Arial",          // Font name
                                    size: "14",             // Font size
                                    color: "FFFFFF",        // Font Color
                                    b: false,               // Remove bolding from header row
                                },
                                fill: {                     // Style the cell fill (background)
                                    pattern: {              // Type of fill (pattern or gradient)
                                        color: "457B9D",    // Fill color
                                    }
                                }
                            }
                        },
                    },
                ],

            searchPanes: {
                initCollapsed: true,
                i18n: {
                    //mensaje cuando no hay datos.. 
                    emptyMessage: "</i></b>No hay Registros que mostrar..</b></i>",
                    loadMessage: 'Cargando las opciones de filtros...',
                    collapseMessage: 'Ocultar Todos',
                    showMessage: 'Mostrar Todos',
                    clearMessage: 'Limpiar Filtros',
                title: {
                        _: 'Filtros Seleccionados - %d',
                        0: 'Sin filtros Activos',
                        1: 'Un filtro Activo'
                    }   
                }
            },
            processing: true,
            // serverSide: true,
            ajax: {
                type: 'GET',
                url: '{{url('mantenimiento/listadoequipo')}}',
                data: {
                                        'sede': sede,
                                        'mesIni': mesIni,
                                        'mesFin': mesFin,
                                        'anio': anio,
                                        'num_plan': num_plan
                    },
                dataSrc: '',
            },
            columns: [
                        
                        {
                            data: 'fch_programacion',
                            class: 'centrado'
                        },
                        {
                            data: 'dsc_equipo'
                        },
                        {
                            data: 'num_serie',
                            class: 'centrado'
                        },
                        {
                            data: 'dsc_tipo_equipo'
                        },
                        {
                            data: 'dsc_marca'
                        },
                        {
                            data: 'dsc_modelo'
                        },
                        {
                            data: 'dsc_ubicacion'
                        },
                        {
                            data: 'flg_observacion',
                            class: 'centrado'
                        },
                        {
                            data: 'imp_costo_ejecutado',
                            class: 'derecha'
                        },
                        {
                            data: 'dsc_estado_tareo',
                            class: 'centrado'
                        },
                        {
                            data: 'VerCO',
                            class: 'centrado'
                        }
                       
                   ],
                  
                columnDefs: [
                    {
                        searchPanes: {
                            show: true
                        },
                        targets: [0,3,4,6,7,9]
                    },
                    {
                        searchPanes: {
                                show: false
                        },
                        targets: [1,2,5,8,10]
                    }
                    ],  
                    
                        createdRow: function(row, data, index) {
                           
                            var estado = data.dsc_estado_tareo;
                            
                            if (estado == 'ATENDIDO' ) {
                                $('td:eq(9)', row).css('background-color', '#2E8B57');
                                $('td:eq(9)', row).css('color', 'White'); 
                            }else if (estado == 'PENDIENTE') {
                                $('td:eq(9)', row).css('background-color', '#FF4601');
                                $('td:eq(9)', row).css('color', 'White'); 
                            }else if (estado=='EN PROCESO') {
                                $('td:eq(9)', row).css('background-color', '#FFD603');
                                $('td:eq(9)', row).css('color', 'Black'); 
                            }else{
                                
                            }
                           
                        },
            rowReorder: true,
            select:true,
            responsive: true,
            scrollX:false,
            filter: true,
            lengthChange: true,
            ordering: true,
            orderMulti: false,
            paging : false,
            info: true,
            
            // rowReorder: true
            }); 
            
           

        }


        
          
        function VerDetalleEquipo(num_plan,cod_item) {
            $('#modalDetalleEquipo').modal('show');

            var cod_modelo = '';
            $('#tbl-det-equipo').DataTable().clear();
            $('#tbl-det-equipo').DataTable().destroy();

            $.ajax({
                type: 'GET',
                url: "{{ url('mantenimiento/listadoequipo') }}",
                data: {
                    'num_plan': num_plan,
                    'cod_item': cod_item
                },
                beforeSend: function() {
                    $("#equipo-body").LoadingOverlay("show");
                },
                complete: function() {
                    $("#equipo-body").LoadingOverlay("hide");
                },
                success: function(result) {
                    var data = result;
                    //console.log('datadelmodal',data);
                    $('#modalDetalleEquipoLabel').html('EQUIPO: ' + data[0]['dsc_equipo']);
                    $('#EstadoDetalleEquipo').html(data[0]['dsc_estado_tareo']);
                    $('#tipoEquipo').val(data[0]['dsc_tipo_equipo']);
                    $('#subtipoEquipo').val(data[0]['dsc_subtipo_equipo']);
                    $('#marcaEquipo').val(data[0]['dsc_marca']);
                    $('#modeloEquipo').val(data[0]['dsc_modelo']);
                    $('#actFijoEquipo').val(data[0]['cod_activo']);
                    $('#inventarioEquipo').val(data[0]['cod_inventario']);
                    $('#numSerieEquipo').val(data[0]['num_serie']);
                    $('#ubicacionEquipo').val(data[0]['dsc_ubicacion']);
                    $('#sedeEquipo').val(data[0]['dsc_sede']);
                    $('#estadoEncontrado').val(data[0]['dsc_estado_encontrado']);
                    $('#estadoEntregado').val(data[0]['dsc_estado_entregado']);
                    $('#dsc_observacion_encontrado').val(data[0]['dsc_observacion_encontrado']);
                    $('#dsc_observacion_actual').val(data[0]['dsc_observacion_actual']);
                    $('#dsc_capacidad').val(data[0]['dsc_capacidad']);
                    $('#fch_ejecutado').val(data[0]['fch_ejecutado']);
                    $('#imp_costo_ejecutado').val(data[0]['imp_costo_ejecutado']);
                  

                    $.ajax({
                        type: 'GET',
                        url: "{{ url('mantenimiento/listaParametro') }}",
                        data: {
                            'num_plan': num_plan,
                            'cod_item': cod_item
                        },
                        beforeSend: function() {
                            $("#equipo-body").LoadingOverlay("show");
                        },
                        complete: function() {
                            $("#equipo-body").LoadingOverlay("hide");
                        },
                        success: function(result) {
                            var data = result;
                            //console.log(data);
                            var body = '<div class="card-box table-responsive">';
                            // body += '<div class="row">'+'<div class="col-md-2" style="margin-bottom:0.5em;">Exportar: <img src="{{ asset('assets/images/icons/icon_excel.png') }}" title="Click para exportar" onclick="exportar()" style="height:30px;cursor:pointer;"></div>'+'</div>';
                            body += '';

                            body +=
                                '<table id="tbl-det-equipo" class="table table-bordered dt-responsive" style="border-collapse:collapse; border-spacing:0; width:100%; ">' +
                                '<div class="row">' +
                                '<thead>' +
                                '<tr class="headtable"  style="text-align:center;">' +
                                '<th style="width:5%;">Item</th>' +
                                '<th style="width:65%;">Parametro</th>' +
                                '<th style="width:15%;">Valor Inicial</th>' +
                                '<th style="width:15%;">Valor Final</th>' +
                                '</tr>' +
                                '</thead>' +
                                '<tbody>';
                                
                            $.each(data, function(index, value) {

                                body += '<tr>' +
                                    '<td>' + value.item + '</td>' +
                                    '<td>' + value.dsc_medicion + '</td>' +
                                    '<td>' + value.dsc_valor1 + '</td>' +
                                    '<td>' + value.dsc_valor2 + '</td>' +
                                    '</tr>';
                            });

                            body += '</tbody>' +
                                '</table>' +
                                '</div>';

                            $('#parametros-content').html(body);

                            $("#tbl-det-equipo").DataTable({
                                responsive: true,
                                filter: false,
                                lengthChange: true,
                                ordering: false,
                                orderMulti: false,
                                paging: true,
                                info: true,
                                dom: 'Bftrip',
                                language: {
                                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                                },
                                buttons: [
                                    {
                                        extend: "excel",                    // Extend the excel button
                                        text: 'Excel',
                                        title: codigo+' Reporte Incidencias', //Nombre de archivo de descarga
                                        className: 'btn btn-success',
                                        excelStyles: {                      // Add an excelStyles definition
                                            cells: "2",                     // to row 2
                                            style: {                        // The style block
                                                font: {                     // Style the font
                                                    name: "Arial",          // Font name
                                                    size: "14",             // Font size
                                                    color: "FFFFFF",        // Font Color
                                                    b: false,               // Remove bolding from header row
                                                },
                                                fill: {                     // Style the cell fill (background)
                                                    pattern: {              // Type of fill (pattern or gradient)
                                                        color: "457B9D",    // Fill color
                                                    }
                                                }
                                            }
                                        },
                                    },
                                ]
                            });

                        }
                    });//END AJAX PARAMETRO

                    $('#tbl-det-equipo2').DataTable().clear();
                    $('#tbl-det-equipo2').DataTable().destroy();
                    $.ajax({
                        type: 'GET',
                        url: "{{ url('mantenimiento/listaObservacion') }}",
                        data: {
                            'cod_item': cod_item
                        },
                        beforeSend: function() {
                            $("#equipo-body").LoadingOverlay("show");
                        },
                        complete: function() {
                            $("#equipo-body").LoadingOverlay("hide");
                        },
                        success: function(result) {
                            var data = result;
                            //console.log(data);
                            var body = '<div class="card-box table-responsive">';

                           // body += '<div class="row">'+'<div class="col-md-2" style="margin-bottom:0.5em;">Exportar: <img src="{{ asset('assets/images/icons/icon_excel.png') }}" title="Click para exportar" onclick="exportar()" style="height:30px;cursor:pointer;"></div>'+'</div>';
                            body += '';

                            body +=
                                '<table id="tbl-det-equipo2" class="table table-bordered dt-responsive" style="border-collapse:collapse; border-spacing:0; width:100%; ">' +
                                '<div class="row">' +
                                '<thead>' +
                                '<tr class="headtable" style="text-align:center;">' +
                                '<th style="width:3%;">Item</th>' +
                                '<th style="width:87%;">Resumen</th>' +
                                '<th style="width:5%;">Acciones</th>' +
                                '</tr>' +
                                '</thead>' +
                                '<tbody>';
                                
                            $.each(data, function(index, value) {
                                var item=value.item;
                                var dsc_resumen=value.dsc_resumen;
                                var idArchivoImagen=value.idArchivoImagen;
                                var webUrl=value.webUrl;

                                
                                var botonVer='<button type="button" class="btn btn-info"  title="Ver Imagen" onclick="VerImagen('+item+','+"'"+idArchivoImagen+"'"+','+"'"+webUrl+"'"+')"><i class="dripicons-search"></i></button>';
                                //var botonDescargar='<button type="button" class="btn btn-warning"  title="Descargar Imagen" onclick="DescargarImagen('+item+','+"'"+idArchivoImagen+"'"+','+"'"+webUrl+"'"+')"><i class="dripicons-download"></i></button>'
                               
                                // var botonExpandir='<button type="button" class="btn btn-success"  title="Expandir Imagen" onclick="ExpandirImagen('+"'"+item+"'"+','+"'"+idArchivoImagen+"'"+','+"'"+webUrl+"'"+')"><i class="dripicons-document"></i></button>'
                               // 

                               
                                body += '<tr>' +
                                    '<td>' + value.item + '</td>' +
                                    '<td>' + value.dsc_resumen + '</td>' +
                                    '<td>' +botonVer+ '</td>' +
                                    '</tr>';
                            });

                            body += '</tbody>' +
                                '</table>' +
                                '</div>';

                            $('#tableObservacion').html(body);

                            $("#tbl-det-equipo2").DataTable({
                                responsive: true,
                                filter: false,
                                lengthChange: true,
                                ordering: false,
                                orderMulti: false,
                                paging: true,
                                info: true,
                                dom: 'Bftrip',
                                language: {
                                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                                },
                                buttons: [
                                    {
                                        extend: "excel",                    // Extend the excel button
                                        text: 'Excel',
                                        title: codigo+' Reporte Incidencias', //Nombre de archivo de descarga
                                        className: 'btn btn-success',
                                        excelStyles: {                      // Add an excelStyles definition
                                            cells: "2",                     // to row 2
                                            style: {                        // The style block
                                                font: {                     // Style the font
                                                    name: "Arial",          // Font name
                                                    size: "14",             // Font size
                                                    color: "FFFFFF",        // Font Color
                                                    b: false,               // Remove bolding from header row
                                                },
                                                fill: {                     // Style the cell fill (background)
                                                    pattern: {              // Type of fill (pattern or gradient)
                                                        color: "457B9D",    // Fill color
                                                    }
                                                }
                                            }
                                        },
                                    },
                                ]
                            });

                        }
                    });//END AJAX OBSERVACION
                    




                }
            });
        }
        



    </script>
@endpush
