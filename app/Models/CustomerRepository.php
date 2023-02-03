<?php

namespace App\Models;

use app\Helpers\ImageService;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Str;

class CustomerRepository
{

    public function count($request)
    {
        $customersCount = Customer::with('user')->orderBy('id', 'DESC');


        $customersCount = $customersCount->count();
        return $customersCount;
    }

    public static function store($request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->birthdate),
            'role' => 'Customer',
        ]);

        $customer = Customer::create([
            'name' => $user->name,
            'address' => $request->address,
            'job' => $request->job,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'user_id' => $user->id
        ]);

        return $customer;
    }
}
