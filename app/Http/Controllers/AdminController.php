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


        $pageElements = array(
            
        );
        return view('admin/user.index', $pageElements);
    }

    public function detail() {

        
        $pageElements = array(
            
        );
        return view('admin/user.detail', $pageElements);
    }

    public function add() {

        $pageElements = array(
            
        );
        return view('admin/user.form', $pageElements);
    }

    public function edit() {

        $pageElements = array(
            
        );
        return view('admin/user.form', $pageElements);
    }

    public function save() {
        
        return redirect("/admin/user");
    }

    public function delete() {
        
        return redirect("/admin/user");
    }

}
