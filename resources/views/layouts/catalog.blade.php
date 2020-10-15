<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('custom_catalog')}}/img/favicon.png">
    <link rel="stylesheet" href="{{asset('custom_catalog')}}/css/style.css" data-inprogress="">
    @yield('styles')
</head>

<body class="body" id="body">
<div class="wrapper">
    <main class="main">
        @include('layouts.catalog_header')
        @yield('content')
        @include('layouts.catalog_modal')
    </main>
</div>

<script src="{{asset('custom_catalog')}}/js/jquery.min.js"></script>
<script src="{{asset('custom_catalog')}}/js/inputmask.js"></script>
<script src="{{asset('custom_catalog')}}/js/slick.min.js"></script>
<script src="{{asset('custom_catalog')}}/js/wheel-indicator.js"></script>
<script src="{{asset('custom_catalog')}}/js/jquery.menu-aim.js"></script>
<script src="{{asset('custom_catalog')}}/js/main.min.js"></script>
@yield('script')

</body>

</html>
