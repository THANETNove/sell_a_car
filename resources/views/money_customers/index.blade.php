@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 beet">
                        <h6 class="text-white text-capitalize ps-3">ตรวจเช็คสลิก เเละเติมเงิน</h6>
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
                                        UserName</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                        ชื่อบัญชี</th>
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
                                @foreach ($data as $data1)
                                    <tr>
                                        <td>
                                            <p>{{ $i++ }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $data1->username }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $data1->bank_name }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $data1->point }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $data1->date }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $data1->point_bank_name }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $data1->other }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <img id="myImg{{ $data1->id }}"
                                                src="{{ URL::asset('/img/slip/' . '' . $data1->images) }}"
                                                onclick="showImage(this,{{ $data1->id }})" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" height="90px" width="80px" alt="...">

                                        </td>
                                        <td class="align-middle text-center">
                                            <div style="padding-left: 100px">
                                                <div class="row col-10">
                                                    <div class="col-12 col-md-6">
                                                        <form role="form" class="text-start" method="POST"
                                                            action="{{ url('update-point', $data1->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3 my-3" style="display:none">
                                                                <input type="text" class="form-control" name="add_point"
                                                                    value="{{ $data1->point }}"
                                                                    id="exampleFormControlInput1">
                                                                <input type="text" class="form-control" name="app_rej"
                                                                    value="approved" id="exampleFormControlInput1">
                                                            </div>
                                                            <button type="submit" class="btn btn-success">เติมเงิน</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <form role="form" class="text-start" method="POST"
                                                            action="{{ url('update-point', $data1->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3 my-3" style="display:none">
                                                                <input type="text" class="form-control" name="car_name"
                                                                    value="{{ $data1->point }}"
                                                                    id="exampleFormControlInput1">
                                                                <input type="text" class="form-control" name="app_rej"
                                                                    value="reject" id="exampleFormControlInput1">
                                                            </div>
                                                            <button type="submit" class="btn btn-danger">ปฏิเสธ</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $data1->created_at }}</span>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $data->links() !!}
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
