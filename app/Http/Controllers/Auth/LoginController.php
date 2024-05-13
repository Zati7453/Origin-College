<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Helpers\ReturnToastHelper;
use App\Helpers\RegisterSingInHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        // $this->middleware('guest')->except('logout');
    }

    public function login() {
        return view('auth.login');
    }
    public function register($token=null) {
        $info = RegisterSingInHelper::getSignupMessage($token);
        return view('auth.register')->with('info',$info);
        // return view('auth.register');

    }
    public function registerProcess(Request $request){
        return RegisterSingInHelper::userRegister($request);
    }

    public function loginProcess(Request $request)
    {
        return RegisterSingInHelper::signInProcess($request);
    }

    public function Logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
