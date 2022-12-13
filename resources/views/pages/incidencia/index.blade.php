@extends('layouts.refriPeruLayout')

@section('content')
    <div class="content" id="incidencia-body">
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
                        <h4 class="page-title lineatitle"><i class="fe-file-text"></i> GESTIÓN DE INCIDENTES</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <button type="button" id="btn-agregar" class="btn btn-primario"><i class="fas fa-plus"></i>
                            Agregar</button>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-12">
                    <div class="table-responsive titleform">
                        <h4 class="header-title headertitle"><i class="far fa-caret-square-down vermas" option="1"></i>
                            Filtros</h4>
                    </div>
                </div>
            </div>

            <div class="container cntfiltro">
                <div class="row" style="padding-bottom:15px;">
                    <div class="col-md-3">
                        <h5 class="headerh">N° Incidente</h5>
                        <input type="text" class="form-control bordecaja" name="text-code" id="text-code"
                            placeholder="N° Incidente" maxlength="15" onKeyPress="return soloNumeros(event)" />
                    </div>
                    <div class="col-md-5">
                        <h5 class="headerh">Responsable</h5>
                        <select class="form-control" id="responsable" name="responsable">
                            <option value="0">Todos</option>
                            @foreach ($respons as $rpble)
                                <option value="{{ $rpble->cod_trabajador }}">
                                    {{ $rpble->dsc_nombres . ',' . $rpble->dsc_apellido_paterno . ' ' . $rpble->dsc_apellido_materno }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row fondoheader">
                    <!--<div class="cntbotonessearch">-->
                    <div class="col-md-3">
                        <h5 class="headerh">Cliente</h5>
                        <input type="text" class="form-control bordecaja" name="text-filter" id="text-filter"
                            placeholder="Razon social" />
                    </div>
                    <div class="col-md-3">
                        <h5 class="headerh">Estado</h5>
                        <select class="form-control" id="estado" name="estado">
                            <option value="0">Todos</option>
                            @foreach ($estados as $state)
                                <option value="{{ $state->cod_estadoincidente }}">{{ $state->dsc_estadoincidente }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <h5 class="headerh">F. Desde</h5>
                        <input type="date" class="form-control bordecaja" id="fecha_ini" />
                    </div>
                    <div class="col-md-2">
                        <h5 class="headerh">F. Hasta</h5>
                        <input type="date" class="form-control bordecaja" id="fecha_hasta" />
                    </div>
                    <div class="col-md-1">
                        <h5 class="headerh">&nbsp;</h5>
                        <button class="btnbuscar btn-search">
                            <i class="fe-search"></i>
                        </button>
                    </div>
                    <div class="col-md-1">
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
                        <h4 class="header-title headertitle"><i class="fe-copy"></i> Listado de incidentes</h4>
                    </div>
                </div>
                <div class="table-responsive-md">
                    <table id="datatablePrueba" class="table  table-bordered">
                        <thead class="headtable">
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Fecha de reporte</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Prioridad</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div> <!-- end row -->

        </div> <!-- end container-fluid -->

    </div> <!-- end content -->
@endsection

@push('scripts')
    <script type="text/javascript">
        //solo numeros
        function soloNumeros(e) {
            var key = window.Event ? e.which : e.keyCode
            return ((key >= 48 && key <= 57) || (key == 8) || (key == 45))
        }

        //Definimos la fechas para la busqueda:
        // var dia = "01";
        // var date = new Date(); //Se define la fecha actual
        // var day = date.getDate();
        // var month = date.getMonth() + 1;
        // var year = date.getFullYear();

        // if (month < 10) month = "0" + month;
        // if (day < 10) day = "0" + day;

        // var fini = year + "-" + month + "-" + dia;
        // var fhoy = year + "-" + month + "-" + day; //Fecha de hoy

        // document.getElementById('fecha_ini').value = fini;
        // document.getElementById('fecha_hasta').value = fhoy;

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
                    url: '{{url('incidencia/listar')}}',
                    dataSrc: '',
                },
                columns: [
                    {
                        data : 'code'
                    },
                    {
                        data : 'tipo_incidente'
                    },
                    {
                        data : 'fech_reporte'
                    },
                    {
                        data : 'nomcliente'
                    },
                    {
                        data : 'prioridad'
                    },
                    {
                        data : 'estado'
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
        });


        //Se inicia con la funcion onload
        // function loadPageData() {
        //     $.ajax({
        //         type: 'GET',
        //         url: "{{ url('incidencia/listar') }}",
        //         data: {
        //             'idstate': $("#estado").val(),
        //             'search': $("#text-filter").val(),
        //             'fdesde': $("#fecha_ini").val(),
        //             'fhasta': $("#fecha_hasta").val(),
        //             'codresp': $("#responsable").val(),
        //             'codincd': $("#text-code").val(),
        //         },
        //         beforeSend: function() {
        //             $("#incidencia-body").LoadingOverlay("show");
        //         },
        //         complete: function() {
        //             $("#incidencia-body").LoadingOverlay("hide");
        //         },
        //         success: function(result) {
        //             var data = result;
        //             //console.log(data.items.length);
        //             if (data.items.length > 0) {
        //                 $("#incidente-content").html(getIncidenciaTable(data.items));

        //                 $("#tbl-incidente").DataTable({
        //                     responsive: true,
        //                     filter: false,
        //                     lengthChange: true,
        //                     ordering: false,
        //                     orderMulti: false,
        //                     paging: true,
        //                     info: true,
        //                     dom: 'Bftrip',
        //                     language: {
        //                         "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        //                     },
        //                     buttons: [{
        //                         extend: "excel", // Extend the excel button
        //                         text: 'Excel',
        //                         title: 'Reporte Incidencias', //Nombre de archivo de descarga
        //                         className: 'btn btn-success',
        //                         excelStyles: { // Add an excelStyles definition
        //                             cells: "2", // to row 2
        //                             style: { // The style block
        //                                 font: { // Style the font
        //                                     name: "Arial", // Font name
        //                                     size: "14", // Font size
        //                                     color: "FFFFFF", // Font Color
        //                                     b: false, // Remove bolding from header row
        //                                 },
        //                                 fill: { // Style the cell fill (background)
        //                                     pattern: { // Type of fill (pattern or gradient)
        //                                         color: "457B9D", // Fill color
        //                                     }
        //                                 }
        //                             }
        //                         },
        //                     }, ]
        //                 });
        //             } else {
        //                 $("#incidente-content").html(getEmptyContent());
        //             }
        //         }
        //     });
        // }

        // function getIncidenciaTable(items) {

        //     var j = 1;
        //     var colorEdo;
        //     var body = '<div class="card-box table-responsive">';

        //     body +=
        //         '<table id="tbl-incidente" class="table table-bordered  dt-responsive nowrap" style="border-collapse:collapse; border-spacing: 0; width: 100%;">' +
        //         '<thead>' +
        //         '<tr class="headtable">' +
        //         '<th>N°</th>' +
        //         '<th>Codigo</th>' +
        //         '<th>Tipo</th>' +
        //         '<th>Titulo</th>' +
        //         '<th>Fch. Reporte</th>' +
        //         '<th>Cliente</th>' +
        //         '<th>Prioridad</th>' +
        //         '<th>Estado</th>' +
        //         '<th>Opciones</th>' +
        //         '</tr>' +
        //         '</thead>' +
        //         '<tbody>';

        //     $.each(items, function(index, value) {

        //         if (value.codestado == '001') {
        //             colorEdo = '#FF4601';
        //         } else if (value.codestado == '002') {
        //             colorEdo = '#FFD603';
        //         } else if (value.codestado == '003') {
        //             colorEdo = '#2D8B57';
        //         } else if (value.codestado == '004') {
        //             colorEdo = '#A9A9A9';
        //         } else {
        //             colorEdo = '#FFF';
        //         }

        //         body += '<tr>' +
        //             '<td>' + j + '</td>' +
        //             '<td>' + value.code + '</td>' +
        //             '<td>' + value.tipo_incidente + '</td>' +
        //             '<td>' + value.tit_incidente + '</td>' +
        //             '<td>' + value.fech_reporte + '</td>' +
        //             '<td>' + value.nomcliente + '</td>' +
        //             '<td>' + value.prioridad + '</td>' +
        //             '<td><ion-icon size="large" style="color:' + colorEdo +
        //             '" name="ellipse"></ion-icon><span style="display: none">' + value.estado + '</span></td>' +
        //             '<td style="text-align:center;">' +
        //             '<a class="urlicon" title="Editar" href="javascript::void(0)" onclick="editar(' + "'" + value
        //             .code + "'" + ')" >' +
        //             '<i class="fas fa-edit"></i>' +
        //             '</a>&nbsp;' +
        //             '<a href="javascript::void(0)" class="urlicon" title="Eliminar" onclick="eliminar(' + "'" +
        //             value.code + "'" + ')" >' +
        //             '<i class="fas fa-trash-alt"></i>' +
        //             '</a>' +
        //             '</td>' +
        //             '</tr>';

        //         j++;

        //     });

        //     body += '</tbody>' +
        //         '</table>' +
        //         '</div>';

        //     return body;

        // }

        //No se encontraron registros
        function getEmptyContent(mensaje = "No se encontraron registros") {
            return "<div class=\"row\" style=\"padding-top: 10px;\">" +
                "<div class=\"col-12\">" +
                "<div class=\"alert alert-info text-center\">" + mensaje + "</div>" +
                "</div>" +
                "</div>";
        }

        //Funcion para exportar a Excel
        // function exportar() {

        //     var query = {
        //         'idstate': $("#estado").val(),
        //         'search': $("#text-filter").val(),
        //         'fdesde': $("#fecha_ini").val(),
        //         'fhasta': $("#fecha_hasta").val(),
        //         'codresp': $("#responsable").val(),
        //         'codincd': $("#text-code").val(),
        //     }

        //     window.location = "{{ url('incidencia/exportar') }}?" + $.param(query);
        // }

        //Funcion para editar
        // function editar(id) {
        //     window.location = "{{ url('incidencia/editar') }}" + "/" + id;
        // }

        //Funcion para eliminar
        // function eliminar(id) {
        //     var $code = id;
        //     console.log($code);
        //     Swal.fire({
        //         title: '¿Está seguro de eliminar este incidente?',
        //         text: 'Una vez eliminado no se podrá recuperar!',
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Si'
        //     }).then((result) => {
        //         if (result.value) {
        //             $.ajax({
        //                 url: "{{ url('incidencia/eliminar') }}",
        //                 type: "get",
        //                 data: {
        //                     "code": id
        //                 },
        //                 success: function(result) {
        //                     if (result == "ok") {
        //                         //console.log('cambiado');
        //                         Swal.fire({
        //                             title: 'Eliminado!',
        //                             text: 'El incidencia ha sido eliminado.',
        //                             icon: 'success'
        //                         }).then((result) => {
        //                             window.location = "{{ url('incidencia') }}";
        //                         });

        //                     } else {
        //                         console.log('Error');
        //                         Swal.fire(
        //                             'Error',
        //                             'Ha habido un error interno',
        //                             'error'
        //                         )
        //                     }
        //                 }
        //             });
        //         }
        //     })
        // }

        // $("#btn-agregar").on('click', function() {
        //     window.location = "{{ url('incidencia/crear') }}";
        // });
    </script>
@endpush
