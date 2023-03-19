<div class="col-lg-3">
    <div class="left_sidebar_area">
        <aside class="left_widgets p_filter_widgets">
            <div class="l_w_title">
                <h3>ยี่ห้อ รถยนต์</h3>
            </div>
            <div class="widgets_inner">


                <ul class="list">

                    @foreach ($carBrands as $dataCar)
                        <li>
                            <a href="#">{{ $dataCar->car_brands_name }}</a>
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

                    @foreach ($carModels as $modelCar)
                        <li>
                            <a href="#">{{ $modelCar->model_name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>
    </div>
</div>
