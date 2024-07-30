<?php

namespace App\Models;

use App\Models\Posts;
use App\Models\QstScore;
use App\Models\Candidate;
use App\Models\ExamResult;
use App\Models\QstQuestions;
use App\Models\CandidateDocs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplications extends Model
{
    use HasFactory;

    protected $table = 'job_applications';

    protected $fillable = [
        'post_id',
        'candidate_id',
        'class_id',
        'candidate_doc_Id ',
        'qst_id',
        'status',    /* 5=rejected, 2=hired, 1=test assigned */
        'coverLetter',
        'coverLetterFile',
    ];

    public function postRec()
    {
        return $this->belongsTo(Posts::class, 'post_id', 'id')->where('rec_id', auth()->user()->recruiter->id);
    }
    public function postComp()
    {
        return $this->belongsTo(Posts::class, 'post_id', 'id')->where('comp_id', auth()->user()->company->id);
    }
    public function post()
    {
        return $this->belongsTo(Posts::class, 'post_id', 'id');
    }
    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }
    public function candidateDocument()
    {
        return $this->belongsTo(CandidateDocs::class, 'candidate_doc_Id', 'id');
    }
    public function test($id)
    {
        // $response = Http::get('https://api.e-rec.com.au/api/qst/to/classes', [
        //     'class_id' => $id,
        // ]);
        // $data = $response->json();

        $data = Exam::all();
        return $data;
    }
    public function getSingleClass($id)
    {
        $data = JobCategory::where('id', $id)->first();
        // $response = Http::get('https://api.e-rec.com.au/api/single/class', [
        //     'class_id' => $id,
        // ]);
        // $data = $response->json();
        return $data;
    }
    public function qst($id)
    {
        // $response = Http::get('https://api.e-rec.com.au/api/single/qst', [
        //     'id' => $id,
        // ]);
        // $data = $response->json();
        $data = Exam::where('id', $id)->first();
        return $data;
    }
    public function qstSocre($user_id, $qst)
    {
        // $response = Http::get('https://api.e-rec.com.au/api/user/qst/Socre', [
        //     'user_id' => $user_id,
        //     'qst' => $qst,
        // ]);
        // $data = $response->json();
        $data = ExamResult::where([
            'condidate_id' => $user_id,
            'exam_id'     => $qst
        ])->orderBy('id', 'desc')->first();
        return $data;
    }
    public function sec_qstSocre()
    {
        return $this->belongsTo(QstScore::class, 'qst_id', 'qst');
    }
    public function qst_total_marks()
    {

        return $this->hasMany(QstQuestions::class, 'qst_no', 'qst_id');
    }
    public function total_marks()
    {
        // $rangePercentage = 60;

        // Fetch data from the database, join the 'qst_questions' and 'qst_scores' tables based on the 'qst' column
        // $questions = DB::connection('second_db')->table('qst_questions')
        //     ->join('qst_scores', 'qst_questions.qst', '=', 'qst_scores.qst')
        //     ->select('qst_questions.id', 'qst_questions.value', 'qst_scores.mark')
        //     ->get();

        // Filter questions based on the percentage range
        // $filteredQuestions = $questions->filter(function ($question) use ($rangePercentage) {
        //     // Calculate the percentage for each question
        //     $percentage = ($question->mark / $question->value) * 100;

        //     // Return questions that have a percentage less than or equal to the specified range
        //     return $percentage <= $rangePercentage;
        // });
        $related = $this->qst_total_marks();
        if ($related->count() > 0) {
            $sum = $related->sum('value');
            // dd($related->sum('value'));
        } else {
            $sum = 0;
        }

        return $sum;
    }

    public function result()
    {
        return $this->hasOne(ExamResult::class, 'job_application_id', 'id');
    }

    public function exam()
    {
        return $this->hasOne(Exam::class, 'qst_id', 'id');
    }
}
