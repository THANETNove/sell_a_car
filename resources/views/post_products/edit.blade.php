@extends('layouts.app2')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">เเก้ไขรายละเอียดสินค้า</h1>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-12 col-lg-12">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">เเก้ไขรายละเอียดสินค้า</h6>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">

                                </div>
                                <div class="col-8">
                                    <form role="form" class="text-start" method="POST"
                                        action="{{ url('update-post_products', $dataProduct->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-12">
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">ชื่อสินค้า
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="name_products"
                                                        value="{{ $dataProduct->name_products }}" placeholder="ชื่อสินค้า">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">รายละเอียดสินค้า
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" value="{{ $dataProduct->product_details }}"
                                                        name="product_details" rows="3" placeholder="รายละเอียดสินค้า">{{ $dataProduct->product_details }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">ราคาสินค้า
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control"
                                                        value="{{ $dataProduct->product_price }}" name="product_price"
                                                        placeholder="1000" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">หมวดหมู่สินค้า
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="categorie_name"
                                                        aria-label="Default select example">
                                                        <option value="null" selected>&nbsp;หมวดหมู่สินค้า</option>
                                                        @foreach ($manu as $manu1)
                                                            @if ($manu1->categorie_name == $dataProduct->categorie_name)
                                                                <option value="{{ $manu1->categorie_name }}" selected>
                                                                    {{ $manu1->categorie_name }}</option>
                                                            @else
                                                                <option value="{{ $manu1->categorie_name }}">
                                                                    {{ $manu1->categorie_name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @if (session('errorCategorie'))
                                                        <h6 class="error-input1">
                                                            {{ session('errorCategorie') }}
                                                        </h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">หมวดหมู่สินค้า
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="zom_name"
                                                        aria-label="Default select example">
                                                        <option value="null" selected>&nbsp;เลือกโซน</option>
                                                        @foreach ($data as $data)
                                                            @if ($data->point_lowest == $dataProduct->zom_name)
                                                                <option value="{{ $data->point_lowest }}" selected>
                                                                    @if ($data->point_lowest != 0)
                                                                        &nbsp; {{ $data->point_lowest }} &nbsp; พ้อน &nbsp;
                                                                        {{ $data->point_loweste_date }}
                                                                        วัน
                                                                        {{ $data->zom_name }}
                                                                    @else
                                                                        &nbsp; ไม่มีค่าใช้จ่าย &nbsp;
                                                                        {{ $data->point_loweste_date }}
                                                                        วัน
                                                                        {{ $data->zom_name }}
                                                                    @endif
                                                                </option>
                                                            @else
                                                                <option value="{{ $data->point_lowest }}">
                                                                    @if ($data->point_lowest != 0)
                                                                        &nbsp; {{ $data->point_lowest }} &nbsp; พ้อน &nbsp;
                                                                        {{ $data->point_loweste_date }}
                                                                        วัน
                                                                        {{ $data->zom_name }}
                                                                    @else
                                                                        &nbsp; ไม่มีค่าใช้จ่าย &nbsp;
                                                                        {{ $data->point_loweste_date }}
                                                                        วัน
                                                                        {{ $data->zom_name }}
                                                                    @endif
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @if (session('errorZom'))
                                                        <h6 class="error-input1">
                                                            {{ session('errorZom') }}
                                                        </h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">รูปภาพ
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control @error('image.*') is-invalid @enderror"
                                                        type="file" id="formFile" name="image[]" multiple>
                                                    @error('image.*')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }} (PNG,JPEG,JPG,WEBP)</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2"
                                                style="color: white">บันทึก</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col">

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
