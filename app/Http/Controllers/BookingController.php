<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BookingAddon;


class BookingController extends Controller
{

    public function my_booking(){

        $memberid = session("userid");

        // fetch Booking data
        $dbBooking = Booking::where('member_id', $memberid)->get();

        $pageElements = array(
            'memberid' => $memberid,
            'dbBooking' => $dbBooking,
        );

        return view('mybooking.index', $pageElements);
    }

    public function my_booking_detail($id){

        // fetch Booking data
        $dbBooking = Booking::where('id', $id)->first();
        $dbBookingAddon = BookingAddon::where('booking_no', $dbBooking->booking_no)->get();

        $pageElements = array(
            'dbBooking' => $dbBooking,
            'dbBookingAddon' => $dbBookingAddon,
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

    public function detail($id) {

        $dbBooking = Booking::where("id", $id)->first();
        $dbBookingAddon = BookingAddon::where('booking_no', $dbBooking->booking_no)->get();

        $pageElements = array(
            "dbBooking" => $dbBooking,
            "dbBookingAddon" => $dbBookingAddon,
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
