<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTypeRequest;
use App\Models\Room_type;
use App\Http\Requests\StoreRoom_typeRequest;
use App\Http\Requests\UpdateRoom_typeRequest;
use App\Models\Type;
use Illuminate\Support\Facades\Redirect;

class TypeController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = new Type();
        $type = $types -> index();
        return view('type.index',['types'=>$type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        $type = new Type();
        $type->name = $request->name;
        $type->information = $request->information;
        $type -> store($type);
        return Redirect::route('type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room_type  $room_type
     * @return \Illuminate\Http\Response
     */
    public function show(Room_type $room_type)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {

        return view('type.edit',['type' => $type]);
    }

    public function update(Type $type, StoreTypeRequest $request)
    {
        $type->update($request->all());
        return redirect('type');
    }

    public function destroy(Type $type)
    {
        try {
            $type->delete();
            return redirect('type')->with('success', 'Type ' . $type->name . ' deleted!');
        } catch (\Exception $e) {
            return redirect('type')->with('failed', 'Type ' . $type->name . ' cannot be deleted! Error Code:' . $e->errorInfo[1]);;
        }
    }
}
