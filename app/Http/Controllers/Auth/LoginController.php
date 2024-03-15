<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;


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
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    function view_login() {
        return view("login");    
    }

    function postlogin(Request $request) {
        $infologin = [
            'email' => $request->email,
            // 'role' => $request->role,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)) {
            if(Auth::user()->role == 'admin') {
                return redirect("dashboard");
            } elseif (Auth::user()->role == 'pj') {
                return redirect("dashboard");
            } elseif(Auth::user()->role == "asisten") {
                return redirect('dashboard');
            }
        } else {
            return redirect('/')->with('toast_error', 'Username dan Password Salah');
        }
    }

    function logout() {
        Auth::logout();
        return redirect("/");
    }
}
