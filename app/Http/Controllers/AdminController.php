<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Sport;
use App\Models\SportField;
use App\Models\Member;

class AdminController extends Controller
{
    public function index(){
        if(session('adm_username') == null) {
            return redirect('/admin/signin');
        }

        $countBooking = Booking::count();
        $countSport = Sport::count();
        $countSportField = SportField::count();
        $countMember = Member::count();

        $pageElements = [
            'countBooking' => $countBooking,
            'countSport' => $countSport,
            'countSportField' => $countSportField,
            'countMember' => $countMember,
        ];

        return view('admin/index', $pageElements);
    }

    public function signin(){
        return view('admin/signin');
    }

    public function do_signin(Request $request){

        $post = $request->all();

        $txtUsername = $post["txtUsername"];
        $txtPassword = md5($post["txtPassword"]);
        
        $dbAdmin = Admin::where('username', $txtUsername)->where('password', $txtPassword)->first();
        if(!$dbAdmin){
            session(["errMsg" => "รหัสผ่านไม่ถูกต้อง"]);
            return redirect("/admin/signin")->withInput();

        } else {
            session(["adm_userid" => $dbAdmin->id]);
            session(["adm_username" => $dbAdmin->username]);
            return redirect('/admin');
        } 
    }

    public function do_signout(){
        session()->flush();
        return redirect("/admin");
    }


    // ADMIN
    public function view() {
        $userList = Admin::get();
        $pageElements = array(
            'userList' => $userList
        );
        return view('admin/user.index', $pageElements);
    }

    public function detail() {

        $pageElements = array(
            
        );
        return view('admin/user.detail', $pageElements);
    }

    public function add() {

        $formData = [
            "refId" => "",
            "frmUsername" => "",
            "frmPassword" => "",
        ];

        $pageElements = array(
            'form_title' => 'เพิ่มผู้ใช้งานระบบ',
            'formData' => $formData,
        );

        return view('admin/user.form', $pageElements);
    }

    public function edit($id) {

        $dbUser = Admin::where('id', $id)->first();

        $formData = [
            "refId" => $dbUser->id,
            "frmUsername" => $dbUser->username,
            "frmPassword" => $dbUser->password,
        ];

        $pageElements = array(
            'form_title' => 'แก้ไขผู้ใช้งานระบบ',
            'dbMember' => $dbUser,
            'formData' => $formData,
        );
        return view('admin/user.form', $pageElements);
    }

    public function save(Request $request) {
        
        $post = $request->all();

        $thisPassword = $post["oldPassword"];
        if($post["refId"] == "" && $post["refId"] == null && $post["txtPassword"] !== ""){
            $thisPassword = md5($post["txtPassword"]);
        }

        $data = new Admin;
        if($post["refId"] !== "" && $post["refId"] !== null){
            $data = Admin::find($post["refId"]);
        }

        $data->username = $post["txtUsername"];
        $data->password = $thisPassword;
        $data->role = 'Admin';
        $data->save();

        return redirect("/admin/user");
    }

    public function delete($id) {
        Admin::where('id', $id)->delete();
        return redirect("/admin/user");
    }

}
