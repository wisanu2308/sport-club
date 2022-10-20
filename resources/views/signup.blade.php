@extends('layouts.default')

@section('sub_title', 'สมัครสมาชิก')

@section('content')

<style>
    
    .bg-image {
        background-image: url(<?= asset('images/bg_image.png') ?>);
        background-repeat: no-repeat;
        background-size: 100%;
        width: 100%;
        background-color: #cbdac9;
    }

</style>

<div class="container-fluid bg-image">

<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-lg-8 bg-light bg-opacity-75 p-4 rounded-4 shadow">
            
            @if(session('errMsg'))
                <div class="alert alert-danger" role="alert">
                    {{session('errMsg')}}
                </div>
                <?php session()->forget('errMsg');   ?>
            @endif

            <form action="{{ url('/do_signup') }}" method="post">

                @csrf

                <div class="row py-4">
                    <div class="col-md text-center fs-2 fw-bold pb-2">สมัครสมาชิก</div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-8">
                        <label class="fw-bold">ชื่อผู้ใช้งาน</label>
                        <input type="text" class="form-control app-input" name="txtUsername" placeholder="ชื่อผู้ใช้งาน" value="<?= old('txtUsername') ?>" required>
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-8">
                        <label class="fw-bold">Email</label>
                        <input type="email" class="form-control app-input" name="txtEmail" placeholder="Email" value="<?= old('txtEmail') ?>" required>
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-4">
                        <label class="fw-bold">ชื่อ</label>
                        <input type="text" class="form-control app-input" name="txtFirstName" placeholder="ชื่อ" value="<?= old('txtFirstName') ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label class="fw-bold">นามสกุล</label>
                        <input type="text" class="form-control app-input" name="txtLastName" placeholder="นามสกุล" value="<?= old('txtLastName') ?>" required>
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-8">
                        <label class="fw-bold">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control app-input" name="txtTel" placeholder="เบอร์โทรศัพท์" maxlength="10" value="<?= old('txtTel') ?>" required>
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-8">
                        <label class="fw-bold">รหัสผ่าน</label>
                        <input type="password" class="form-control app-input" name="txtPassword" placeholder="รหัสผ่าน" value="" required>
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-8">
                        <label class="fw-bold">ยืนยันรหัสผ่าน</label>
                        <input type="password" class="form-control app-input" name="txtPasswordConfirm" placeholder="ยืนยันรหัสผ่าน" value="" required>
                    </div>
                </div>

                <div class="d-flex flex-row justify-content-center py-4">
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-row justify-content-center">
                            <button class="btn app-btn-primary py-2 px-5 fs-5">
                                สมัครสมาชิก
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

</div>


@endsection