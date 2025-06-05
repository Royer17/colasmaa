<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function authenticate(Request $request) {
        if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {

            if (Auth::user()->is_superadmin == 1) {
                //dd('superadmin');
                return redirect('/admin/dashboard');
            }

            if (Auth::user()->role_id == 2) {
                return redirect('/colasv2/manejo-de-tickets');
            }

            if (Auth::user()->role_id == 3) {
                return redirect('/colasv2');
            }

            if (Auth::user()->role_id == 4) {
                return redirect('/colasv2/monitor');
            }

            Auth::logout();
            return redirect('/panel');

        } else {
            return redirect()->intended('/panel')->with('data', ['Nombre de usuario y/o Contraseña Incorrectas']);
        }
    }

    public function logout(Request $request) {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }

}
