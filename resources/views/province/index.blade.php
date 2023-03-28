@extends('layouts.app2')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">รายการจังหวัด</h1>
        <p class="mb-4">
            <a href="{{ url('/create-province') }}">เพิ่มรายการจังหวัด</a>
        </p>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-12 col-lg-12">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">รายการจังหวัด</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"> ชื่อจังหวัด </th>
                                        <th scope="col"> delete </th>
                                        <th scope="col"> updated_a </th>
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
                                                <p>{{ $data->province_name }}</p>
                                            </td>
                                            <td>
                                                <a onClick="javascript:return confirm('ข้อมูล  {{ $data->province_name }}  จะถูกลบ คุณต้องการลบข้อมูลใช่หรือไม่ ! ');"
                                                    href="{{ url('/delete-province', $data->id) }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="delete user">
                                                    delete
                                                </a>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $data->created_at }}</span>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div style="margin-left: 1%">

                            {{--    {!! $dataAll->links() !!} --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
