@extends('layouts.default')

@section('sub_title', 'บริการ')

@section('content')

<div class="container-fluid">
    <div class="d-flex flex-row">
        <div class="col-md-3 bg-warning text-center fw-bold fs-1 text-dark py-2">
            รายละเอียดการจอง
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-start py-5">
        <div class="col-md-6">
            <div class="d-flex flex-column fs-4">
                <div class="d-flex flex-row">
                    <div class="fw-bold">สนาม</div>
                    <div class="px-3">FIELD_NAME</div>
                </div>
                <div class="d-flex flex-row">
                    <div class="fw-bold">ชื่อผู้จอง</div>
                    <div class="px-3">CUSTOMER_NAME</div>
                </div>
                <div class="d-flex flex-row">
                    <div class="fw-bold">เวลาที่จอง</div>
                    <div class="px-3">DATETIME</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-column fw-bold fs-4">
                <div>บริการที่จะได้รับ</div>
                <div>
                    <ul>
                        <li>สนามขนาดมาตรฐาน</li>
                        <li>สามารถยืมอุปกรณ์กีฬาได้ <br>(ต้องมัดจำเผื่อกรณีของเสียหายตามราคา)</li>
                        <li>มีห้องน้ำและห้องอาบน้ำให้บริการ</li>
                    </ul>
                </div>  
            </div>
        </div>
    </div>

    <div class="row justify-content-start">
        <div class="col-md fw-bold fs-4">
            เลือกอุปกรณ์เสริม
        </div>
    </div>

    <div class="row justify-content-start">
        <div class="col-md fw-bold fs-4">
            ADD_ON_LIST
        </div>
    </div>

    <div class="row justify-content-center py-5">
        <div class="col-md-6 text-center">
            <a href="#" class="btn btn-lg btn-secondary">BACK</a>
            <a href="{{url('/services/'.$type.'/confirm')}}" class="btn btn-lg btn-success">NEXT</a>
        </div>
    </div>

</div>

@endsection