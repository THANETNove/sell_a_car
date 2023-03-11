@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-6 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">ที่อยู่</h4>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">

                        </div>
                        <div class="col-md-6">
                            <div class="card-body">

                                @foreach ($data as $data)
                                    <form role="form" class="text-start" method="POST"
                                        action="{{ url('update-address', $data->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="{{-- input-group input-group-outline --}} my-3">
                                            <label class="form-label">ชื่อ</label>
                                            <input type="text" class="form-control  @error('fname') is-invalid @enderror"
                                                name="fname" value="{{ $data->fname }}" autofocus required>
                                            @error('fname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="{{-- input-group input-group-outline --}}">
                                            <label class="form-label">นามสกุล</label>
                                            <input type="text" class="form-control  @error('lname') is-invalid @enderror"
                                                name="lname" value="{{ $data->lname }}" required>
                                            @error('lname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="{{-- input-group input-group-outline --}} ">
                                            <label class="form-label">เบอร์โทรติดต่อ</label>
                                            <input type="text" class="form-control @error('tel') is-invalid @enderror"
                                                value="{{ $data->tel }}" name="tel" required>
                                            @error('tel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="{{-- input-group input-group-outline --}}">
                                            <label class="form-label">ที่อยู่</label>
                                            <input type="text"
                                                class="form-control  @error('address') is-invalid @enderror" name="address"
                                                value="{{ $data->address }}" required>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="{{-- input-group input-group-outline --}} ">
                                            <label class="form-label">แขวง/ตําบล</label>
                                            <input type="text"
                                                class="form-control  @error('subDistrict') is-invalid @enderror"
                                                name="subDistrict" value="{{ $data->subDistrict }}" required>
                                            @error('subDistrict')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="{{-- input-group input-group-outline my-3 --}}">
                                            <label class="form-label">เขต/อําเภอ</label>
                                            <input type="text"
                                                class="form-control @error('district') is-invalid @enderror" name="district"
                                                value="{{ $data->district }}" required>
                                            @error('district')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="{{-- input-group input-group-outline my-3 --}}">
                                            <label class="form-label">จังหวัด</label>
                                            <input type="text"
                                                class="form-control @error('province') is-invalid @enderror" name="province"
                                                value="{{ $data->province }}" required>
                                            @error('province')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="{{-- input-group input-group-outline my-3 --}}">
                                            <label class="form-label">รหัสไปรษณีย์</label>
                                            <input type="text"
                                                class="form-control @error('zipCode') is-invalid @enderror" name="zipCode"
                                                value="{{ $data->zipCode }}" required>
                                            @error('zipCode')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="{{-- input-group input-group-outline my-3 --}}">
                                            <label class="form-label">Url facebook</label>
                                            <input type="text" class="form-control" value="{{ $data->facebook }}"
                                                name="facebook">
                                        </div>
                                        <div class="{{-- input-group input-group-outline my-3 --}}">
                                            <label class="form-label">Url Line</label>
                                            <input type="text" class="form-control" value="{{ $data->line }}"
                                                name="line">
                                        </div>
                                        <div class="{{-- input-group input-group-outline my-3 --}}">
                                            <label class="form-label">Url instagram</label>
                                            <input type="text" class="form-control" value="{{ $data->instagram }}"
                                                name="instagram">
                                        </div>
                                        <div class="{{-- input-group input-group-outline my-3 --}}">
                                            <label class="form-label">Url twitter</label>
                                            <input type="text" class="form-control" value="{{ $data->twitter }}"
                                                name="twitter">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn bg-gradient-primary w-100 my-4 mb-2">บันทึก</button>
                                        </div>

                                    </form>
                                @endforeach
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
