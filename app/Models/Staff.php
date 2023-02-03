<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Staff extends Model
{
    use HasFactory;
    public function index(){
        $staffs = DB::table('staff')->get();
        return $staffs;
    }
    public function store($staffs){
        DB::table('staff')->insert([
            'name_staff' =>   $staffs -> name,
            'email' => $staffs -> email,
            'password' => $staffs -> password,
            'phone' =>  $staffs -> phone,
            'gender' =>$staffs -> gender,
            'birth' =>  $staffs -> birth,
            'role' =>  $staffs -> role,
        ]);
    }
    public function edit($staffs){
        DB::table('staff') -> where('id','=',$staffs->id)
            ->update([
                'name_staff' =>   $staffs -> name,
                'email' => $staffs -> email,
                'password' => $staffs -> password,
                'phone' =>  $staffs -> phone,
                'gender' =>$staffs -> gender,
                'birth' =>  $staffs -> birth,
                'role' =>  $staffs -> role,
            ]);
    }
    public function destroyer($staffs){
        DB::table('staff') -> delete($staffs->id);
    }


}
