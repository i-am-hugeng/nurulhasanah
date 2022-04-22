
<!DOCTYPE html>

<html lang="en">

    <head>

        @include('backend.template.head')
        <title>Nurul Hasanah | Admin</title>

    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

            <!-- Start Navbar -->
            @include('backend.template.navbar')
            <!-- End - Navbar -->

            <!-- Start Sidebar -->
            @include('backend.template.sidebar')
            <!-- End - Sidebar -->


            <div class="content-wrapper">

                <div class="content">
                    @yield('content') <!-- untuk pemanggilan halaman secara dinamis -->
                </div>

            </div>

            <!-- Start Footer -->
            @include('backend.template.footer')
            <!-- End - Footer -->

        </div>

        <script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- jquery-validation -->
        <script src="{{asset('adminlte/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/jquery-validation/additional-methods.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('adminlte/dist/js/demo.js')}}"></script>
        <!-- DataTables  & Plugins -->
        <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/jszip/jszip.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

        <!-- Datepicker Plugins -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        @yield('js')

    </body>
</html>
