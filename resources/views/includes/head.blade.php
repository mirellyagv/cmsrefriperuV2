<meta charset="UTF-8">
<title>REFRIPERU | Gestor de contenidos</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- App favicon -->
<link rel="shortcut icon" href="{{asset('images/pages/favicon.png')}}">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"  id="bootstrap-stylesheet" />
<link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />
<link href="{{asset('assets/css/estilo.css')}}" rel="stylesheet" type="text/css"  />

<!-- css datatable -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/r-2.4.0/rr-1.3.1/sc-2.0.7/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.css"/>
<link rel="stylesheet" href="cdn.datatables.net/buttons/2.3.2/css/buttons.bootstrap.min.css">
<link rel="stylesheet" href="css/datatablas.css">
{{-- <link href="{{asset('assets/libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" /> --}}

<!-- css select2 -->
<link href="{{asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />

<!--<link href="https://www.selectiva.pe/assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="https://www.selectiva.pe/assets/vendors/select2/dist/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />-->

<!-- css sweetalert -->
{{-- <link href="{{asset('assets/libs/alerta/sweetalert.css')}}" rel="stylesheet" type="text/css"  /> --}}


@yield('css')
@stack('css')