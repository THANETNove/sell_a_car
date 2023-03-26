@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-6 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">ที่อยู่</h4>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">

                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <form role="form" class="text-start" method="POST" action="{{ 'add-point_loweste' }}">
                                    @csrf
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">กำหนด point ขึ้นตำในการ ในการขาย </label>
                                        <input type="number" class="form-control" name="point_loweste" required>
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">จำนวนวันในการขาย </label>
                                        <input type="number" class="form-control" name="point_loweste_date" required>
                                    </div>
                                    <div class="my-3">
                                        <select class="form-select" name="zom_name" aria-label="Default select example">
                                            <option value="โซน HOT" selected>&nbsp;โซน HOT</option>
                                            <option value="โซน ทั่วไป">&nbsp;โซน ทั่วไป</option>
                                        </select>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn bg-gradient-primary w-100 my-4 mb-2">บันทึก</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="col">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
