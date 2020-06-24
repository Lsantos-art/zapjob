<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('template/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('template/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title', '')
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('template/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />

</head>

<body class="">

  <div class="wrapper">

    @include('layout.navbars.admin.sidebar')


    <div class="main-panel">

    @include('layout.navbars.admin.topbar')

      <div class="content">
        <div class="container-fluid">
            @include('layout.messages.msg')
            @yield('content')
        </div>
      </div>

    @include('layout.footer.app')

    </div>


  </div>

    @include('layout.scripts.app')

</body>

</html>
