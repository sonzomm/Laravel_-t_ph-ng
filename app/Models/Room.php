<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    use HasFactory;
    public function index(){
        $room = DB::table('rooms')
            ->join('types','rooms.type_id','=','types.id')
            ->select('rooms.*','types.*')
            ->get();
        return $room;
    }
    public function store($rooms){
        DB::table('rooms')->insert([
            'type_id' => $rooms -> type_id,
            'number' => $rooms -> number,
            'capacity' => $rooms -> capacity,
            'price' => $rooms -> price,
            'view' => $rooms -> view,
        ]);
    }
    public function edit($rooms){
        DB::table('rooms') -> where('id','=',$rooms->id)
            ->update([
                'type_id' => $rooms -> type_id,
                'number' => $rooms -> number,
                'capacity' => $rooms -> capacity,
                'price' => $rooms -> price,
                'view' => $rooms -> view,
            ]);
    }
    public function destroyer($rooms){
        DB::table('rooms') -> delete($rooms->id);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

}
