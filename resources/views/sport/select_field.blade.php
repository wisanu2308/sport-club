@extends('layouts.default')

@section('sub_title', 'บริการ')

@section('content')

<div class="container-fluid">
    <div class="d-flex flex-row">
        <div class="col-md-3 bg-warning text-center fw-bold fs-4 text-dark py-2">
            เลือกวันและเวลาที่ต้องการจอง
        </div>
    </div>
</div>

<div class="container-fluid px-5 py-4">

    @foreach($fieldList as $key => $value)
        <div class="row justify-content-start bg-secondary bg-opacity-25 rounded shadow-sm py-4 my-3">
            <div class="col-md-4 px-5">
                <div class="d-flex flex-column">
                    <div class="text-center fs-3 fw-bold">{{$value["field_name"]}}</div>
                    <div class="rounded">
                        <!-- <img src="{{ asset($value['IMAGE']) }}" class="img-fluid"> -->
                        <img src="{{ asset('images/sport/field_soccer.png') }}" class="img-fluid">
                    </div>
                </div>
            </div>

            <div class="col-md-8 py-5">
                <div class="row">
                    <?php 
                        $timeList = array(
                            ["time_id" => 1, "title" => "13.00-14.00", "is_available" => "Y"],
                            ["time_id" => 2, "title" => "14.30-15.30", "is_available" => "Y"],
                            ["time_id" => 3, "title" => "16.00-17:00", "is_available" => "Y"],
                            ["time_id" => 4, "title" => "17.30-18.30", "is_available" => "Y"],
                            ["time_id" => 5, "title" => "19.00-20:00", "is_available" => "N"],
                            ["time_id" => 6, "title" => "20:30-21:30", "is_available" => "N"],
                        )                
                    ?> 
                    @foreach($timeList as $timeKey => $time)
                        <div class="col-md-3 px-5">

                            <a href="{{ url('/sport/'.$type.'/form/'.$value['id'].'_'.$time['time_id']) }}" class="app-link">
                                <?php if($time['is_available'] == "Y"){ ?>
                                    <div class="text-center bg-green text-white rounded-pill mb-4 py-2">
                                        {{$time["title"]}}
                                    </div>
                                <?php } else { ?>
                                    <div class="text-center bg-light rounded-pill mb-2 py-2">
                                        {{$time["title"]}}
                                    </div>
                                <?php } ?>
                            </a>

                        </div>
                    @endforeach

                </div>    
            </div>
        </div>

    @endforeach

</div>

@endsection