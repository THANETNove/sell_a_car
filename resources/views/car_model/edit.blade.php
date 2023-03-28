@extends('layouts.app2')

@section('content')
    {{--     <div class="row">
        <div class="col-lg-12 col-md-6 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">เเก้ไข รุ่นรถยนต์</h4>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">

                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <form role="form" class="text-start" method="POST"
                                    action="{{ url('update-model_name', $data->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 my-3">
                                        <label for="exampleFormControlInput1" class="form-label">รุ่นรถยนต์</label>
                                        <input type="text" class="form-control" name="model_name"
                                            value="{{ $data->model_name }}" id="exampleFormControlInput1"
                                            placeholder="รุ่นรถยนต์">
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <select class="form-select" name="id_car_name" aria-label="Default select example">
                                            @foreach ($data_car as $data_car)
                                                @if ($data->id_car_name === $data_car->id)
                                                    <option value="{{ $data_car->id }}" selected>
                                                        &nbsp;&nbsp;{{ $data_car->car_brands_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $data_car->id }}">
                                                        &nbsp;&nbsp;{{ $data_car->car_brands_name }}
                                                    </option>
                                                @endif
                                            @endforeach
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
    </div> --}}

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">รายละเอียดเมนูย่อย</h1>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-12 col-lg-12">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">รายละเอียดเมนูย่อย</h6>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">

                                </div>
                                <div class="col-8">
                                    <form role="form" class="text-start" method="POST"
                                        action="{{ url('update-model_name', $data->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-12">
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">ชื่อเมนูย่อย
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="model_name"
                                                        placeholder="ชื่อเมนูย่อย" value="{{ $data->model_name }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">เมนหลัก
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="id_car_name"
                                                        aria-label="Default select example">
                                                        @foreach ($data_car as $data_car)
                                                            @if ($data->id_car_name == $data_car->id)
                                                                <option value="{{ $data_car->id }}" selected>
                                                                    {{ $data_car->categorie_name }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $data_car->id }}">
                                                                    {{ $data_car->categorie_name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
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
