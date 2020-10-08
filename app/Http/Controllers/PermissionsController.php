<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{ 
    public function getAllData()
    {
        return Permissions::all();
    }

    public function index()
    {
        return view('modules.management.permissions.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Permissions $permissions)
    {
        //
    }

    public function edit(Permissions $permissions)
    {
        //
    }


    public function update(Request $request, Permissions $permissions)
    {
        //
    }

    public function destroy(Permissions $permissions)
    {
        //
    }
}
