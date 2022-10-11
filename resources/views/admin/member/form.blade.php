@extends('layouts.admin')

@section('content')

<div class="container">

  <div class="d-flex flex-row">
      <div class="fw-bold fs-2 text-dark">
        {{ $form_title }}
      </div>
  </div>

  <form action="{{url('/admin/member/save')}}" method="post">

    @csrf

    <input type="hidden" name="refId" value="{{ $formData['refId'] }}">

    <div class="row py-2">
      <div class="col-md-4">
        <label>Username</label>
        <?php $readonly = $formData['refId'] !== "" ? "readonly" : "" ?>
        <input type="text" class="form-control" name="txtUsername" value="{{ $formData['frmUsername'] }}" {{ $readonly }}>
      </div>
    </div>

    <div class="row py-2">
      <div class="col-md-4">
        <label>รหัสผ่าน</label>
        <input type="hidden" name="oldPassword" value="{{ $formData['frmPassword'] }}">
        <input type="password" class="form-control" name="txtPassword" value="">
      </div>
    </div>

    <div class="row py-2">
      <div class="col-md-4">
        <label>Email</label>
        <input type="text" class="form-control" name="txtEmail" value="{{ $formData['frmEmail'] }}">
      </div>
    </div>

    <div class="row py-2">
      <div class="col-md-2">
        <label>Firstame</label>
        <input type="text" class="form-control" name="txtFirstName" value="{{ $formData['frmFirstName'] }}">
      </div>
      <div class="col-md-2">
        <label>Lastname</label>
        <input type="text" class="form-control" name="txtLastName" value="{{ $formData['frmLastName'] }}">
      </div>
    </div>

    <div class="row py-2">
      <div class="col-md-4">
        <label>Tel</label>
        <input type="text" class="form-control" name="txTel" value="{{ $formData['frmTel'] }}">
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