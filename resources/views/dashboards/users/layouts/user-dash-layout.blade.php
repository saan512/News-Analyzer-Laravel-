<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <base href="{{ \URL::to('/') }}">
  

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous"> -->
 <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
</head>
<body class="sidebar-mini layout-fixed text-sm">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light marq">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li> -->
    </ul>


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="{{ \URL::to('/home')}}" class="brand-link"> --}}
    <a href="{{ route('supportus')}}" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">News Analyser</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact nav-child-indent nav-collapse-hide-child nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                {{-- <a href="{{ route('user.dashboard')}}" class="nav-link {{ (request()->is('user/dashboard*')) ? 'active' : '' }}"> --}}
                <a href="{{ route('user.dashboard')}}" class="nav-link {{ (request()->is('user/dashboard*')) ? 'active' : '' }}">
                <a href="{{ route('user.charts')}}" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ route('user.news')}}" class="nav-link {{ (request()->is('user/profile*')) ? 'active' : '' }}">
                  <i class="nav-icon fa fa-chart-pie"></i>
                  <p>
                    News Analysis
                  </p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ route('user.results')}}" class="nav-link {{ (request()->is('user/profile*')) ? 'active' : '' }}">
                  <i class="nav-icon fa fa-database"></i>
                  {{-- {{ route('user.profile')}} --}}
                  
                  <p>
                   Result
                  </p>
                </a>
              </li>
               {{-- <li class="nav-item">
                <a href="{{ route('user.charts')}}" class="nav-link {{ (request()->is('user/profile*')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-user"></i>
                  {{-- {{ route('user.profile')}} 
                  
                  <p>
                   Charts
                  </p>
                </a>
              </li> --}}
          <li class="nav-item">
            <a href="{{ route('user.settings')}}" class="nav-link {{ (request()->is('user/settings*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-cog"></i>
              {{-- {{ route('user.settings')}} --}}
              <p>
               Settings
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="nav-icon fa fa-sign-out-alt"></i>
                {{-- {{ __('Logout') }} --}}
                <p>
                    Logout
                  </p>
            </a>
    
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      News Analyzer
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021-2023 <a href="https://cuiwah.edu.pk/">COMSATS UNIVERSITY ISLAMABAD, WAH CAMPUS</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
