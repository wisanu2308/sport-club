@extends('layouts.default')

@section('sub_title', 'บริการ')

@section('content')

<div class="container-fluid">
    <div class="d-flex flex-row">
        <div class="col-md-3 bg-warning text-center fw-bold fs-1 text-dark py-2">
            ชนิดกีฬา
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-start py-5">
        @foreach($sportList as $key => $value)
            <div class="col-md-3 p-4">
                <a href="{{ url('/sport/'.$value['url']) }}" class="service-card d-flex flex-column justify-content-center justify-items-center p-3">
                    <div style="max-height: 240px; overflow:hidden;" class="rounded">
                        <!-- <img src="{{ asset($value['image']) }}" class="img-fluid"> -->
                        <img src="{{ asset('images/sports/'.$value['image']) }}" class="img-fluid">
                    </div>
                    <div class="fw-bold fs-4 text-center">{{ $value['name'] }}</div>
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection