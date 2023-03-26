@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 beet">
                        <h6 class="text-white text-capitalize ps-3">ราคาในโซน HOT</h6>
                        <h6 class="text-white text-capitalize ps-3">
                            <a href="{{ url('/create-point_loweste') }}" class="btn btn-outline-light">
                                เพิ่ม ราคา
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
                                        จำนวนพ้อย</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                        จำนวนวันในการขาย</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        โซน</th>
                                    <th class="text-secondary opacity-7">
                                        delete
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($data as $data1)
                                    <tr>
                                        <td>
                                            <p>{{ $i++ }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $data1->point_lowest }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $data1->point_loweste_date }} วัน
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $data1->zom_name }}</p>
                                        </td>


                                        <td class="align-middle">
                                            <a onClick="javascript:return confirm('ข้อมูล  {{ $data1->point_lowest }} ทั้งหมด จะถูกลบ คุณต้องการลบข้อมูลใช่หรือไม่ ! ');"
                                                href="{{ url('/delete-point_lowest', $data1->id) }}"
                                                class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="delete user">
                                                delete
                                            </a>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $data1->created_at }}</span>
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
