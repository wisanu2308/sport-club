@extends('layouts.default')

@section('sub_title', 'รายการจองของฉัน')

@section('content')

<div class="container-fluid">
    <div class="d-flex flex-row">
        <div class="col-md-3 bg-warning text-center fw-bold fs-1 text-dark py-2">
            MY BOOKING
        </div>
    </div>
</div>


<div class="container">
    
    <div class="row justify-content-start py-5">
        <div class="col-md">
            <table class="table table-bordered table-hover text-center">
                <tr>
                    <td>#</td>
                    <td>Booking ID</td>
                    <td>Sport Name</td>
                    <td>Sport Field</td>
                    <td>Booking Date</td>
                    <td>Booking Time</td>
                    <td>Total Price</td>
                    <td>Action</td>
                </tr>
                <?php $index = 1 ?>
                @foreach($dbBooking as $key => $value)
                    <tr>
                        <td>{{$index}}</td>
                        <td>{{$value["booking_no"]}}</td>
                        <td>{{$value["sport_name"]}}</td>
                        <td>{{$value["sport_field"]}}</td>
                        <td>{{date("d/m/Y", strtotime($value["booking_date"]))}}</td>
                        <td>{{$value["booking_time"]}}</td>
                        <td>{{$value["total_price"]}}</td>
                        <td>
                            <a href="{{url('/mybooking/'.$value['id'])}}" class="btn btn-sm btn-info text-white">รายละเอียด</a>
                        </td>
                    </tr>
                    <?php $index++ ?>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection