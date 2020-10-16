<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{

    public $roles;
    public $permissions; 

    public function __construct()
    {
        $this->roles = new Roles();
        $this->permissions = new Permissions();
    }

    public function getAllData()
    {
        return $this->roles->all();
    }
   
    public function index()
    {
        return view('modules.management.roles.index');
    }

    public function addPermissions(Roles $roles)
    {
        $collection = collect($this->permissions->all());
        
        $grouped = $collection->mapToGroups(function ($item) {
            return array ($item['menu'] => array("name" => $item['name'], "display" =>$item['display']));
            // return [$item['menu'] => $item['display']];
        });
        
        $grouped->toArray();
        return view('modules.management.roles.add-permissions', compact('roles','grouped'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,except,id|alpha_dash',
            'display' => 'required'
        ], [
            'unique' => ':Attribute must be unique',
            'alpha_dash' => ':Attribute cannot contain space',
            'required' => ':Attribute cannot be empty',
        ]);
        DB::beginTransaction();
        try{
            $insert = $this->roles->insertData($request->all());
            DB::commit();
            return response($insert, 201);
        }catch(\Exception $e){
            DB::rollback();
            return with('message', $e->getMessage());
        }
    }



    public function update(Request $request, Roles $roles)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,except,'.$roles->id.'|alpha_dash',
            'display' => 'required'
        ], [
            'unique' => ':Attribute must be unique',
            'alpha_dash' => ':Attribute cannot contain space',
            'required' => ':Attribute cannot be empty',
        ]);

        DB::beginTransaction();
        try{
            $update = $this->roles->updateData($request, $roles);
            DB::commit();
            return response($update);
        }catch(\Exception $e){
            DB::rollback();
            return with('message', $e->getMessage());
        }
    }

    public function create()
    {
        //
    }

   public function destroy(Roles $roles)
    {
        $roles->delete();
        return response($roles);
    }
}
