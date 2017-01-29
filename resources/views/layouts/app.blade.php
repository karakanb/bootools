<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no"/>

    <!-- CSRF Token -->

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/ideazz.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">

    @yield('style')

</head>
<body>
<div id="app">

    @include('layouts.navbar')

    <div class="container">
        @yield('content')
    </div>


</div>

<!-- Scripts -->
<script src="/js/app.js"></script>

@yield('script')

</body>
</html>
