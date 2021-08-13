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

    // /**
    //  * Create a new message instance.
    //  * @return void
    //  */

    // public function __construct($user, $student)
    // {
    //     $this->user = $user;
    //     $this->student = $student;
    // }

    /**
     * Where to redirect users after a created password.
     *
     * @return string
     */
    protected function redirectTo()
    {
        $url = route('profil.create');
        
        return $url;
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

        $email = $request->email;

        return view('auth.passwords.create')->with(
            ['token' => $token,
            'email' => $email]
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
        $request->validate($this->rules(), $this->validationErrorMessages());
        $response = $this->broker()->reset($this->credentials($request), 
        function ($user, $password) {
            $this->resetPassword($user, $password);
                if ($user->markEmailAsVerified()) {
                    event(new Verified($user));
                }
            }
        );
        return $response == Password::PASSWORD_RESET
                    ? $this->sendResetResponse($request, 'passwords.create')
                    : $this->sendResetFailedResponse($request, $response);
    }
}