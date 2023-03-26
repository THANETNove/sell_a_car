@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-6 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">เเก้ไข รายละเอียดสินค้า </h4>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">

                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <form role="form" class="text-start" method="POST"
                                    action="{{ url('update-post_products', $dataProduct->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group input-group-outline my-3">
                                        {{-- <label class="form-label">ชื่อสินค้า *</label> --}}
                                        <input type="text" class="form-control" value="{{ $dataProduct->name_products }}"
                                            name="name_products" placeholder="ชื่อสินค้า *" required>

                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        {{-- <label class="form-label">รายละเอียดสินค้า</label> --}}
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="product_details" rows="3"
                                            placeholder="รายละเอียดสินค้า" value="{{ $dataProduct->product_details }}">{{ $dataProduct->product_details }}</textarea>
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        {{-- <label class="form-label">ราคาสินค้า *</label> --}}
                                        <input type="number" class="form-control" value="{{ $dataProduct->product_price }}"
                                            placeholder="ราคาสินค้า *" name="product_price" required>
                                    </div>
                                    <div class="my-3">
                                        <select class="form-select" name="categorie_name"
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
                                    </div>
                                    @if (session('errorCategorie'))
                                        <h6 class="error-input1">
                                            {{ session('errorCategorie') }}
                                        </h6>
                                    @endif
                                    <div class="my-3">
                                        <select class="form-select" name="zom_name" aria-label="Default select example">
                                            <option value="null">&nbsp;เลือกโซน</option>
                                            @foreach ($data as $data)
                                                @if ($data->point_lowest == $dataProduct->zom_name)
                                                    <option value="{{ $data->point_lowest }}" selected>
                                                        @if ($data->point_lowest != 0)
                                                            &nbsp; {{ $data->point_lowest }} &nbsp; พ้อน &nbsp;
                                                            {{ $data->point_loweste_date }}
                                                            วัน
                                                            {{ $data->zom_name }}
                                                        @else
                                                            &nbsp; ไม่มีค่าใช้จ่าย &nbsp; {{ $data->point_loweste_date }}
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
                                                            &nbsp; ไม่มีค่าใช้จ่าย &nbsp; {{ $data->point_loweste_date }}
                                                            วัน
                                                            {{ $data->zom_name }}
                                                        @endif
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>

                                    </div>
                                    @if (session('errorZom'))
                                        <h6 class="error-input1">
                                            {{ session('errorZom') }}
                                        </h6>
                                    @endif
                                    <div class="input-group input-group-outline my-3">
                                        <input class="form-control @error('image.*') is-invalid @enderror" type="file"
                                            id="formFile" name="image[]" multiple>
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
