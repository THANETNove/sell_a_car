@extends('layouts.app2')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">รายการขายทั้งหมด</h1>


        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-12 col-lg-12">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">รายการขายทั้งหมด</h6>
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
                                            ชื่อสินค้า</th>
                                        <th>
                                            รายละเอียดสินค้า</th>
                                        <th>
                                            ราคาสินค้า</th>
                                        <th>
                                            Hon Zone
                                        </th>
                                        <th>
                                            รูปภาพ</th>
                                        <th>
                                            สถานะ</th>
                                        <th>
                                            created_at
                                        </th>

                                        <th>
                                            updated_at</th>

                                    </tr>
                                </thead>
                                @php
                                    $i = 1;
                                @endphp
                                <tbody>
                                    @foreach ($dataAll as $data)
                                        <tr>
                                            <td>
                                                {{ $i++ }}
                                            </td>
                                            <td>
                                                {{ $data->name_products }}
                                            </td>
                                            <td>
                                                {{ $data->product_details }}
                                            </td>
                                            <td>
                                                {{ number_format($data->product_price) }}
                                            </td>
                                            <td>
                                                @if ($data->zom_name == '0')
                                                    โซน HOT
                                                @else
                                                    โซน ทั่วไป
                                                @endif

                                            <td>
                                                @php
                                                    $img = json_decode($data->image);
                                                    $idimg = 0;
                                                @endphp
                                                @foreach ($img as $imgUrl)
                                                    <img src="{{ URL::asset('/img/product/' . '' . $imgUrl) }}"
                                                        onclick="myFunction(`{{ $imgUrl }}`)" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal" height="50px" width="50px"
                                                        alt="...">
                                                @endforeach


                                            </td>
                                            <td>
                                                @if ($data->status == 'expired')
                                                    <span class="text-red-01">หมดอายุเเล้ว</span>
                                                @elseif($data->status == 'cancelSale')
                                                    <span class="text-yellow-01">ยกเลิกการขาย</span>
                                                @else
                                                    <span class="text-green-01">กำลังขาย</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $data->created_at }}
                                            </td>
                                            <td>
                                                {{ $data->updated_at }}
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $dataAll->links() }}
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
        function myFunction(image) {
            const imgSrc = "{{ URL::asset('img/product/') }}/" + image;
            document.getElementById('img1').src = imgSrc;
            console.log("element", imgSrc);
        }
    </script>
@endsection
