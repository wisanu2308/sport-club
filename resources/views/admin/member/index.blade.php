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
          <td class="bg-secondary text-light text-center">No</td>
          <td class="bg-secondary text-light text-center">Username</td>
          <td class="bg-secondary text-light text-center">Email</td>
          <td class="bg-secondary text-light text-center">ชื่อ</td>
          <td class="bg-secondary text-light text-center">เบอร์โทร</td>
          <td class="bg-secondary text-light text-center">คำสั่ง</td>
        </tr>
        <?php $index = 1; ?>
        @foreach($memberList as $key => $value)
          <tr>
            <td class="text-center">{{$index}}</td>
            <td class="text-center">{{$value->username}}</td>
            <td class="text-center">{{$value->email}}</td>
            <td class="text-center">{{$value->firstname." ".$value->lastname}}</td>
            <td class="text-center">{{$value->tel}}</td>
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