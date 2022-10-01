<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sport Club App - แอดมิน</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>

<?php 
  $menuList = array(
    ['url' => "admin/", 'name' => "หน้าแรก"],
    ['url' => "admin/booking", 'name' => "ข้อมูลการจอง"],
    ['url' => "admin/sport", 'name' => "ประเภทกีฬา"],
    ['url' => "admin/member", 'name' => "รายการสมาชิก"],
    ['url' => "admin/user", 'name' => "รายการแอดมิน"], 
  );
?>

<body class="bg-light">

  <div class="container-fluid">

    <div class="d-flex flex-row justify-content-start bg-green">
      <div class="container text-light py-5 fs-1 fw-bold">
        SPORT CLUB ADMIN
      </div>
    </div>

    <div class="container py-4">
      <div class="row">
        <div class="col-lg-2 text-center">
          
          <div class="list-group">
            @foreach($menuList as $key => $value)
              <a href="{{ url($value['url']) }}" class="list-group-item list-group-item-action">{{ $value['name'] }}</a>
            @endforeach
          </div>

        </div>
        <div class="col-lg-10 p-4 bg-white">
          @yield('content')
        </div>
      </div>
    </div>

  </div>
</body> 
</html>