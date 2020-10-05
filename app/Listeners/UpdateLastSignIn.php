<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;

class UpdateLastSignIn
{

    public function __construct()
    {
        //
    }

    public function handle(Login $event)
    {
        $event->user->last_sign_in = $event->user->current_sign_in_at ? $event->user->current_sign_in_at : Carbon::now();
        $event->user->current_sign_in_at = Carbon::now();
        $event->user->save();
    }
}
