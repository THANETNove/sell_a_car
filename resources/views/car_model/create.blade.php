@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-6 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">ยี่ห้อรถยนต์</h4>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">

                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <form role="form" class="text-start" method="POST" action="{{ 'add-model_name' }}">
                                    @csrf
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">ชื่อ รุ่นรถยนต์</label>
                                        <input type="text"
                                            class="form-control  @error('model_name') is-invalid @enderror"
                                            name="model_name" required>
                                        @error('model_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <select class="form-select" name="id_car_name" aria-label="Default select example">
                                            @foreach ($data as $data)
                                                <option value="{{ $data->id }}" selected>
                                                    &nbsp;&nbsp;{{ $data->car_brands_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @php
                                        //  $decoded = json_decode($data, true)
                                        $coun = DB::table('car_brands')->count();
                                        
                                    @endphp

                                    @if ($coun > 0)
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn bg-gradient-primary w-100 my-4 mb-2">บันทึก</button>
                                        </div>
                                    @else
                                        <h3 class="mess">ต้องเพิ่ม ยี่ห้อรถยนต์ ก่อน</h3>
                                    @endif

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
