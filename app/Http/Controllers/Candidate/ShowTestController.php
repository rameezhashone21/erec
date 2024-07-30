<?php

namespace App\Http\Controllers\Candidate;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExamAnswer;
use App\Models\ExamQuestion;
use App\Models\ExamResult;
use App\Models\JobApplications;

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
                    $arraySearch = array_search($nanswer->answer, $answer['answer']);
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
                    $arraySearch = array_search($nanswer->answer, $answer['answer']);
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
                    if ($nanswer->answer == $answer['answer'][0]) {
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

        if ($percentage >= $jobApplication->post->criteria) {
            $status = 'pass';
        } else {
            $status = 'fail';
        }

        // Save data into db
        $result = ExamResult::create([
            'job_application_id' => $jobApplication->id,
            'condidate_id'       => $jobApplication->candidate->user->new_user_id,
            'exam_id'            => $exam->id,
            'total_marks'        => $totalMarks,
            'obtained_marks'     => $obtainMarks,
            'perentage'          => $percentage,
            'status'             => $status
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
