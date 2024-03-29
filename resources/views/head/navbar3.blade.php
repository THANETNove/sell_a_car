<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <h6 class="font-weight-bolder mb-0">
        @if (session('message'))
            <p class="mess"> {{ session('message') }}</p>
        @endif
    </h6>
    <?php
    $pathname = $_SERVER['REQUEST_URI'];
    $ex = explode('/', $pathname);
    
    $desiredPart = $ex[3];
    
    ?>
    @if (
        $desiredPart == 'post_products' ||
            $desiredPart == 'all-products' ||
            $desiredPart == 'home' ||
            $desiredPart == 'rep-customers' ||
            $desiredPart == 'money-customers')
        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
            @if ($desiredPart == 'post_products') action="{{ url('/post_products') }}"
            @elseif($desiredPart == 'all-products')  action="{{ url('/all-products') }}"
            @elseif($desiredPart == 'money-customers')  action="{{ url('/money-customers') }}"
            @elseif($desiredPart == 'rep-customers')  action="{{ url('/rep-customers') }}"
            @elseif($desiredPart == 'home')  action="{{ url('/home') }}" @endif
            method="post">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" name="search"
                    placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    @endif

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <div>
            <img class="image-shell" src="{{ URL::asset('assets/img/shell2.png') }}">
        </div>
        <br>
        {{ number_format(Auth::user()->point) }}
        point

        <!-- Nav Item - Messages -->


        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ Auth::user()->username }}</span>
                <img class="img-profile rounded-circle" src="{{ URL::asset('assets/img/undraw_profile.svg') }}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>

    </ul>

</nav>
