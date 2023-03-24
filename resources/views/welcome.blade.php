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
    {{-- 
    @include('./head/head_slide') --}}


    <section class="product_list best_seller section_padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">

                    <div class="best_product_slider owl-carousel">
                        @foreach ($data as $dataone)
                            <div class="single_product_item">
                                <a><img src="{{ URL::asset('/img/advert/' . '' . $dataone->image) }}" height="180px"
                                        width="200px" alt="..."></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="lg-ht">
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
                            {{--   @php
                                dd($datazone->name_products);
                            @endphp --}}
                            @php
                                $img = json_decode($datazone->image);
                                
                            @endphp
                            <div class="col-lg-4 col-sm-6 col-6">
                                <div class="single_product_item">
                                    <a href="{{ url('select-car', $datazone->id) }}">
                                        <img src="{{ URL::asset('/img/product/' . '' . $img[0]) }}" height="180px"
                                            width="100%" alt="...">
                                    </a>

                                    <div class="single_product_text">
                                        <h4>{{ $datazone->name_products }}</h4>
                                        <h3 class="text-span">{{ number_format($datazone->product_price) }} บาท</h3>
                                        <a href="{{ url('select-car', $datazone->id) }}"
                                            class="add_cart">ดูรายละเอียดเพิ่มเติม<i class="ti-heart"></i></a>
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



    <!-- product_list part start-->

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



    @include('./head/footer')

</body>

</html>
