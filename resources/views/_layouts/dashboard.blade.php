<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">

    <title>{{ $title == '' ? config('app.name') : $title . ' - ' . config('app.name') }}</title>

    <link rel="apple-touch-icon" href="{{ asset('public') }}/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="{{ asset('public') }}/assets/images/favicon.ico">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('public') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('public') }}/assets/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="{{ asset('public') }}/assets/css/site.min.css">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/flag-icon-css/flag-icon.css">

    <!-- Page -->
    <!-- <link rel="stylesheet" href="{{ asset('public') }}/assets/css/{{ asset('public') }}/fonts/weather-icons/weather-icons.css"> -->

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('public') }}/assets/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="{{ asset('public') }}/assets/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    {{ $css ?? '' }}

    <!--[if lt IE 9]>
    <script src="{{ asset('public') }}/assets/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="{{ asset('public') }}/assets/vendor/media-match/media.match.min.js"></script>
    <script src="{{ asset('public') }}/assets/vendor/respond/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="{{ asset('public') }}/assets/vendor/modernizr/modernizr.js"></script>
    <script src="{{ asset('public') }}/assets/vendor/breakpoints/breakpoints.js"></script>
    <script>
        Breakpoints();
    </script>
</head>

<body class="dashboard">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    @include('_layouts.dashboard.navigation')

    @include('_layouts.dashboard.menu')

    @include('_layouts.dashboard.gridmenu')

    <!-- Page -->
    {{ $slot }}
    <!-- End Page -->

    @include('_layouts.dashboard.footer')

    <!-- Core  -->
    <script src="{{ asset('public') }}/assets/vendor/jquery/jquery.js"></script>
    <script src="{{ asset('public') }}/assets/vendor/bootstrap/bootstrap.js"></script>
    <script src="{{ asset('public') }}/assets/vendor/animsition/jquery.animsition.js"></script>
    <script src="{{ asset('public') }}/assets/vendor/asscroll/jquery-asScroll.js"></script>
    <script src="{{ asset('public') }}/assets/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="{{ asset('public') }}/assets/vendor/asscrollable/jquery.asScrollable.all.js"></script>
    <script src="{{ asset('public') }}/assets/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>

    <!-- Plugins -->
    <script src="{{ asset('public') }}/assets/vendor/switchery/switchery.min.js"></script>
    <script src="{{ asset('public') }}/assets/vendor/intro-js/intro.js"></script>
    <script src="{{ asset('public') }}/assets/vendor/screenfull/screenfull.js"></script>
    <script src="{{ asset('public') }}/assets/vendor/slidepanel/jquery-slidePanel.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('public') }}/assets/js/core.js"></script>
    <script src="{{ asset('public') }}/assets/js/site.js"></script>

    <script src="{{ asset('public') }}/assets/js/sections/menu.js"></script>
    <script src="{{ asset('public') }}/assets/js/sections/menubar.js"></script>
    <script src="{{ asset('public') }}/assets/js/sections/gridmenu.js"></script>
    <script src="{{ asset('public') }}/assets/js/sections/sidebar.js"></script>

    <script src="{{ asset('public') }}/assets/js/configs/config-colors.js"></script>
    <script src="{{ asset('public') }}/assets/js/configs/config-tour.js"></script>

    <script src="{{ asset('public') }}/assets/js/components/asscrollable.js"></script>
    <script src="{{ asset('public') }}/assets/js/components/animsition.js"></script>
    <script src="{{ asset('public') }}/assets/js/components/slidepanel.js"></script>
    <script src="{{ asset('public') }}/assets/js/components/switchery.js"></script>

    <script src="{{ asset('public') }}/assets/examples/js/dashboard/v1.js"></script>

    {{ $js ?? '' }}

    <form action="{{ route('logout') }}" id="frmLogout" method="POST">@csrf</form>
    <script type="text/javascript">
        function logout() {
            $('#frmLogout').submit();
        }
    </script>

</body>

</html>