@extends('layouts.default')

@section('sub_title', 'เข้าสู่ระบบ')

@section('content')

<style>
    
    body {
        overflow-y: hidden;
    }

    .bg-image {
        background-image: url(<?= asset('images/bg_image.png') ?>);
        background-repeat: no-repeat;
        background-size: 100%;
        min-height: 100vh;
        width: 100%;
    }

</style>

<div class="container-fluid bg-image">

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-lg-6 bg-light bg-opacity-75 p-4 rounded-4 shadow">
                
                <form action="{{ url('/do_signin') }}" method="post">

                    @csrf

                    <div class="d-flex flex-column">

                        <div class="d-flex flex-row justify-content-center py-4">
                            <div class="fs-2 fw-bold pb-2">เข้าสู่ระบบ</div>
                        </div>

                        <div class="d-flex flex-row justify-content-center mb-3">
                            <div class="">
                                <label class="fw-bold">ชื่อผู้ใช้งาน</label>
                                <input type="text" class="form-control app-input" name="txtUsername" placeholder="ชื่อผู้ใช้งาน" value="">
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-center mb-3">
                            <div class="">
                                <label class="fw-bold">รหัสผ่าน</label>
                                <input type="password" class="form-control app-input" name="txtPassword" placeholder="รหัสผ่าน" value="">
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-center py-4">
                            <div class="d-flex flex-column">
                                <div class="d-flex flex-row justify-content-center">
                                    <button class="btn app-btn-primary py-2 px-5 fs-5">
                                        เข้าสู่ระบบ
                                    </button>
                                </div>
                                <div class="d-flex flex-row justify-content-center fw-bold py-2">
                                    <div class="px-2">มีบัญชีผู้ใช้หรือไม่?</div>
                                    <div class="px-2">
                                        <a href="{{ url('/signup') }}" >สมัครสมาชิก</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>


@endsection