<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     * @return void
     */

    public function __construct($user, $student)
    {
        $this->user = $user;
        $this->student = $student;
    }

    /**
     * Build the message.
     * @return $this
     */

    public function build()
    {
        $subject = 'Bienvenue sur Finder.';

        return $this
            ->subject($subject)
            ->markdown('emails.welcome', [
                'first_name' => $this->student->first_name,
                'email' => $this->user->email,
                'url' => route('password.create', Password::broker()->createToken($this->user)),
            ]);
    }
    
}