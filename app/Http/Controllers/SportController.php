<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;
use App\Models\SportField;
use App\Models\SportAddon;

class SportController extends Controller
{
    public function index(){

        $sportList = array(
            [
                'url' => 'soccer',
                'image' => 'images/sport/soccer.png',
                'name' => 'ฟุตบอล'
            ],
            [
                'url' => 'futsal',
                'image' => 'images/sport/futsal.png',
                'name' => 'ฟุตซอล'
            ],
            [
                'url' => 'badminton',
                'image' => 'images/sport/badminton.png',
                'name' => 'แบตมินตัน'
            ],
            [
                'url' => 'volleyball',
                'image' => 'images/sport/volleyball.png',
                'name' => 'วอลเล่บอล'
            ],
            [
                'url' => 'table_tennis',
                'image' => 'images/sport/table_tennis.png',
                'name' => 'เทเบิลเทนนิส'
            ],
            [
                'url' => 'basketball',
                'image' => 'images/sport/basketball.png',
                'name' => 'บาสเกตบอล'
            ],
            [
                'url' => 'tennis',
                'image' => 'tennis.png',
                'name' => 'เทนนิส'
            ],
        );        

        $pageElements = array(
            "sportList" => $sportList,
        );

        return view("sport.index", $pageElements);
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

    public function sport_store(Request $request){

        
        return redirect("/");
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
        
        $data = new Sport;
        if($post["refId"] !== "" && $post["refId"] !== null){
            $data = Sport::find($post["refId"]);
        }

        $data->name = $post["txtSportName"];
        $data->url = $post["txtSportURL"];
        $data->image = $post["txtSportImage"];
        $data->is_enabled = $post["txtIsEnabled"];
        $data->save();
        
        // $image= $request->file('feature_image');
        // $image_path = Image::make($image);
        // $set_img_path = time().$image->getClientOriginalName();
        // $image_path->save( public_path().'/images/course/'.$set_img_path);

        return redirect("/admin/sport");
    }

    public function delete($id) {
        Sport::where('id', $id)->delete();
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
        
        $data = new SportField;
        $data->sport_url = $post["txtSportURL"];
        $data->field_name = $post["txtFieldName"];
        $data->image = $post["txtFieldImage"];
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
