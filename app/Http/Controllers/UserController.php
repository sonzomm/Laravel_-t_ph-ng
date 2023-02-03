<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showUser($request)
    {
        $users = User::whereIn('role', ['Super', 'Admin'])->orderBy('id', 'DESC');

        if (!empty($request->qu)) {
            $users = $users->where('email', 'LIKE', '%' . $request->qu . '%');
        }
        $users = $users->paginate(5, ['*'], 'users');
        $users->appends($request->all());
        return $users;
    }

    public function index(Request $request)
    {
        $users = $this->showUser($request);
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest  $request)
    {
        $staffs = new User();
        $staffs->name = $request->name;
        $staffs->email = $request->email;
        $staffs->role = $request->role;
        $staffs->password = $request->password;
        $staffs->store($staffs);
        return Redirect::route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $staff
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateUserRequest $request
     * @param \App\Models\User $staff
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UpdateCustomerRequest $request)
    {
        $user->update($request->all());
        return redirect()->route('user.index')->with('success', 'User ' . $user->name . ' udpated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->destroyer($user);
        return Redirect::route('user.index');
    }
}
