<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SignupEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->email_data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'tenzindawa77745778@gmail.com';
        $subject = 'Welcome to Online Apartment Renatl System!';
        $name = 'Online Apartment Rental System';
        return $this->view('mail.signup-email',['email_data' => $this->email_data])
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject);
                    // ->view('mail.signup-email', ['email_data' => $this->email_data]);
        // return $this->from(env('MAIL_USERNAME'), 'tenzindawa77745778@gmail.com')->subject("Welcome to tenzindawa77745778@gmail.com!")->view('mail.signup-email', ['email_data' => $this->email_data]);
    }
}
