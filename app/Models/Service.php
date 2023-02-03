<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    use HasFactory;

    public function index()
    {
        $service = DB::table('services')->get();
        return $service;
    }

    public function store($service)
    {
        DB::table('services')->insert([
            'name_service' => $service->name,
            'price' => $service->price,
        ]);

    }
    public function edit($service)
    {
        DB::table('services')->where('id', '=', $service->id)->update([
            'name' => $service->name,
            'price' => $service->price,
        ]);

    }
    public  function  destroyer($service)
    {
        DB::table('services')->delete($service -> id);
    }

}
