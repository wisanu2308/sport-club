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
          <td class="bg-secondary text-light text-center">No</td>
          <td class="bg-secondary text-light text-center">Username</td>
          <td class="bg-secondary text-light text-center">Role</td>
          <td class="bg-secondary text-light text-center">Action</td>
        </tr>
        <?php $index = 1; ?>
        @foreach($userList as $key => $value)
          <tr>
            <td class="text-center">{{$index}}</td>
            <td class="text-center">{{$value->username}}</td>
            <td class="text-center">{{$value->role}}</td>
            <td class="text-center">
              <?php if($value->username !== 'admin'){ ?>
                <a href="{{url('/admin/user/'.$value->id.'/edit')}}" class="btn btn-sm btn-primary">
                  แก้ไข
                </a>
                <a href="{{url('/admin/user/'.$value->id.'/delete')}}" class="btn btn-sm btn-danger" onclick="return confirm('ต้องการลบรายการ?')">
                  ลบ
                </a>
              <?php } ?>
            </td>
          </tr>
          <?php $index++; ?>
        @endforeach
      </table>
    </div>
  </div>

</div>

@endsection