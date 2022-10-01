@extends('layouts.default')

@section('sub_title', 'รายการจองของฉัน')

@section('content')

<div class="container">
    BOOKING DETAIL

    <?php 
        echo "<pre>";
        print_r($dbBooking);
        echo "</pre>";
     ?>
</div>

@endsection