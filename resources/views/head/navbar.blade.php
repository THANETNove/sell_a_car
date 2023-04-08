{{-- <header class="">
    <div class="">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="bg-lg">
                    <nav class="navbar fixed-top  bg-primary navbar-expand-lg ">
                        <a class="navbar-brand car-imag2" href="{{ url('/') }}"> <img
                                src="{{ URL::asset('/img/favicon.png') }}" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="hearer_icon col-9  col-sm-9 col-md-8 col-lg-6">
                            <form class="d-flex" role="search" action="{{ url('searchCar') }}" method="post">
                                @csrf
                                <input class="form-control col-12 me-2" type="search" name="search"
                                    placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
</header> --}}
<nav class="navbar" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand car-imag2" href="{{ url('/') }}"> <img src="{{ URL::asset('/img/favicon.png') }}"
                alt="logo"> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class=" col-8  col-sm-8 col-md-8 col-lg-8">
            <form class="d-flex" role="search" action="{{ url('searchCar') }}" method="post">
                @csrf
                <input class="form-control col-12 me-2" type="search" name="search" placeholder="Search"
                    aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
