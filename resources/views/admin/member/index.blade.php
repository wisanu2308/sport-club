@extends('layouts.admin')

@section('content')

<div class="container">
  
  <div class="d-flex flex-row">
      <div class="fw-bold fs-2 text-dark">
          รายการสมาชิก
      </div>
  </div>

  <div class="row">
    <div class="col-md py-3">
      <a href="{{url('/admin/member/add')}}" class="btn btn-primary">
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
          <td class="bg-secondary text-light">Email</td>
          <td class="bg-secondary text-light">Member Name</td>
          <td class="bg-secondary text-light">Tel</td>
          <td class="bg-secondary text-light">Action</td>
        </tr>
        <?php $index = 1; ?>
        @foreach($memberList as $key => $value)
          <tr>
            <td>{{$index}}</td>
            <td>{{$value->username}}</td>
            <td>{{$value->email}}</td>
            <td>{{$value->firstname." ".$value->lastname}}</td>
            <td>{{$value->tel}}</td>
            <td class="text-center">
              <a href="{{url('/admin/member/'.$value->id.'/edit')}}" class="btn btn-sm btn-primary">
                แก้ไข
              </a>
              <a href="{{url('/admin/member/'.$value->id.'/delete')}}" class="btn btn-sm btn-danger" onclick="return confirm('ต้องการลบรายการ?')">
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