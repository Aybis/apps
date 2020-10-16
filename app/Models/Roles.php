<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany('App\Models\User','role_id');
    }

    public function insertData($data)
    {
        $role = new Roles();
        $role->name = $data['names'];
        $role->display = $data['display'];
        $role->save();
        return $role;
    }

    public function updateData($data, $role)
    {
        $role->name = $data['name'];
        $role->display = $data['display'];
        $role->save();
        return $role;
    }
}
