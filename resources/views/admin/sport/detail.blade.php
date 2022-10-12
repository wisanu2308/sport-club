@extends('layouts.admin')

@section('content')

<div class="container">

  <!-- Sport Detail -->
  <div class="row">
    <div class="col-md">

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
          <form action="{{url('/admin/sport/'.$dbSport->id.'/add_field')}}" method="post">

            @csrf
            <input type="hidden" name="refId" value="{{ $dbSport->id }}">
            <input type="hidden" name="txtSportURL" value="{{ $dbSport->url }}">

            <div class="row">
              <div class="col-md">
                Field Name
                <input type="text" class="form-control" name="txtFieldName">
              </div>
              <div class="col-md">
                Image
                <input type="text" class="form-control" name="txtFieldImage">
              </div>
              <div class="col-md">
                Price
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
              <td class="bg-secondary text-light">No</td>
              <td class="bg-secondary text-light">Field Name</td>
              <td class="bg-secondary text-light">Image</td>
              <td class="bg-secondary text-light">Price</td>
              <td class="bg-secondary text-light">Action</td>
            </tr>
            <?php $index = 1; ?>
            @foreach($dbSportField as $key => $value)
              <tr>
                <td>{{$index}}</td>
                <td>{{$value->field_name}}</td>
                <td>{{$value->image}}</td>
                <td>{{$value->price}}</td>
                <td>
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
          ข้อมูลอุปกรน์เพิ่มเติม
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
                Addons Name
                <input type="text" class="form-control" name="txtAddonName">
              </div>
              <div class="col-md">
                Quantity
                <input type="text" class="form-control" name="txtAddonQuantity">
              </div>
              <div class="col-md">
                Price
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
              <td class="bg-secondary text-light">No</td>
              <td class="bg-secondary text-light">Addons Name</td>
              <td class="bg-secondary text-light">Quantity</td>
              <td class="bg-secondary text-light">Price</td>
              <td class="bg-secondary text-light">Action</td>
            </tr>
            <?php $index = 1; ?>
            @foreach($dbSportAddon as $key => $value)
              <tr>
                <td>{{$index}}</td>
                <td>{{$value->addon_name}}</td>
                <td>{{$value->qty}}</td>
                <td>{{$value->price}}</td>
                <td>
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