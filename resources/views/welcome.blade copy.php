<!doctype html>
<html lang="en">

<head>
    @include('./head/head')
</head>

<body style="background-color: #F7F7F7">
    <!--::header part start::-->
    @include('./head/navbar')
    <!-- Header part end-->

    <!-- banner part start-->
    {{-- 
    @include('./head/head_slide') --}}


    {{--     <div class="container">
        <div class="row">
            <div class="box-image01-1">
                @foreach ($dataImage as $data_pag)
                    <img src="{{ URL::asset('/img/advert/' . '' . $data_pag->image) }}" height="100%" width="100%"
                        alt="...">
                @endforeach
            </div>
        </div>
    </div> --}}



    <div class="container">
        <div class="row">
            <div class="box-manu01-1">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <p class="text-Shop">Shop by category</p>
                            <div class="row">
                                @foreach ($manu as $manu)
                                    <div class="col-md-2 col-sm-6 col-6 box-img-home">
                                        <img src="{{ URL::asset('/img/icon/' . '' . $manu->image) }}" height="40"
                                            width="40" alt="...">
                                        <a href="{{ url('/searchPo-ma', $manu->categorie_name) }}">
                                            <p class="text-category">{{ $manu->categorie_name }}</p>
                                        </a>
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <p class="text-hot">HOT</p>
                            <p class="text-hot-products">สินค้ามาแรง</p>
                            <div class="row">
                                @foreach ($dataZone as $data_pag)
                                    @php
                                        $imgp = json_decode($data_pag->image);
                                        
                                    @endphp
                                    <div class="col-md-2 col-sm-6 col-6 box-img-home">
                                        <a href="{{ url('select-car', $data_pag->id) }}">
                                            <img src="{{ URL::asset('/img/product/' . '' . $imgp[0]) }}"
                                                class="image-car" height="150" width="150" alt="...">
                                        </a>
                                        <h6 class="text-name_products">{{ $data_pag->name_products }}</h6>
                                        <p>{{ number_format($data_pag->product_price) }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- product_list part start-->

    <!-- product_list part end-->

    <!--================Category Product Area =================-->
    {{--     <section class="">
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
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center latest_product_inner">
                        @foreach ($dataPag as $data_pag)
                            @php
                                $imgp = json_decode($data_pag->image);
                                
                            @endphp

                            <div class="col-lg-4 col-sm-6 col-6">
                                <div class="single_product_item">
                                    <a href="{{ url('select-car', $data_pag->id) }}">
                                        <img src="{{ URL::asset('/img/product/' . '' . $imgp[0]) }}" height="180px"
                                            width="100%" alt="..."> </a>
                                    <div class="single_product_text">
                                        <h4>{{ $data_pag->name_products }}</h4>
                                        <h3 class="text-span">{{ number_format($data_pag->product_price) }} บาท
                                            <a href="{{ url('select-car', $data_pag->id) }}" class="add_cart">
                                                ดูรายละเอียดเพิ่มเติม<i class="ti-heart"></i></a>
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
 --}}


</body>

</html>
