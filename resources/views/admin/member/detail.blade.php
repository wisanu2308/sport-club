@extends('layouts.admin')

@section('content')

<div class="container">

  <div class="d-flex flex-row">
      <div class="fw-bold fs-2 text-dark">
        ข้อมูลสมาชิก
      </div>
  </div>

  <div class="row py-2">
    <div class="col-md-4">
      <label>Username</label>
      <input type="text" class="form-control" name="txtUsername" value="">
    </div>
  </div>

  <div class="row py-2">
    <div class="col-md-4">
      <label>รหัสผ่าน</label>
      <input type="password" class="form-control" name="txtPassword" value="">
    </div>
  </div>

  <div class="row py-2">
    <div class="col-md-4">
      <label>Email</label>
      <input type="text" class="form-control" name="txtEmail" value="">
    </div>
  </div>

  <div class="row py-2">
    <div class="col-md-4">
      <label>Member Name</label>
      <input type="text" class="form-control" name="txTel" value="">
    </div>
  </div>

  <div class="row py-2">
    <div class="col-md-4">
      <label>Tel</label>
      <input type="text" class="form-control" name="txTel" value="">
    </div>
  </div>

</div>

@endsection