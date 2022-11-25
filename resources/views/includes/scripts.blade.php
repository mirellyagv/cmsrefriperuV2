<script src="{{ asset('assets/js/vendor.min.js') }}" type="text/javascript"></script>


<!-- Required datatable js -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/r-2.4.0/rr-1.3.1/sc-2.0.7/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.js"></script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
{{-- <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}" type="text/javascript"></script> --}}

<!-- Buttons examples -->
<script src="cdn.datatables.net/buttons/2.3.2/js/buttons.bootstrap.min.js"></script>
<script src="cdn.datatables.net/buttons/2.3.2/js/buttons.bootstrap5.min.js"></script>
<script src="cdn.datatables.net/buttons/2.3.2/js/buttons.dataTables.min.js"></script>
<script src="cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>

{{-- <script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}" type="text/javascript"></script> --}}

{{-- <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}" type="text/javascript"></script> --}}
{{-- Plugins Excel --}}
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.templates.min.js"></script>

<!-- Jquery -->
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}

<!-- select2 js -->
<script src="{{ asset('assets/libs/select2/select2.min.js') }}" type="text/javascript"></script>

<!-- sweetalert 2 js -->
<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

<!-- Jquery validate -->
<script src="{{asset('assets/libs/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/libs/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/libs/jquery-validation/js/localization/messages_es_PE.js')}}" type="text/javascript"></script>

<!-- overlay load -->
<script src="{{asset('assets/libs/overlay/loadingoverlay.min.js')}}" type="text/javascript"></script>

<!-- Graficos  -->
<script src="{{asset('assets/libs/echarts/echarts.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/pages/dashboard.init.js')}}" type="text/javascript"></script>

<script src="{{ asset('assets/js/app.min.js') }}" type="text/javascript"></script>
<script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>

@include('sweetalert::alert')

@yield('scripts')
@stack('scripts')