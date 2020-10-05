<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    public function getDataAll()
    {
        $query = User::all();
    }

}
