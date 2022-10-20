@extends('layouts.admin')

@section('content')

<div class="container">

  <div class="d-flex flex-row">
      <div class="fw-bold fs-2 text-dark">
          รายการจองสนาม
      </div>
  </div>

  <div class="row">
    <div class="col-md">
      <table class="table table-bordered table-hover">
        <tr>
          <td class="bg-secondary text-light text-center">#</td>
          <td class="bg-secondary text-light text-center">Booking ID</td>
          <td class="bg-secondary text-light text-center">ชื่อกีฬา</td>
          <td class="bg-secondary text-light text-center">สนาม</td>
          <td class="bg-secondary text-light text-center">วันที่จอง</td>
          <td class="bg-secondary text-light text-center">เวลาที่จอง</td>
          <td class="bg-secondary text-light text-center">จำนวนเงิน</td>
          <td class="bg-secondary text-light text-center">คำสั่ง</td>

        </tr>
        <?php $index = 1; ?>
        @foreach($bookingList as $key => $value)
          <tr>
            <td class="text-center">{{$index}}</td>
            <td class="text-center">{{$value["booking_no"]}}</td>
            <td class="text-center">{{$value["sport_name"]}}</td>
            <td class="text-center">{{$value["sport_field"]}}</td>
            <td class="text-center">{{date("d/m/Y", strtotime($value["booking_date"]))}}</td>
            <td class="text-center">{{$value["booking_time"]}}</td>
            <td class="text-center">{{number_format($value["total_price"])}}</td>
            <td class="text-center">
              <a href="{{url('/admin/booking/'.$value->id)}}" class="btn btn-sm btn-info text-white">รายละเอียด</a>
            </td>
          </tr>
          <?php $index++; ?>
        @endforeach
      </table>
    </div>
  </div>

</div>

@endsection