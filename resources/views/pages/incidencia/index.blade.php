@extends('layouts.refriPeruLayout')

@section('content')
    <div class="content" id="incidencia-body">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title lineatitle"><i class="fe-file-text"></i> LISTADO DE INCIDENTES</h4>
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

            <div class="row fondocabecera">
                <div class="table-responsive-md">
                    <table border="0" cellspacing="5" cellpadding="5">
                        <tbody>
                            <tr>
                                <td>Minimum date:</td>
                                <td><input type="text" id="min" name="min"></td>
                            </tr>
                            <tr>
                                <td>Maximum date:</td>
                                <td><input type="text" id="max" name="max"></td>
                            </tr>
                        </tbody>
                    </table>
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
        // setLocale('es-mx');
        // moment.locale('fr');
        // moment().format('LLLL');

        var minDate, maxDate;

        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[2] );
        
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
            // Create date inputs
            // minDate = new DateTime($('#min'), {
            //     format: 'DD MMM YYYY'
            // });
            // maxDate = new DateTime($('#max'), {
            //     format: 'DD MMM YYYY'
            // });            
            
            var tabla =  $('#datatablePrueba').DataTable({
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
                        data : 'fech_reporte',
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
                columnDefs: [
                    {
                        searchPanes: {
                            show: true
                        },
                        targets: [0, 3, 4, 5],
                        //render: DataTable.render.datetime('DD/MM/YYYY', 'es-mx'),
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

            // Refilter the table
            $('#min, #max').on('change', function () {
                tabla.draw();
            });

        });    
        // $.fn.dataTable.ext.errMode = 'throw';    

        //No se encontraron registros
        function getEmptyContent(mensaje = "No se encontraron registros") {
            return "<div class=\"row\" style=\"padding-top: 10px;\">" +
                "<div class=\"col-12\">" +
                "<div class=\"alert alert-info text-center\">" + mensaje + "</div>" +
                "</div>" +
                "</div>";
        }

        // $("#btn-agregar").on('click', function() {
        //     window.location = "{{ url('incidencia/crear') }}";
        // });
    </script>
@endpush
