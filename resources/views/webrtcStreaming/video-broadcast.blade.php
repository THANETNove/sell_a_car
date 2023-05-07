@extends('layouts.app2')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">รายการขาย</h1>
        {{--   <p class="mb-4">
            <a href="{{ url('') }}"><button type="button" class="btn btn-primary">ลงขายสินค้า</button></a>


        </p>
 --}}
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
                            {{--     @php
                                dd($type);
                            @endphp --}}

                            <div id="app">
                                <home-component></home-component>
                                @if ($type === 'broadcaster')
                                    <broadcaster :auth_user_id="{{ $id }}" env="{{ env('APP_ENV') }}"
                                        turn_url="{{ env('TURN_SERVER_URL') }}"
                                        turn_username="{{ env('TURN_SERVER_USERNAME') }}"
                                        turn_credential="{{ env('TURN_SERVER_CREDENTIAL') }}" />
                                @else
                                    <viewer stream_id="{{ $streamId }}" :auth_user_id="{{ $id }}"
                                        turn_url="{{ env('TURN_SERVER_URL') }}"
                                        turn_username="{{ env('TURN_SERVER_USERNAME') }}"
                                        turn_credential="{{ env('TURN_SERVER_CREDENTIAL') }}" />
                                @endif
                            </div>

                            {{--  @if ($type === 'broadcaster')
                                <broadcaster :auth_user_id="{{ $id }}" env="{{ env('APP_ENV') }}"
                                    turn_url="{{ env('TURN_SERVER_URL') }}"
                                    turn_username="{{ env('TURN_SERVER_USERNAME') }}"
                                    turn_credential="{{ env('TURN_SERVER_CREDENTIAL') }}" />
                            @else
                                <viewer stream_id="{{ $streamId }}" :auth_user_id="{{ $id }}"
                                    turn_url="{{ env('TURN_SERVER_URL') }}"
                                    turn_username="{{ env('TURN_SERVER_USERNAME') }}"
                                    turn_credential="{{ env('TURN_SERVER_CREDENTIAL') }}" />
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
