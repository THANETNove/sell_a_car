<header class="">
    <div class="">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="bg-lg">
                    <nav class="navbar fixed-top  bg-primary navbar-expand-lg ">
                        <a class="navbar-brand car-imag2" href="{{ url('/') }}"> <img
                                src="{{ URL::asset('/img/favicon.png') }}" alt="logo"> </a>
                        <div class="hearer_icon col-9 col-md-8 col-lg-6">
                            <form class="d-flex" role="search" action="{{ url('searchCar') }}" method="post">
                                @csrf
                                <input class="form-control col-12 me-2" type="search" name="search"
                                    placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                        <div class="" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link navbar-nav-login" href="{{ url('/login') }}">เข้าสู่ระบบ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link navbar-nav-login" href="{{ url('/register') }}">สมัครสามชิก</a>
                                </li>
                            </ul>
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
