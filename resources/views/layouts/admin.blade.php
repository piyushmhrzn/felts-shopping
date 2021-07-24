<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin | {{ config('app.name', 'Kasthamandap') }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="{{ asset('/uploads/Settings/Favicon/'.$setting->favicon) }}" rel="icon" type="image/x-icon">
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- Material Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/material-dashboard.min.css') }}">
    <!-- Bootstrap-Toggle CSS -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-toggle/css/bootstrap-toggle.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/custom/custom.css') }}">
    <!-- Loader CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/css-loader/css-loader.css') }}"/>
    <!-- Datatables CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/data-tables/datatables.min.css') }}"/>
    <!-- Core Jquery File -->
    <script src="{{ asset('admin/assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <!-- CK-Editor -->
    <script src="{{ asset('admin/plugins/ckeditor/ckeditor.js') }}"></script>

  </head>
  <body>
    <div class="wrapper">

      <!-- Sidebar -->
      @include('.inc/sidebar')

      <div class="main-panel">

        <!-- Header -->
        @include('.inc/header')      

        <!-- Content Wrapper. Contains page content -->
        <div class="content">
          @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        @include('.inc/footer')
      </div>
    </div>
    <!-- Fixed Button -->

    <!--   Core JS Files   -->
    <script src="{{ asset('admin/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>

    <!-- Plugin for the Perfect Scrollbar -->
    <script src="{{ asset('admin/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!-- Plugin for the momentJs  -->
    <script src="{{ asset('admin/assets/js/plugins/moment.min.js') }}"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="{{ asset('admin/assets/js/plugins/sweetalert2.js') }}"></script>
    <!-- Forms Validations Plugin -->
    <script src="{{ asset('admin/assets/js/plugins/jquery.validate.min.js') }}"></script>
    <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="{{ asset('admin/assets/js/plugins/jquery.bootstrap-wizard.js') }}"></script> 
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="{{ asset('admin/assets/js/plugins/bootstrap-selectpicker.js') }}" ></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="{{ asset('admin/assets/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
    <script src="{{ asset('admin/assets/js/plugins/jquery.datatables.min.js') }}"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="{{ asset('admin/assets/js/plugins/bootstrap-tagsinput.js') }}"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{ asset('admin/assets/js/plugins/jasny-bootstrap.min.js') }}"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="{{ asset('admin/assets/js/plugins/fullcalendar.min.js') }}"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="{{ asset('admin/assets/js/plugins/jquery-jvectormap.js') }}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('admin/assets/js/plugins/nouislider.min.js') }}" ></script>
    <!-- Library for adding dinamically elements -->
    <script src="{{ asset('admin/assets/js/plugins/arrive.min.js') }}"></script>
    <!-- Chartist JS -->
    <script src="{{ asset('admin/assets/js/plugins/chartist.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('admin/assets/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('admin/assets/js/material-dashboard.min.js') }}" type="text/javascript"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=API_KEY&sensor=SET_TO_TRUE_OR_FALSE"></script>

    <!-- Bootstrap-Toggle JS -->
    <script src="{{ asset('admin/plugins/bootstrap-toggle/js/bootstrap-toggle.min.js') }}"></script>
    <!-- Datatables Js-->
    <script src="{{ asset('admin/plugins/data-tables/datatables.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('admin/plugins/data-tables/jquery-ui.min.js') }}"></script>
    
    <script>
      $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        md.initDashboardPageCharts();
      });
    </script>

  </body>
</html>