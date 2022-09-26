<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function Main(){
        return view("services.index");
    }

    public function ServiceForm($type){

        // Fetching Data From Type
        $fieldList = array(
            [
                "NAME_OF_PLACE" => "FIELD_1",
                "IMAGE" => "images/services/field_basketball.png",
            ],
            [
                "NAME_OF_PLACE" => "FIELD_2",
                "IMAGE" => "images/services/field_basketball.png",
            ],
            [
                "NAME_OF_PLACE" => "FIELD_3",
                "IMAGE" => "images/services/field_basketball.png",
            ],
        );

        $pageElements = array(
            "type" => $type,
            "fieldList" => $fieldList,
            
        );
        
        return view("services.form", $pageElements);
    }
}