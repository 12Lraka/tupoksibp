<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Tupoksi BAPAS Yogyakarta</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{url('AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url ('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  {{-- <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url ('AdminLTE/plugins/jqvmap/jqvmap.min.css') }}"> --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url ('assets/css/adminlte.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url ('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url ('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url ('AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url ('AdminLTE/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- Datepicekr -->
  <link rel="stylesheet" href="{{ url ('AdminLTE/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
 
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ url ('assets/css/toastr.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    @include('template/header')
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="{{url('assets/img/LOGO1_2.png') }}" alt="AdminLTE Logo" class="brand-image img-circle"
           style="opacity: .8">
      <span class="brand-text font-weight-light">TUPOKSI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        @include('template/sidebar')
    </div>
    <!-- /.sidebar -->
</aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        @yield ('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-sm">
    @include('template/footer')
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('AdminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{-- <!-- ChartJS -->
<script src="{{ url('AdminLTE/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('AdminLTE/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ url('AdminLTE/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ url('AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url ('AdminLTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script> --}}
<!-- InputMask -->
<script src="{{ url ('AdminLTE/plugins/moment/moment.min.js') }}"></script>
<script src="{{ url ('AdminLTE/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ url('AdminLTE/plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ url('AdminLTE/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- DataTables -->
<script src=" {{ url('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src=" {{ url('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src=" {{ url('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src=" {{ url('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Toastr -->
<script src="{{ url('assets/js/toastr.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('assets/js/adminlte.js') }}"></script>
{{-- <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('AdminLTE/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('AdminLTE/dist/js/demo.js') }}"></script> --}}
<script>
$(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "language": {
            "lengthMenu": "Tampilkan _MENU_",
            "info": "Halaman _PAGE_ dari _PAGES_",
            "search": "Cari:",           
        }  
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "language": {
            "info": "Halaman _PAGE_ dari _PAGES_",            
        }      
    });
  });

$('.confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    $(this).find('.messages').html('Anda yakin ingin menghapus <strong>'+$(e.relatedTarget).data('messages')+'</strong> ?');
});
$('.submit-from-modal').on('show.bs.modal', function(e) {
    $(this).find('form').attr('action', $(e.relatedTarget).data('href'));
});
$('.submit-from-modal-2').on('show.bs.modal', function(e) {
    $(this).find('form').attr('action', $(e.relatedTarget).data('href'));
    $(this).find('.value-mt').attr('value', $(e.relatedTarget).data('value'));
});
$('.confirm-from-modal').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    $(this).find('.messages').html($(e.relatedTarget).data('messages')+' ?');
});

//Proses
$(function () {
  $('#IDproses').on('change', function () {
    var currentValue = $(this).val();
    
    switch (currentValue) {
      case 'Sedang Dalam Proses':
      $("#IDselesai").hide();

      break ;
      case 'Selesai':
        $("#IDselesai").show();
    }
  });
});

//PETUGAS
$('.edit-job').on('show.bs.modal', function(e) {
    $(this).find('.value-job').attr('value', $(e.relatedTarget).data('value'));
    $(this).find('.value-id').attr('value', $(e.relatedTarget).data('id'));
});

//Date picker

//Datemask dd/mm/yyyy
$('#datemask').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
    //Datemask2 mm/dd/yyyy
$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
$('[data-mask]').inputmask()

//toast
@if(session()-> has('success'))        
  toastr.success('{{ session('success') }}', 'BERHASIL!'); 
@elseif(session()-> has('error'))
  toastr.error('{{ session('error') }}', 'GAGAL!'); 
@endif

// Timepicker
// $('.timepicker').timepicker({
//     showInputs: false
// });
</script>

@yield('javascripts')

</body>
</html>
