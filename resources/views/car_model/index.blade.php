@extends('layouts.app2')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">รายการเมนูย่อย</h1>
        <p class="mb-4">
            <a href="{{ url('/add-model_car') }}">เพิ่มรายเมนูย่อย</a>
        </p>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-12 col-lg-12">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">รายการเมนูย่อย</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            ลำดับ
                                        </th>
                                        <th>
                                            เมนหลัก
                                        </th>
                                        <th>
                                            เมนูย่อย
                                        </th>
                                        <th>
                                            Date</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                @php
                                    $i = 1;
                                @endphp
                                <tbody>
                                    @foreach ($data as $data)
                                        <tr>
                                            <td>
                                                {{ $i++ }}
                                            <td>
                                                {{ $data->car_brands_name }}</p>
                                            </td>
                                            <td>
                                                {{ $data->model_name }}
                                            </td>
                                            <td>
                                                {{ $data->created_at }}
                                            </td>
                                            <td>
                                                <a href="{{ url('/edit-model_name', $data->id) }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    Edit
                                                </a>
                                            </td>
                                            <td>
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
    </div>
@endsection
