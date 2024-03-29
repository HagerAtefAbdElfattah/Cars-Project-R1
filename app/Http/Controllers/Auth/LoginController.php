<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        
    }

    /**
     * Create a new credentials 
     *
     * 
     */
    public function credentials(Request $request)
    {
         if (filter_var($request->get('email'),FILTER_VALIDATE_EMAIL)) {
            return [
                'email'     => $request->get('email'),
                'password'  => $request->get('password'),
                'active'    => "1"
            ];
        }else {
            return [
                'userName'  => $request->get('email'),
                'password'  => $request->get('password'),
                'active'    => "1"
        ];
        }
    }

   
}
