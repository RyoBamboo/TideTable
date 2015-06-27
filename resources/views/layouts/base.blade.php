<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">

    <!-- include stylesheet -->
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.8.1/build/cssreset/cssreset-min.css">
    <link rel="stylesheet" type="text/css" href="/assets/uikit/css/uikit.almost-flat.min.css">

    <!-- include javascript -->
    <script type="text/javascript" src="/assets/js/jquery-1.11.2.js"></script>
    <script type="text/javascript" src="/assets/uikit/js/uikit.min.js"></script>
    <script type="text/javascript" src="/assets/japan-map/jquery.japan-map.js"></script>
    <script type="text/javascript" src="/assets/js/my-map.js"></script>

    @yield('header')
</head>
<body>
    <div class="uk-grid">
        @include('layouts.header')
        <div id="container" class="uk-width-2-3 uk-container-center">
            @yield('content')
        </div>
        @include('layouts.footer')
    </div>
</body>
</html>