<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('./head/head')
</head>

<body>
    <div id="app">
        @include('./head/navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <br>
    <br>
    <!-- subscribe_area part start-->

    @include('./head/footer')

</body>

</html>
