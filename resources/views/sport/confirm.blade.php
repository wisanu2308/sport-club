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
                    <div class="px-3">{{$formData["txtMemberName"]}}</div>
                </div>
                <div class="d-flex flex-row">
                    <div class="fw-bold">กีฬา</div>
                    <div class="px-3">{{$formData["txtSportName"]}}</div>
                </div>
                <div class="d-flex flex-row">
                    <div class="fw-bold">สนาม</div>
                    <div class="px-3">{{$formData["txtSportField"]}}</div>
                </div>
                <div class="d-flex flex-row">
                    <div class="fw-bold">วันที่จอง</div>
                    <div class="px-3">{{date("d/m/Y", strtotime($formData["txtBookingDate"]))}}</div>
                </div>
                <div class="d-flex flex-row">
                    <div class="fw-bold">เวลาที่จอง</div>
                    <div class="px-3">{{$formData["txtBookingTime"]}}</div>
                </div>
                <div class="d-flex flex-row">
                    <div class="fw-bold">อุปกรณ์เสริม</div>
                    <div class="px-3">{{$formData["txtSportAddonName"]}}</div>
                </div>
                <div class="d-flex flex-row">
                    <div class="fw-bold">รวม</div>
                    <div class="px-3">{{$formData["txtTotalPrice"]}} บาท</div>
                </div>
            </div>
        </div>
    </div>


    <form action="{{url('/sport/store')}}" method="post">
        
        @csrf

        <input type="hidden" name="txtMemberId" value="{{$formData['txtMemberId']}}">
        <input type="hidden" name="txtMemberName" value="{{$formData['txtMemberName']}}">
        <input type="hidden" name="txtSportName" value="{{$formData['txtSportName']}}">
        <input type="hidden" name="txtSportField" value="{{$formData['txtSportField']}}">
        <input type="hidden" name="txtBookingDate" value="{{$formData['txtBookingDate']}}">
        <input type="hidden" name="txtBookingTime" value="{{$formData['txtBookingTime']}}">
        <input type="hidden" name="txtSportAddon" value="{{$formData['txtSportAddonId']}}">
        <input type="hidden" name="txtTotalPrice" value="{{$formData['txtTotalPrice']}}">
        
        <div class="row justify-content-center py-5">
            <div class="col-md-6 text-center">
                <a href="javascript:history.back()" class="btn btn-lg btn-secondary">BACK</a>
                <button class="btn btn-lg btn-success" onclick="return confirm('ต้องการบันทึกข้อมูล?')">COMFIRM</button>
            </div>
        </div>

    </form>

</div>

@endsection