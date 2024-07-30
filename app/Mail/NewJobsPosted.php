<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewJobsPosted extends Mailable
{
    use Queueable, SerializesModels;

    public $recName;
    public $postedBy;
    public $postName;
    public $postDesc;
    public $postSlug;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recName, $postedBy, $postName, $postDesc, $postSlug)
    {
        $this->recName = $recName;
        $this->postedBy = $postedBy;
        $this->postName = $postName;
        $this->postDesc = $postDesc;
        $this->postSlug = $postSlug;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'New Job Posted';
        return $this->view('emails.newJobsPosted')->subject($subject);
    }
}
