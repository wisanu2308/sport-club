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
                    <td>Action</td>
                </tr>
                <?php $index = 1 ?>
                @foreach($dbBooking as $key => $value)
                    <tr>
                        <td>{{$index}}</td>
                        <td>{{$value["name"]}}</td>
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