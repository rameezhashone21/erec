<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShortListed extends Mailable
{
    use Queueable, SerializesModels;
    public $postName;
    public $canName;
    public $postedBy;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($postName,$canName, $postedBy)
    {
        //
        $this->postName = $postName;
        $this->canName = $canName;
        $this->postedBy = $postedBy;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'You have been shortlisted for this job';
        return $this->view('emails.shortListed')->subject($subject);
    }
}
