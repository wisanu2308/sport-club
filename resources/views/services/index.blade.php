@extends('layouts.default')

@section('sub_title', 'บริการ')

@section('content')

<?php 
    $serviceList = array(
        [
            'url' => 'soccer',
            'image' => 'images/services/soccer.png',
            'name' => 'ฟุตบอล'
        ],
        [
            'url' => 'futsal',
            'image' => 'images/services/futsal.png',
            'name' => 'ฟุตซอล'
        ],
        [
            'url' => 'badminton',
            'image' => 'images/services/badminton.png',
            'name' => 'แบตมินตัน'
        ],
        [
            'url' => 'volleyball',
            'image' => 'images/services/volleyball.png',
            'name' => 'วอลเล่บอล'
        ],
        [
            'url' => 'table_tennis',
            'image' => 'images/services/table_tennis.png',
            'name' => 'เทเบิลเทนนิส'
        ],
        [
            'url' => 'basketball',
            'image' => 'images/services/basketball.png',
            'name' => 'บาสเกตบอล'
        ],
        [
            'url' => 'tennis',
            'image' => 'tennis.png',
            'name' => 'เทนนิส'
        ],
    );
?>

<div class="container-fluid">
    <div class="d-flex flex-row">
        <div class="col-md-3 bg-warning text-center fw-bold fs-1 text-dark py-2">
            ชนิดกีฬา
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-start py-5">
        @foreach($serviceList as $key => $value)
            <div class="col-md-3 p-4">
                <a href="{{ url('/services/'.$value['url']) }}" class="service-card d-flex flex-column justify-content-center justify-items-center p-3">
                    <div style="max-height: 240px; overflow:hidden;" class="rounded">
                        <img src="{{ asset($value['image']) }}" class="img-fluid">
                    </div>
                    <div class="fw-bold fs-4 text-center">{{ $value['name'] }}</div>
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection