<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Antiques-Maritime.loc</title>
<meta name="keywords" content="HTML5,CSS3,HTML,Template,Multi-Purpose,M_Adnan,Corporate Theme,SEBIAN Multi Purpose Care,eCommerce,SEBIAN - Multi Purpose eCommerce HTML5 Template">
<meta name="description" content="SEBIAN - Multi Purpose eCommerce HTML5 Template">
<meta name="author" content="M_Adnan">

<!-- FONTS ONLINE -->
<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<script src='https://www.google.com/recaptcha/api.js'></script>

<!--MAIN STYLE-->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

<!-- ADD YOUR OWN STYLING HERE. AVOID TO USE STYLE.CSS AND MAIN.CSS. IT WILL BE HELPFUL FOR YOU IN FUTURE UPDATES -->
<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css">

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/rs-plugin/css/settings.css') }}" media="screen" />

<!-- JavaScripts -->
<script src="{{ asset('assets/js/modernizr.js') }}"></script>




<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
<!-- LOADER ===========================================-->
<div id="loader">
  <div class="loader">
    <div class="position-center-center">
     <img src="{{ URL::asset('assets/images/'.'logo-dark.png') }}" alt="">
      <p class="font-playfair text-center">Please Wait...</p>
      <div class="loading">
        <div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
      </div>
    </div>
  </div>
</div>

<!-- Page Wrap -->
<div id="wrap" class="furniture"> 
  
  <!-- Header -->
  <!-- <header class="header">  -->
    @yield('header')
  <!-- </header> -->
  <!-- Header End --> 

  @yield('content')

  <!-- GO TO TOP --> 
  <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
  <!-- GO TO TOP End --> 
</div>
<!-- Wrap End --> 
<script src="{{ asset('assets/js/jquery-1.11.3.js') }}"></script> 
<script src="{{ asset('assets/js/wow.min.js') }}"></script> 
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('assets/js/own-menu.js') }}"></script> 
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script> 
<script src="{{ asset('assets/js/jquery.flexslider-min.js') }}"></script> 
<script src="{{ asset('assets/js/jquery.isotope.min.js') }}"></script> 
<script src="{{ asset('assets/js/bloodhound.js') }}"></script> 
<script src="{{ asset('assets/js/typeahead.bundle.js') }}"></script> 
<script src="{{ asset('assets/js/typeahead.jquery.js') }}"></script> 
<script src="{{ asset('assets/js/custom.js') }}"></script> 

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="{{ asset('assets/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('assets/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script> 
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
$(".zoom_05").elevateZoom({ 
  zoomType  : "inner", 
  cursor    : "crosshair"
}); 
</script>
</body>
</html>