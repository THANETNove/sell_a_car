@extends('layouts.app2')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">รายการธนาคาร</h1>
        <p class="mb-4">
            <a href="{{ url('/create_bank_name') }}">
                <button type="button" class="btn btn-primary">เพิ่มรายธนาคาร</button></a>
        </p>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-12 col-lg-12">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">รายการธนาคาร</h6>
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
                                            ชื่อธนาคารเเละ เลขบัญชี</th>
                                        <th>
                                            Date</th>
                                        <th></th>
                                        <th>
                                        </th>
                                    </tr>
                                </thead>
                                @php
                                    $i = 1;
                                @endphp
                                <tbody>
                                    @foreach ($data as $data)
                                        <tr>
                                            <td>
                                                <p>{{ $i++ }}</p>
                                            </td>
                                            <td>
                                                {{ $data->bank_name }}
                                            </td>
                                            <td>
                                                {{ $data->created_at }}
                                            </td>
                                            <td>
                                                <a onClick="javascript:return confirm('ข้อมูลรถยนต์   {{ $data->bank_name }} ทั้งหมด จะถูกลบ คุณต้องการลบข้อมูลใช่หรือไม่ ! ');"
                                                    href="{{ url('/delete-bank_name', $data->id) }}"
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
