 <!DOCTYPE html>
<html>

<head>
    <title>The Travel - Tour Travel</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- FAV ICON -->
    <link rel="shortcut icon" href="/images/fav.ico">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:400,500,700" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/materialize.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/mob.css">
    <link rel="stylesheet" href="/css/animate.css">
    <!-- PILS AND TABS FILES OF BOOTSTRAP ---->
  
    @yield('css')
</head>

<body class="{{$cssclass or 'innerpage'}}">
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

   @include('users.layouts.nav')
   @include('users.layouts.side_bar')
   @yield('content')
 <!-- Jquery Core Js -->
 </div>
	</section>
    @include('users.layouts.footer') 
    <!-- Bootstrap and necessary plugins-->
    <script src="/js/jquery-latest.min.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/wow.min.js"></script>
    <script src="/js/materialize.min.js"></script>
    <script src="/js/custom.js"></script>

     @yield('script')
</body>

</html>
