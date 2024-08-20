<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Result extends Mailable
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
        // $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     $subject = 'Test Assigned';
    //     return $this->view('emails.hired')->subject($subject);
    // }
    
    public function build()
    {
        $subject = "Applicant’s Test Results";
        // return $this->view('emails.result')
        //             ->with('data', $this->data);
                    return $this->view('emails.result')->subject($subject);

    }
}
