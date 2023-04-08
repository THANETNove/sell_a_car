@extends('layouts.app2')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">ตรวจสอบสลิปเติมเงิน</h1>


        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-12 col-lg-12">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">รายการสลิปเติมเงิน</h6>
                        @php
                            $sum = DB::table('add_points')
                                ->where('add_points.status', '!=', 'null')
                                ->sum('point');
                        @endphp
                        <br>
                        <h5>จำนวนเงินทั้งหมด {{ number_format($sum) }} บาท</h5>
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
                                            UserName</th>
                                        <th>
                                            ชื่อบัญชี</th>
                                        <th>
                                            จำนวนเงิน</th>
                                        <th>
                                            ว/ด/ป สลิป</th>
                                        <th>
                                            ธนาคาร</th>
                                        <th>
                                            เลขที่รายการ
                                        </th>
                                        <th>
                                            รูปภาพ</th>
                                        <th>
                                            สถานะ</th>
                                        <th>
                                            date</th>
                                    </tr>
                                </thead>
                                @php
                                    $i = 1;
                                @endphp
                                <tbody>
                                    @foreach ($data as $data1)
                                        <tr>
                                            <td>
                                                <p>{{ $i++ }}</p>
                                            </td>
                                            <td>
                                                {{ $data1->username }}
                                            </td>
                                            <td>
                                                {{ $data1->bank_name }}
                                            </td>
                                            <td>
                                                {{ number_format($data1->point) }}
                                            </td>
                                            <td>
                                                {{ $data1->date }}
                                            <td>
                                                {{ $data1->point_bank_name }}
                                            </td>
                                            <td>
                                                {{ $data1->other }}
                                            </td>
                                            <td>
                                                <img id="myImg{{ $data1->id }}"
                                                    src="{{ URL::asset('/img/slip/' . '' . $data1->images) }}"
                                                    onclick="showImage(this,{{ $data1->id }})" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" height="90px" width="80px"
                                                    alt="...">

                                            </td>
                                            <td>

                                                @if ($data1->status === 'approved')
                                                    <p style="color: green">สำเร็จ</p>
                                                @else
                                                    <p style="color: red">ไม่สำเร็จ</p>
                                                @endif


                                            </td>
                                            <td>
                                                {{ $data1->created_at }}
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div style="margin-left: 1%">

                            {!! $data->links() !!}

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
