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

        $txtUsername = $post["txtUsername"];
        $txtPassword = md5($post["txtPassword"]);

        $dbMember = Member::where('username', $txtUsername)->where('password', $txtPassword)->first();
        if(!$dbMember){
            session(["errMsg" => "รหัสผ่านไม่ถูกต้อง"]);
            return redirect("/signin")->withInput();

        } else {
            session(["userid" => $dbMember->id]);
            session(["username" => $dbMember->username]);
            session(["user_fullname" => $dbMember->firstname." ".$dbMember->lastname]);
            return redirect("/");
        } 

    }

    public function do_signup(Request $request){
        $post = $request->all();

        $txtUsername = $post["txtUsername"];
        $txtEmail = $post["txtEmail"];
        $txtFirstName = $post["txtFirstName"];
        $txtLastName = $post["txtLastName"];
        $txtTel = $post["txtTel"];
        $txtPassword = $post["txtPassword"];
        $txtPasswordConfirm = $post["txtPasswordConfirm"];
        
        if($txtPassword !== $txtPasswordConfirm){
            session(["errMsg" => "รหัสผ่านไม่ถูกต้อง"]);
            return redirect("/signup")->withInput();
        } else {

            $data = new Member;
            $data->username = $txtUsername;
            $data->password = md5($txtPassword);
            $data->firstname = $txtFirstName;
            $data->lastname = $txtLastName;
            $data->email = $txtEmail;
            $data->tel = $txtTel;
            $data->save();

            echo "
                <script>
                    alert('สมัครสมาชิกเรียบร้อย')
                    window.location.href = '/'
                </script>
            ";
            // return redirect("/");
        }

    }

    public function do_signout(){
        session()->flush();
        return redirect("/");
    }

    public function profile(){

        if(session('username') == null) {
            return redirect('/signin');
        }

        return view('profile');
    }

    public function update_profile(){

        if(session('username') == null) {
            return redirect('/signin');
        }

        return view('profile');
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
