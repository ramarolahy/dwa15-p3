<!doctype html>
<html lang="{{ app ()->getLocale () }}">
<head>
    @include('includes._head')
    <title>Pretty Quotes - @yield('title')</title>
</head>
<body>
    <header class="mdl-layout__fixed-header">
        @include('includes._navbar')
    </header>

    @yield('content')

    <script>
        @yield ('script')
    </script>
</body>
</html>
