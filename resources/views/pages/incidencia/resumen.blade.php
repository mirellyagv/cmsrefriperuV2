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
                        <h4 class="page-title lineatitle"><i class="fe-file-text"></i> GESTIÓN DE INCIDENTES</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive titleform">
                        <h4 class="header-title headertitle"><i class="fe-clipboard"></i> Resumen de Gestión Mensual 
                            {{Carbon\Carbon::now()->locale('es_ES')->isoFormat('MMMM Y')}}
                        </h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="text-center mb-4">
                            <div class="row">
                                <div class="col-xl-3 col-sm-6">
                                    <div class="card-box widget-box-three">
                                        <div class="media">
                                            <div class="avatar-lg bg-icon rounded-circle align-self-center">
                                                <img class="avatar-sm" src="{{ asset('assets/images/icons/timeline.svg') }}"
                                                    title="timeline.svg">
                                            </div>
                                            <div class="wigdet-two-content media-body">
                                                <p class="mt-1 text-uppercase font-weight-medium" style="color:#134682;">
                                                    Total</p>
                                                <h2 class="mb-2" style="color:#134682;"><span
                                                        data-plugin="counterup">{{ $ctotal }}</span></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-3 col-sm-6">
                                    <div class="card-box widget-box-three">
                                        <div class="media">
                                            <div class="avatar-lg bg-icon rounded-circle align-self-center">
                                                <i class="fe-server font-30 text-muted avatar-title"></i>
                                            </div>
                                            <div class="wigdet-two-content media-body">
                                                <p class="mt-1 text-uppercase font-weight-medium">Pendientes</p>
                                                <h2 class="mb-2 text-danger"><span
                                                        data-plugin="counterup">{{ $ctotalp }}</span></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-6">
                                    <div class="card-box widget-box-three">
                                        <div class="media">
                                            <div class="avatar-lg bg-icon rounded-circle align-self-center">
                                                <i class="fe-briefcase font-30 text-muted avatar-title"></i>
                                            </div>
                                            <div class="wigdet-two-content media-body">
                                                <p class="mt-1 text-uppercase font-weight-medium">En proceso</p>
                                                <h2 class="mb-2" style="color:#ffa91c;"><span
                                                        data-plugin="counterup">{{ $ctotproc }}</span></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-6">
                                    <div class="card-box widget-box-three">
                                        <div class="media">
                                            <div class="avatar-lg bg-icon rounded-circle align-self-center">
                                                <i class="fe-download font-30 text-muted avatar-title"></i>
                                            </div>
                                            <div class="wigdet-two-content media-body">
                                                <p class="mt-1 text-uppercase font-weight-medium">Atendidos</p>
                                                <h2 class="mb-2" style="color:#32c861;"><span
                                                        data-plugin="counterup">{{ $ctotatend }}</span></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-6">
                                    <div class="card-box widget-box-three">
                                        <div class="media">
                                            <div class="avatar-lg bg-icon rounded-circle align-self-center">
                                                <i class="fe-bar-chart-2 font-30 text-muted avatar-title"></i>
                                            </div>
                                            <div class="wigdet-two-content media-body">
                                                <p class="mt-1 text-uppercase font-weight-medium">Cancelados</p>
                                                <h2 class="mb-2" style="color:#8c9396;"><span
                                                        data-plugin="counterup">{{ $ctotcanc }}</span></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive titleform">
                        <h4 class="header-title headertitle"><i class="fe-bar-chart"></i> Estadisticas Globales</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row" style="margin:1em 0;padding-left:5px;">
                        <div class="col-md-3 clasegrafico">Filtro por mes:</div>
                        <div class="col-md-8">

                            <body ng-app="myApp" ng-controller="myCtrl">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Mes</label>
                                            <select ng-model="month" id="lstfiltrouno1" class="form-control"
                                                ng-options="m for m in months"></select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Año</label>
                                            <select ng-model="year" id="lstfiltrouno" class="form-control"
                                                ng-options="y for y in years"></select>
                                        </div>
                                    </div>
                                </div>
                            </body>
                        </div>
                    </div>
                    <div class="card-box">
                        <div id="containeruno" class="contentgrafico"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row" style="margin:1em 0;padding-left:5px;">
                        <div class="col-md-3 clasegrafico">Filtro por año:</div>
                        <div class="col-md-6">

                            <body ng-app="myApp1" ng-controller="myCtrl1">
                                <div class="container">
                                    <label class="control-label">Año</label>
                                    <select ng-model="year1" id="lstfiltrodos" class="form-control"
                                        ng-options="y for y in years">
                                        <option value="" disabled>Selecccione...</option>
                                    </select>
                                </div>
                            </body>
                        </div>
                    </div>
                    <div class="card-box">
                        <div id="containerdos" class="contentgrafico"></div>
                    </div>
                </div>
            </div>
        </div> <!-- end container-fluid -->

    </div> <!-- end content -->
@endsection

@push('scripts')
    <script type="text/javascript">
        var app = angular.module('myApp', []);
        app.controller('myCtrl', function($scope, $http) {
            $scope.years = [];
            $scope.year = new Date().getFullYear();
            $scope.months = [01,02,03,04,05,06,07,08,09,10,11,12];
            // ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
            //     "Octubre", "Noviembre", "Diciembre"];
            $scope.month = $scope.months[new Date().getMonth()];

            for (var i = 0; i < 5; i++) {
                $scope.years.push($scope.year - i);
                //console.log($scope.year-i);
            }
        })

        var app1 = angular.module('myApp1', []);
        app1.controller('myCtrl1', function($scope, $http) {
            $scope.years1 = [];
            $scope.year1 = new Date().getFullYear();

            for (var i = 0; i < 5; i++) {
                $scope.years1.push($scope.year1 - i);
                //console.log($scope.year-i);
            }
        })

        $(document).ready(function() {
            loading();

        });

        //Hacemos las busquedas por año:
        $("#lstfiltrouno, #lstfiltrouno1").change(function() {
            var anio = $('#lstfiltrouno').val().split(':');
            var mes = $('#lstfiltrouno1').val().split(':');
            //console.log('anio',anio[1],'mes',mes[1]);
            //
            $.ajax({
                url: "{{ url('incidencia/reporte/estados') }}",
                type: "get",
                data: {
                    "mes": mes[1],
                    "anio": anio[1]
                },
                beforeSend: function() {
                    $("#containeruno").LoadingOverlay("show");
                },
                complete: function() {
                    $("#containeruno").LoadingOverlay("hide");
                },
                success: function(result) {
                    var data = result;
                    titulin = data.title;
                    arreglo = data.data;

                    loadingdhashboardone(titulin, anio, arreglo);
                }
            });

        });
       
        //
        $("#lstfiltrodos").change(function() {
            var year = $(this).val().split(':');
            //console.log(year[1]);
            //
            $.ajax({
                url: "{{ url('incidencia/reporte/incidencia') }}",
                type: "get",
                data: {
                    "year": year[1]
                },
                beforeSend: function() {
                    $("#containerdos").LoadingOverlay("show");
                },
                complete: function() {
                    $("#containerdos").LoadingOverlay("hide");
                },
                success: function(result) {
                    var datin = result;
                    titulon = datin.title;
                    array = datin.data;

                    loadingdhashboardtwo(titulon, year[1], array);
                }
            });

        });

        //funcion load
        function loading(anio,mes=null) {
            var d = new Date();
            var anio = d.getFullYear(); //sacamos el año actual
            var mes = d.getMonth() + 1;
            //---------------------------
            var titulin;
            var arreglo = [];
            //---------------------------
            var titulon;
            var array = [];
            //Este es para el 1er grafico.
            $.ajax({
                url: "{{ url('incidencia/reporte/estados') }}",
                type: "get",
                data: {
                    "anio": anio,
                    "mes": mes
                },
                beforeSend: function() {
                    $("#containeruno").LoadingOverlay("show");
                },
                complete: function() {
                    $("#containeruno").LoadingOverlay("hide");
                },
                success: function(result) {
                    var data = result;
                    titulin = data.title;
                    arreglo = data.data;

                    //console.log(data);

                    loadingdhashboardone(titulin, anio, arreglo);
                }
            });

            //Este es para el 2do grafico.
            $.ajax({
                url: "{{ url('incidencia/reporte/incidencia') }}",
                type: "get",
                data: {
                    "year": anio
                },
                beforeSend: function() {
                    $("#containerdos").LoadingOverlay("show");
                },
                complete: function() {
                    $("#containerdos").LoadingOverlay("hide");
                },
                success: function(result) {
                    var datin = result;
                    titulon = datin.title;
                    array = datin.data;

                    console.log('datin',datin);

                    loadingdhashboardtwo(titulon, anio, array);
                }
            });

        }

        function loadingdhashboardone(titulin, anio, arreglo) {
            //Grafico 1:
            echarts.init(document.getElementById('containeruno')).setOption({
                title: {
                    text: titulin,
                    subtext: 'Mes: Diciembre',
                    left: 'center'
                },
                tooltip: {
                    trigger: 'item',
                    formatter: '{a} <br/>{b} : {c} ({d}%)'
                },
                legend: {
                    left: 'center',
                    top: 'bottom',
                },
                toolbox: {
                    show: true,
                    feature: {
                        mark: {
                            show: true
                        },
                        dataView: {
                            show: true,
                            readOnly: false
                        },
                        magicType: {
                            show: true,
                            type: ['pie', 'funnel']
                        },
                        restore: {
                            show: true
                        },
                        saveAsImage: {
                            show: true
                        }
                    }
                },
                series: {
                    name: 'Incidente',
                    type: 'pie',
                    radius: [30, 110],
                    center: ['50%', '50%'],
                    roseType: 'area',
                    data: arreglo[0]
                }
            });
        }


        function loadingdhashboardtwo(titulon, year, array) {
            //Grafico 2:
            echarts.init(document.getElementById('containerdos')).setOption({
                color: ['#3398DB'],
                title: {
                    text: titulon,
                    subtext: 'Año: ' + year,
                    left: 'center'
                },
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow'
                    }
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                xAxis: [{
                    type: 'category',
                    data: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov',
                        'Dic'
                    ],
                    axisTick: {
                        alignWithLabel: true
                    }
                }],
                yAxis: [{
                    type: 'value'
                }],
                series: [{
                    name: 'Incidencias',
                    type: 'bar',
                    barWidth: '60%',
                    data: array,
                }]
            });

        }
    </script>
@endpush
