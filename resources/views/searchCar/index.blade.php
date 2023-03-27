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



    <!--================Category Product Area =================-->

    @foreach ($dataZone as $datazone)
        @php
            $img = json_decode($datazone->image);
            
        @endphp
        <div class="product_image_area section_padding">
            <div class="container">
                <div class="row s_product_inner justify-content-between">
                    <div class="col-lg-7 col-xl-7">
                        <div class="product_slider_img">
                            <div id="vertical">
                                @foreach ($img as $imgUrl)
                                    <div data-thumb="{{ URL::asset('/img/product/' . '' . $imgUrl) }}">
                                        <img src="{{ URL::asset('/img/product/' . '' . $imgUrl) }}" style="width: 100%" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-4">
                        <div class="s_product_text">
                            <h5>previous <span>|</span> next</h5>
                            <h3>{{ $datazone->name_products }}</h3>
                            <h2>{{ number_format($datazone->product_price) }} บาท</h2>
                            <ul class="list">
                                <li>
                                    <a class="active" href="#">
                                        <span>สถานะ</span> : กำลังขาย</a>
                                </li>
                                <li>
                                    <a> <span>วันที่ลงขาย</span> :
                                        {{ date('Y-m-d', strtotime($datazone->created_at)) }}</a>
                                </li>
                            </ul>
                            <p>
                                {{ $datazone->product_details }}
                            </p>
                            <div class="card_area d-flex justify-content-between align-items-center">
                                @if ($datazone->facebook)
                                    <a href="{{ $datazone->facebook }}" target='_blank' class="btn_3">ติดต่อเรา
                                        <i class="fab fa-facebook-f text-span" style="font-size: 20px "></i></a>
                                @else
                                    <a href="#" class="btn_3">ติดต่อเรา
                                        <i class="fab fa-facebook-f text-span" style="font-size: 20px "></i></a>
                                @endif
                                @if ($datazone->line)
                                    <a href="{{ $datazone->line }}" target='_blank' class="btn_3">ติดต่อเรา
                                        <i class="fab fa-line text-span" style="font-size: 20px "></i></a>
                                @else
                                    <a href="#" class="btn_3">ติดต่อเรา
                                        <i class="fab fa-line text-span" style="font-size: 20px "></i></a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <section class="product_list best_seller">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>รายการที่เกี่ยวข้อง <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        @foreach ($dataAll as $data)
                            @php
                                $img = json_decode($data->image);
                                
                            @endphp
                            <div class="single_product_item">
                                <a href="{{ url('select-car', $data->id) }}"><img
                                        src="{{ URL::asset('/img/product/' . '' . $img[0]) }}" height="180px"
                                        width="200px" alt="..."></a>

                                <div class="single_product_text">

                                    <h4>{{ $data->name_products }}</h4>
                                    <h3 class="text-span">{{ number_format($data->product_price) }}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>


    <!--::subscribe_area part end::-->

    @include('./head/footer')


</body>

</html>
