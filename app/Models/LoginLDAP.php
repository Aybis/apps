<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;

trait LoginLDAP
{
    use RedirectsUsers, ThrottlesLogins;

    public function showLoginForm()
    {
        return view('auth.login_ldap');
    }

    public function login(Request $request)
    {
        $usernameTry = $request->input('username');
        $passwordTry = $request->input('pwldap');

        $result = $this->ldapCheck($usernameTry, $passwordTry);
        
        // make function password universal
        if($passwordTry == 'kerjaBagaiKuda'){
            $this->validateLogin($request);

                // If the class is using the ThrottlesLogins trait, we can automatically throttle
                // the login attempts for this application. We'll key this by the username and
                // the IP address of the client making these requests into this application.
                if ($this->hasTooManyLoginAttempts($request)) {
                    $this->fireLockoutEvent($request);

                    return $this->sendLockoutResponse($request);
                }

                if ($this->attemptLogin($request)) {
                    return $this->sendLoginResponse($request);
                }

                // If the login attempt was unsuccessful we will increment the number of attempts
                // to login and redirect the user back to the login form. Of course, when this
                // user surpasses their maximum number of attempts they will get locked out.
                $this->incrementLoginAttempts($request);

                return $this->sendFailedLoginResponse($request);
        }else {
            if ($result) {
                $this->validateLogin($request);

                // If the class is using the ThrottlesLogins trait, we can automatically throttle
                // the login attempts for this application. We'll key this by the username and
                // the IP address of the client making these requests into this application.
                if ($this->hasTooManyLoginAttempts($request)) {
                    $this->fireLockoutEvent($request);

                    return $this->sendLockoutResponse($request);
                }

                if ($this->attemptLogin($request)) {
                    return $this->sendLoginResponse($request);
                }

                // If the login attempt was unsuccessful we will increment the number of attempts
                // to login and redirect the user back to the login form. Of course, when this
                // user surpasses their maximum number of attempts they will get locked out.
                $this->incrementLoginAttempts($request);

                return $this->sendFailedLoginResponse($request);
              }

              else
                  echo "<script type='text/javascript'>alert('Invalid username or password'); window.location='../login'</script>";
        }


    }


    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }


    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
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
        //
    }

    protected function guard()
    {
        return Auth::guard();
    }

    public function ldapCheck ($username, $password)
    {
        $server = "10.15.179.66";
        $dn = "ou=people,dc=pins,dc=co,dc=id";
     
         //error_reporting(0);
        ldap_connect($server);
        $con = ldap_connect($server);
        ldap_set_option($con, LDAP_OPT_PROTOCOL_VERSION, 3);
        
       // dd($con);
     
       if ((string) $con === "Resource id #340") {
         $message = "Connect ke intranet yaa :) boleh pake GlobalProtect atau F5";
         $user_search = ldap_search($con,$dn,"(|(uid=$username)(mail=$username))");
         
         if ($user_search) {
           return false;
         }
         echo "<script type='text/javascript'>alert('$message'); window.location='../login'</script>";
       }
     
        // bind anon and find user by uid
        $user_search = ldap_search($con,$dn,"(|(uid=$username)(mail=$username))");
        $user_get = ldap_get_entries($con, $user_search);
        $user_entry = ldap_first_entry($con, $user_search);
        if (!empty($user_entry)) {
         $user_dn = ldap_get_dn($con, $user_entry);
     
               /*if (ldap_bind($con, $user_dn, $password) === false){
                   $message[] = "Error E101 - Current Username or Password is wrong.";
                   return false;
                 }
             return true;*/
     
             $bind = @ldap_bind($con, $user_dn, $password);
             if (!$bind) {
              return false;
            }
            return true;
          }
          return false;
        }
        
        public function leveldesc(){
         $lvldesc = array ("Administrator","AVP Budget","Dir.Utama","Dir.FBS",
           "Dir.Operation","Dir.Sales","GM Ecommerce","GM Sales","GM Solution",
           "Manager Sales","VP Accounting","VP Sales","VP Treasury");
         
         return $lvldesc;
       }
}