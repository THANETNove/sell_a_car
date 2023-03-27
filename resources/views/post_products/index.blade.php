@extends('layouts.app2')

@section('content')
    {{--     <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 beet">
                        <h6 class="text-white text-capitalize ps-3">รายการสิค้าที่ขาย</h6>
                        <h6 class="text-white text-capitalize ps-3">
                            <a href="{{ url('/create-post_products') }}" class="btn btn-outline-light">
                                post สินค้า
                            </a>
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 text-center ">

                            <thead>
                                <tr>
                                    <th
                                        class="ext-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ลำดับ
                                    </th>
                                    <th
                                        class="ext-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ชื่อสินค้า</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                       ชื่อสินค้า รายละเอียดสินค้า</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      ชื่อสินค้า รายละเอียดสินค้า  ราคาสินค้า</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ชื่อสินค้า รายละเอียดสินค้า  ราคาสินค้า  วันหมดอายุ
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      ชื่อสินค้า รายละเอียดสินค้า  ราคาสินค้า  วันหมดอายุ    หมวดหมู่
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ชื่อสินค้า รายละเอียดสินค้า  ราคาสินค้า  วันหมดอายุ    หมวดหมู่   โซน
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ชื่อสินค้า รายละเอียดสินค้า  ราคาสินค้า  วันหมดอายุ    หมวดหมู่   โซน   รูปภาพ</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ชื่อสินค้า รายละเอียดสินค้า  ราคาสินค้า  วันหมดอายุ    หมวดหมู่   โซน   รูปภาพ     สถานะ</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         ชื่อสินค้า รายละเอียดสินค้า  ราคาสินค้า  วันหมดอายุ    หมวดหมู่   โซน   รูปภาพ     สถานะ updated_at</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($dataAll as $data)
                                    <tr>
                                        <td>
                                            <p>{{ $i++ }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $data->name_products }}</p>
                                        </td>
                                        <td class="col-first">

                                            <samp class="text-xs font-weight-bold mb-0">{{ $data->product_details }}</samp>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ number_format($data->product_price) }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $data->expiration_date }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $data->categorie_name }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                @if ($data->zom_name == '0')
                                                    โซน HOT
                                                @else
                                                    โซน ทั่วไป
                                                @endif
                                            </span>
                                        </td>
                                        @php
                                            $img = json_decode($data->image);
                                            $idimg = 0;
                                        @endphp
                                        <td class="align-middle text-center">
                                            @foreach ($img as $imgUrl)
                                                <img src="{{ URL::asset('/img/product/' . '' . $imgUrl) }}"
                                                    onclick="myFunction(`{{ $imgUrl }}`)" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" height="50px" width="50px"
                                                    alt="...">
                                            @endforeach


                                        </td>
                                        <td class="align-middle text-center">
                                            @if ($data->status == 'expired')
                                                <span class="badge badge-sm bg-gradient-danger">หมดอายุเเล้ว</span>
                                            @elseif($data->status == 'cancelSale')
                                                <span
                                                    class="badge badge-sm badge badge badge-sm bg-gradient-secondary">ยกเลิกการขาย</span>
                                            @else
                                                <span
                                                    class="badge badge-sm badge badge badge-sm bg-gradient-success">กำลังขาย</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            @if ($data->status == 'null')
                                                <form role="form" class="text-start" method="POST"
                                                    action="{{ url('destroy-post_products', $data->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3 my-3" style="display:none">
                                                        <input type="text" class="form-control" name="exp_cas"
                                                            value="cancelSale" id="exampleFormControlInput1">
                                                    </div>
                                                    <br>
                                                    <button type="submit" class="btn btn-sm">ยกเลิก</button>
                                                </form>
                                            @endif
                                            @if ($data->status == 'expired')
                                                <a href="{{ url('renew-post_products', $data->id) }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    ต่ออายุ
                                                </a>
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            @if ($data->status != 'cancelSale')
                                                <a href="{{ url('edit-post_products', $data->id) }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    Edit
                                                </a>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $data->created_at }}</span>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="margin-left: 1%">
                            <samp class="links-css">
                                {!! $dataAll->links() !!}
                            </samp>
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
    </script> --}}

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">รายการขาย</h1>
        <p class="mb-4">
            <a href="{{ url('/create-post_products') }}">เพิ่มรายการขาย</a>
        </p>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-12 col-lg-12">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">รายการขาย</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"> ชื่อสินค้า </th>
                                        <th scope="col">รายละเอียด</th>
                                        <th scope="col"> ราคาสินค้า </th>
                                        <th scope="col"> วันหมดอายุ </th>
                                        <th scope="col"> หมวดหมู่ </th>
                                        <th scope="col"> รูปภาพ </th>
                                        <th scope="col"> โซน </th>
                                        <th scope="col"> สถานะ </th>
                                        <th scope="col"></th>
                                        <th scope="col"> </th>
                                        <th scope="col"> updated_a </th>
                                    </tr>
                                </thead>
                                @php
                                    $i = 1;
                                @endphp
                                <tbody>
                                    @foreach ($dataAll as $data)
                                        <tr>
                                            <td>
                                                <p>{{ $i++ }}</p>
                                            </td>
                                            <td>
                                                <p>{{ $data->name_products }}</p>
                                            </td>
                                            <td>

                                                {{ $data->product_details }}
                                            </td>
                                            <td>
                                                {{ number_format($data->product_price) }}
                                            </td>
                                            <td>

                                                {{ $data->expiration_date }}
                                            </td>
                                            <td>
                                                {{ $data->categorie_name }}
                                            </td>
                                            <td>
                                                @if ($data->zom_name == '0')
                                                    โซน HOT
                                                @else
                                                    โซน ทั่วไป
                                                @endif

                                            </td>
                                            @php
                                                $img = json_decode($data->image);
                                                $idimg = 0;
                                            @endphp
                                            <td>
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
                                            <td class="text-center">
                                                @if ($data->status == 'null')
                                                    <form role="form" class="text-start" method="POST"
                                                        action="{{ url('destroy-post_products', $data->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3 my-3" style="display:none">
                                                            <input type="text" class="form-control" name="exp_cas"
                                                                value="cancelSale" id="exampleFormControlInput1">
                                                        </div>
                                                        <br>
                                                        <button type="submit" class="btn btn-sm">ยกเลิก</button>
                                                    </form>
                                                @endif
                                                @if ($data->status == 'expired')
                                                    <a href="{{ url('renew-post_products', $data->id) }}"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        ต่ออายุ
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                @if ($data->status != 'cancelSale')
                                                    <a href="{{ url('edit-post_products', $data->id) }}"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        Edit
                                                    </a>
                                                @endif
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

                            {!! $dataAll->links() !!}

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
