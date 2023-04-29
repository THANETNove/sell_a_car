@extends('layouts.app2')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">รายการโฆษณา</h1>

        <p class="mb-4">
            <a href="{{ url('/create-advert') }}">
                <button type="button" class="btn btn-primary">เพิ่มโฆษณา</button></a>
        </p>
        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-12 col-lg-12">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">รายการโฆษณา</h6>
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
                                            รูปภาพ</th>

                                        <th>
                                            เเก้ไขโฆษณา
                                        </th>
                                        <th>
                                            ลบโฆษณา
                                        </th>
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
                                    @foreach ($data as $img)
                                        <tr>
                                            <td>
                                                {{ $i++ }}
                                            </td>
                                            <td>
                                                <img src="{{ URL::asset('/img/advert/' . '' . $img->image) }}"
                                                    onclick="myFunction(`{{ $img->image }}`)" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" height="50px" width="50px"
                                                    alt="...">

                                            </td>
                                            <td>
                                                <a href="{{ url('edit-advert', $img->id) }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    Edit
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ url('delete-advert', $img->id) }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    delete
                                                </a>
                                            </td>
                                            <td>
                                                {{ $img->created_at }}
                                            </td>
                                            <td>
                                                {{ $img->updated_at }}
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
            const imgSrc = "{{ URL::asset('img/advert/') }}/" + image;
            document.getElementById('img1').src = imgSrc;
            console.log("element", imgSrc);
        }
    </script>
@endsection
