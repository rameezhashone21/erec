<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobApplyCandidateTestLink extends Mailable
{
    use Queueable, SerializesModels;

    public $postName;
    public $postSlug;
    public $postDesc;
    public $canName;
    public $postedBy;
    public $email;
    public $testLink;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($postName,$postSlug ,$postDesc ,$canName, $postedBy,$email, $testLink)
    {
        $this->postName = $postName;
        $this->postSlug = $postSlug;
        $this->postDesc = $postDesc;
        $this->canName = $canName;
        $this->postedBy = $postedBy;
        $this->postedBy = $postedBy;
        $this->testLink = $testLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Thank You for Applying';
        return $this->view('emails.jobApplyCandidateTestLink')->subject($subject);
    }
}
