<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobApplyCandidate extends Mailable
{
    use Queueable, SerializesModels;

    public $postName;
    public $postSlug;
    public $postDesc;
    public $canName;
    public $postedBy;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($postName,$postSlug ,$postDesc ,$canName, $postedBy,$email)
    {
        $this->postName = $postName;
        $this->postSlug = $postSlug;
        $this->postDesc = $postDesc;
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
        $subject = 'You applied for the job';
        return $this->view('emails.jobApplyCandidate')->subject($subject);
    }
}
