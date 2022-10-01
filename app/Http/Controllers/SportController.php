<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SportController extends Controller
{
    public function index(){
        return view("sport.index");
    }

    public function sport_field($type){

        // Fetching Data From Type
        $fieldList = array(
            [
                "NAME_OF_PLACE" => "FIELD_1",
                "IMAGE" => "images/sport/field_basketball.png",
            ],
            [
                "NAME_OF_PLACE" => "FIELD_2",
                "IMAGE" => "images/sport/field_basketball.png",
            ],
            [
                "NAME_OF_PLACE" => "FIELD_3",
                "IMAGE" => "images/sport/field_basketball.png",
            ],
        );

        $pageElements = array(
            "type" => $type,
            "fieldList" => $fieldList,
            
        );
        
        return view("sport.select_field", $pageElements);
    }


    public function sport_form($type){

        $pageElements = array(
            "type" => $type,
        );
        
        return view("sport.form", $pageElements);
    }

    public function sport_confirm($type){

        $pageElements = array(
            "type" => $type,
        );
        
        return view("sport.confirm", $pageElements);
    }

    public function sport_store(){

        
        return redirect("/");
    }


    // ADMIN
    public function view() {


        $pageElement = array(
            
        );
        return view('admin/sport.index', $pageElement);
    }

    public function detail() {

        
        $pageElement = array(
            
        );
        return view('admin/sport.detail', $pageElement);
    }

    public function form() {

        $pageElement = array(
            
        );
        return view('admin/sport.form', $pageElement);
    }

    public function save() {
        
        return redirect("/admin/sport");
    }

    public function delete() {
        
        return redirect("/admin/sport");
    }
}
