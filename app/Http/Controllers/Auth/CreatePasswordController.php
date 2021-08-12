<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;

class CreatePasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after a created password.
     *
     * @return string
     */
    protected function redirectTo()
    {
        return route('profil.create');
    }

    /**
     * Display the password create view for the given token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Http\Response
     */
    public function showCreateForm(Request $request, $token)
    {
        return view('auth.passwords.create')->with(
            ['token' => $token]
        );
    }

    /**
     * Create the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //$request->validate($this->rules(), $this->validationErrorMessages());

        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
                if ($user->markEmailAsVerified()) {
                    event(new Verified($user));
                }
            }
        );

        // $response == Password::PASSWORD_RESET ? $this->sendResetResponse($request, 'profil.create') : $this->sendResetFailedResponse($request, $response);

        return redirect ('/student/create-profil');
    }
}