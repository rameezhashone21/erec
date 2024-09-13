<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobApply;
use App\Mail\JobApplyCandidate;
use App\Mail\JobApplyCandidateTestLink;


// Job application notification job
class SendJobApplicationNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $jobApp;

    public function __construct($jobApp)
    {
        $this->jobApp = $jobApp;
    }

    public function handle()
    {
        $post = $this->jobApp->post;
        $canEmail = $this->jobApp->candidate->user->email;
        $canName = $this->jobApp->candidate->first_name . ' ' . $this->jobApp->candidate->last_name;
        $postName = $post->post;
        $postSlug = $post->slug;
        $postDesc = $post->description;
        $email = $post->company ? $post->company->user->email : $post->recruiter->user->email;
        $postedBy = $post->company ? $post->company->user->email : $post->recruiter->user->email;

        if ($post->company != null){
            // $email = $jobApp->post->company->user->email;
            $postedBy = $post->company->name;
            // $posterId = User::where('id',$jobApp->post->company->user_id)->value('id');
        }
        elseif($post->recruiter != null)
        {
            // $email = $jobApp->post->recruiter->user->email;
            $postedBy = $post->recruiter->name;
            // $posterId = User::where('id',$jobApp->post->recruiter->user_id)->value('id');
            
        }

        if ($post->test_id) {
            // Send email with test link
            Mail::to($canEmail)->send(new JobApplyCandidateTestLink($postName, $postSlug, $postDesc, $canName, $postedBy, $email, 'https://backend.hostingladz.com/webapp/erec/public/user/candidates/job/application'));
        } else {
            // Send regular job application email
            Mail::to($canEmail)->send(new JobApplyCandidate($postName, $postSlug, $postDesc, $canName, $postedBy, $email));
        }

        // Send email to company or recruiter
        $compEmail = $post->company ? $post->company->user->email : $post->recruiter->user->email;
        $jobAppPartner = $post->company ? $post->company->name : $post->recruiter->name . ' ' . $post->recruiter->lastName;

        Mail::to($compEmail)->send(new JobApply($postName, $canName, $postSlug, $postDesc, $this->jobApp->candidate->slug, $postedBy, $this->jobApp->candidateDocument->document, $jobAppPartner, $compEmail));
    }
}
