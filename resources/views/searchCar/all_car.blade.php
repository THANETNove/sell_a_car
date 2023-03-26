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
    {{--     @include('./head/head_slide') --}}

    <br>
    <br>
    <br>
    <br>
    <!--================Category Product Area =================-->
    <section class="">
        <div class="container">
            <div class="row">
                {{--                 @include('./head/manu') --}}
                <div class="col-lg-12">
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
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <a href="{{ url('select-car', $datazone->id) }}">
                                        <img src="{{ URL::asset('/img/product/' . '' . $img[0]) }}" height="180px"
                                            width="100%" alt="...">
                                    </a>
                                    <div class="single_product_text">
                                        <h4>{{ $datazone->name_products }}</h4>
                                        <h3 class="text-span">{{ number_format($datazone->product_price) }} บาท</h3>
                                        <a href="#" class="add_cart">ดูรายละเอียดเพิ่มเติม<i
                                                class="ti-heart"></i></a>
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

    <section class="">
        <div class="container">
            <div class="row">
                {{--                 @include('./head/manu') --}}
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                <div class="single_product_menu">
                                    <p>สินค้าทั้งหมด <span>{{ $dataGree->count() }} รายการ </span></p>
                                </div>

                                {{-- {{ DB::table('add_points')->where('status', 'null')->count() }} --}}
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center latest_product_inner">
                        @foreach ($dataGree as $datage)
                            @php
                                $imgg = json_decode($datage->image);
                                
                            @endphp
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <a href="{{ url('select-car', $datage->id) }}">
                                        <img src="{{ URL::asset('/img/product/' . '' . $imgg[0]) }}" height="180px"
                                            width="100%" alt="...">
                                    </a>
                                    <div class="single_product_text">
                                        <h4>{{ $datage->name_products }}</h4>
                                        <h3 class="text-span">{{ number_format($datage->product_price) }} บาท</h3>
                                        <a href="#" class="add_cart">ดูรายละเอียดเพิ่มเติม<i
                                                class="ti-heart"></i></a>
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

    <!--::subscribe_area part end::-->

    @include('./head/footer')

</body>

</html>
