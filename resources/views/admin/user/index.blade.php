@extends('layouts.admin')

@section('content')

<div class="container">

  <div class="d-flex flex-row">
      <div class="fw-bold fs-2 text-dark">
          รายการผู้ใช้งานระบบ
      </div>
  </div>

  <div class="row">
    <div class="col-md py-3">
      <a href="{{url('/admin/user/add')}}" class="btn btn-primary">
        เพิ่มข้อมูล
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col-md">
      <table class="table table-bordered table-hover">
        <tr>
          <td class="bg-secondary text-light">No</td>
          <td class="bg-secondary text-light">Username</td>
          <td class="bg-secondary text-light">Role</td>
          <td class="bg-secondary text-light">Action</td>
        </tr>
        <?php $index = 1; ?>
        @foreach($userList as $key => $value)
          <tr>
            <td>{{$index}}</td>
            <td>{{$value->username}}</td>
            <td>{{$value->role}}</td>
            <td>
              <a href="{{url('/admin/user/'.$value->id.'/edit')}}" class="btn btn-sm btn-primary">
                แก้ไข
              </a>
              <a href="{{url('/admin/user/'.$value->id.'/delete')}}" class="btn btn-sm btn-danger" onclick="return confirm('ต้องการลบรายการ?')">
                ลบ
              </a>
            </td>
          </tr>
          <?php $index++; ?>
        @endforeach
      </table>
    </div>
  </div>

</div>

@endsection