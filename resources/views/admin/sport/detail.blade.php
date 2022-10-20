@extends('layouts.admin')

@section('content')

<div class="container">

  <!-- Sport Detail -->
  <div class="row">
    <div class="col-md">

      <a href="{{url('/admin/sport')}}" class="btn btn-lg btn-secondary">กลับ</a>

      <div class="d-flex flex-row">
        <div class="fw-bold fs-2 text-dark">
          รายละเอียด
        </div>
      </div>

      <div class="row py-2">
        <div class="col-md-1">
          <label>ชื่อกีฬา</label>
        </div>
        <div class="col-md-2">
          {{$dbSport->name}}
        </div>
      </div>

      <div class="row py-2">
        <div class="col-md-1">
          <label>Link URL</label>
        </div>
        <div class="col-md-2">
          {{$dbSport->url}}
        </div>
      </div>

      <div class="row py-2">
        <div class="col-md-1">
          <label>รูปภาพ</label>
        </div>
        <div class="col-md-2">
          {{$dbSport->image}}
        </div>
      </div>

    </div>
  </div>

  <!-- Sport Field-->
  <div class="row">
    <div class="col-md py-5">

      <div class="d-flex flex-row">
        <div class="fw-bold fs-2 text-dark">
          ข้อมูลสนาม
        </div>
      </div>

      <div class="row">
        <div class="col-md py-3">
          <form action="{{url('/admin/sport/'.$dbSport->id.'/add_field')}}" method="post" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="refId" value="{{ $dbSport->id }}">
            <input type="hidden" name="txtSportURL" value="{{ $dbSport->url }}">

            <div class="row">
              <div class="col-md">
                ชื่อสนาม
                <input type="text" class="form-control" name="txtFieldName">
              </div>
              <div class="col-md">
                รูปภาพ
                <input type="file" class="form-control" name="txtFieldImage">
              </div>
              <div class="col-md">
                ราคา
                <input type="text" class="form-control" name="txtFieldPrice">
              </div>
              <div class="col-md">
                .<br>
                <button class="btn btn-success">เพิ่มรายการ</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-md">
          <table class="table table-sm table-hover table-bordered">
            <tr>
              <td class="bg-secondary text-light text-center">No</td>
              <td class="bg-secondary text-light text-center">ชื่อสนาม</td>
              <td class="bg-secondary text-light text-center">รูปภาพ</td>
              <td class="bg-secondary text-light text-center">ราคา</td>
              <td class="bg-secondary text-light text-center">คำสั่ง</td>
            </tr>
            <?php $index = 1; ?>
            @foreach($dbSportField as $key => $value)
              <tr>
                <td class="text-center">{{$index}}</td>
                <td class="text-center">{{$value->field_name}}</td>
                <td class="text-center">{{$value->image}}</td>
                <td class="text-center">{{$value->price}}</td>
                <td class="text-center">
                  <a href="{{url('/admin/sport/'.$dbSport->id.'/delete_field/'.$value->id)}}">
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
  </div>

  <!-- Sport Addons-->
  <div class="row">
    <div class="col-md py-5">

      <div class="d-flex flex-row">
        <div class="fw-bold fs-2 text-dark">
          ข้อมูลอุปกรณ์เพิ่มเติม
        </div>
      </div>

      <div class="row">
        <div class="col-md py-3">
          <form action="{{url('/admin/sport/'.$dbSport->id.'/add_addon')}}" method="post">

            @csrf
            <input type="hidden" name="refId" value="{{ $dbSport->id }}">
            <input type="hidden" name="txtSportURL" value="{{ $dbSport->url }}">

            <div class="row">
              <div class="col-md">
                ชื่ออุปกรณ์
                <input type="text" class="form-control" name="txtAddonName">
              </div>
              <div class="col-md">
                จำนวน
                <input type="text" class="form-control" name="txtAddonQuantity">
              </div>
              <div class="col-md">
                ราคา
                <input type="text" class="form-control" name="txtAddonPrice">
              </div>
              <div class="col-md">
                .<br>
                <button class="btn btn-success">เพิ่มรายการ</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-md">
          <table class="table table-sm table-hover table-bordered">
            <tr>
              <td class="bg-secondary text-light text-center">No</td>
              <td class="bg-secondary text-light text-center">ชื่ออุปกรณ์</td>
              <td class="bg-secondary text-light text-center">จำนวน</td>
              <td class="bg-secondary text-light text-center">ราคา</td>
              <td class="bg-secondary text-light text-center">คำสั่ง</td>
            </tr>
            <?php $index = 1; ?>
            @foreach($dbSportAddon as $key => $value)
              <tr>
                <td class="text-center">{{$index}}</td>
                <td class="text-center">{{$value->addon_name}}</td>
                <td class="text-center">{{$value->qty}}</td>
                <td class="text-center">{{$value->price}}</td>
                <td class="text-center">
                  <a href="{{url('/admin/sport/'.$dbSport->id.'/delete_addon/'.$value->id)}}">
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
  </div>
</div>
@endsection