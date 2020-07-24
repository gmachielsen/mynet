<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">

    <title>Netflixy</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      label {
        font-weight: bold;
      }
    </style>
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    @include('layouts.dashboard._header')
    <!-- Sidebar menu-->
    @include('layouts.dashboard._aside')
    <main class="app-content">
      <!-- <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div> -->

      @yield('content')

      
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('dashboard_files/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('dashboard_files/js/popper.min.js')}}"></script>
    <script src="{{ asset('dashboard_files/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('dashboard_files/js/main.js')}}"></script>

  </body>
</html>