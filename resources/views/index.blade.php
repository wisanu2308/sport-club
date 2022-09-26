@extends('layouts.default')

@section('sub_title', 'หน้าแรก')

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

<?php 
    $dataList = array(
        ['text' => 'มีสนามกีฬาให้เช่า'],
        ['text' => 'มีหลายราคา'],
        ['text' => 'มีสนามกีฬาขนาดมาตรฐาน '],
        ['text' => 'สนามฟุตบอล'],
        ['text' => 'สนามสนามฟุตซอล'],
        ['text' => 'สนามแบตมินตัน'],
        ['text' => 'สนามวอลเล่บอล'],
        ['text' => 'สนามปิงปอง'],
        ['text' => 'สนามเทนนิส'],
        ['text' => 'สนามบาสเกสบอล'],
        ['text' => 'มีอุปกรณ์กีฬาให้ยืม'],
    );
?>

<div class="container-fluid bg-image">

    <div class="container">
        <div class="row justify-content-start py-5">
            <div class="col-lg-5 bg-dark bg-opacity-75 p-4 rounded-4 shadow">

                <div class="d-flex flex-column">
                    <div class="fs-1 fw-bold pb-2 text-warning">เรามีบริการอะไรบ้าง</div>
                    @foreach($dataList as $key => $value)
                        <div class="fs-4 pb-1 text-light">{{$value['text']}}</div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>


@endsection