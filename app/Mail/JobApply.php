<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobApply extends Mailable
{
    use Queueable, SerializesModels;

    public $postName;
    public $canName;
    public $postSlug;
    public $postDesc;
    public $canSlug;
    public $postedBy;
    public $canResume;
    public $jobAppPartner;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($postName, $canName, $postSlug, $postDesc, $canSlug, $postedBy, $canResume, $jobAppPartner)
    {
        $this->postName = $postName;
        $this->canName = $canName;
        $this->postSlug = $postSlug;
        $this->postDesc = $postDesc;
        $this->canSlug = $canSlug;
        $this->postedBy = $postedBy;
        $this->canResume = $canResume;
        $this->jobAppPartner = $jobAppPartner;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'New Job Application';
        return $this->view('emails.jobApply')->subject($subject);
    }
}
