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
          <td class="bg-secondary text-light">No</td>
          <td class="bg-secondary text-light">Sport Name</td>
          <td class="bg-secondary text-light">Sport URL</td>
          <td class="bg-secondary text-light">Image</td>
          <td class="bg-secondary text-light">Action</td>
        </tr>
        <?php $index = 1; ?>
        @foreach($sportList as $key => $value)
          <tr>
            <td>{{$index}}</td>
            <td>{{$value->name}}</td>
            <td>{{$value->url}}</td>
            <td>{{$value->image}}</td>
            <td>
              <a href="{{url('/admin/sport/'.$value->id.'/detail')}}">
                <button class="btn btn-sm btn-info text-white">ดูข้อมูล</button>
              </a>
              <a href="{{url('/admin/sport/'.$value->id.'/edit')}}">
                <button class="btn btn-sm btn-primary">แก้ไข</button>
              </a>
              <a href="{{url('/admin/sport/'.$value->id.'/delete')}}">
                <button class="btn btn-sm btn-danger" onclick="return confirm('ต้องการลบรายการ?')">ลบ</button>
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