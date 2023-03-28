@extends('layouts.app2')

@section('content')
    {{--     <div class="row">
        <div class="col-lg-12 col-md-6 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">เเก้ไขเมนู</h4>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">

                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <form role="form" class="text-start" method="POST"
                                    action="{{ url('update-manu', $data->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group input-group-outline my-3">
                                 
                                        <input type="text" class="form-control  @error('manu_name') is-invalid @enderror"
                                            name="manu_name" value="{{ $data->categorie_name }}" required>
                                        @error('manu_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <input class="form-control @error('image') is-invalid @enderror" type="file"
                                            id="formFile" name="image">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }} (PNG,JPEG,JPG,WEBP)</strong>
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
    </div> --}}

    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">เมนู</h1>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-12 col-lg-12">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">รายละเอียดเมนู</h6>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">

                                </div>
                                <div class="col-8">
                                    <form role="form" class="text-start" method="POST"
                                        action="{{ url('update-manu', $data->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-12">
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">ชื่อ เมนู
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="manu_name"
                                                        placeholder="ชื่อ เมนู" value="{{ $data->categorie_name }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">รูปภาพ
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control @error('image') is-invalid @enderror"
                                                        type="file" id="formFile" name="image" multiple>
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
