<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Room_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Home extends Controller
{
    public function index(){
        $types = new Room_type();
        $type = $types -> index();
        $rooms = new Room();
        $room = $rooms -> index();
        return view('layout.home',['rooms' => $room,'type'=>$type]);
    }

    public function viewlogin(){
        return view('layout.login');

    }
    public function login(Request $request){

        $email = $request ->get('email');
        $password = $request ->get('password');
//        dd($email,$password);
        $rs = Auth::attempt(['email'=>$email,'password'=>$password]);
        if($rs==false){
            return redirect()->back();
        }else{
            return "ok";
        }

    }
    public function logout(){

    }
}
