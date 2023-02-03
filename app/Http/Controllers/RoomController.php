<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRoomRequest;
use App\Models\Customer;
use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Models\Transaction;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = new Room();
        $room = $rooms -> index();
        return view('Room.index',['rooms' => $room ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('room.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {
        $rooms = new Room();
        $rooms -> type_id = $request ->  type_id ;
        $rooms -> number = $request -> number;
        $rooms -> capacity = $request -> capacity;
        $rooms -> price = $request -> price;
        $rooms -> view = $request -> view;
        $rooms -> store($rooms);
        return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $types = Type::all();
        return view('Room.edit', ['rooms'=>$room],compact('types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoomRequest  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $room -> type_id = $request ->  type_id ;
        $room -> number = $request -> number;
        $room -> capacity = $request -> capacity;
        $room -> price = $request -> price;
        $room -> view = $request -> view;
        $room-> edit($room);
        return redirect()->route('room.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room ->destroyer($room);
        return  Redirect::route('room.index');
    }

}
