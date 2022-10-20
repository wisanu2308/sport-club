@extends('layouts.admin')

@section('content')

<div class="container">

  <div class="row">
    <div class="col-md">
      <h1><b>Dashboard</b></h1>
    </div>
  </div>

  <div class="row">

    <div class="col-md-6 my-2">
      <div class="card">
        <div class="card-body py-5 text-center">
          <h3 class="card-title">จำนวนการจอง</h3>
          <div class="h2 fw-bold">
            {{$countBooking}}
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 my-2">
      <div class="card">
        <div class="card-body py-5 text-center">
          <h3 class="card-title">จำนวนประเภทกีฬา</h3>
          <div class="h2 fw-bold">
            {{$countSport}}
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 my-2">
      <div class="card">
        <div class="card-body py-5 text-center">
          <h3 class="card-title">จำนวนสนามทั้งหมด</h3>
          <div class="h2 fw-bold">
            {{$countSportField}}
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 my-2">
      <div class="card">
        <div class="card-body py-5 text-center">
          <h3 class="card-title">จำนวนสมาชิก</h3>
          <div class="h2 fw-bold">
            {{$countMember}}
          </div>
        </div>
      </div>
    </div>

  </div>

  
</div>

@endsection