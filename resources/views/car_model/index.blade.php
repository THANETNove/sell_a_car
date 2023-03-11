@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 beet">
                        <h6 class="text-white text-capitalize ps-3">รุ่นรถยนต์</h6>
                        <h6 class="text-white text-capitalize ps-3">
                            <a href="{{ url('/add-model_car') }}" class="btn btn-outline-light">
                                เพิ่ม รุ่นรถยนต์
                            </a>
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 text-center ">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1 ">
                                        ลำดับ
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                        ยี่ห้อรถยนต์
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                        รุ่นรถยนต์
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date</th>
                                    <th class="text-secondary opacity-7"></th>
                                    <th class="text-secondary opacity-7"></th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($data as $data)
                                    <tr>
                                        <td>
                                            <p>{{ $i++ }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $data->car_brands_name }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $data->model_name }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $data->created_at }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ url('/edit-model_name', $data->id) }}"
                                                class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="Edit user">
                                                Edit
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <a onClick="javascript:return confirm('ข้อมูลรุ่นรถยนต์   {{ $data->model_name }}  จะถูกลบ คุณต้องการลบข้อมูลใช่หรือไม่ ! ');"
                                                href="{{ url('/delete-model_name', $data->id) }}"
                                                class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="delete user">
                                                delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
