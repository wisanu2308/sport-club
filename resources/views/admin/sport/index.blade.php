@extends('layouts.admin')

@section('content')

<div class="container">

  <div class="d-flex flex-row">
      <div class="fw-bold fs-2 text-dark">
          รายการกีฬา
      </div>
  </div>

  <div class="row">
    <div class="col-md py-3">
      <a href="{{url('/admin/sport/add')}}" class="btn btn-primary">
        เพิ่มข้อมูล
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col-md">
      <table class="table table-bordered table-hover">
        <tr>
          <td class="bg-secondary text-light text-center">No</td>
          <td class="bg-secondary text-light text-center">ชื่อกีฬา</td>
          <td class="bg-secondary text-light text-center">ลิงค์ URL</td>
          <td class="bg-secondary text-light text-center">รูปภาพ</td>
          <td class="bg-secondary text-light text-center">คำสั่ง</td>
        </tr>
        <?php $index = 1; ?>
        @foreach($sportList as $key => $value)
          <tr>
            <td class="text-center">{{$index}}</td>
            <td class="text-center">{{$value->name}}</td>
            <td class="text-center">{{$value->url}}</td>
            <td class="text-center">{{$value->image}}</td>
            <td class="text-center">
              <a href="{{url('/admin/sport/'.$value->id)}}" class="btn btn-sm btn-info">
                จัดการข้อมูล
              </a>
              <a href="{{url('/admin/sport/'.$value->id.'/edit')}}" class="btn btn-sm btn-primary">
                แก้ไข
              </a>
              <a href="{{url('/admin/sport/'.$value->id.'/delete')}}" class="btn btn-sm btn-danger" onclick="return confirm('ต้องการลบรายการ?')">
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