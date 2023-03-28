@extends('layouts.app2')

@section('content')
    {{--    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 beet">
                        <h6 class="text-white text-capitalize ps-3">ประวัติการเติมเงิน</h6>
                        <h6 class="text-white text-capitalize ps-3">
                            <a href="{{ url('/create_point') }}" class="btn btn-outline-light">
                                เติมเงิน
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
                                        จำนวนเงิน</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ว/ด/ป สลิป</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ธนาคาร</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ช่องทางชำระอื่นๆ
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        รูปภาพ</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        สถานะ</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($data as $val)
                                    <tr>
                                        <td>
                                            <p>{{ $i++ }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $val->point }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $val->date }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $val->point_bank_name }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $val->other }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <img id="myImg{{ $val->id }}"
                                                src="{{ URL::asset('/img/slip/' . '' . $val->images) }}"
                                                onclick="showImage(this,{{ $val->id }})" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" height="90px" width="80px" alt="...">

                                        </td>
                                        <td class="align-middle text-center">
                                            @if ($val->status == 'approved')
                                                <span
                                                    class="badge badge-sm bg-gradient-success">เติมเงินเข้าสู่ระบบเรียบร้อย</span>
                                            @elseif($val->status == 'reject')
                                                <span
                                                    class="badge badge-sm badge badge badge-sm bg-gradient-danger">สลิปของคุณไม่ผ่าน</span>
                                            @else
                                                <span
                                                    class="badge badge-sm badge badge badge-sm bg-gradient-secondary">รอการตรวจสอบ</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $val->created_at }}</span>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="margin-left: 1%">
                            <samp class="links-css">
                                {!! $data->links() !!}
                            </samp>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">เเจ้งสลิปเติมเงิน</h1>
        <p class="mb-4">
            <a href="{{ url('/create_point') }}">เพิ่มรายการสลิปเติมเงิน</a>
        </p>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-12 col-lg-12">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">รายการสลิปเติมเงิน</h6>
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
                                            จำนวนเงิน</th>
                                        <th>
                                            ว/ด/ป สลิป</th>
                                        <th>
                                            ธนาคาร</th>
                                        <th>
                                            ช่องทางชำระอื่นๆ
                                        </th>
                                        <th>
                                            รูปภาพ</th>
                                        <th>
                                            สถานะ</th>
                                        <th>
                                            date</th>
                                    </tr>
                                    </tr>
                                </thead>
                                @php
                                    $i = 1;
                                @endphp
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($data as $val)
                                        <tr>
                                            <td>
                                                {{ $i++ }}
                                            </td>
                                            <td>
                                                {{ $val->point }}
                                            </td>
                                            <td>
                                                {{ $val->date }}
                                            </td>
                                            <td>
                                                {{ $val->point_bank_name }}
                                            </td>
                                            <td>
                                                {{ $val->other }}
                                            <td>
                                                <img id="myImg{{ $val->id }}"
                                                    src="{{ URL::asset('/img/slip/' . '' . $val->images) }}"
                                                    onclick="showImage(this,{{ $val->id }})" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" height="90px" width="80px"
                                                    alt="...">

                                            </td>
                                            <td>
                                                @if ($val->status == 'approved')
                                                    <span class="text-green-01">เติมเงินเข้าสู่ระบบเรียบร้อย</span>
                                                @elseif($val->status == 'reject')
                                                    <span class="text-red-01">สลิปของคุณไม่ผ่าน</span>
                                                @else
                                                    <span class="text-yellow-01">รอการตรวจสอบ</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $val->created_at }}
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-left: 1%">



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <img id="img1" width="100%">
            </div>
        </div>
    </div>
    <script>
        function showImage(element, i) {
            var modal = document.getElementById('myModal');
            var img = document.getElementById('myImg' + i).src;
            console.log("img", img);
            document.getElementById('img1').src = img;
        }
    </script>
@endsection
