<?php

namespace App\Http\Controllers\Candidate;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ExamNotification;
use App\Models\Company;
use App\Models\Posts;
use App\Models\ExamAnswer;
use App\Models\ExamQuestion;
use App\Models\ExamResult;
use App\Models\JobApplications;
use Illuminate\Support\Facades\Mail;
use App\Mail\Result;
use App\Mail\NotifyUser;
use App\Mail\ResultEmailCandidate;
use App\Mail\TestAttempted;
use DB;


class ShowTestController extends Controller
{
    /**
     * Render test page
     */
    public function index(Request $request)
    {
        $exam = Exam::with('questions')->where('id', $request->qst)->first();
        $total_question = count($exam->questions);
        
        if($total_question >= $exam->question_showto_condidate)
        {
            $questions = $exam->questions->random($exam->question_showto_condidate);
            $jobApplicationId = $request->jobApplication;
            return view('candidatepanel.pages.test.index', compact('exam', 'questions', 'jobApplicationId'));
        }
        else{
            $questions = $exam->questions;
            $jobApplicationId = $request->jobApplication;
            return view('candidatepanel.pages.test.index', compact('exam', 'questions', 'jobApplicationId'));
        }
        
    }
    
    /**
     * Calculate result
     */
    public function candidate_notify(Request $request)
    {
        $result_id = $request->id;
        
        $exam_result = ExamResult::where('id',$result_id)->first();
        
        $job_application_id = $exam_result->job_application_id;
        
        $jobApplication = JobApplications::where('id',$job_application_id)->first();
        
        $job = Posts::where('id',$jobApplication->post_id)->first();
        
        $company = Company::where('id',$job->comp_id)->first();
        $candidate = User::where('new_user_id',$exam_result->condidate_id)->first();
        $employer = User::where('id',$company->user_id)->first();
        
        $data = ['candidate' => $candidate->name, 'position' => $job->post, 'employer' => $employer->name ];
        //$notified = Mail::to($candidate->email)->send(new NotifyUser($data));

        if ($jobApplication->post->company != null){
            $postedBy = $jobApplication->post->company->name;
        }
        elseif($jobApplication->post->recruiter != null)
        {
            $postedBy = $jobApplication->post->recruiter->name;
        }

        if($exam_result->grade == "A" || $exam_result->grade == "B") {
            $j = Mail::to($candidate->email)->send(new ResultEmailCandidate($exam_result->grade, $candidate->name, $postedBy, $exam_result->perentage));
        } else if($exam_result->grade == "C") {
            $j = Mail::to($candidate->email)->send(new ResultEmailCandidate($exam_result->grade, $candidate->name, $postedBy, $exam_result->perentage));
        } 
        else if($exam_result->grade == "F") {
            $j = Mail::to($candidate->email)->send(new ResultEmailCandidate($exam_result->grade, $candidate->name, $postedBy, $exam_result->perentage));
        }
        
        
       // Update Notification Status
        $exam_result->notified = 1;
        $exam_result->save();
        
        $notification = ExamNotification::create([
            'content' => "Dear" .auth()->user()->name." You have been Shortlisted for the postion of " .$job->post,
            'status'       => "exam_result",
            'job_id'       => $job_application_id,
            'user_id'       => $candidate->id
        ]);
        
        
        return redirect()->back()->with('success', 'User has been Notified!');
    }

    /**
     * Calculate result
     */
    public function calculateResult(Request $request)
    {
        // Get exam details
        $exam = Exam::where('slug', $request->exam)->first();
        $total_question = count($exam->questions);
        
        if($total_question >= $exam->question_showto_condidate)
        {
            $limit = $exam->question_showto_condidate;
        }
        else{
            $limit = count($exam->questions);
        }


        // Calculate result
        $correct = 0;
        $data = $request->all();
        // dd($exam->question_showto_condidate);
        for ($i = 1; $i <= $limit; $i++) {
            $answer = $data['answer' . $i];

            // Get question detailse
            $question = ExamQuestion::where([
                'exam_id' => $exam->id,
                'id'      => (int) $answer[1],
            ])->first();

            // True false calculate
            if ($answer[0] == 'boolean') {
                foreach ($question->answers as $nanswer) {
                    if (!isset($answer['answer'])) {
                        continue;
                    }

                    if ($nanswer->is_correct == 'yes' && $answer['answer'][0] == '1') {
                        $correct = $correct + 1;
                    } elseif ($nanswer->is_correct == 'no' && $answer['answer'][0] == '0') {
                        $correct = $correct + 1;
                    }
                }
            } elseif ($answer[0] == 'multiple') {
                // Total answers correct count
                $mcorrectCount = $question->answers->where('is_correct', 'yes')->count();

                $correctMultiple = 0;
                foreach ($question->answers as $nanswer) {
                    if (!isset($answer['answer'])) {
                        continue;
                    }
                    if ($nanswer->is_correct == 'no') {
                        continue;
                    }

                    // Check answer was correct than correct count increase for this anaswer
                    $arraySearch = array_search(trim($nanswer->answer), $answer['answer']);
                    // if ($nanswer->is_correct == 'yes' && ($arraySearch != false || $arraySearch == '0')) {
                    //     $correctMultiple++;
                    // }
                    
                    if ($nanswer->is_correct == 'yes' && $arraySearch !== false) {
                         $correctMultiple++;
                    }   
                }

                // match total correct and user given correct if its match than mark question as correct
                if ($mcorrectCount == $correctMultiple) {
                    $correct = $correct + 1;
                }
            } elseif ($answer[0] == 'single') {
                // Total answers correct count
                $scorrectCount = $question->answers->where('is_correct', 'yes')->count();

                $correctMultiple = 0;
                foreach ($question->answers as $nanswer) {
                    if (!isset($answer['answer'])) {
                        continue;
                    }

                    if ($nanswer->is_correct == 'no') {
                        continue;
                    }

                    // Check answer was correct than correct count increase for this anaswer
                    $arraySearch = array_search(trim($nanswer->answer), $answer['answer']);
                    // if ($nanswer->is_correct == 'yes' && ($arraySearch != false || $arraySearch == '0')) {
                    //     $correctMultiple++;
                    // }
                    
                    if ($nanswer->is_correct == 'yes' && $arraySearch !== false) {
                         $correctMultiple++;
                    }   
                }

                // match total correct and user given correct if its match than mark question as correct
                if ($scorrectCount == $correctMultiple) {
                    $correct = $correct + 1;
                }
            } elseif ($answer[0] == 'text') {
                foreach ($question->answers as $nanswer) {
                    if (!isset($answer['answer'])) {
                        continue;
                    }
                    // Check answer was correct
                    if (trim($nanswer->answer) == $answer['answer'][0]) {
                        $correct = $correct + 1;
                    }
                }
            }
        }

        // obtain marks
        $obtainMarks = $correct;
        
        if($total_question >= $exam->question_showto_condidate)
        {
            $totalMarks = $exam->question_showto_condidate;
        }
        else{
            $totalMarks = count($exam->questions);
        }
        
        $percentage = ($obtainMarks / $totalMarks) * 100;
        $jobApplication = JobApplications::where([
            'id'     => $request->jobApplicationId,
            'qst_id' => $exam->id
        ])->first();

        $canName = $jobApplication->candidate->first_name.' '.$jobApplication->candidate->last_name;

        if ($jobApplication->post->company != null){
            $email = $jobApplication->post->company->user->email;
            $postedBy = $jobApplication->post->company->name;
        }
        elseif($jobApplication->post->recruiter != null)
        {
            $email = $jobApplication->post->recruiter->user->email;
            $postedBy = $jobApplication->post->recruiter->name;
        }

        if($percentage > 90) {
            $status = 'Pass';
            $grade = 'A';
            $email_status = "Cleared";
        } else if($percentage >= 80 && $percentage <= 90 ) {
            $status = 'Pass';
            $grade = 'B';
            $email_status = "Cleared";
        } 
        else if($percentage >= 60 && $percentage < 80) {
            $status = 'Average';
            $grade = 'C';
            $email_status = "Cleared";
        }
        else {
            $status = 'Fail';
            $grade = 'F';
            $email_status = "Failed";
        }
        
        $job = Posts::where('id',$jobApplication->post_id)->first();
        
        $company = Company::where('id',$job->comp_id)->first();
        $employer = User::where('id',$company->user_id)->first();
        $data = ['username' => auth()->user()->name, 'status' => $email_status, 'grade' => $grade, 'percentage' => $percentage, 'position' => $job->post, 'employer' => $employer->name, 'postedBy' => $postedBy ];
        Mail::to($employer->email)->send(new Result($data));
        Mail::to(auth()->user()->email)->send(new TestAttempted($data));

        // Save data into db
        $result = ExamResult::create([
            'job_application_id' => $jobApplication->id,
            'condidate_id'       => $jobApplication->candidate->user->new_user_id,
            'exam_id'            => $exam->id,
            'total_marks'        => $totalMarks,
            'obtained_marks'     => $obtainMarks,
            'perentage'          => $percentage,
            'grade'              => $grade, 
            'status'             => $status
        ]);
        
        $notification = ExamNotification::create([
            'content' => "User " .auth()->user()->name." has attempted a for the postion of " .$job->post,
            'status'       => "exam_status",
            'job_id'       => $jobApplication->post_id,
            'user_id'       => $employer->id
        ]);

        if ($result) {
            return redirect()->route('candidates.job.index')->with('success', 'Test submitted successfully.');
        } else {
            return redirect()->route('candidates.job.index')->with('error', 'Sorry something went wrong!');
        }
    }

    /**
     * Fail the test
     */
    public function failTestAttempt($examId, $jobApplicationId)
    {
        // Get exam details
        $exam = Exam::where('slug', $examId)->first();

        // Get job application data
        $jobApplication = JobApplications::where([
            'id'     => $jobApplicationId,
            'qst_id' => $exam->id
        ])->first();

        $result = ExamResult::create([
            'job_application_id' => $jobApplication->id,
            'condidate_id'       => $jobApplication->candidate->user->new_user_id,
            'exam_id'            => $exam->id,
            'total_marks'        => $exam->question_showto_condidate,
            'obtained_marks'     => 0,
            'perentage'          => 0,
            'status'             => 'fail'
        ]);

        if ($result) {
            return redirect()->route('candidates.job.index')->with('error', 'Test attempt failed.');
        } else {
            return redirect()->route('candidates.job.index')->with('error', 'Sorry something went wrong!');
        }
    }
}
