@extends('layouts.admin')

@section('content')

<div class="container">

  <div class="d-flex flex-row">
      <div class="fw-bold fs-2 text-dark">
        {{ $form_title }}
      </div>
  </div>

  <form action="{{url('/admin/sport/save')}}" method="post">

    @csrf

    <input type="hidden" name="refId" value="{{ $formData['refId'] }}">

    <div class="row py-2">
      <div class="col-md-4">
        <label>ชื่อกีฬา</label>
        <input type="text" class="form-control" name="txtSportName" value="{{ $formData['frmSportName'] }}">
      </div>
    </div>

    <div class="row py-2">
      <div class="col-md-4">
        <label>Link URL</label>
        <input type="text" class="form-control" name="txtSportURL" value="{{ $formData['frmSportURL'] }}">
      </div>
    </div>

    <div class="row py-2">
      <div class="col-md-4">
        <label>รูปภาพ</label>
        <input type="text" class="form-control" name="txtSportImage" value="{{ $formData['frmSportImage'] }}">
      </div>
    </div>

    <div class="row py-2">
      <div class="col-md-4">
        <label>เปิดใช้งาน</label>
        <select class="form-control" name="txtIsEnabled">
          <?php $selected = $formData['frmIsEnabled'] == 'Y' ? "selected" : ""; ?>
          <option value="Y" {{$selected}} >เปิดใช้งาน</option>
          <?php $selected = $formData['frmIsEnabled'] == 'N' ? "selected" : ""; ?>
          <option value="N" {{$selected}} >ปิดใช้งาน</option>
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