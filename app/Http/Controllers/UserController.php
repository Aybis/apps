<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('modules.management.user.index');
    }

    public function getAllData()
    {
        return User::with('roles')->orderBy('created_at', 'desc')->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username,except,id',
            'email' => 'required|email|unique:users,email,except,id',
            'name' => 'required',

        ],[
            'required' => ':Attribut cannot empty',
            'unique' => ':Attribute must be unique'
        ]);
        $user = new User();
        $user['username']   = $request['username'];
        $user['password']   = bcrypt('gloryHorsePower');
        $user['email']      = $request['email'];
        $user['level']      = $request['level'];
        $user['role_id']    = $request['role_id'];
        $user['name']       = $request['name'];
        $user['position']   = $request['position'];
        $user->save();

        return response()->json('Success add User', 200);
    }


    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|unique:users,username,except, '.$user->id,
            'email' => 'required|email|unique:users,email,except, '.$user->id,
            'name' => 'required',

        ],[
            'required' => ':Attribut cannot empty',
            'unique' => ':Attribute must be unique'
        ]);

        $user['username']   = $request['username'];
        $user['email']      = $request['email'];
        $user['level']      = $request['level'];
        $user['name']       = $request['name'];
        $user['position']   = $request['position'];
        $user->update();

        return response()->json('Success update User', 200);
    }

    public function show(User $user)
    {

    }


    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(User $user)
    {

        $user->delete();

        return response()->json('Success delete User', 200);
    }
}
