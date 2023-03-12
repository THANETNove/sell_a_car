@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-6 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">เติมเงิน</h4>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">

                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <form role="form" class="text-start" method="POST" action="{{ 'add-point' }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">จำนวนเงิน</label>
                                        <input type="number" class="form-control  @error('point') is-invalid @enderror"
                                            name="point" required>
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">ว/ด/ป/เวลา สลิป</label>
                                        <input type="text" class="form-control  @error('car_name') is-invalid @enderror"
                                            name="date" required>
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <select class="form-select" name="point_bank_name"
                                            aria-label="Default select example">
                                            <option value="null" selected>&nbsp;&nbsp;เลือกธนาคารที่โอน</option>
                                            @foreach ($data as $data)
                                                <option value="{{ $data->bank_name }}">{{ $data->bank_name }}
                                                </option>
                                            @endforeach
                                            <option value="อื่นๆ">อื่นๆ</option>
                                        </select>
                                    </div>
                                    @if (session('error'))
                                        <h6 class="error-input1">
                                            {{ session('error') }}
                                        </h6>
                                    @endif
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">ชื่อช่องทางชำระเงินอื่นๆ</label>
                                        <input type="text" class="form-control  @error('other') is-invalid @enderror"
                                            name="other">
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <input class="form-control @error('image.*') is-invalid @enderror" type="file"
                                            id="formFile" name="image" required>
                                        @error('image.*')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }} (PNG,JPEG,JPG)</strong>
                                            </span>
                                        @enderror
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
