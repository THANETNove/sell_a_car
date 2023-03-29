<div class="col-lg-3 car-imag2">
    @php
        $categories = DB::table('categories')->get();
        $carModels = DB::table('car_models')->get();
    @endphp
    <div class="left_sidebar_area">
        <aside class="left_widgets p_filter_widgets">
            <div class="l_w_title">
                <h3>ยี่ห้อ รถยนต์</h3>
            </div>
            <div class="widgets_inner">


                <ul class="list">
                    <li>
                        <a href="{{ url('/') }}">รถยนต์ทั้งหมด</a>
                    </li>

                    @foreach ($categories as $categorie)
                        <li>
                            <a href="{{ url('/search', $categorie->categorie_name) }}">{{ $dataCar->categorie_name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>

        <aside class="left_widgets p_filter_widgets">
            <div class="l_w_title">
                <h3>รุ่น รถยนต์</h3>
            </div>
            <div class="widgets_inner">
                <ul class="list">
                    <li>
                        <a href="{{ url('/') }}">รุ่นรถยนต์ทั้งหมด</a>
                    </li>
                    @foreach ($carModels as $modelCar)
                        <li>
                            <a href="{{ url('/search', $modelCar->model_name) }}">{{ $modelCar->model_name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>
    </div>
</div>
