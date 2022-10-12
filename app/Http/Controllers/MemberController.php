<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

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
        session(["userid" => 1]);
        session(["username" => "User Anonymous"]);
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
        $memberList = Member::get();
        $pageElements = array(
            'memberList' => $memberList
        );
        return view('admin/member.index', $pageElements);
    }

    public function detail() {

        
        $pageElements = array(
            
        );
        return view('admin/member.detail', $pageElements);
    }

    public function add() {
        
        $formData = [
            "refId" => "",
            "frmUsername" => "",
            "frmPassword" => "",
            "frmEmail" => "",
            "frmFirstName" => "",
            "frmLastName" => "",
            "frmTel" => "",
        ];

        $pageElements = array(
            'form_title' => 'เพิ่มรายการสมาชิก',
            'formData' => $formData,
        );
        return view('admin/member.form', $pageElements);
    }

    public function edit($id) {

        $dbMember = Member::where('id', $id)->first();

        $formData = [
            "refId" => $dbMember->id,
            "frmUsername" => $dbMember->username,
            "frmPassword" => $dbMember->password,
            "frmEmail" => $dbMember->email,
            "frmFirstName" => $dbMember->firstname,
            "frmLastName" => $dbMember->lastname,
            "frmTel" => $dbMember->tel,
        ];

        $pageElements = array(
            'form_title' => 'แก้ไขรายการสมาชิก',
            'dbMember' => $dbMember,
            'formData' => $formData,
        );
        return view('admin/member.form', $pageElements);
    }

    public function save(Request $request) {
        
        $post = $request->all();

        $thisPassword = $post["oldPassword"];
        if($post["refId"] == "" && $post["refId"] == null && $post["txtPassword"] !== ""){
            $thisPassword = md5($post["txtPassword"]);
        }

        $data = new Member;
        if($post["refId"] !== "" && $post["refId"] !== null){
            $data = Member::find($post["refId"]);
        }

        $data->username = $post["txtUsername"];
        $data->password = $thisPassword;
        $data->email = $post["txtEmail"];
        $data->firstname = $post["txtFirstName"];
        $data->lastname = $post["txtLastName"];
        $data->tel = $post["txTel"];

        $data->save();

        return redirect("/admin/member");
    }

    public function delete($id) {
        Member::where('id', $id)->delete();
        return redirect("/admin/member");
    }


}
