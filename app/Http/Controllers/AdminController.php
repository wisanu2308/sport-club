<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin/index');
    }

    // ADMIN
    public function view() {


        $pageElement = array(
            
        );
        return view('admin/user.index', $pageElement);
    }

    public function detail() {

        
        $pageElement = array(
            
        );
        return view('admin/user.detail', $pageElement);
    }

    public function form() {

        $pageElement = array(
            
        );
        return view('admin/user.form', $pageElement);
    }

    public function save() {
        
        return redirect("/admin/user");
    }

    public function delete() {
        
        return redirect("/admin/user");
    }

}
