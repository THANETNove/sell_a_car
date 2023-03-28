@extends('layouts.app2')

@section('content')
    {{--     <div class="row">
        <div class="col-lg-12 col-md-6 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">ต่ออายุ </h4>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">

                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <form role="form" class="text-start" method="POST"
                                    action="{{ url('update-renew', $dataProduct->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="my-3">
                                        <select class="form-select" name="zom_name" aria-label="Default select example">
                                            <option value="null" selected>&nbsp;เลือกโซน</option>
                                            @foreach ($data as $data)
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
                                            @endforeach
                                        </select>

                                    </div>
                                    @if (session('errorZom'))
                                        <h6 class="error-input1">
                                            {{ session('errorZom') }}
                                        </h6>
                                    @endif
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn bg-gradient-primary w-100 my-4 mb-2">ต่ออายุ</button>
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
    </div> --}}

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
                                        action="{{ url('update-renew', $dataProduct->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')


                                        <div class="col-12">
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">หมวดหมู่สินค้า
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="zom_name"
                                                        aria-label="Default select example">
                                                        <option value="null" selected>&nbsp;เลือกโซน</option>
                                                        @foreach ($data as $data)
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
