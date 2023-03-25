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


    <div class="container">
        <div class="row">
            <div class="box-image01-1">
                <img src="{{ URL::asset('/img/banner2.webp') }}" height="100%" width="100%" alt="...">

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="box-manu01-1">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <p class="text-Shop">Shop by category</p>
                            <div class="row">
                                <div class="col-md-2 col-sm-6 col-6 box-img-home">

                                    <img src="{{ URL::asset('/img/icon/car.png') }}" height="40" width="40"
                                        alt="...">
                                    <a href="http://">
                                        <p class="text-category">รถยนต์ มือสอง</p>
                                    </a>
                                </div>
                                <div class="col-md-2 col-sm-6  col-6 box-img-home">
                                    <img src="{{ URL::asset('/img/icon/motorbike.png') }}" height="40" width="40"
                                        alt="...">
                                    <p class="text-category">รถมอเตอร์ไซค์ มือสอง</p>
                                </div>
                                <div class="col-md-2 col-sm-6 col-6 box-img-home">
                                    <img src="{{ URL::asset('/img/icon/smartphone.png') }}" height="40"
                                        width="40" alt="...">
                                    <p class="text-category">โทรศัพท์ มือถือ</p>
                                </div>
                                <div class="col-md-2 col-sm-6 col-6 box-img-home">
                                    <img src="{{ URL::asset('/img/icon/camera.png') }}" height="40" width="40"
                                        alt="...">
                                    <p class="text-category">กล้องถ่ายรูป</p>
                                </div>
                                <div class="col-md-2 col-sm-6 col-6 box-img-home">
                                    <img src="{{ URL::asset('/img/icon/desktop-computer.png') }}" height="40"
                                        width="40" alt="...">
                                    <p class="text-category">คอมพิวเตอ์</p>
                                </div>
                                <div class="col-md-2 col-sm-6 col-6 box-img-home">
                                    <img src="{{ URL::asset('/img/icon/electric-appliance.png') }}" height="40"
                                        width="40" alt="...">
                                    <p class="text-category">เครื่องใช้ไฟฟ้า</p>
                                </div>
                                <div class="col-md-2 col-sm-6 col-6 box-img-home">
                                    <img src="{{ URL::asset('/img/icon/clothes-hanger.png') }}" height="40"
                                        width="40" alt="...">
                                    <p class="text-category">>เสื้อผ้า เครื่องแต่งกาย</p>
                                </div>
                                <div class="col-md-2 col-sm-6 col-6 box-img-home">
                                    <img src="{{ URL::asset('/img/icon/balls-sports.png') }}" height="40"
                                        width="40" alt="...">
                                    <p class="text-category">อุปกรณ์กีฬา</p>
                                </div>
                                <div class="col-md-2 col-sm-6 col-6 box-img-home">
                                    <img src="{{ URL::asset('/img/icon/playtime.png') }}" height="40" width="40"
                                        alt="...">
                                    <p class="text-category">แม่และเด็ก</p>
                                </div>
                                <div class="col-md-2 col-sm-6 col-6 box-img-home">
                                    <img src="{{ URL::asset('/img/icon/guitar.png') }}" height="40" width="40"
                                        alt="...">
                                    <p class="text-category">อุปกรณ์ดนตรี</p>
                                </div>
                                <div class="col-md-2 col-sm-6 col-6 box-img-home">
                                    <img src="{{ URL::asset('/img/icon/game-console.png') }}" height="40"
                                        width="40" alt="...">
                                    <p class="text-category">เกมส์</p>
                                </div>
                                <div class="col-md-2 col-sm-6 col-6 box-img-home">
                                    <img src="{{ URL::asset('/img/icon/bike.png') }}" height="40" width="40"
                                        alt="...">
                                    <p class="text-category">จักรยาน</p>
                                </div>
                                <div class="col-md-2 col-sm-6 col-6 box-img-home">
                                    <img src="{{ URL::asset('/img/icon/smart-tv.png') }}" height="40" width="40"
                                        alt="...">
                                    <p class="text-category">โทรทัศน์ TV</p>
                                </div>
                                <div class="col-md-2 col-sm-6 col-6 box-img-home">
                                    <img src="{{ URL::asset('/img/icon/chihuahua.png') }}" height="40"
                                        width="40" alt="...">
                                    <p class="text-category">>สัตว์เลี้ยง</p>
                                </div>
                                <div class="col-md-2 col-sm-6 col-6 box-img-home">
                                    <img src="{{ URL::asset('/img/icon/wrist-watch.png') }}" height="40"
                                        width="40" alt="...">
                                    <p class="text-category">นาฬิกา</p>
                                </div>
                                <div class="col-md-2 col-sm-6 col-6 box-img-home">
                                    <img src="{{ URL::asset('/img/icon/all.png') }}" height="40" width="40"
                                        alt="...">
                                    <p class="text-category">สินค้าอื่นๆ</p>
                                </div>
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
                                        <img src="{{ URL::asset('/img/product/' . '' . $imgp[0]) }}"
                                            class="image-car" height="150" width="150" alt="...">
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
