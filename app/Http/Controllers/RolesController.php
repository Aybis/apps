<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function getAllData()
    {
        return Roles::all();
    }
   
    public function index()
    {
        return view('modules.management.roles.index');
    }

    public function create()
    {
        $data = Permissions::groupBy('menu')->get();
        dd($data);
        return view('modules.management.roles.add-permissions');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Roles $roles)
    {
        //
    }

    public function edit(Roles $roles)
    {
        //
    }

    public function update(Request $request, Roles $roles)
    {
        //
    }

   public function destroy(Roles $roles)
    {
        //
    }
}
