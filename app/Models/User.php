<?php

namespace App\Models;

use App\Spph;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable
{
    use Notifiable, LogsActivity,  \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    protected $table = 'users';

    protected $fillable = [
        'name', 'username', 'email', 'password', 'level', 'employee_status', 'last_sign_in', 'current_sign_in_at',
    ];

    protected static $logAttributes = [
        'name', 'username', 'email', 'level', 'position', 'phone', 'last_sign_in', 'current_sign_in_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Function Roles 
    public function spph()
    {
        return $this->hasMany(Spph::class, 'created_by');
    }
   
    public function roles()
    {
        return $this->hasMany(Roles::class,'id','role_id');
    }

    // Function get Data and CRUD 

    public function getDataAll()
    {
        $query = User::all();
    }


}
