@extends('layouts.default')

@section('sub_title', 'บริการ')

@section('content')

<div class="container-fluid">
    <div class="d-flex flex-row justify-conent-center">
        <div class="col-md-3 bg-warning text-center fw-bold fs-1 text-dark py-2">
            รายละเอียดการจอง
        </div>
    </div>
</div>

<div class="container">

    <div class="row justify-content-center py-5">
        <div class="col-md-6 text-center">
            <div class="d-flex flex-column fs-4">
                <div class="d-flex flex-row">
                    <div class="fw-bold">ชื่อผู้จอง</div>
                    <div class="px-3">CUSTOMER_NAME</div>
                </div>
                <div class="d-flex flex-row">
                    <div class="fw-bold">สนาม</div>
                    <div class="px-3">FIELD_NAME</div>
                </div>
                <div class="d-flex flex-row">
                    <div class="fw-bold">วันที่จอง</div>
                    <div class="px-3">DATETIME</div>
                </div>
                <div class="d-flex flex-row">
                    <div class="fw-bold">เวลาที่จอง</div>
                    <div class="px-3">DATETIME</div>
                </div>
                <div class="d-flex flex-row">
                    <div class="fw-bold">รวม</div>
                    <div class="px-3">PRICE</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center py-5">
        <div class="col-md-6 text-center">
            <a href="#" class="btn btn-lg btn-secondary">BACK</a>
            <a href="{{url('/')}}" class="btn btn-lg btn-success">COMFIRM</a>
        </div>
    </div>

</div>

@endsection