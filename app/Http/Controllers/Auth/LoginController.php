<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
         $this->middleware('guest')->except('logout');
    }

    public function authenticate(Request $request) {

        $validator = $request->validate([
            'email'     => 'required',
            'password'  => 'required|min:8'
        ]);

        dd($validator);

        if (Auth::attempt($validator)) {
            return redirect()->route('/');
        }
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return back();
    }
}
