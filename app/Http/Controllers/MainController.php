<?php 

  namespace App\Http\Controllers;

  class MainController extends Controller {
    
    public function index() {

        // return view('user.profile', [
        //     'user' => User::findOrFail($id)
        // ]);

        return view('index');
    }

  }

?>

