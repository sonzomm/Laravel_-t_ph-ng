<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Type extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'information'
    ];
    use HasFactory;
    public function index(){
        $type = DB::table('types')->get();
        return $type;
    }
    public function store($type){
        DB::table('types')->insert([
            'name' => $type -> name,
            'information' => $type -> information
        ]);
    }
    public function edit($type){
        DB::table('types')->where('id','=',$type->id)-> update([
            'name' => $type -> name,
            'information' => $type -> information,
        ]);

    }
    public  function  destroyer($type)
    {
        DB::table('types')->delete($type -> id);
    }
}
