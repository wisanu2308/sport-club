<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;


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
        $pageElements = array(
            'memberid' => $memberid,
            'dbBooking' => $dbBooking,
        );

        return view('mybooking.index', $pageElements);
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

        $pageElements = array(
            'memberid' => $memberid,
            'dbBooking' => $dbBooking,
        );
        
        return view('mybooking.detail', $pageElements);
    }


    // ADMIN
    public function view() {


        $bookingList = Booking::get();
        
        $pageElements = array(
            'bookingList' => $bookingList
        );


        return view('admin/booking.index', $pageElements);
    }

    public function detail() {

        
        $pageElements = array(
            
        );
        return view('admin/booking.detail', $pageElements);
    }

    public function add() {

        $pageElements = array(
            
        );
        return view('admin/booking.form', $pageElements);
    }

    public function edit() {

        $pageElements = array(
            
        );
        return view('admin/booking.form', $pageElements);
    }

    public function save(Request $request) {
        
        return redirect("/admin/booking");
    }

    public function delete() {
        
        return redirect("/admin/booking");
    }
}
