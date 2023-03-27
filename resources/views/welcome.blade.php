<!doctype html>
<html lang="zxx">

<head>
    {{--  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>aranoz</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css"> --}}
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
                    <div class="banner_slider owl-carousel">
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
    {{--     <section class="product_list best_seller section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Best Sellers <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        <div class="single_product_item">
                            <img src="img/product/product_1.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_2.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_3.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_4.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_5.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!--::subscribe_area part end::-->


    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    {{--     <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script> --}}

    @include('./head/footer')
</body>

</html>
