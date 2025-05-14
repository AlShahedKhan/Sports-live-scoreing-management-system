<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 3</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="{{ asset('backend') }}/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet"
        href="{{ asset('backend') }}/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend') }}/dist/css/adminlte.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/toastr/toastr.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body>
    <div class="hold-transition sidebar-mini">
        @guest
        @else
            <div class="wrapper">
                <!-- Navbar -->
                @include('layouts.admin_partial.navbar')
                @include('layouts.admin_partial.sidebar')
                <!-- /.navbar -->
            @endguest
            <!-- Content Wrapper. Contains page content -->
            @yield('admin_content')
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('backend') }}/dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('backend') }}/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('backend') }}/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('backend/dist/js/pages/dashboard3.js') }}"></script>

    <script type="text/javascript" src="{{ asset('backend/plugins/toster/toastr.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/sweetalert/sweetalert.min.js') }}"></script>
    {{--  --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you Want to delete?",
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: "warning",
                    buttons: true,
                    dragerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Safe Date!");
                    }
                });
        });
    </script>
     <script>
        $(document).on("click", "#logout", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you Want to Logout?",
                    icon: "warning",
                    buttons: true,
                    dragerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Safe Date!");
                    }
                });
        });
    </script>
    {{-- <script>
        $(document).on("click", "#logout", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            $.confirm({
                    title: 'Confirm!',
                    content: 'Simple confirm!',
                    buttons: {
                        confirm: function () {
                            $.alert('Confirmed!');
                        },
                        cancel: function () {
                            $.alert('Canceled!');
                        },
                        somethingElse: {
                            text: 'Something else',
                            btnClass: 'btn-blue',
                            keys: ['enter', 'shift'],
                            action: function(){
                                $.alert('Something else?');
                            }
                        }
                    }
                });
        });
    </script> --}}
    {{-- Before logout showing alert message working --}}
   {{-- <script>
       $(document).ready(function(){
            $('#logout').on('click', function(e){
                // var value = $(this).attr('data-id');
                // e.preventDefault();
                e.preventDefault();
                var link = $(this).attr("href");
                $.confirm({
                    title: 'Confirm!',
                    content: 'Simple confirm!',
                    buttons: {
                        confirm: function () {
                            $.alert('Confirmed!');
                        },
                        cancel: function () {
                            $.alert('Canceled!');
                        },
                        somethingElse: {
                            text: 'Something else',
                            btnClass: 'btn-blue',
                            keys: ['enter', 'shift'],
                            action: function(){
                                $.alert('Something else?');
                            }
                        }
                    }
                });
            });
        });
   </script> --}}

    <script>
        @if (Session::has('message'))
            var type="{{ Session::get('alert-type', 'info') }}"
            switch(type){
            case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
            case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
            case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
            case 'error':
            toastr.error();("{{ Session::get('message') }}");
            break;
            }
        @endif
    </script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    @yield('script')
    
</body>

</html>
