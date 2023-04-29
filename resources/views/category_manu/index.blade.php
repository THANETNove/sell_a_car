@extends('layouts.app2')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">รายการเมนู</h1>
        <p class="mb-4">
            <a href="{{ url('create_manu') }}"> <button type="button" class="btn btn-primary">เพิ่มเมนู</button></a>
        </p>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-12 col-lg-12">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">รายการเมนู</h6>
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
                                            เมนู</th>
                                        <th>
                                            ภาพเมนู</th>
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
                                    @foreach ($data as $data1)
                                        <tr>
                                            <td>
                                                <p>{{ $i++ }}</p>
                                            </td>
                                            <td>
                                                {{ $data1->categorie_name }}
                                            </td>
                                            <td>

                                                <img src="{{ URL::asset('/img/icon/' . '' . $data1->image) }}"
                                                    onclick="myFunction(`{{ $data1->image }}`)" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" height="40px" width="40px"
                                                    alt="...">

                                            </td>
                                            <td>
                                                <a href="{{ url('/edit-manu', $data1->id) }}"
                                                    class="text-secondary font-weight-bold text-xs" data1-toggle="tooltip"
                                                    data-original-title="delete user">
                                                    edit
                                                </a>
                                            </td>
                                            <td>
                                                <a onClick="javascript:return confirm('ข้อมูล  {{ $data1->categorie_name }} ทั้งหมด จะถูกลบ คุณต้องการลบข้อมูลใช่หรือไม่ ! ');"
                                                    href="{{ url('/delete-manu', $data1->id) }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="delete user">
                                                    delete
                                                </a>
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
        function myFunction(image) {
            const imgSrc = "{{ URL::asset('img/icon/') }}/" + image;
            document.getElementById('img1').src = imgSrc;
            console.log("element", imgSrc);
        }
    </script>
@endsection
