@extends('layouts.refriPeruLayout')

@section('content')
    <div class="content" id="incidencia-body">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title lineatitle"><i class="fe-file-text"></i> CRONOGRAMA DE MANTENIMIENTOS</h4>
                    </div>
                </div>
            </div>
            <div class="row fondocabecera">

                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Cliente</label>
                                            <input type="text" @disabled(true) class="form-control"
                                                name="dsc_razon_social" value="{{$cliente->dsc_razon_social}}"
                                                aria-describedby="helpId" placeholder="">
                                            {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Sede:</label>
                                            <select class="form-select form-select-md" name="sedeCiclo" id="sedeCiclo" onChange="creaTabla();">
                                                <option selected disabled>Seleccione...</option>
                                                @foreach($listaSede as $list)
                                                    <option value="{{ $list->num_linea }}">{{ $list->dsc_nombre_direccion }}</option>
                                                @endforeach 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">

                                        <label for="" class="form-label">Año</label>
                                        <select class="form-select form-select-md" name="anioCiclo" id="anioCiclo" onChange="creaTabla();">
                                            <option value= "2023" selected>2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">

                                        <label for="" class="form-label">Desde:</label>
                                        <select class="form-select form-select-md" name="mesInicio" id="mesInicio" onChange="creaTabla();">
                                            <option value="1" selected>Enero</option>
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
                                            <option value="12" selected >Diciembre</option>
                                        </select>
                                    </div>
                                    <pre>
                                    </pre>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Intervenciones Programadas</h5>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Total</label>
                                                            <input type="text"
                                                              class="form-control" value="" name="cant_total_tipo" id="cant_total_tipo" aria-describedby="helpId" placeholder="" >
                                                              {{-- <small>Total</small> --}}
                                                          </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="" class="form-label d-sm-block d-md-none d-lg-none d-xl-block">Avance %</label>
                                                        <div class="mb-3">
                                                            
                                                            <input type="text"
                                                              class="form-control" value="" name="" id="por_programacion" aria-describedby="helpId" placeholder="" >
                                                              {{-- <small>Avance General</small> --}}
                                                        </div>
                                                    </div>                                                    

                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Tipos de Intervenciones</h5>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Preventivo</label>
                                                            <input type="text"
                                                              class="form-control" value="" name="" id="cant_preventivo" aria-describedby="helpId" placeholder="">
                                                          </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="" class="form-label">Correctivo</label>
                                                        <div class="input-group mb-3">
                                                            
                                                            <input type="text"
                                                              class="form-control" value="" name="" id="cant_correctivo" aria-describedby="helpId" placeholder="">
                                                              {{-- <span class="input-group-text" id="basic-addon1">%</span> --}}
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-4">
                                                        <label for="" class="form-label">Instalación</label>
                                                        <div class="input-group mb-3">
                                                            
                                                            <input type="text"
                                                              class="form-control" value="" name="" id="cant_instalacion" aria-describedby="helpId" placeholder="">
                                                              {{-- <span class="input-group-text" id="basic-addon1">%</span> --}}
                                                        </div>
                                                    </div>                                                   

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive-md">

                    <table id="datatablePrueba" class="table  table-bordered">
                        <thead class="headtable">
                            <tr>
                                <th scope="col" style="background:#ED3D3B;">Ubicaciones</th>
                                <th scope="col" style="background:#ED3D3B;text-align: center !important">Equipos</th>
                                <th scope="col" style="background:#ED3D3B;">Ope</th>
                                <th scope="col" style="background:#ED3D3B;text-align: center !important">% Ope</th>
                                <th scope="col">C/Obs</th>
                                <th scope="col">Ene</th>
                                <th scope="col">Feb</th>
                                <th scope="col">Mar</th>
                                <th scope="col">Abr</th>
                                <th scope="col">May</th>
                                <th scope="col">Jun</th>
                                <th scope="col">Jul</th>
                                <th scope="col">Ago</th>
                                <th scope="col">Sep</th>
                                <th scope="col">Oct</th>
                                <th scope="col">Nov</th>
                                <th scope="col">Dic</th>
                                <th scope="col" style="background:#A52929;text-align: center !important">Total</th>
                                <th scope="col" style="background:#A52929;">Avance</th>
                                <th scope="col" style="background:#008080;text-align: center !important">Costo</th>
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
        
        $('#sedeCiclo').select2();

        function creaTabla(){
            //Aqui se valida si existe la dTable para reinicializarse...
            if ($.fn.dataTable.isDataTable('#datatablePrueba')) {
                $('#datatablePrueba').DataTable().clear();
                $('#datatablePrueba').DataTable().destroy();        
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
            //console.log(valores);
            // var codCliente = "{{$codCliente}}";
            localStorage.setItem('aa', "{{ url('ciclo/tabla?sede=')}}"+sede+"&mesIni="+mesIni+"&mesFin="+mesFin+"&anio="+anio)
          
            $.ajax({
                        type: 'GET',
                        url: "{{ url('ciclo/indicador') }}",
                        data: {
                            'sede': sede,
                            'mesIni': mesIni,
                            'mesFin': mesFin,
                            'anio': anio
                        },
                        success: function(result) {
                            //console.log(result[0]['cant_total_tipo']);
                            document.getElementById('cant_total_tipo').value=result[0]["cant_total_tipo"];
                            document.getElementById('por_programacion').value=result[0]["por_programacion"];
                            document.getElementById('cant_preventivo').value=result[0]["cant_preventivo"];
                            document.getElementById('cant_correctivo').value=result[0]["cant_correctivo"];
                            document.getElementById('cant_instalacion').value=result[0]["cant_instalacion"];
                        }
                    });

            var tabla = $('#datatablePrueba').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                },
                dom: 'Bftrip',
                buttons: [{
                    extend: "excel", // Extend the excel button
                    text: 'Excel',
                    className: 'btn btn-success',
                    excelStyles: { // Add an excelStyles definition
                        cells: "2", // to row 2
                        style: { // The style block
                            font: { // Style the font
                                name: "Arial", // Font name
                                size: "14", // Font size
                                color: "FFFFFF", // Font Color
                                b: false, // Remove bolding from header row
                            },
                            fill: { // Style the cell fill (background)
                                pattern: { // Type of fill (pattern or gradient)
                                    color: "457B9D", // Fill color
                                }
                            }
                        }
                    },
                }, ],
                processing: true,
                // serverSide: true,
                ajax: {
                    url: localStorage.getItem('aa'),
                    dataSrc: '',
                },
                columns: [
                    {
                        data: 'dsc_ubicacion'
                    },
                    {
                        data: 'num_equipo',
                        class: 'derecha'
                    },
                    {
                        data: 'num_equipo_operativo',
                        class: 'derecha'
                    },
                    {
                        data: 'porcOp',
                        class: 'derecha'
                    },
                    {
                        data: 'num_observaciones',
                        class: 'derecha'
                    },
                    {
                        data: 'enero',
                        class: 'centrado'
                    },
                    {
                        data: 'febrero',
                        class: 'centrado'
                    },
                    {
                        data: 'marzo',
                        class: 'centrado'
                    },
                    {
                        data: 'abril',
                        class: 'centrado'
                    },
                    {
                        data: 'mayo',
                        class: 'centrado'
                    },
                    {
                        data: 'junio',
                        class: 'centrado'
                    },
                    {
                        data: 'julio',
                        class: 'centrado'
                    },
                    {
                        data: 'agosto',
                        class: 'centrado'
                    },
                    {
                        data: 'septiembre',
                        class: 'centrado'
                    },
                    {
                        data: 'octubre',
                        class: 'centrado'
                    },
                    {
                        data: 'noviembre',
                        class: 'centrado'
                    },
                    {
                        data: 'diciembre',
                        class: 'centrado'
                    },
                    {
                        data: 'intervenciones',
                        class: 'centrado'
                    },
                    {
                        data: 'porcAv',
                        class: 'derecha'
                    },
                    {
                        data: 'imp_total_ejecucion',
                        class: 'derecha'
                    },
                ],
                createdRow: function(row, data, index) {
                    //color avance
                    var newPorAv = data.porcAv.slice(0,-1);
                    newPorAv = parseFloat(newPorAv);
                    if (newPorAv <= 100 && newPorAv > 80) {
                        $('td:eq(18)', row).css('background-color', '#2E8B57');
                        $('td:eq(18)', row).css('color', 'White'); 
                    }else if (newPorAv <= 80 && newPorAv > 50) {
                        $('td:eq(18)', row).css('background-color', '#98fb98');
                    }else if (newPorAv <= 50 && newPorAv > 20) {
                        $('td:eq(18)', row).css('background-color', '#ffd700');
                    }else if (newPorAv <= 20) {
                        $('td:eq(18)', row).css('background-color', '#ff4500');
                        $('td:eq(18)', row).css('color', 'White'); 
                    }else{
                        $('td:eq(18)', row).css('background-color', 'White'); 
                    }
                    //color operatividad
                    var newPorOp = data.porcOp.slice(0,-1);
                    newPorOp = parseFloat(newPorOp);
                    if (newPorOp <= 100 && newPorOp > 80) {
                        $('td:eq(3)', row).css('background-color', '#2E8B57');
                        $('td:eq(3)', row).css('color', 'White'); 
                    }else if (newPorOp <= 80 && newPorOp > 50) {
                        $('td:eq(3)', row).css('background-color', '#98fb98');
                    }else if (newPorOp <= 50 && newPorOp > 20) {
                        $('td:eq(3)', row).css('background-color', '#ffd700');
                    }else if (newPorOp <= 20) {
                        $('td:eq(3)', row).css('background-color', '#ff4500');
                        $('td:eq(3)', row).css('color', 'White'); 
                    }else{
                        $('td:eq(3)', row).css('background-color', 'White'); 
                    }
                },
                rowReorder: false,
                select: true,
                responsive: true,
                filter: true,
                lengthChange: true,
                ordering: false,
                orderMulti: false,
                paging: false,
                info: true,
                // rowReorder: true
            });
        }
    </script>


@endpush
