<header class="">
    <div class="">
        <div class="row align-items-center">
            <div class="col-lg-12">

                {{--  <nav class="navbar fixed-top navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ url('/') }}"> <img src="{{ URL::asset('/img/favicon.png') }}"
                            alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">หน้าเเรก</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ยี่ห้อรถ
                                </a>
                                @php
                                    $carBrands = DB::table('car_brands')->get();
                                    
                                @endphp
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    @foreach ($carBrands as $dataCar)
                                        <a class="dropdown-item"
                                            href="{{ url('/search', $dataCar->car_brands_name) }}">{{ $dataCar->car_brands_name }}</a>
                                    @endforeach
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/all-car') }}">สินค้าทั้งหมด</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    บริการ
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="{{ url('/login') }}">เข้าสู่ระบบ</a>
                                    <a class="dropdown-item" href="{{ url('/register') }}">สมัครสามชิก</a>
                                </div>

                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="contact.html">ติดต่อเรา</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="{{ url('/#') }}">Facebook</a>
                                    <a class="dropdown-item" href="{{ url('/#') }}">Line</a>
                                    <a class="dropdown-item" href="{{ url('/#') }}">instagram</a>
                                    <a class="dropdown-item" href="{{ url('/#') }}">twitter</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">
                        <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-line"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <div class="dropdown cart">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cart-plus"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="single_product">

                                </div>
                            </div>

                        </div>
                    </div>
                </nav> --}}
                <div class="bg-lg">
                    <nav class="navbar bg-primary fixed-top" data-bs-theme="dark">
                        <div class="container-fluid">
                            <a class="navbar-brand">Navbar</a>
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </div>
    {{--     <div class="search_input" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn">ค้นหา</button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div> --}}
</header>
