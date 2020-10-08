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
}
