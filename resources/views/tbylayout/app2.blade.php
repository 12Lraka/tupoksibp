<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="msapplication-TileColor" content="#2d89ef">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <title>Tupoksi | BAPAS Yogyakarta</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url ('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">    
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url ('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url ('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url ('AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- adminlte -->
    <link rel="stylesheet" href="{{ url ('assets/css/adminlte.min.css') }}">
   <!-- bootstrap -->
   <link rel="stylesheet" href="{{ url ('assets/css/bootstrap.min.css') }}">
     <!-- bootstrap -->
     <link rel="stylesheet" href="{{ url ('assets/css/dashboard.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ url ('AdminLTE/plugins/toastr/toastr.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('styles')
  
</head>
<body>
<div class="page">
    <div class="page-main">
            <div class="header py-4">
                <div class="container">
                    <div class="d-flex">
                        <a class="header-brand" href="#">
                            <img src="{{url('assets/img/LOGO1.png') }}" class="header-brand-img" alt="tabler logo">
                        </a>
                        <div class="d-flex order-lg-2 ml-auto">
                                <div class="nav-item d-flex p-0">
                                    <a href="{{route('login')}}" class="btn btn-sm btn-outline-primary">
                                        <i class="fa fa-log-in"></i> Masuk
                                    </a>
                                </div>
                        </div>
                        <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                            <span class="header-toggler-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 ml-auto d-none d-lg-block">
                            <div class="my-3 my-lg-0 text-right text-muted" style="font-weight: 400;font-size: .92em;">
                                <i class="far fa-clock d-inline-block" style="transform: translateY(1px);"></i>&nbsp;
                                Pukul <span id="clock"></span>
                            </div>
                        </div>
                        <div class="col-lg order-lg-first">
                            <ul id="myTab" class="nav nav-tabs border-0 flex-column flex-lg-row">
                              <li class="nav-item">
                                <a href="{{route('tby.index')}}" class="nav-link active"><i class="fas fa-box"></i>
                                  Litmas Dewasa</a>
                              </li>
                              <li class="nav-item">
                                <a href="{{route('bimbingandewasa.index')}}" class="nav-link"><i class="fas fa-box"></i>
                                  B&P Dewasa</a>
                              </li>
                              <li class="nav-item">
                                <a href="{{route('pendampingananak.index')}}" class="nav-link"><i class="fas fa-box"></i>
                                  Pendampingan Anak</a>
                              </li>
                              <li class="nav-item">
                                <a href="{{route('litmasanak.index')}}" class="nav-link"><i class="fas fa-box"></i>
                                 Litmas Anak</a>
                              </li>
                              <li class="nav-item">
                                <a href="{{route('bpanak.index')}}" class="nav-link"><i class="fas fa-box"></i>
                                B&P Anak</a>
                              </li>
                              </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-3 my-md-5">
              <div class="container">
                <div class="page-header">
                  <h1 class="page-title">
                    Informasi Umum
                  </h1>
                </div>
                <div class="row row-cards"> 
                  @yield ('content')
                </div>                
              </div>                
            </div>
          </div>   
        

 

  <footer class="footer">
    @include('tbylayout/footer')
  </footer>


</div>

<!-- jQuery -->
<script src="{{ url('assets/js/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('AdminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>$.widget.bridge('uibutton', $.ui.button)</script>
<!-- Bootstrap 4 -->
<script src="{{ url('assets/js/dashboard.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
{{-- <!-- ChartJS -->
<script src="{{ url('AdminLTE/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('AdminLTE/plugins/sparklines/sparkline.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url ('AdminLTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script> --}}
<!-- InputMask -->
<script src="{{ url ('AdminLTE/plugins/moment/moment.min.js') }}"></script>
<script src="{{ url ('AdminLTE/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src=" {{ url('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src=" {{ url('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src=" {{ url('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src=" {{ url('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ url('AdminLTE/plugins/toastr/toastr.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<script>
  
startTimeClock();

</script>

@yield('javascripts')

</body>
</html>
