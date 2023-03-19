<!doctype html>
<html lang="en">

<head>
    @include('./head/head')
</head>

<body>
    <!--::header part start::-->
    @include('./head/navbar')
    <!-- Header part end-->

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-11">
                    <div class="banner_slider owl-carousel">
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="text-car">
                                    <div class="col-lg-5 col-md-8">
                                        <div class="banner_text">
                                            <div class="banner_text_iner">
                                                <h1>Car & 2nd hand car</h1>
                                                <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                    suspendisse ultrices gravida. Risus commodo viverra</p>
                                                <a href="#" class="btn_2">buy now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="car-imag">
                                    <div class="banner_img  d-lg-block">
                                        <img src="{{ URL::asset('img/car1.png') }}" alt="">
                                        <div class="buy-now">
                                            <br>
                                            <a href="#" class="btn_2">buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="text-car">
                                    <div class="col-lg-5 col-md-8">
                                        <div class="banner_text">
                                            <div class="banner_text_iner">
                                                <h1>Car & 2nd hand car</h1>
                                                <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                    suspendisse ultrices gravida. Risus commodo viverra</p>
                                                <a href="#" class="btn_2">buy now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="car-imag">
                                    <div class="banner_img  d-lg-block">
                                        <img src="{{ URL::asset('img/car2.png') }}" alt="">
                                        <div class="buy-now">
                                            <br>
                                            <a href="#" class="btn_2">buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="text-car">
                                    <div class="col-lg-5 col-md-8">
                                        <div class="banner_text">
                                            <div class="banner_text_iner">
                                                <h1>Car & 2nd hand car</h1>
                                                <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                    suspendisse ultrices gravida. Risus commodo viverra</p>
                                                <a href="#" class="btn_2">buy now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="car-imag">
                                    <div class="banner_img  d-lg-block">
                                        <img src="{{ URL::asset('img/car4.png') }}" alt="">
                                        <div class="buy-now">
                                            <br>
                                            <a href="#" class="btn_2">buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-counter"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->

    <!-- upcoming_event part start-->

    <!-- product_list start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>HOT ZONE <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_list_slider owl-carousel">
                        @foreach (array_chunk($dataHomZone->toArray(), 16) as $data_zone_group)
                            <div class="single_product_list_slider">
                                <div class="row align-items-center">
                                    @foreach ($data_zone_group as $data_zone)
                                        @php
                                            $img = json_decode($data_zone->image);
                                            
                                        @endphp
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="single_product_item">

                                                <img src="{{ URL::asset('/img/product/' . '' . $img[0]) }}"
                                                    height="180px" width="200px" alt="...">

                                                {{--     <img src="img/product/product_1.png" alt=""> --}}
                                                <div class="single_product_text">
                                                    <h4>{{ $data_zone->name_products }}</h4>
                                                    <h3 class="text-span">{{ number_format($data_zone->product_price) }}
                                                        บาท</h3>
                                                    <a href="#" class="add_cart">+ add to cart<i
                                                            class="ti-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part start-->

    <!--================Category Product Area =================-->
    <section class="">
        <div class="container">
            <div class="row">
                @include('./head/manu')


                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                <div class="single_product_menu">
                                    <p>สินค้าทั้งหมด <span>{{ $dataZone->count() }} รายการ </span></p>
                                </div>

                                {{-- {{ DB::table('add_points')->where('status', 'null')->count() }} --}}
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center latest_product_inner">
                        @foreach ($dataZone as $datazone)
                            @php
                                $img = json_decode($datazone->image);
                                
                            @endphp
                            <div class="col-lg-4 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ URL::asset('/img/product/' . '' . $img[0]) }}" height="180px"
                                        width="100%" alt="...">
                                    <div class="single_product_text">
                                        <h4>{{ $datazone->name_products }}</h4>
                                        <h3 class="text-span">{{ number_format($datazone->product_price) }} บาท</h3>
                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <div class="col-lg-12">
                            {!! $dataZone->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <!-- awesome_shop start-->
    <section class="our_offer section_padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-md-6">
                    <div class="offer_img">
                        <img src="{{ URL::asset('img/car5.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="offer_text">
                        <h2>Weekly Sale on
                            60% Off All Products</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- awesome_shop part start-->

    <!-- product_list part start-->
    <section class="product_list best_seller section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>GENERAL ZONE<span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">

                    <div class="best_product_slider owl-carousel">
                        @foreach ($data as $dataone)
                            @php
                                $img = json_decode($dataone->image);
                                
                            @endphp
                            <div class="single_product_item">
                                <img src="{{ URL::asset('/img/product/' . '' . $img[0]) }}" height="180px"
                                    width="200px" alt="...">
                                <div class="single_product_text">
                                    <h4>{{ $dataone->name_products }}</h4>
                                    <h3 class="text-span">{{ number_format($dataone->product_price) }} บาท
                                    </h3>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part end-->

    <!--================Category Product Area =================-->
    <section class="">
        <div class="container">
            <div class="row">
                @include('./head/manu')
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                <div class="single_product_menu">

                                    <p>สินค้าทั้งหมด <span>{{ $dataPag->count() }} รายการ </span></p>
                                </div>


                                <div class="single_product_menu d-flex">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="search"
                                            aria-describedby="inputGroupPrepend">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"><i
                                                    class="ti-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center latest_product_inner">
                        @foreach ($dataPag as $data_pag)
                            @php
                                $imgp = json_decode($data_pag->image);
                                
                            @endphp

                            <div class="col-lg-4 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ URL::asset('/img/product/' . '' . $imgp[0]) }}" height="180px"
                                        width="200px" alt="...">
                                    <div class="single_product_text">
                                        <h4>{{ $dataone->name_products }}</h4>
                                        <h3 class="text-span">{{ number_format($dataone->product_price) }} บาท
                                            <a href="#" class="add_cart">+ add to cart<i
                                                    class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <div class="col-lg-12">
                            {!! $dataPag->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    <!--::subscribe_area part end::-->

    @include('./head/footer')

</body>

</html>
