<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPENSA | Sistem Informasi Pemeriksaan Sarana Pangan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ asset("/adminlte/img/favicon.ico") }}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset("/adminlte/plugins/fontawesome-free/css/all.min.css") }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset("/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset("/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset("/adminlte/plugins/jqvmap/jqvmap.min.css") }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("/adminlte/css/adminlte.min.css") }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset("/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset("/adminlte/plugins/daterangepicker/daterangepicker.css") }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset("/adminlte/plugins/summernote/summernote-bs4.css") }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


 <!-- fullCalendar -->
 <link rel="stylesheet" href="{{ asset("/adminlte/plugins/fullcalendar/main.min.css") }}">
  <link rel="stylesheet" href="{{ asset("/adminlte/plugins/fullcalendar-daygrid/main.min.css") }}">
  <link rel="stylesheet" href="{{ asset("/adminlte/plugins/fullcalendar-timegrid/main.min.css") }}">
  <link rel="stylesheet" href="{{ asset("/adminlte/plugins/fullcalendar-bootstrap/main.min.css") }}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include ('lte.header')
  <!-- Main Sidebar Container -->
  @include ('lte.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <!-- <section class="content"> -->
    @include ('flash::message')
    @yield('content')
      <!-- Default box -->
     
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      <!-- </div> -->
      <!-- /.card -->

    <!-- </section> -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include ('lte.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- jQuery -->
<script src="{{ asset("/adminlte/plugins/jquery/jquery.min.js") }}"></script>
<!-- Select2 -->
<script src="{{ asset("/adminlte/plugins/select2/js/select2.full.min.js") }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset("/adminlte/plugins/jquery-ui/jquery-ui.min.js") }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset("/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>

<!-- ChartJS -->
<script src="{{ asset("/adminlte/plugins/chart.js/Chart.min.js") }}"></script>
<!-- Sparkline -->
<script src="{{ asset("/adminlte/plugins/sparklines/sparkline.js") }}"></script>
<!-- JQVMap -->
<script src="{{ asset("/adminlte/plugins/jqvmap/jquery.vmap.min.js") }}"></script>
<script src="{{ asset("/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js") }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset("/adminlte/plugins/jquery-knob/jquery.knob.min.js") }}"></script>
<!-- daterangepicker -->
<script src="{{ asset("/adminlte/plugins/moment/moment.min.js") }}"></script>
<script src="{{ asset("/adminlte/plugins/daterangepicker/daterangepicker.js") }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset("/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }}"></script>
<!-- Summernote -->
<script src="{{ asset("/adminlte/plugins/summernote/summernote-bs4.min.js") }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset("/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("/adminlte/js/adminlte.js")}}"></script>



<!-- AdminLTE for demo purposes -->
<script src="{{ asset("/adminlte/js/demo.js") }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>




<!-- Page specific script -->
<!-- <script src="{{ asset("/adminlte/js/calendar.js") }}"></script>
<script type="text/javascript">

    $(document).ready(function(){
          $('ul li a').click(function(){
            $('li a').removeClass("active");
            $(this).addClass("active");
        });
    });
</script> -->



</body>
</html>
