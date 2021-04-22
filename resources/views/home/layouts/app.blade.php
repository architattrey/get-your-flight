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
    <!-- MAKE PDF FILE -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/materialize.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/mob.css">
    <link rel="stylesheet" href="/css/animate.css">
    <!-- PILS AND TABS FILES OF BOOTSTRAP -->
    <style>
        .custom-slider.rzslider .rz-bar {
            background: #de223b;
            height: 2px;
        }
            .custom-slider.rzslider .rz-selection {
            background:  #de223b;
        }

        .custom-slider.rzslider .rz-pointer {
            width: 8px;
            height: 16px;
            top: auto; /* to remove the default positioning */
            bottom: 0;
            background-color: #de223b;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
        }

        .custom-slider.rzslider .rz-pointer:after {
            display: none;
        }

        .custom-slider.rzslider .rz-bubble {
            bottom: 14px;
        }

        .custom-slider.rzslider .rz-limit {
            font-weight: bold;
            color:  #de223b;
        }

        .custom-slider.rzslider .rz-tick {
            width: 1px;
            height: 10px;
            margin-left: 4px;
            border-radius: 0;
            background: #de223b;
            top: -1px;
        }

        .custom-slider.rzslider .rz-tick.rz-selected {
            background: #de223b;
        }
    </style>
  
    @yield('css')
</head>

<body class="{{$cssclass or 'innerpage'}}">
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

   @include('home.layouts.nav') 
   @yield('content')
 <!-- Jquery Core Js -->
    
    @include('home.layouts.footer') 
    <!-- Bootstrap and necessary plugins-->
    <script src="/js/jquery-latest.min.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/wow.min.js"></script>
    <script src="/js/materialize.min.js"></script>
    <script src="/js/custom.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

     @yield('script')
</body>

</html>
