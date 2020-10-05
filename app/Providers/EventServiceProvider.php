<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // for login insert to audits
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\UpdateLastSignIn',
        ],
        // for logout
        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\UpdateLogOut',
        ],
    ];

    public function boot()
    {
        parent::boot();

        //
    }
}
