<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" type="text/css" href="{{ asset('adminLTE/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('adminLTE/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('adminLTE/dist/css/skins/skin-blue.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('adminLTE/plugins/DataTables/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('adminLTE/plugins/timepicker/bootstrap-timepicker.min.css') }}">

  @yield('style')
 
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Hey</b>MART</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle collapsed" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown user user-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('images/'.Auth::user()->foto) }}" class="user-image" alt="user image"><span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header"><img src="{{ asset('images/'.Auth::user()->foto) }}" class="img-circle" alt="user images"><P>{{ Auth::user()->name }}</P></li>

              <li class="user-footer">
                <div class="pull-left">
                    <a class="btn btn-default" href="{{ route('user.profil') }}">Edit Profil</a>
                </div>
                <div class="pull-right">
                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
              </li>

            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
<!-- end header -->

<!-- sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">MENU NAVIGASI</li>
        
        <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>

        @if(Auth::user()->level == 1)

        <li><a href="{{ route('kategori.index') }}"><i class="fa fa-cube"></i> <span>Kategori</span></a></li>
        <li><a href="{{ route('produk.index') }}"><i class="fa fa-cubes"></i> <span>Produk</span></a></li>
        <li><a href="{{ route('supplier.index') }}"><i class="fa fa-truck"></i> <span>Supplier</span></a></li>
        <li><a href="{{ route('member.index') }}"><i class="fa fa-credit-card"></i> <span>Member</span></a></li>
        <li><a href="{{ route('pengeluaran.index') }}"><i class="fa fa-money"></i> <span>Pengeluaran</span></a></li>
        <li><a href="{{ route('user.index') }}"><i class="fa fa-user"></i> <span>User</span></a></li>
        <li><a href="{{ route('pembelian.index') }}"><i class="fa fa-download"></i> <span>Pembelian</span></a></li>
        <li><a href="{{ route('penjualan.index') }}"><i class="fa fa-upload"></i> <span>Penjualan</span></a></li>
       
        <li><a href="{{ route('laporan.index') }}"><i class="fa fa-file-pdf-o"></i> <span>Laporan</span></a></li>
        <li><a href="{{ route('setting.index') }}"><i class="fa fa-gears"></i> <span>Setting</span></a></li>

        @else

        <li><a href="{{ route('transaksi.index') }}"><i class="fa fa-shopping-cart"></i> <span>Transaksi</span></a></li>
        <li><a href="{{ route('transaksi.new') }}"><i class="fa fa-cart-plus"></i> <span>Transaksi Baru</span></a></li>

        @endif
       
      </ul>   
    </section>
  </aside>
<!-- end sidebar -->

<!-- content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>@yield('title')</h1>
        <ol class="breadcrumb">
            @section('breadcrumb')
            <li><a href="{{ url('home') }}"><i class="fa fa-home"></i>HOME</a></li>
            @show
        </ol>
    </section>

    <section class="content">
        @yield('content')

    </section> 
</div>
<!-- end content -->

<!-- footer -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        Aplikasi POS oleh:Riki Krismawan
    </div>
    <strong>Copyright &copy; 2018 <a href="#">Company</a>.</strong> All rights reserved.
</footer>
<!-- end footer -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

<script src="{{ asset('adminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('adminLTE/dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('adminLTE/plugins/DataTables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/DataTables/js/dataTables.bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/validator.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>

@yield('script')

</body>
</html>