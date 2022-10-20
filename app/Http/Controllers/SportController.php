<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Sport;
use App\Models\SportField;
use App\Models\SportAddon;
use App\Models\Booking;
use App\Models\BookingAddon;

class SportController extends Controller
{
    public function index(){     
        $sportList = Sport::where('is_enabled', 'Y')->get();
        $pageElements = array(
            "sportList" => $sportList,
        );
        return view("sport.index", $pageElements);
    }

    public function sport_field($type){

        if(session('username') == null) {
            return redirect('/signin');
        }

        $dbSport = Sport::where('url', $type)->first();
        $fieldList = SportField::where('sport_url', $type)->where('is_enabled', 'Y')->get();
        
        session(["book_sport" => $dbSport->id]);  

        $pageElements = array(
            "type" => $type,
            "fieldList" => $fieldList,
        );
        
        return view("sport.select_field", $pageElements);
    }


    public function sport_form($type, $field_data){

        $field_data = explode("_", $field_data);

        $timeList = array(
            ["time_id" => 1, "title" => "13.00-14.00", "is_available" => "Y"],
            ["time_id" => 2, "title" => "14.30-15.30", "is_available" => "Y"],
            ["time_id" => 3, "title" => "16.00-17:00", "is_available" => "Y"],
            ["time_id" => 4, "title" => "17.30-18.30", "is_available" => "Y"],
            ["time_id" => 5, "title" => "19.00-20:00", "is_available" => "N"],
            ["time_id" => 6, "title" => "20:30-21:30", "is_available" => "N"],
        );
        $sport = Sport::where('url', $type)->first();
        $field = SportField::where('id', $field_data[0])->first();
        $time = $timeList[$field_data[1] - 1];
        
        session(["book_field" => $field->id]); 
        session(["book_time" => $time['time_id']]); 

        $dbSportAddon = SportAddon::where("sport_url", $type)->get();
    
        $pageElements = array(
            "type" => $type,
            "txt_book_sport" => $sport->name,
            "txt_book_field" => $field->field_name,
            "txt_book_time" => $time['title'],
            "dbSportAddon" => $dbSportAddon,
        );
        
        return view("sport.form", $pageElements);
    }

    public function sport_confirm(Request $request, $type){

        $post = $request->all();

        $txtSportAddon = isset($post["txtSportAddon"]) ? $post["txtSportAddon"] : "";
        $field_id = session("book_field");
        $time_id = session("book_time");
        
        $timeList = array(
            ["time_id" => 1, "title" => "13.00-14.00", "is_available" => "Y"],
            ["time_id" => 2, "title" => "14.30-15.30", "is_available" => "Y"],
            ["time_id" => 3, "title" => "16.00-17:00", "is_available" => "Y"],
            ["time_id" => 4, "title" => "17.30-18.30", "is_available" => "Y"],
            ["time_id" => 5, "title" => "19.00-20:00", "is_available" => "N"],
            ["time_id" => 6, "title" => "20:30-21:30", "is_available" => "N"],
        );
        
        $dbSport = Sport::where('url', $type)->first();
        $dbSportField = SportField::where('id', $field_id)->first();
        
        $total_price = 0;
        $total_price += $dbSportField->price;
        
        if($txtSportAddon !== ""){
            $dbSportAddon = SportAddon::where('id', $txtSportAddon)->first();
            $total_price += $dbSportAddon->price;
        }

        $formData = [
            'txtMemberId' => session("userid"),
            'txtMemberName' => session("username"),
            'txtSportName' => $dbSport->name,
            'txtSportField' => $dbSportField->field_name,
            'txtBookingDate' => date("Y-m-d"),
            'txtBookingTime' => $timeList[$time_id - 1]["title"],
            'txtSportAddonId' => isset($dbSportAddon->id) ? $dbSportAddon->id : "",
            'txtSportAddonName' => isset($dbSportAddon->addon_name) ? $dbSportAddon->addon_name : "",
            'txtTotalPrice' => $total_price,
        ];

        $pageElements = array(
            "type" => $type,
            "field_id" => $field_id,
            "addon_id" => $txtSportAddon,
            "formData" => $formData,
        );
        
        return view("sport.confirm", $pageElements);
    }

    public function sport_store(Request $request){

        $post = $request->all();
        $txtSportAddon = isset($post["txtSportAddon"]) ? $post["txtSportAddon"] : "";

        $booking_no = rand(10000,99999);
        $data = new Booking;
        $data->booking_no = $booking_no;
        $data->member_id = $post["txtMemberId"];
        $data->member_name = $post["txtMemberName"];
        $data->sport_name = $post["txtSportName"];
        $data->sport_field = $post["txtSportField"];
        $data->booking_date = $post["txtBookingDate"];
        $data->booking_time = $post["txtBookingTime"];
        $data->total_price = $post["txtTotalPrice"];
        $data->save();

        if($txtSportAddon !== "" && $txtSportAddon !== null){
            $dbSportAddon = SportAddon::where('id', $txtSportAddon)->first();
            $addonData = new BookingAddon;
            $addonData->booking_no = $booking_no;
            $addonData->addon_name = $dbSportAddon->addon_name;
            $addonData->qty = $dbSportAddon->qty;
            $addonData->price = $dbSportAddon->price;
            $addonData->save();
        }

        $request->session()->forget('book_sport');
        $request->session()->forget('book_field');
        $request->session()->forget('book_time');

        return redirect("/mybooking");
    }


    // ADMIN
    public function view() {

        $sportList = Sport::get();
        
        $pageElements = array(
            'sportList' => $sportList
        );

        return view('admin/sport.index', $pageElements);
    }

    public function add() {

        $formData = [
            'refId'=> "",
            'frmSportName' => "",
            'frmSportURL' => "",
            'frmSportImage' => "",
            'frmIsEnabled' => "",
        ];

        $pageElements = array(
            'form_title' => 'เพิ่มรายการกีฬา',
            'formData' => $formData,
        );

        return view('admin/sport.form', $pageElements);
    }

    public function edit($id) {

        $dbSport = Sport::where('id', $id)->first();

        $formData = [
            'refId'=> $dbSport->id,
            'frmSportName' => $dbSport->name,
            'frmSportURL' => $dbSport->url,
            'frmSportImage' => $dbSport->image,
            'frmIsEnabled' => $dbSport->is_enabled,
        ];

        $pageElements = array(
            'form_title' => 'เพิ่มรายการกีฬา',
            'dbSport' => $dbSport,
            'formData' => $formData,
        );

        return view('admin/sport.form', $pageElements);
    }
    
    public function save(Request $request) {
        
        $post = $request->all();
        
        // Store Image 
        $file = $request->file('txtSportImage');
        $imageName = date("Ymd")."_".$post["txtSportURL"].'.'.$file->getClientOriginalExtension();
        $file->move(public_path('/images/sports'), $imageName);

        $data = new Sport;
        if($post["refId"] !== "" && $post["refId"] !== null){
            $data = Sport::find($post["refId"]);
        }

        $data->name = $post["txtSportName"];
        $data->url = $post["txtSportURL"];
        $data->image = $imageName;
        $data->is_enabled = $post["txtIsEnabled"];
        $data->save();

        return redirect("/admin/sport");
    }

    public function delete($id) {

        $dbSport = Sport::where('id', $id)->first();
        Sport::where('id', $id)->delete();
        SportField::where('sport_url', $dbSport->url)->delete();
        SportAddon::where('sport_url', $dbSport->url)->delete();
        return redirect("/admin/sport");
    }

    public function detail($id) {
        
        $dbSport = Sport::where('id', $id)->first();
        $dbSportField = SportField::where('sport_url', $dbSport->url)->get();
        $dbSportAddon = SportAddon::where('sport_url', $dbSport->url)->get();
        $pageElements = array(
            'dbSport' => $dbSport,
            'dbSportField' => $dbSportField,
            'dbSportAddon' => $dbSportAddon,
        );
        
        return view('admin/sport.detail', $pageElements);
    }

    public function add_field(Request $request) {
        
        $post = $request->all();

        // Store Image 
        $file = $request->file('txtFieldImage');
        $imageName = date("Ymd").rand(10000,99999)."_".$post["txtSportURL"].'.'.$file->getClientOriginalExtension();
        $file->move(public_path('/images/sports/fields'), $imageName);

        $data = new SportField;
        $data->sport_url = $post["txtSportURL"];
        $data->field_name = $post["txtFieldName"];
        $data->image = $imageName;
        $data->price = $post["txtFieldPrice"];
        $data->is_enabled = 'Y';
        $data->save();
  
        return redirect("/admin/sport/".$post["refId"]);
    }
    
    public function add_addon(Request $request) {
        
        $post = $request->all();
        
        $data = new SportAddon();
        $data->sport_url = $post["txtSportURL"];
        $data->addon_name = $post["txtAddonName"];
        $data->qty = $post["txtAddonQuantity"];
        $data->price = $post["txtAddonPrice"];
        $data->is_enabled = 'Y';
        $data->save();
  
        return redirect("/admin/sport/".$post["refId"]);
    }

    public function delete_field($id, $field_id) {
        SportField::where('id', $field_id)->delete();
        return redirect("/admin/sport/".$id);
    }

    public function delete_addon($id, $addon_id) {
        SportAddon::where('id', $addon_id)->delete();
        return redirect("/admin/sport/".$id);
    }

}
