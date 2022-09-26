<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function SignIn(){
        return view("SignIn");
    }

    public function SignUp(){
        return view("SignUp");
    }

    public function doSignIn(Request $request){
        $post = $request->all();
        // dd($post);
        session(["username" => "Wisanu Kueansan"]);
        return redirect("/");

    }

    public function doSignUp(Request $request){
        echo "doSignUp !!";
    }

    public function doSignOut(){
        session()->flush();
        return redirect("/");
    }

    public function Profile(){
        echo "Profile !!";
    }

    public function History(){
        echo "History !!";
    }


}
