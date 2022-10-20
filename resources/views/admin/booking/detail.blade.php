@extends('layouts.admin')

@section('content')

<div class="container">

  <div class="row">
    <div class="col-md h1">
      รายละเอียดการจอง
    </div>
  </div>

  <div class="row py-2">
    <div class="col-md-2"> <label>ชื่อผู้จอง</label> </div>
    <div class="col-md-2"> {{$dbBooking->member_name}} </div>
  </div>

  <div class="row py-2">
    <div class="col-md-2"> <label>กีฬา</label> </div>
    <div class="col-md-2"> {{$dbBooking->sport_name}} </div>
  </div>

  <div class="row py-2">
    <div class="col-md-2"> <label>สนาม</label> </div>
    <div class="col-md-2"> {{$dbBooking->sport_field}} </div>
  </div>

  <div class="row py-2">
    <div class="col-md-2"> <label>วันที่จอง</label> </div>
    <div class="col-md-2"> {{date('d/m/Y', strtotime($dbBooking->booking_date))}} </div>
  </div>

  <div class="row py-2">
    <div class="col-md-2"> <label>เวลาที่จอง</label> </div>
    <div class="col-md-2"> {{$dbBooking->booking_time}} </div>
  </div>

  <div class="row py-2">
    <div class="col-md-2"> <label>จำนวนเงิน</label> </div>
    <div class="col-md-2"> {{number_format($dbBooking->total_price, 2)}} บาท</div>
  </div>

    <!-- Sport Addons-->
  <div class="row">
    <div class="col-md py-5">

      <div class="d-flex flex-row">
        <div class="fw-bold fs-2 text-dark">
          ข้อมูลอุปกรน์เพิ่มเติม
        </div>
      </div>

      <div class="row">
        <div class="col-md">
          <table class="table table-sm table-hover table-bordered">
            <tr>
              <td class="bg-secondary text-light">No</td>
              <td class="bg-secondary text-light">ชื่ออุปกรณ์</td>
              <td class="bg-secondary text-light">จำนวน</td>
              <td class="bg-secondary text-light">ราคา (บาท)</td>
            </tr>
            <?php $index = 1; ?>
            @foreach($dbBookingAddon as $key => $value)
              <tr>
                <td>{{$index}}</td>
                <td>{{$value->addon_name}}</td>
                <td>{{$value->qty}}</td>
                <td>{{number_format($value->price)}}</td>
              </tr>
              <?php $index++; ?>
            @endforeach
          </table>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md text-center">
        <a href="{{url('/admin/booking')}}" class="btn btn-lg btn-secondary">กลับ</a>
      </div>
    </div>

  </div>

    
</div>

@endsection