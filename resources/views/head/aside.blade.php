<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
            target="_blank">
            <img src="{{ URL::asset('img/favicon.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">101landshop</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            {{-- !  ส่วนของ admin  --}}
            @if (Auth::user()->status === 'admin')
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/point-loweste') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">

                            <i class="material-icons opacity-10">add_circle </i>
                        </div>
                        <span class="nav-link-text ms-1">point ขั้นต่ำ</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/money-customers') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">account_balance_wallet</i>
                            @if (DB::table('add_points')->where('status', 'null')->count() > 0)
                                <span class="number-circle">
                                    {{ DB::table('add_points')->where('status', 'null')->count() }}
                                </span>
                            @endif
                        </div>
                        <span class="nav-link-text ms-1">เติมเงิน</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/car_brand') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">time_to_leave</i>
                        </div>
                        <span class="nav-link-text ms-1">ยี่ห้อ รถยนต์</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/car_model') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">toys</i>
                        </div>
                        <span class="nav-link-text ms-1">รุ่น รถยนต์</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/bank_name') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">account_balance</i>
                        </div>
                        <span class="nav-link-text ms-1">เพิ่ม ธนาคาร</span>
                    </a>
                </li>
            @endif

            {{-- !**  user ทั่วไป  --}}
            @if (Auth::user()->status !== 'admin')
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ url('post_products') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">store</i>
                        </div>
                        <span class="nav-link-text ms-1">รายการขาย</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/add_point') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">account_balance_wallet</i>
                        </div>
                        <span class="nav-link-text ms-1">เติมเงิน</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/address') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">pin_drop</i>
                        </div>
                        <span class="nav-link-text ms-1">ที่อยู่</span>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

</aside>
