<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;

trait LoginUsername
{
    use RedirectsUsers, ThrottlesLogins;


    public function showLoginForm()
    {
        return view('auth.login_username');
    }


    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }


    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            ]);
    }

    public function logsActivityLogin(Request $request)
    {
        $activity = activity()
        ->causedBy(Auth::user())
        ->withProperties(['attributes'=>$request->input('username')])
        ->log('Login');

        return true;

    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->has('remember')
        );
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }


    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);
        $this->logsActivityLogin($request);
        return $this->authenticated($request, $this->guard()->user())
        ?: redirect()->intended($this->redirectPath());
    }

    protected function authenticated(Request $request, $user)
    {
        //
    }


    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
            ]);
        }

        public function username()
        {
            return 'username';
        }

        public function logout(Request $request)
        {
            $this->guard()->logout();

            $request->session()->invalidate();

            return $this->loggedOut($request) ?: redirect('/');
        }


        protected function loggedOut(Request $request)
        {
            $activity = activity()
            ->causedBy(Auth::user())
            ->withProperties(['attributes'=>$request->input($request->username)])
            ->log('Logout');

        }


        protected function guard()
        {
            return Auth::guard();
        }
}
