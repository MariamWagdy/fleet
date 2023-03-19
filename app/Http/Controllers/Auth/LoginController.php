<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Providers\RouteServiceProvider;
use Illuminate\{Http\Request, Support\Facades\Auth};

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


    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index()
    {
        if (Auth::check()) {
            return view('dashboard')->with(['cities' =>Cities::getSelectedCities()]);
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $remember = $request->has('remember') ? true : false;
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $remember)) {
            return redirect('dashboard')->with(['name', Auth::user()->name]);
        } else {
            return redirect("login")->with(['title', 'Login details are not valid']);
        }
    }

    public function logout() {
        Auth::logout();

        return Redirect('login');
    }
}
