<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

// Login with LDAP
// use App\Models\LoginLDAP;

// Login just username
use App\Models\LoginUsername;

class LoginController extends Controller
{

    // Login with LDAP
    // use LoginLDAP;
    // Login with Username
    use LoginUsername;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
