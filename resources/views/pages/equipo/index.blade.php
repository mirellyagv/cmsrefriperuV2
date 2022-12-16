@extends('layouts.refriPeruLayout')

@section('content')
    <div class="content" id="equipo-body">
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
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div> --}}
                        <h4 class="page-title lineatitle"><i class="fe-file-text"></i> GESTIÓN DE EQUIPOS</h4>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-12">
                    <div class="table-responsive titleform">
                        <h4 class="header-title headertitle"><i class="far fa-caret-square-down vermas" option="0"></i>
                            Filtros</h4>
                    </div>
                </div>
            </div>

            <div class="container cntfiltro">
                <div class="row" style="padding-bottom:15px;">
                    <div class="col-md-4">
                        <h5 class="headerh">N° Serie</h5>
                        <input type="text" class="form-control bordecaja" name="numserie" id="numserie"
                            placeholder="N° Serie" maxlength="50" />
                    </div>
                    <div class="col-md-4">
                        <h5 class="headerh">Tipo</h5>
                        <select class="form-control" id="tipo" name="tipo">
                            <option value="0">Todos</option>
                            @foreach ($tipos as $type)
                                <option value="{{ $type->cod_tipo_equipo }}">{{ $type->dsc_tipo_equipo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <h5 class="headerh">Sub-tipo</h5>
                        <select class="form-control" id="sub-tipo" name="sub-tipo">
                            <option value="0">Todos</option>
                        </select>
                    </div>
                </div>

                <div class="row fondoheader">
                    <!--<div class="cntbotonessearch">-->
                    <div class="col-md-4">
                        <h5 class="headerh">Nombre</h5>
                        <input type="text" class="form-control bordecaja" name="nomequipo" id="nomequipo"
                            placeholder="Nombre de equipo" maxlength="100" />
                    </div>
                    <div class="col-md-3">
                        <h5 class="headerh">Marca</h5>
                        <select class="form-control" id="marca" name="marca">
                            <option value="0">Todos</option>
                            @foreach ($marcas as $marca)
                                <option value="{{ $marca->cod_marca }}">{{ $marca->dsc_marca }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <h5 class="headerh">Modelo</h5>
                        <select class="form-control" id="modelo" name="modelo">
                            <option value="0">Todos</option>
                            @foreach ($modelos as $modelo)
                                <option value="{{ $modelo->cod_modelo }}">{{ $modelo->dsc_modelo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <h5 class="headerh">&nbsp;</h5>
                        <button class="btnlimpiar btn-clear">
                            <i class="fe-rotate-cw"></i>
                        </button>
                    </div>
                    <!--</div>-->
                </div>

            </div> --}}

            <div class="row fondocabecera">
                <div class="col-12">
                    <div class="table-responsive titleform">
                        <h4 class="header-title headertitle"><i class="fe-copy"></i> Listado de equipos</h4>
                    </div>
                </div>
                <div class="col-12">
                    <div id="equipo-content"></div>
                </div>

                <div class="table-responsive-md">
                    <table id="datatablePrueba" class="table  table-bordered">
                        <thead class="headtable">
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Sub-tipo</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            <tr class="">                           
                                <td scope="row">R1C1</td>
                                <td>R1C2</td>
                                <td>R1C3</td>
                                <td>Item</td>
                                <td>Item</td>
                                <td>Item</td>
                                <td>Item</td>
                            </tr>
                            <tr class="">
                                <td scope="row">Item</td>
                                <td>Item</td>
                                <td>Item</td>
                                <td>Item</td>
                                <td>Item</td>
                                <td>Item</td>
                                <td>Item</td>
                            </tr>
                        </tbody> --}}
                    </table>
                </div>
            </div> <!-- end row -->

        </div> <!-- end container-fluid -->

    </div> <!-- end content -->

    {{-- ---------------------Modal detalle equipo------------------------------- --}}
    <div class="modal fade" id="modalDetalleEquipo" tabindex="-1" role="dialog" aria-labelledby="modalDetalleEquipoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="max-width:80% !important">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetalleEquipoLabel"></h5>
                    <h5 class="modal-title" id="EstadoDetalleEquipo"></h5>
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
                            <a href="#intervencion" data-toggle="tab" aria-expanded="true" class="nav-link">
                                <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                                <span class="d-none d-sm-block">Intervencion</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a name="" id="" class="btn btn-warning" href="#" onclick="datosEquipo1($('#modalDetalleEquipoLabel').text())" role="button">Reportar incidencia</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="detalleEquipo">
                            <div id="detalleEquipo-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="mb-1 mt-3 text-muted">Tipo</label>
                                        <input type="text" name="tipoEquipo" id="tipoEquipo" class="form-control"
                                            value="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-1 mt-3 text-muted">Subtipo</label>
                                        <input type="text" name="subtipoEquipo" id="subtipoEquipo"
                                            class="form-control" value="" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="mb-1 mt-3 text-muted">Marca</label>
                                        <input type="text" name="marcaEquipo" id="marcaEquipo" class="form-control"
                                            value="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-1 mt-3 text-muted">Modelo</label>
                                        <input type="text" name="modeloEquipo" id="modeloEquipo" class="form-control"
                                            value="" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="mb-1 mt-3 text-muted">Act. Fijo</label>
                                        <input type="text" name="actFijoEquipo" id="actFijoEquipo"
                                            class="form-control" value="" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="mb-1 mt-3 text-muted">Inventario</label>
                                        <input type="text" name="inventarioEquipo" id="inventarioEquipo"
                                            class="form-control" value="" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="mb-1 mt-3 text-muted">N° de Serie</label>
                                        <input type="text" name="numSerieEquipo" id="numSerieEquipo"
                                            class="form-control" value="" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="mb-1 mt-3 text-muted">Sede</label>
                                        <input type="text" name="sedeEquipo" id="sedeEquipo" class="form-control"
                                            value="" disabled>
                                        <input type="hidden" name="codSede" id="codSede" class="form-control"
                                            value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="mb-1 mt-3 text-muted">Ubicación</label>
                                        <input type="text" name="ubicacionEquipo" id="ubicacionEquipo"
                                            class="form-control" value="" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="intervencion">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="intervencion-content"></div>
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
        //solo numeros
        function soloNumeros(e) {
            var key = window.Event ? e.which : e.keyCode
            return ((key >= 48 && key <= 57) || (key == 8) || (key == 45))
        }

        $(document).ready(function() {
           tabla =  $('#datatablePrueba').DataTable({
                language: {
                url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                },
                dom: 'BPftrip',
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
                    url: '{{url('equipo/listar')}}',
                    dataSrc: '',
                },
                columns: [
                    {
                        data : 'code'
                    },
                    {
                        data : 'nombre'
                    },
                    {
                        data : 'nomtipo'
                    },
                    {
                        data : 'nomsubtipo'
                    },
                    {
                        data : 'marca'
                    },
                    {
                        data : 'modelo'
                    },
                    {
                        data : 'numpedido',
                        class: 'centrado'
                    }
                ],
                rowReorder: true,
                select:true,
                responsive: true,
                filter: true,
                lengthChange: true,
                ordering: false,
                orderMulti: false,
                paging : true,
                info: true,
                // rowReorder: true
            });
            //Combitos
            // $('#tipo').select2();

            // $('#sub-tipo').select2();

            // $('#marca').select2();

            // $('#modelo').select2();

            //Se hace el slider.
            // $('.vermas').on('click', function() {
            //     var opt = $(this).attr('option');
            //     //
            //     if (opt == '0') {
            //         $(this).removeClass("fa-caret-square-down");
            //         $(this).addClass("fa-caret-square-up");
            //         //
            //         $('.cntfiltro').fadeIn("slow");
            //         $('.cntfiltro').css('display', 'inline-block');

            //         $(this).attr('option', '1');
            //     } else {
            //         $(this).removeClass("fa-caret-square-up");
            //         $(this).addClass("fa-caret-square-down");
            //         //
            //         $('.cntfiltro').fadeOut("slow");
            //         $('.cntfiltro').css('display', 'none');
            //         $(this).attr('option', '0');
            //     }

            // });


            // $("#tipo").change(function() {
            //     //Aqui se llama al subtipo
            //     var idtipo = $(this).val();
            //     $.ajax({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         url: "{{ url('tipoequipo/buscarsubtipo') }}",
            //         type: "post",
            //         data: "code=" + idtipo,
            //         cache: false,
            //         processData: false,
            //         success: function(data) {
            //             $('#sub-tipo').html(data);
            //             $('#sub-tipo').trigger('change');
            //         }
            //     });
            //     //Se llama al equipo content
            //     $("#equipo-content").html("");
            //     loadPageData();
            // });

            // $("#sub-tipo").change(function() {
            //     $("#equipo-content").html("");
            //     loadPageData();
            // });

            // $("#marca").change(function() {
            //     $("#equipo-content").html("");
            //     loadPageData();
            // });

            // $("#modelo").change(function() {
            //     $("#equipo-content").html("");
            //     loadPageData();
            // });

            // $("#numserie").keypress(function(e) { //text-filter
            //     var key = e.which;
            //     var filtro = $(this).val();
            //     var len = filtro.length;
            //     if (key === 13) {
            //         if (len > 2) {
            //             $("#equipo-content").html("");
            //             loadPageData();
            //         } else {
            //             Swal.fire(
            //                 'Aviso',
            //                 'Debe ingresar mínimo 3 caracteres',
            //                 'warning'
            //             );
            //             return false;
            //         }

            //     }
            //     return true;
            // });

            // $("#nomequipo").keypress(function(e) { //text-code
            //     var tecla = e.which;
            //     var code = $(this).val();
            //     var long = code.length;
            //     if (tecla === 13) {
            //         if (long > 2) {
            //             $("#equipo-content").html("");
            //             loadPageData();
            //         } else {
            //             Swal.fire(
            //                 'Aviso',
            //                 'Debe ingresar mínimo 3 caracteres',
            //                 'warning'
            //             );
            //             return false;
            //         }
            //     }
            //     return true;
            // });


            // $(".btn-clear").click(function() {
            //     window.location = "{{ url('equipo') }}";
            // });

            // loadPageData();
            // $('#datatablePrueba tbody').on('click', 'tr', function () {
            //         var data = tabla.row(this).data();
            //         //console.log(data);
            //         //window.location = "{{ url('home') }}";
            //         alert( data['code']+"-"+data['nombre'] );
            // });
                    
        });

        //Se inicia con la funcion onload
        // function loadPageData() {
        //     // $.ajax({
        //     //     type: 'GET',
        //     //     url: "{{ url('equipo/listar') }}",
        //     //     data: {
        //     //         'numserie' : $("#numserie").val(),
        //     //         'tipo'     : $("#tipo").val(),
        //     //         'subtipo'  : $("#sub-tipo").val(),
        //     //         'nomequipo': $("#nomequipo").val(),
        //     //         'codmarca' : $("#marca").val(),
        //     //         'codmodel' : $("#modelo").val()
        //     //     },
        //     //     beforeSend: function () {
        //     //         $("#equipo-body").LoadingOverlay("show");
        //     //     },
        //     //     complete: function () {
        //     //         $("#equipo-body").LoadingOverlay("hide");
        //     //     },
        //     //     success:function(result){
        //     //         var data = result;
        //     //        // console.log(data.items.length);
        //     //         if(data.items.length > 0){
        //     //             $("#equipo-content").html(getEquipoTable(data.items));

        //     //             // $("#tbl-equipo").DataTable({
        //     //             //     rowReorder: true,
        //     //             //     select:true,
        //     //             //     responsive: true,
        //     //             //     filter: false,
        //     //             //     lengthChange: true,
        //     //             //     ordering: false,
        //     //             //     orderMulti: false,
        //     //             //     paging : true,
        //     //             //     info: true,
        //     //             //     language:{
        //     //             //       "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        //     //             //     },
        //     //             // });
        //     //         }else{
        //     //             $("#equipo-content").html(getEmptyContent());
        //     //         }
        //     //     }
        //     // });                                 

        // }

        // function getEquipoTable(items){

        //     var j=1;
        //     var body  = '<div class="card-box table-responsive">';

        //     body += '<div class="row">' +
        //             '<div class="col-md-2" style="margin-bottom:0.5em;">Exportar: <img src="{{ asset('assets/images/icons/icon_excel.png') }}" title="Click para exportar" onclick="exportar()" style="height:30px;cursor:pointer;"></div>' +
        //             '</div>';

        //     body += '<table id="tbl-equipo" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse; border-spacing:0; width:100%;">' +
        //             '<thead>' +
        //             '<tr class="headtable">' +
        //             '<th>N°</th>' + 
        //             '<th>Codigo</th>' +
        //             '<th>Nombre</th>' + 
        //             '<th>Tipo</th>' +
        //             '<th>Sub-tipo</th>' +
        //             '<th>Marca</th>' +
        //             '<th>Modelo</th>' +
        //             '<th>Opciones</th>' +
        //             '</tr>' +
        //             '</thead>' +
        //             '<tbody>';

        //     $.each(items, function (index, value){

        //         body += '<tr>' + 
        //                     '<td>' + j + '</td>' +
        //                     '<td>' + value.code + '</td>' +
        //                     '<td>' + value.nombre + '</td>' +
        //                     '<td>' + value.nomtipo + '</td>' +
        //                     '<td>' + value.nomsubtipo + '</td>' +
        //                     '<td>' + value.marca + '</td>' +
        //                     '<td>' + value.modelo + '</td>' +
        //                     '<td style="text-align:center;">' +
        //                     '<a class="urlicon" title="Ver detalle" href="javascript:void(0)" onclick="verdetalle(' + "'" + value.code + "'" + ')" >' +
        //                     '<i class="dripicons-preview"></i>' +
        //                     '</a>' +
        //                     '</td>' +
        //                     '</tr>';

        //         j++;

        //     });

        //     body += '</tbody>' +
        //             '</table>' +
        //             '</div>';        

        //     return body;

        // }

        function verdetalle(codigo) {
            $('#modalDetalleEquipo').modal('show');
            var cod_modelo = '';

            $.ajax({
                type: 'GET',
                url: "{{ url('equipo/modalDetalle') }}",
                data: {
                    'cod_equipo': codigo,
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
                    cod_modelo = data[0]['cod_modelo'];
                    $('#modalDetalleEquipoLabel').html(codigo + '-' + data[0]['dsc_equipo']);
                    $('#EstadoDetalleEquipo').html(data[0]['dsc_estado']);
                    $('#tipoEquipo').val(data[0]['dsc_tipo_equipo']);
                    $('#subtipoEquipo').val(data[0]['dsc_subtipo_equipo']);
                    $('#marcaEquipo').val(data[0]['dsc_marca']);
                    $('#modeloEquipo').val(data[0]['dsc_modelo']);
                    $('#actFijoEquipo').val(data[0]['cod_activo']);
                    $('#inventarioEquipo').val(data[0]['cod_inventario']);
                    $('#numSerieEquipo').val(data[0]['num_serie']);
                    $('#ubicacionEquipo').val(data[0]['dsc_ubicacion']);
                    $('#sedeEquipo').val(data[0]['dsc_sede']);
                    $('#codSedeEquipo').val(data[0]['cod_sede']);

                    $.ajax({
                        type: 'GET',
                        url: "{{ url('equipo/listaIntervencion') }}",
                        data: {
                            'cod_equipo': codigo,
                            'cod_modelo': cod_modelo
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
                                '<div class="col-md-12" style="margin-bottom:-2em; text-align:right; margin-top:1rem;padding-right:1rem;"><ion-icon size="large" style="color:#2D8B57;vertical-align: sub;" name="ellipse"></ion-icon>Atendido <ion-icon size="large" style="color:#FFD603;vertical-align: sub;" name="ellipse"></ion-icon>En proceso <ion-icon size="large" style="color:#FF4601;vertical-align: sub;" name="ellipse"></ion-icon>Pendiente <ion-icon size="large" style="color:#A9A9A9;vertical-align: sub;" name="ellipse"></ion-icon>Sin orden de trabajo</div></div>'+
                                '<div class="row">' +
                                '<thead>' +
                                '<tr class="headtable"  style="text-align:center;">' +
                                '<th style="width:5%;">Ejec</th>' +
                                '<th style="width:15%;">Fecha Programado</th>' +
                                '<th style="width:15%;">Fecha Ejecutado</th>' +
                                '<th style="width:10%;">Tipo Intervención</th>' +
                                '<th style="width:40%;">Responsable</th>' +
                                '<th style="width:5%;">Plan Asociado</th>' +
                                '<th style="width:20%;">Orden Trabajo Asociado</th>' +
                                '</tr>' +
                                '</thead>' +
                                '<tbody>';
                                
                            $.each(data, function(index, value) {
                                //console.log(value)
                                var colorEdo = '';
                                switch (value.dsc_estado) {
                                    case 'ATENDIDO':
                                        colorEdo = '#2D8B57';
                                        break;
                                    case 'PENDIENTE':
                                        colorEdo = '#FF4601';
                                        break;
                                    case 'EN PROCESO':
                                        colorEdo = '#FFD603';
                                        break;
                                    case 'SIN ORDEN DE TRABAJO':
                                        colorEdo = '#A9A9A9';
                                        break;
                                    default:
                                        colorEdo = '#FFF';
                                        break;
                                }
                                fchProg = new Date(value.fch_programacion)
                                    .toLocaleDateString();
                                fchEjec = new Date(value.fch_ejecucion)
                                .toLocaleDateString();
                                //console.log('fecha de ejecucion', value.fch_ejecucion, 'fch de ejecucion formateada', fchEjec)

                                body += '<tr>' +
                                    '<td><ion-icon size="large" style="color:' + colorEdo +
                                    '" name="ellipse"></ion-icon><span style="display: none">'+value.dsc_estado+'</span></td>' +
                                    '<td>' + fchProg + '</td>' +
                                    '<td>' + fchEjec + '</td>' +
                                    '<td>' + value.dsc_tipo_plan + '</td>' +
                                    '<td>' + value.dsc_responsable + '</td>' +
                                    '<td style="text-align:center;">' + value.num_plan +
                                    '</td>' +
                                    '<td>' + value.cod_orden_trabajo + '</td>' +
                                    '</tr>';
                            });

                            body += '</tbody>' +
                                '</table>' +
                                '</div>';

                            $('#intervencion-content').html(body);

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
                    });

                }
            });

        };

        
        function datosEquipo(codigo,dscEquipo,codSede) {
            console.log(codigo,dscEquipo);
            let cadena = `codEquipo=${codigo}&dscEquipo=${dscEquipo}&codSede=${codSede}`;
            window.location= `{{url('incidencia/crear?${cadena}')}}`;
        }
        function datosEquipo1(dscEquipo) {
            console.log(dscEquipo);
            codSede = $("#codSede").val();
            let cadena = `dscEquipo=${dscEquipo}&codSede=${codSede}`;
            window.location= `{{url('incidencia/crear?${cadena}')}}`;
        }

        //No se encontraron registros
        // function getEmptyContent(mensaje = "No se encontraron registros") {
        //     return "<div class=\"row\" style=\"padding-top: 10px;\">" +
        //         "<div class=\"col-12\">" +
        //         "<div class=\"alert alert-info text-center\">" + mensaje + "</div>" +
        //         "</div>" +
        //         "</div>";
        // }

        //Funcion para exportar a Excel
        // function exportar() {

        //     var query = {
        //         'numserie': $("#numserie").val(),
        //         'tipo': $("#tipo").val(),
        //         'subtipo': $("#sub-tipo").val(),
        //         'nomequipo': $("#nomequipo").val(),
        //         'codmarca': $("#marca").val(),
        //         'codmodel': $("#modelo").val(),
        //     }

        //     window.location = "{{ url('equipo/exportar') }}?" + $.param(query);
        // }

    </script>
@endpush
