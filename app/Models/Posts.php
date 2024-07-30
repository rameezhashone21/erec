<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recruiter;
use App\Models\Company;
use App\Models\PostSkill;
use App\Models\JobApplications;
use Illuminate\Support\Facades\Http;

class Posts extends Model
{
    use HasFactory;
    protected $table = 'post';

    protected $fillable = [
        'post',
        'job_type',
        'increment',
        'experience',
        'location',
        'description',
        'banner',
        'test_attached',
        'slug',
        'rec_id',
        'comp_id',
        'rec_delete',
        'status',
        /** status = 0(Inactive) / 1(Active) / 5(Admin Inactive)    */
        'skill_exp',
        'key_responsibility',
        'expiry_date',
        'qualification',
        'gender',
        'offer_salary',
        'class_id',
        'test_id',
    ];

    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class, 'rec_id', 'id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'comp_id', 'id');
    }
    public function skills()
    {
        return $this->belongsToMany(
            Skills::class,
            PostSkill::class,
            'post_id',
            'skill_id',
        );
    }
    public function jobApp()
    {
        if (auth()->check()) {
            return $this->hasMany(JobApplications::class, 'post_id', 'id')->where('candidate_id', auth()->user()->candidate->id);
        } else {
            return NULL;
        }
    }
    public function jobAppRecComp()
    {
        if (auth()->check()) {
            return $this->hasMany(JobApplications::class, 'post_id', 'id');
        } else {
            return NULL;
        }
    }
    public function getSingleClass($id)
    {
        // $response = Http::get('https://api.e-rec.com.au/api/single/class', [
        //     'class_id' => $id,
        // ]);
        // $data = $response->json();
        $data = JobCategory::where('id', $id)->first();
        return $data;
    }
    // public function getTest()
    // {
    //     // dd('ok');
    //     $response = Http::get('https://api.e-rec.com.au/api/qst/to/classes', [
    //         'class_id' => 'test_id',
    //     ]);
    //     $data = $response->json();
    //     return $data;
    // }
    // public function test($id)
    // {
    //     $response = Http::get('https://api.e-rec.com.au/api/qst/to/classes', [
    //         'class_id' => $id,
    //     ]);
    //     $data = $response->json();
    //     return $data;
    // }
}
