@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-lg-6 bg-light p-4 rounded-4 shadow">

                @if(session('errMsg'))
                    <div class="alert alert-danger" role="alert">
                        {{session('errMsg')}}
                    </div>
                    <?php session()->forget('errMsg');   ?>
                @endif

                <form action="{{ url('/admin/do_signin') }}" method="post">

                    @csrf

                    <div class="d-flex flex-column">

                        <div class="d-flex flex-row justify-content-center py-4">
                            <div class="fs-2 fw-bold pb-2">เข้าสู่ระบบ</div>
                        </div>

                        <div class="d-flex flex-row justify-content-center mb-3">
                            <div class="">
                                <label class="fw-bold">ชื่อผู้ใช้งาน</label>
                                <input type="text" class="form-control app-input" style="border:1px solid #CCCCCC !important;" name="txtUsername" placeholder="ชื่อผู้ใช้งาน" value="">
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-center mb-3">
                            <div class="">
                                <label class="fw-bold">รหัสผ่าน</label>
                                <input type="password" class="form-control app-input" style="border:1px solid #CCCCCC !important;" name="txtPassword" placeholder="รหัสผ่าน" value="">
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-center py-4">
                            <div class="d-flex flex-column">
                                <div class="d-flex flex-row justify-content-center">
                                    <button class="btn app-btn-primary py-2 px-5 fs-5">
                                        เข้าสู่ระบบ
                                    </button>
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