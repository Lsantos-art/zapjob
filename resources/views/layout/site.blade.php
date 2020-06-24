<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-162961607-2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-162961607-2');
    </script>



    <meta name="description" content="A Zap Job é uma plataforma de empregos minimalista, com integração ao Whatsapp e totalmente intuitiva."/>
    <meta charset="utf-8" />
    <script src="https://kit.fontawesome.com/7a4aa7b0e2.js" crossorigin="anonymous"></script>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('template/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('template/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        @yield('meta')
    <title>
        @yield('title', '')
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('template/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />
    <script data-ad-client="ca-pub-6544398606617665" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

</head>

{{-- changed --}}

<body class="">

  <div class="wrapper">

    @include('layout.navbars.site-sidebar')


    <div class="main-panel">


    @if (auth()->user())
        @if (auth()->user()->master == 'yes')
            @include('layout.navbars.site-topbar')
            @else
            @include('layout.navbars.admin.topbar')
        @endif
    @else
        @include('layout.navbars.site-topbar')
    @endif

      <div class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
      </div>

    @include('layout.footer.app')

    </div>


  </div>

    @include('layout.scripts.app')
    <div class="my-1"></div>

    @yield('scripts')
</body>

</html>
