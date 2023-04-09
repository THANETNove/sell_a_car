@extends('layouts.app2')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">รายงานการเข้าใช้งาน</h1>


        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-12 col-lg-12">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">รายงานการเข้าใช้งาน</h6>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <canvas id="myChart" style="width:100%"></canvas>
                            {{--  <p>สมัครสามชิกทั้งหมด {{ $users }} คน</p>
                            @foreach ($usersByMonth as $usersMonth)
                                <p>การเข้าใช้งานเว็บทั้งหมดของเดือน {{ $usersMonth->month_name }}
                                    {{ $usersMonth->count }} คน</p>
                            @endforeach
                            <p>การเข้าใช้งานเว็บทั้งหมดของปี ปัจจุบัน {{ $userYear }} คน</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $.ajax({
            url: `{{ url('get-chart') }}`,
            type: 'GET',
            success: function(res) {




                var xValues = [];
                var yValues = [];
                for (let i = 0; i < res.length; i++) {
                    /*         console.log("res[i].model_name", res[i]); */
                    xValues.push(res[i].month_name)
                    yValues.push(res[i].count)
                }

                var barColors = ["#009688", "#259b24", "#9c27b0", "#673ab7", "#3f51b5", "#5677fc",
                    "#03a9f4", "#00bcd4", "#009688", "#259b24", "#8bc34a", "#cddc39"
                ];
                let thaiYear = new Date().getFullYear() + 543;

                new Chart("myChart", {
                    type: "bar",
                    data: {
                        labels: xValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: `จำนวนการเข้าใช้งานปี ${thaiYear}`
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });



            }
        });
    </script>
@endsection
