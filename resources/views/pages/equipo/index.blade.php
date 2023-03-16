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
                        <h4 class="page-title lineatitle"><i class="fe-file-text"></i> GESTIÓN DE EQUIPOS / Listado de equipos</h4>
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

            <div class="row fondocabecera" style=" padding-top: 0;">
                <div class="col-12">
                    <div id="equipo-content"></div>
                </div>
                <div class="table-responsive-md">
                    <table id="datatablePrueba" class="table  table-bordered" width='100%'>
                        <thead class="headtable">
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Serie</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Sub-tipo</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
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
                            <a name="" id="repIncidencias" class="btn btn-warning" href="#" onclick="datosEquipo1()" role="button">Reportar incidencia</a>
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
                                    <div id="intervencion-content" style="margin-top: -1rem;"></div>
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
        // function soloNumeros(e) {
        //     var key = window.Event ? e.which : e.keyCode
        //     return ((key >= 48 && key <= 57) || (key == 8) || (key == 45))
        // }

        $(document).ready(function() {

           tabla =  $('#datatablePrueba').DataTable({
                language: {
                url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                },
                dom: '<"top"Bf>tr<"bottom"Plp>' ,
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
                        data : 'numserie'
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
                rowReorder: false,
                select:true,
                responsive: true,
                scrollX:true,
                filter: true,
                lengthChange: true,
                ordering: false,
                orderMulti: false,
                paging : true,
                info: true,
                // rowReorder: true
            });                    
        });

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
                    //console.log('datadelmodal',data);
                    cod_modelo = data[0]['cod_modelo'];
                    dscEquipo = data[0]['dsc_equipo'];
                    codEquipo = data[0]['cod_equipo'];
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
                    $('#codSede').val(data[0]['cod_sede']);

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
                                '<div class="col-md-12" style="margin-bottom:-2em; text-align:right; padding-right:1rem;"><ion-icon size="small" style="color:#2D8B57;vertical-align: sub;" name="ellipse"></ion-icon>Atendido <ion-icon size="small" style="color:#FFD603;vertical-align: sub;" name="ellipse"></ion-icon>En proceso <ion-icon size="small" style="color:#FF4601;vertical-align: sub;" name="ellipse"></ion-icon>Pendiente <ion-icon size="small" style="color:#A9A9A9;vertical-align: sub;" name="ellipse"></ion-icon>Sin orden de trabajo</div></div>'+
                                '<div class="row">' +
                                '<thead>' +
                                '<tr class="headtable"  style="text-align:center;">' +
                                '<th style="width:5%;">Ejec</th>' +
                                '<th style="width:15%;">Fecha Programado</th>' +
                                '<th style="width:15%;">Fecha Ejecutado</th>' +
                                '<th style="width:10%;">Tipo Intervención</th>' +
                                '<th style="width:40%;">Responsable</th>' +
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
        function datosEquipo1() {
            
            codSede = $("#codSede").val();

            let cadena = `codEquipo=${codEquipo}&codSede=${codSede}&dscEquipo=${dscEquipo}`;
            console.log(cadena);
            window.location= `{{url('incidencia/crear?${cadena}')}}`;
        }

    </script>
@endpush
