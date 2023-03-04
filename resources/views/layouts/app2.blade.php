<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('./head/head2')
</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('./head/aside')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('./head/navbar2')
        <div class="container-fluid py-4">
            @yield('content')
            @include('./head/footer2')
        </div>
    </main>

    @include('./head/footerJs')
</body>

</html>
