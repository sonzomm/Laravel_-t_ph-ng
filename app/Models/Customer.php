<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;
    public function index(){
        $customer = DB::table('customers')->get();
        return $customer;
    }
    public function store($customer){
        DB::table('customers')->insert([
            'name' =>    $customer -> name,
            'phone' =>   $customer -> phone,
            'address' => $customer -> address,
            'gender' =>  $customer -> gender,
            'birthdate' =>  $customer -> birthdate,
        ]);
        return $customer;
    }
    public function edit($customer){
        DB::table('customers') -> where('id','=',$customer->id)
            ->update([
                'name' =>   $customer -> name,
                'phone' =>  $customer -> phone,
                'address' => $customer -> address,
                'gender' => $customer -> gender,
                'birthdate' =>  $customer -> birthdate,
            ]);
    }
    public function destroyer($customer){
        DB::table('customers') -> delete($customer->id);
    }
    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('img/default/default-user.jpg');
        }
        return asset('img/user/' . $this->name . '-' . $this->id . '/' . $this->avatar);
    }


}
