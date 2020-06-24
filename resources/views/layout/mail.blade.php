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
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('template/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />

</head>

<body class="">

  <div class="d-flex justify-content-center">

    <div class="main-panel">

      <div class="content my-3">
        <div class="">
            <hr>
            <h4 class="Primary Text text-center">Anuncie com a facilidade do whatsapp e alcance os melhores profissionais!</h4>
        </div>
          @yield('content')
      </div>

    </div>


  </div>


</body>

</html>
