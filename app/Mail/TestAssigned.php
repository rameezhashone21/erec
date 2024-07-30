<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestAssigned extends Mailable
{
    use Queueable, SerializesModels;

    // public $name;
    // public $phone;
    public $email;
    // public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        // $this->name = $name;
        // $this->phone = $phone;
        $this->email = $email;
        // $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Test Assigned';
        return $this->view('emails.testAssigned')->subject($subject);
    }
}
