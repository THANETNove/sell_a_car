@extends('layouts.app2')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">รายละเอียดสินค้า</h1>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-12 col-lg-12">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">รายละเอียดสินค้า</h6>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">

                                </div>
                                <div class="col-8">
                                    <form role="form" class="text-start" method="POST" action="{{ 'add-point' }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-12">
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">ชื่อบัญชี
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="bank_name"
                                                        placeholder="ชื่อบัญชี" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">จำนวนเงิน
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" name="point"
                                                        placeholder="1000" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">ว/ด/ป/เวลา
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="point"
                                                        placeholder="ว/ด/ป/เวลา สลิป (ตัวอย่าง 8 ม.ค 66 11:54)" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">เลขที่รายการ
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="other"
                                                        placeholder="013082CD..." required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">เลือกธนาคารที่โอน
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="point_bank_name"
                                                        aria-label="Default select example">
                                                        <option value="null" selected>เลือกธนาคารที่โอน
                                                        </option>
                                                        @foreach ($data as $data)
                                                            <option value="{{ $data->bank_name }}">{{ $data->bank_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if (session('error'))
                                                        <h6 class="error-input1">
                                                            {{ session('error') }}
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
                                                    <input class="form-control @error('image') is-invalid @enderror"
                                                        type="file" id="formFile" name="image" multiple required>
                                                    @error('image')
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
