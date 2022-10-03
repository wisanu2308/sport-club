<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function signin(){
        return view("SignIn");
    }

    public function signup(){
        return view("SignUp");
    }

    public function do_signin(Request $request){
        $post = $request->all();
        // dd($post);
        session(["username" => "Wisanu Kueansan"]);
        return redirect("/");

    }

    public function do_signup(Request $request){
        echo "doSignUp !!";
    }

    public function do_signout(){
        session()->flush();
        return redirect("/");
    }

    public function profile(){
        echo "Profile !!";
    }

    public function update_profile(){
        echo "Update Profile !!";
    }


    // ADMIN
    public function view() {


        $pageElements = array(
            
        );
        return view('admin/member.index', $pageElements);
    }

    public function detail() {

        
        $pageElements = array(
            
        );
        return view('admin/member.detail', $pageElements);
    }

    public function add() {

        $pageElements = array(
            
        );
        return view('admin/member.form', $pageElements);
    }

    public function edit() {

        $pageElements = array(
            
        );
        return view('admin/member.form', $pageElements);
    }

    public function save() {
        
        return redirect("/admin/member");
    }

    public function delete() {
        
        return redirect("/admin/member");
    }


}
