<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    use HasFactory;
    public function index()
    {
        $room = DB::table('rooms')
            ->join('room_types', 'rooms.id_type_room', '=', 'room_types.id')
            ->select('rooms.*', 'room_types.name','room_types.price', 'room_types.max_person')
            ->get();
        return $room;
    }

    public function viewlogin(){

    }
    public function login(){

    }
    public function lohout(){

    }
}
