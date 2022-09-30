<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function Main(){

        // fetch payment data

        $dbPayment = [
            "A", "B", "C", "D", "E"
        ];

        $pageElement = array(
            'dbPayment' => $dbPayment,
        );

        return view('payment.index', $pageElement);
    }

    public function detail($id){

        // fetch payment data
        $dbPayment = [
            "A", "B", "C", "D", "E"
        ];

        $pageElement = array(
            'dbPayment' => $dbPayment,
        );
        
        return view('payment.detail', $pageElement);
    }
}
