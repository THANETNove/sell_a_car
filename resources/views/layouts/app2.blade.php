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

    {{--  active --}}
    <script>
        /*         window.onload = (event) => {
                const pathname = window.location.pathname;
                const pathParts = pathname.split('/'); // แยกส่วน path ของ URL ด้วยเครื่องหมาย /
                const desiredPart = pathParts[4];
                const pagesStore = ['post_products', 'edit-post_products', 'renew-post_products']; // เมนู รายการขาย user
                const pagesAdd_point = ['add_point', 'create_point']; // เมนู เติมเงิน  user


                if (pagesStore.includes(desiredPart)) {
                    var element = document.getElementById("storeUser");
                    element.classList.add("active", "bg-gradient-primary");
                } else {
                    var element = document.getElementById("storeUser");
                    element.classList.remove("active", "bg-gradient-primary");
                }

                if (pagesAdd_point.includes(desiredPart)) {
                    var element = document.getElementById("add-point");
                    element.classList.add("active", "bg-gradient-primary");
                } else {
                    var element = document.getElementById("add-point");
                    element.classList.remove("active", "bg-gradient-primary");
                }

            }; */
    </script>
</body>

</html>
