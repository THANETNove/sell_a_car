<!--::footer_part start::-->
@php
    $categorieFooter = DB::table('post_products')
        ->rightJoin('categories', 'post_products.categorie_name_id', '=', 'categories.id')
        ->select('categories.categorie_name', DB::raw('COUNT(*) as count'))
        ->groupBy('categories.categorie_name')
        ->orderBy('count', 'desc')
        ->take(4) // take only the 4th item
        ->get();
    
    $carModelsFooter = DB::table('post_products')
        ->select('post_products.sub_category', DB::raw('COUNT(*) as count'))
        ->whereNotNull('sub_category')
        ->groupBy('post_products.sub_category')
        ->orderBy('count', 'desc')
        ->take(4) // take only the 4th item
        ->get();
    $carModelsFooter2 = DB::table('post_products')
        ->select('post_products.sub_category', DB::raw('COUNT(*) as count'))
        ->whereNotNull('sub_category')
        ->groupBy('post_products.sub_category')
        ->orderBy('count', 'desc')
        ->skip(4) // skip the first three items
        ->take(4) // take only the 4th item
        ->get();
    $currentMonth = date('m'); // get the current month in the format 'mm'
    $dataFooter3 = DB::table('post_products')
        ->whereMonth('post_products.created_at', '=', $currentMonth)
        ->orderBy('post_products.id', 'DESC')
        ->take(5) // take only the 4th item
        ->get();
    
    /*     dd($dataFooter3); */
    
@endphp
<footer class="">
    <div class="container">
        <hr class="hr" />
    </div>
</footer>


<footer class="footer_part">
    <div class="container">
        <div class="row justify-content-around">


            <div class="col-sm-6 col-lg-2">
                <div class="single_footer_part">
                    <h4>Top Products</h4>
                    <ul class="list-unstyled">
                        @foreach ($categorieFooter as $categorie)
                            <li><a
                                    href="{{ url('/searchPo-ma', $categorie->categorie_name) }}">{{ $categorie->categorie_name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="single_footer_part">
                    <h4>Quick Links</h4>
                    <ul class="list-unstyled">
                        <li><a target="_blank"
                                href="https://login.live.com/login.srf?wa=wsignin1.0&rpsnv=13&ct=1683270715&rver=7.0.6737.0&wp=MBI_SSL&wreply=https%3a%2f%2foutlook.live.com%2fowa%2f%3fcobrandid%3dab0455a0-8d03-46b9-b18b-df2f57b9e44c%26nlp%3d1%26deeplink%3dowa%252f%253frealm%253dhotmail.co.th%26RpsCsrfState%3d5f2b1f5d-3958-a473-dcd2-b937142ed8b4&id=292841&aadredir=1&whr=hotmail.co.th&CBCXT=out&lw=1&fl=dob%2cflname%2cwld&cobrandid=ab0455a0-8d03-46b9-b18b-df2f57b9e44c">Email:
                                101landshop@gmail.com</a></li>
                        <li><a target="_blank" href="https://www.tiktok.com/@101landshop">tiktok</a></li>
                        <li><a target="_blank"
                                href="https://www.facebook.com/profile.php?id=100092294259760">Facebook</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="single_footer_part">
                    <h4>สินค้านิยม</h4>
                    <ul class="list-unstyled">
                        @foreach ($carModelsFooter as $carModels)
                            <li><a
                                    href="{{ url('/searchPo-ma', $carModels->sub_category) }}">{{ $carModels->sub_category }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="single_footer_part">
                    <h4>Top 10 products</h4>
                    <ul class="list-unstyled">
                        @foreach ($carModelsFooter2 as $carModels2)
                            <li><a
                                    href="{{ url('/searchPo-ma', $carModels2->sub_category) }}">{{ $carModels2->sub_category }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="single_footer_part">
                    <h4>new product</h4>
                    <ul class="list-unstyled">
                        @foreach ($dataFooter3 as $carModels3)
                            <li><a href="{{ url('/select-car', $carModels3->id) }}">{{ $carModels3->name_products }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="copyright_text">
                        <P>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i
                                class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                target="_blank">101landshop</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </P>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer_icon social_icon">
                        <ul class="list-unstyled">
                            <li><a target="_blank" href="https://www.facebook.com/profile.php?id=100092294259760"
                                    class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a target="_blank" href="https://www.tiktok.com/@101landshop"
                                    class="single_social_icon"> <img src="{{ URL::asset('img/tiktok_512.webp') }}"
                                        class="tiktok_512"></a>
                            </li>
                            <li><a target="_blank"
                                    href="https://login.live.com/login.srf?wa=wsignin1.0&rpsnv=13&ct=1683270715&rver=7.0.6737.0&wp=MBI_SSL&wreply=https%3a%2f%2foutlook.live.com%2fowa%2f%3fcobrandid%3dab0455a0-8d03-46b9-b18b-df2f57b9e44c%26nlp%3d1%26deeplink%3dowa%252f%253frealm%253dhotmail.co.th%26RpsCsrfState%3d5f2b1f5d-3958-a473-dcd2-b937142ed8b4&id=292841&aadredir=1&whr=hotmail.co.th&CBCXT=out&lw=1&fl=dob%2cflname%2cwld&cobrandid=ab0455a0-8d03-46b9-b18b-df2f57b9e44c"
                                    class="single_social_icon"><i class="fas fa-globe"></i></a></li>
                            {{--   <li><a href="#" class="single_social_icon"><i class="fab fa-behance"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--::footer_part end::-->

<!-- jquery plugins here-->
<script src="{{ URL::asset('js/jquery-1.12.1.min.js') }}"></script>
<!-- popper js -->
<script src="{{ URL::asset('js/popper.min.js') }}"></script>
<!-- bootstrap js -->
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<!-- easing js -->
<script src="{{ URL::asset('js/jquery.magnific-popup.js') }}"></script>
<!-- swiper js -->
<script src="{{ URL::asset('js/swiper.min.js') }}"></script>
<!-- swiper js -->
<script src="{{ URL::asset('js/masonry.pkgd.j') }}s"></script>
<!-- particles js -->
<script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.nice-select.min.js') }}"></script>
<!-- slick js -->
<script src="{{ URL::asset('js/slick.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.counterup.min.js') }}"></script>
<script src="{{ URL::asset('js/waypoints.min.js') }}"></script>
<script src="{{ URL::asset('js/contact.js') }}"></script>
<script src="{{ URL::asset('js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.form.js') }}"></script>
<script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('js/mail-script.js') }}"></script>
<!-- custom js -->
<script src="{{ URL::asset('js/custom.js') }}"></script>
<script src="{{ URL::asset('js/stellar.js') }}"></script>
<script src="{{ URL::asset('js/price_rangs.js') }}"></script>
<script src="{{ URL::asset('js/lightslider.min.js') }}"></script>
<script src="{{ URL::asset('js/theme.js') }}"></script>
<script src="{{ URL::asset('js/custom.js') }}"></script>
