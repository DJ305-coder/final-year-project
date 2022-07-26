<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $token)
    {
        //
        $this->name = $name;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        $user['name'] = $this->name;
        $user['token'] = $this->token;

        return $this->subject('Password Reset Link')
                    ->view('mail_template.reset_password', ['user' => $user]);

    }
}
