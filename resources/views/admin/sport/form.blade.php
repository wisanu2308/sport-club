@extends('layouts.admin')

@section('content')

<div class="container">
  

  <div class="d-flex flex-row">
      <div class="fw-bold fs-2 text-dark">
        เพิ่มรายการกีฬา
      </div>
  </div>

  <form action="{{url('/admin/sport/save')}}" method="post">

    @csrf

    <div class="row py-2">
      <div class="col-md-4">
        <label>ชื่อกีฬา</label>
        <input type="text" class="form-control" name="txtSportName" value="">
      </div>
    </div>

    <div class="row py-2">
      <div class="col-md-4">
        <label>Link URL</label>
        <input type="text" class="form-control" name="txtSportURL" value="">
      </div>
    </div>

    <div class="row py-2">
      <div class="col-md-4">
        <label>รูปภาพ</label>
        <input type="text" class="form-control" name="txtSportImage" value="">
      </div>
    </div>

    <div class="row py-2">
      <div class="col-md-4">
        <label>เปิดใช้งาน</label>
        <select class="form-control" name="txtIsEnabled">
          <option value="Y">เปิดใช้งาน</option>
          <option value="N">ปิดใช้งาน</option>
        </select>
      </div>
    </div>

    <div class="row py-2">
      <div class="col-md-4">
        <button class="btn btn-lg btn-primary">บันทึก</button>
      </div>
    </div>

  </form>
</div>

@endsection