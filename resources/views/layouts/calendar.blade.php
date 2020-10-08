<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPENSA | Sistem Informasi Pemeriksaan Sarana Pangan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("/adminlte/plugins/fontawesome-free/css/all.min.css") }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="{{ asset("/adminlte/plugins/fullcalendar/main.min.css") }}">
  <link rel="stylesheet" href="{{ asset("/adminlte/plugins/fullcalendar-daygrid/main.min.css") }}">
  <link rel="stylesheet" href="{{ asset("/adminlte/plugins/fullcalendar-timegrid/main.min.css") }}">
  <link rel="stylesheet" href="{{ asset("/adminlte/plugins/fullcalendar-bootstrap/main.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("/adminlte/css/adminlte.min.css") }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>


<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include ('lte.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include ('lte.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    @include ('flash::message')
    @yield('content')
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
<!-- Bootstrap -->
<script src="{{ asset("/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<!-- jQuery UI -->
<script src="{{ asset("/adminlte/plugins/jquery-ui/jquery-ui.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("/adminlte/js/adminlte.min.js") }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset("/adminlte/js/demo.js") }}"></script>
<!-- fullCalendar 2.2.5 -->
<script src="{{ asset("/adminlte/plugins/moment/moment.min.js") }}"></script>
<script src="{{ asset("/adminlte/plugins/fullcalendar/main.min.js") }}"></script>
<script src="{{ asset("/adminlte/plugins/fullcalendar-daygrid/main.min.js") }}"></script>
<script src="{{ asset("/adminlte/plugins/fullcalendar-timegrid/main.min.js") }}"></script>
<script src="{{ asset("/adminlte/plugins/fullcalendar-interaction/main.min.js") }}"></script>
<script src="{{ asset("/adminlte/plugins/fullcalendar-bootstrap/main.min.js") }}"></script>
<!-- Page specific script -->
<script src="{{ asset("/adminlte/js/calendar.js") }}"></script>

</body>
</html>
