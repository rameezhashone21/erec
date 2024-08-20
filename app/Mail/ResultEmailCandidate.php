<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResultEmailCandidate extends Mailable
{
    use Queueable, SerializesModels;

    // public $name;
    // public $phone;
    public $grade;
    public $canName;
    public $postedBy;
    public $percentage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($grade, $canName, $postedBy, $percentage)
    {
        $this->grade = $grade;
        $this->canName = $canName;
        $this->postedBy = $postedBy;
        $this->percentage = $percentage;
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
        if($this->grade == "A" || $this->grade == "B")
        {
            $subject = 'Congratulations on Passing the Test!';
            return $this->view('emails.ResultEmailCandidateForPass')->subject($subject);
        }
        elseif($this->grade == "C") {
            $subject = 'Your Test Is Being Reviewed.';
            return $this->view('emails.ResultEmailCandidateForAverage')->subject($subject);
        }
        else {
            $subject = 'Update on Your Test Results.';
            return $this->view('emails.ResultEmailCandidateForFail')->subject($subject);
        }
        
    }
}
