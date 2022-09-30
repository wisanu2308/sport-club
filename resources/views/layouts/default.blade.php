<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sport Club App - @yield('sub_title')</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>

<?php 
  $menuList = array(
    ['url' => "/", 'name' => "หน้าแรก"],
    ['url' => "/services", 'name' => "บริการ"],
    ['url' => "/payment", 'name' => "ชำระเงิน"],
    ['url' => "/promotion", 'name' => "โปรโมชั่น"],
    ['url' => "/contact", 'name' => "ติดต่อเรา"],
  );
?>

<body>

  <div class="container-fluid">

    <div class="d-flex flex-row justify-content-end">
      <?php if(session('username') !== null) { ?>
        <div class="dropdown-center">
          <div class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <a href="#" class="d-block app-menu-item py-3 px-5 fw-bold">{{session('username')}}</a>
          </div>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ url('/profile') }}">โปรไฟล์</a></li>
            <li><a class="dropdown-item" href="{{ url('/history') }}">รายการจอง</a></li>
            <li><a class="dropdown-item text-danger" href="{{ url('/signout') }}" onclick="return confirm('ต้องการออกจากระบบ?')">ออกจากระบบ</a></li>
          </ul>
        </div>
      <?php } else { ?>
          <div>
            <a href="{{ url('/signin') }}" class="d-block app-menu-item py-3 px-4 fw-bold">เข้าสู่ระบบ</a>
          </div>
          <div>
            <a href="{{ url('/signup') }}" class="d-block app-menu-item py-3 px-4 fw-bold">สมัครสมาชิก</a>
          </div>
      <?php } ?>
    </div>

    <div class="d-flex flex-row justify-content-start bg-green">
      <div class="container text-light py-5 fs-1 fw-bold">
        SPORT CLUB
      </div>
    </div>

    <div class="d-flex flex-row justify-content-end">
      <ul class="nav">
        @foreach($menuList as $key => $value)
          <li class="nav-item">
            <a href="{{ url($value['url']) }}" class="d-block app-menu-item py-3 px-4 fw-bold">{{ $value['name'] }}</a>
          </li>
        @endforeach
      </ul>
    </div>

    @yield('content')

  </div>
</body> 
</html>