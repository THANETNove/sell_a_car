@extends('layouts.app2')

@section('content')
    <div class="row">
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
                                    @foreach ($data as $data)
                                        <div class="input-group input-group-outline my-3">
                                            {{--  <label class="form-label">จ่าย point เพื่อให้สินค้า อยู่ Hot
                                                Zone ใช้ point ขั้นต่ำ
                                                {{ $data->point_lowest }} point</label> --}}
                                            <input type="number" class="form-control" min="{{ $data->point_lowest }}"
                                                value="{{ $dataProduct->hot_zone_price }}" name="hot_zone_price"
                                                placeholder="จ่าย point เพื่อให้สินค้า อยู่ Hot Zone ใช้ point ขั้นต่ำ {{ $data->point_lowest }} point">
                                        </div>
                                        @if (session('error'))
                                            <h6 class="error-input1">
                                                {{ session('error') }}
                                            </h6>
                                        @endif
                                    @endforeach
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
    </div>
@endsection
