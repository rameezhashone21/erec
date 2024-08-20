<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Hired extends Mailable
{
    use Queueable, SerializesModels;

    // public $name;
    // public $phone;
    public $data;
    // public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        // $this->name = $name;
        // $this->phone = $phone;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'You’ve Been Hired!.';
        return $this->view('emails.hired')->subject($subject)->with('data', $this->data);
    }
}
