<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, maximum-scale=1">
  <title>Unique</title>
  <link rel="icon" href="{{ asset('public/assets/favicon.png') }}" type="image/png">
  <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('public/assets/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('public/assets/css/animate.css') }}" rel="stylesheet" type="text/css">

  <!--[if lt IE 9]>
    <script src="{{ asset('public/assets/js/respond-1.1.0.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/html5shiv.js') }}"></script>
    <script src="{{ asset('public/assets/js/html5element.js') }}"></script>
<![endif]--> 

</head>

<body>

  <!--Header_section-->
  <header id="header_wrapper">
    @yield('header')
  </header>
  <!--Header_section-->
    
  <!--Hero_Section-->
    @yield('content')

  <script type="text/javascript" src="{{ asset('public/assets/js/jquery-1.11.0.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('public/assets/js/jquery-scrolltofixed.js') }}"></script>
  <script type="text/javascript" src="{{ asset('public/assets/js/jquery.nav.js') }}"></script>
  <script type="text/javascript" src="{{ asset('public/assets/js/jquery.easing.1.3.js') }}"></script>
  <script type="text/javascript" src="{{ asset('public/assets/js/jquery.isotope.js') }}"></script>
  <script type="text/javascript" src="{{ asset('public/assets/js/wow.js') }}"></script>
  <script type="text/javascript" src="{{ asset('public/assets/js/custom.js') }}"></script>

</body>

</html>