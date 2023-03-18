@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-6 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">รายละเอียดสินค้า</h4>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">

                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <form role="form" class="text-start" method="POST" action="{{ 'add-post_products' }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">ชื่อสินค้า *</label>
                                        <input type="text" class="form-control" name="name_products" required>

                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        {{-- <label class="form-label">รายละเอียดสินค้า</label> --}}
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="product_details" rows="3"
                                            placeholder="รายละเอียดสินค้า"></textarea>
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">ราคาสินค้า *</label>
                                        <input type="number" class="form-control" name="product_price" required>
                                    </div>
                                    @foreach ($data as $data)
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">จ่าย point เพื่อให้สินค้า อยู่ Hot
                                                Zone ใช้ point ขั้นต่ำ
                                                {{ $data->point_lowest }} point</label>
                                            <input type="number" class="form-control" min="{{ $data->point_lowest }}"
                                                name="hot_zone_price">
                                        </div>
                                        @if (session('error'))
                                            <h6 class="error-input1">
                                                {{ session('error') }}
                                            </h6>
                                        @endif
                                    @endforeach
                                    <div class="input-group input-group-outline my-3">
                                        <input class="form-control @error('image.*') is-invalid @enderror" type="file"
                                            id="formFile" name="image[]" multiple required>
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
