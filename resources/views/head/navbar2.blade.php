<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">

            <h6 class="font-weight-bolder mb-0">
                @if (session('message'))
                    <p class="mess"> {{ session('message') }}</p>
                @endif
            </h6>
        </nav>
        <?php
        $pathname = $_SERVER['REQUEST_URI'];
        $pathParts = explode('/', $pathname);
        $desiredPart = $pathParts[4];
        ?>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            @if ($desiredPart == 'post_products' || $desiredPart == 'all-products' || $desiredPart == 'home')
                <div class="ms-md-auto pe-md-4 d-flex align-items-center">
                    <div class="input-group input-group-outline">
                        {{--  <label class="form-label">Search</label>
                    <input type="text" class="form-control"> --}}
                        <form
                            @if ($desiredPart == 'post_products') action="{{ url('/post_products') }}"
                             @elseif($desiredPart == 'all-products')  action="{{ url('/all-products') }}"
                             @elseif($desiredPart == 'home')  action="{{ url('/home') }}" @endif
                            method="post">
                            @csrf
                            <div class="row">
                                <div class="col mt-3">
                                    <input class="form-control me-2" name="search" type="text" placeholder="Search"
                                        aria-label="Search">
                                </div>
                                <div class="col mt-3">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group input-group-outline">
                    </div>
                </div>
            @endif

            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a class="btn btn-outline-primary btn-sm mb-0 me-3">{{ Auth::user()->point }} point</a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link text-body font-weight-bold px-0">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none"> {{ Auth::user()->username }}</span>
                    </a>
                    <input type="text" id='status-auth' name="users" value="{{ Auth::user()->status }}"
                        style="display:none;">

                    {{--     <p id='status-auth' style="display:none">{{ Auth::user()->status }}</p> --}}
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
