@extends('layouts.app2')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">เเจ้งสลิปเติมเงิน</h1>
        <p class="mb-4">
            <a href="{{ url('/create_point') }}"> <button type="button" class="btn btn-primary">เติมเงินโฆษณา</button></a>
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
