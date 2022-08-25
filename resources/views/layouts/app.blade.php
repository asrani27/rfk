<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  {{--
  <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>RFK</title>
  @include('layouts.css')
  <style>
    .active {
      background-color: #2969b0 !important;
      background-image: linear-gradient(180deg, #268fff, #007bff);
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light bg-gradient-primary" style="box-shadow: 0 2px 10px #999">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-white"><strong>{{strtoupper(Auth::user()->name)}}</strong></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar  sidebar-light-lightblue elevation-4">
      <a href="#" class="brand-link bg-gradient-primary text-center" style="box-shadow: 0 2px 10px #999">
        <span class="brand-text font-weight-light text-white">
          <strong>Realisasi Fisik Keuangan</strong>
        </span>
      </a>
      <div class="sidebar">

        @if (Auth::user()->hasRole('superadmin'))
        @include('layouts.menu_superadmin')
        @elseif (Auth::user()->hasRole('admin'))
        @include('layouts.menu_admin')
        @elseif (Auth::user()->hasRole('pptk'))
        @include('layouts.menu_pptk')
        @else
        @include('layouts.menu_bidang')
        @endif


      </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-color: #ebfbf7">

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          @yield('content')
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>

    {{-- <footer class="main-footer">
      <div class="float-right d-none d-sm-inline">
      </div>
      <strong>Copyright &copy; 2022 Banjarmasin</strong>
      <div class="float-right d-none d-sm-inline-block">


      </div>
    </footer> --}}
  </div>

  @include('layouts.js')
</body>

</html>