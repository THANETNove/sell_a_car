<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('./head/head2')
</head>

<body id="page-top">
    <div id="wrapper">
        @include('./head/aside')
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @include('./head/navbar3')
                @yield('content')

            </div>
        </div>
        @include('./head/footerJs')

    </div>
    @vite('resources/js/app.js')
</body>

</html>
