<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function my_booking(){

        $memberid = 1;

        // fetch Booking data

        $dbBooking = [
            [
                "id" => 1,
                "name" => "NAME1"
            ],
            [
                "id" => 2,
                "name" => "NAME2"
            ],
            [
                "id" => 3,
                "name" => "NAME3"
            ],
        ];
        $pageElement = array(
            'memberid' => $memberid,
            'dbBooking' => $dbBooking,
        );

        return view('mybooking.index', $pageElement);
    }

    public function my_booking_detail($id){

        $memberid = 1;
        
        // fetch Booking data
        $dbBooking = [
            [
                "id" => 1,
                "name" => "NAME1"
            ]
        ];

        $pageElement = array(
            'memberid' => $memberid,
            'dbBooking' => $dbBooking,
        );
        
        return view('mybooking.detail', $pageElement);
    }


    // ADMIN
    public function view() {


        $pageElement = array(
            
        );
        return view('admin/booking.index', $pageElement);
    }

    public function detail() {

        
        $pageElement = array(
            
        );
        return view('admin/booking.detail', $pageElement);
    }

    public function form() {

        $pageElement = array(
            
        );
        return view('admin/booking.form', $pageElement);
    }

    public function save() {
        
        return redirect("/admin/booking");
    }

    public function delete() {
        
        return redirect("/admin/booking");
    }
}
