<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('./head/head')
</head>

<body>
    <div id="app">
        @include('./head/navbar')
        <section class="our_offer section_padding">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-8 col-md-8">
                        <div class="offer_img">
                            <img src="{{ URL::asset('img/car5.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="offer_text">
                            <h2>สมัครสามชิก เพื่อขายสินค้า</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <br>
    <br>
    <!-- subscribe_area part start-->
    <section class="subscribe_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="subscribe_area_text text-center">
                        <h5>บริการซื้อ ขายรถ Sell a Car</h5>
                        <h2>บริการซื้อราคาถูก เเละขายในราคาย่อมเยา</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('./head/footer')
</body>

</html>
