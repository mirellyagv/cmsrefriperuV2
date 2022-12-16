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
                    <div style="float: right">
                        <a name="" id="" class="btn btn-primario" href="{{url('equipo')}}" role="button"><i class="fas fa-plus"></i>Agregar</a>
                    </div>
                </div>
            </div>

            <div class="row fondocabecera">
                <div class="col-md-3 offset-md-2">
                    <label for="min">Fecha inicio:</label>
                    <input type="text" id="min" name="min">
                </div>
                <div class="col-md-3">
                    <label for="max">Fecha fin:</label>
                    <input type="text" id="max" name="max">
                </div>
                <div class="table-responsive-md">
                   
                    <table id="datatablePrueba" class="table  table-bordered">
                        <thead class="headtable">
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Fecha de reporte</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Tipo</th>
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

    {{-- ---------------------Modal detalle Incidencia------------------------------- --}}
    <div class="modal fade" id="modalDetalleIncidencia" tabindex="-1" role="dialog" aria-labelledby="modalDetalleIncidenciaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetalleIncidenciaLabel"></h5><h5 class="modal-title" id="EstadoDetalleIncidencia"></h5>
                    <h5 class="modal-title" id="EstadoDetalleIncidencia"></h5>
                </div>
                <div class="modal-body">
                    <div id="detalleIncidencia-content">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="mb-1 mt-3 text-muted">Equipo</label>
                                <input type="text" name="equipoIncidencia" id="equipoIncidencia" class="form-control" value="" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-1 mt-3 text-muted">Subtipo</label>
                                <input type="text" name="subtipoIncidencia" id="subtipoIncidencia" class="form-control" value="" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-1 mt-3 text-muted">Tipo</label>
                                <input type="text" name="tipoIncidencia" id="tipoIncidencia" class="form-control" value="" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="mb-1 mt-3 text-muted">Detalle</label>
                                <textarea name="detalleIncidencia" id="detalleIncidencia" rows="4" class="form-control" disabled></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="mb-1 mt-3 text-muted">Fecha de Culminación</label>
                                <input type="text" name="fchCulminacionIncidencia" id="fchCulminacionIncidencia" class="form-control" value="" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-1 mt-3 text-muted">Responsable</label>
                                <input type="text" name="responsableIncidencia" id="responsableIncidencia" class="form-control" value="" disabled>
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
        // setLocale('es-mx');
        // moment.locale('fr');
        // moment().format('LLLL');

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
                        data : 'fech_reporte',
                    },
                    {
                        data : 'nomcliente'
                    },
                    {
                        data : 'tipo_incidente'
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
                        targets: [0,2,4,5]
                        //render: DataTable.render.datetime('DD/MM/YYYY', 'es-mx'),
                    }
                ],
                rowReorder: false,
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

        function verDetalleIncidencia(codigo){
        $('#modalDetalleIncidencia').modal('show');
        $.ajax({
            type: 'GET',
            url: "{{url('incidencia/detalleIncidencia')}}",
            data: {
                'cod_incidente' : codigo,
            },
            success:function(result){
                var data = result;
                $('#modalDetalleIncidenciaLabel').html(`PRIORIDAD - ${data[0]['dsc_prioridad']}`);
                $('#EstadoDetalleIncidencia').html(`ESTADO - ${data[0]['dsc_estadoincidente']}`);
                $('#equipoIncidencia').val(data[0]['dsc_equipo']);
                $('#subtipoIncidencia').val(data[0]['dsc_subtipoincidente']);
                $('#tipoIncidencia').val(data[0]['dsc_tipoincidente']);
                $('#detalleIncidencia').val(data[0]['dsc_detalleincidente']);
                $('#fchCulminacionIncidencia').val(data[0]['fch_reporte']);
                $('#responsableIncidencia').val(data[0]['cod_responsable']);
               
            }
        });
        
    }

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
