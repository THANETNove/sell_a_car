<!doctype html>
<html lang="zxx">

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
                <div class="col-lg-12">
                    <div class="banner_slider owl-carousel owl-carousel2">
                        @foreach ($dataImage as $data_pag)
                            <div class="single_banner_slider">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        {{--   <div class="banner_text">
                                            <div class="banner_text_iner">
                                                <img src="{{ URL::asset('/img/advert/' . '' . $data_pag->image) }}"
                                                    alt="">
                                            </div>
                                        </div> --}}
                                        <div class="banner_text_iner">
                                            <img src="{{ URL::asset('/img/advert/' . '' . $data_pag->image) }}"
                                                alt="">
                                        </div>
                                    </div>
                                    {{--   <div class="banner_img d-lg-block">
                                        <img src="{{ URL::asset('/img/advert/' . '' . $data_pag->image) }}"
                                            alt="">
                                    </div> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>



    <div class="container">
        <div class="row">
            <div class="box-manu01-1">
                <div class="">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <p class="text-Shop">Shop by category</p>
                            <div class="row">
                                @foreach ($manu as $manu)
                                    <div class="col-md-2 col-sm-6 col-6 box-img-home ">
                                        <div class="shadow1-box">
                                            <img src="{{ URL::asset('/img/icon/' . '' . $manu->image) }}" height="40"
                                                width="40" alt="...">
                                            <a href="{{ url('/searchPo-ma', $manu->categorie_name) }}">
                                                <p class="text-category">{{ $manu->categorie_name }}</p>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="box-manu01-1">

                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <div class="">
                            <p class="text-hot">HOT</p>
                            <p class="text-hot-products">สินค้ามาแรง</p>
                            <div class="row http://192.168.1.3/project/sell_a_car/public/">
                                @foreach ($dataZone as $data_pag)
                                    @php
                                        $imgp = json_decode($data_pag->image);
                                        
                                    @endphp
                                    <div class="col-md-2 col-sm-6 col-6 box-img-home">
                                        <div class="shadow2-box">
                                            <a href="{{ url('select-car', $data_pag->id) }}">
                                                <img src="{{ URL::asset('/img/product/' . '' . $imgp[0]) }}"
                                                    class="image-car" height="150" width="150" alt="...">
                                            </a>
                                            <div class="boxHot">
                                                <p class="boxTextHot">Hot</p>
                                            </div>
                                            <h6 class="text-name_products">{{ $data_pag->name_products }}</h6>
                                            <p>{{ number_format($data_pag->product_price) }} บาท</p>
                                            <i class="fas fa-eye"></i> &nbsp; {{ $data_pag->number_of_times }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_slider owl-carousel owl-carousel2">
                        @foreach ($dataImageFooter as $imageFoot)
                            <div class="single_banner_slider">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="banner_text_iner">
                                            <img class="imag-wi"
                                                src="{{ URL::asset('/img/advertFooter/' . '' . $imageFoot->image) }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>
    {{--    1350 × 300 px --}}



    @include('./head/footer')
</body>

</html>
