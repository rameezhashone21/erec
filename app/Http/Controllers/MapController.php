<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Posts;
use App\Models\Candidate;
use App\Models\JobCategory;
use App\Models\ExamResult;
use App\Models\QstQuestions;
use Illuminate\Http\Request;
use App\Models\JobApplications;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class MapController extends Controller
{
    //
    public function recruiterMap()
    {

        $jobApp = JobApplications::with('post', 'candidate', 'candidateDocument')->whereHas('post', function ($query) {
            $query->where('rec_id', auth()->user()->recruiter->id);
        })->get();
        // dd($jobApp->toArray());
        $post = Posts::where('rec_id', auth()->user()->recruiter->id)->with('recruiter', 'recruiter', 'skills')->orderBy('id', 'DESC')->get();
        // dd($post->toArray());
        $data = JobCategory::orderby('title', 'asc')->get();

        return view('recruterpanel.pages.map.index', compact('jobApp', 'post', 'data'));
    }
    public function recruiterSmartSearch(Request $request)
    {
        $jobApp = JobApplications::with('post', 'candidate', 'candidateDocument', 'candidate.user', 'candidate.user.candidatePro', 'candidate.user.candidateEdu')->whereHas('post', function ($query) {
            $query->where('rec_id', auth()->user()->recruiter->id);
        });
        if ($request->has('post') && $request->post != null) {
            $post = $request->post;
            $jobApp = $jobApp->whereHas('post', function ($query) use ($post) {
                $query->where('id', $post);
            });
        }
        if ($request->has('gender') && $request->gender != null) {
            $gender = $request->gender;
            $jobApp = $jobApp->whereHas('candidate', function ($query) use ($gender) {
                $query->where('gender', $gender);
            });
        }
        if ($request->has('validity') && $request->validity != null) {
            $validity = $request->validity;
            $jobApp = $jobApp->whereHas('post', function ($query) use ($validity) {
                $query->where('expiry_date', $validity);
            });
        }
        if ($request->has('posted_date') && $request->posted_date != null) {
            $posted_date = Carbon::parse($request->posted_date);
            $jobApp = $jobApp->whereHas('post', function ($query) use ($posted_date) {
                $query->where('created_at', '>=', $posted_date);
            });
            // dd($jobApp->get()->toArray());
        }
        if ($request->has('startDate') && $request->startDate != null && $request->has('endDate') && $request->endDate != null) {
            $startDate = Carbon::createFromFormat('d/m/Y', $request->startDate);
            $startDate = $startDate->format('Y-m-d');
            $endDate = Carbon::createFromFormat('d/m/Y', $request->endDate);
            $endDate = $endDate->format('Y-m-d');
            $jobApp = $jobApp->whereHas('post', function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            });
            // dd($jobApp->get()->toArray());
        }
        if ($request->has('exp') && $request->exp != null) {
            $exp = $request->exp;
            $jobApp = $jobApp->whereHas('post', function ($query) use ($exp) {
                $query->where('experience', $exp);
            });
        }
        if ($request->has('qualification') && $request->qualification != null) {
            $qualification = $request->qualification;
            $jobApp = $jobApp->whereHas('post', function ($query) use ($qualification) {
                $query->where('qualification', $qualification);
            });
        }
        if ($request->has('category') && $request->category != null) {
            $category = $request->category;
            $jobApp = $jobApp->whereHas('post', function ($query) use ($category) {
                $query->where('class_id', $category);
            });
        }
        if ($request->has('search') && $request->search != null) {
            $search = $request->search;
            $search = explode(' ', $search);
            $oldsearch = $search[0];
            $jobApp = $jobApp->whereHas('candidate', function ($query) use ($oldsearch) {
                $query->where('first_name', 'like', '%' . $oldsearch . '%')->orwhere('last_name', 'like', '%' . $oldsearch . '%');
                // ->orWhere('first_name'.''.'last_name', 'like', '%' . $search . '%');
            });

            if (isset($search[1])) {
                $newSearch = $search[1];
                $jobApp = $jobApp->whereHas('candidate', function ($query) use ($newSearch) {
                    $query->where('last_name', 'like', '%' . $newSearch . '%')->orwhere('first_name', 'like', '%' . $newSearch . '%');
                    // ->orWhere('first_name'.''.'last_name', 'like', '%' . $search . '%');
                });
            }
        }
        if ($request->has('lat') && $request->lat != null && $request->has('lng') && $request->lng != null) {
            $lat = $request->lat;
            $lng = $request->lng;
            if ($request->has('radius')) {
                $radius = $request->radius;
            } else {
                $radius = 5;
            }
            $jobApp = $jobApp->whereHas('candidate', function ($query) use ($lat, $lng, $radius) {
                $query->select(
                    "candidates_details.id",
                    DB::raw("6371 * acos(cos(radians(" . $lat . "))
                * cos(radians(candidates_details.latitude))
                * cos(radians(candidates_details.longitude) - radians(" . $lng . "))
                + sin(radians(" . $lat . "))
                * sin(radians(candidates_details.latitude))) AS distance")
                );
                $query->having('distance', '<', $radius);
            });
            // dd($jobApp->get()->toArray());
        }
        // if ($request->has('radius')) {
        //     $lat = auth()->user()->recruiter->lat;
        //     $lng = auth()->user()->recruiter->lng;
        //     // dd($request->all());
        //     // dd($lat, $lng);
        //     $radius = $request->radius;
        //     $jobApp = $jobApp->whereHas('candidate', function ($query) use ($lat, $lng, $radius) {
        //         $query->select(
        //             "candidates_details.id",
        //             DB::raw("6371 * acos(cos(radians(" . $lat . "))
        //         * cos(radians(candidates_details.latitude))
        //         * cos(radians(candidates_details.longitude) - radians(" . $lng . "))
        //         + sin(radians(" . $lat . "))
        //         * sin(radians(candidates_details.latitude))) AS distance")
        //         );
        //         $query->having('distance', '<', $radius);
        //     });
        //     // dd($jobApp->get()->toArray());
        // }

        $jobApp = $jobApp->get();
        return $jobApp;
    }
    public function companyMap()
    {
        // $jobApp = JobApplications::with('post', 'candidate', 'candidateDocument')->whereHas('post', function ($query) {
        //     $query->where('comp_id', auth()->user()->company->id);
        // })->get();
        // $results = DB::connection('pgsql')->select('select * from qst_questions');

        $post = Posts::where('comp_id', auth()->user()->company->id)->get(['post', 'id']);
        //dd($post->toArray());
        $data = JobCategory::orderby('title', 'asc')->get();
        return view('companypanel.pages.map.index', compact('post', 'data'));
    }
    // public function smartSearch(Request $request)
    // {
    //     dd($request);
    //     $post = Posts::select('id')->where("comp_id", auth()->user()->company->id)->get();
        
    //     if(isset($request->post)){
    //         $jobApp = JobApplications::with('post', 'candidate', 'candidate.jobApplications', 'candidate.jobApplications.post', 'candidate.user', 'candidate.user.candidatePro', 'candidate.user.candidateEdu', 'candidateDocument', 'postComp')->where("post_id", $request->post)->get();
    //     }
    //     else{
    //         $jobApp = JobApplications::with('post', 'candidate', 'candidate.jobApplications', 'candidate.jobApplications.post', 'candidate.user', 'candidate.user.candidatePro', 'candidate.user.candidateEdu', 'candidateDocument', 'postComp')->whereIn("post_id",$post)->get();
    //     }

    //     return $jobApp;
    // }
    
    public function smartSearch(Request $request)
    {
        //dd($request);
        $jobApp = JobApplications::with([
                    'examResult',
                    'post',
                    'candidate',
                    'candidate.jobApplications',
                    'candidate.jobApplications.post',
                    'candidate.user',
                    'candidate.user.candidatePro',
                    'candidate.user.candidateEdu',
                    'candidateDocument',
                    'postComp'
                ])->whereHas('post', function ($query) {
                    $query->where('comp_id', auth()->user()->company->id);
                });
                if ($request->has('minScore') && $request->has('maxScore')) {
                    $minPercentage = $request->minScore;
                    $maxPercentage = $request->maxScore;
                    
                    $exam_result = ExamResult::select('job_application_id')->whereBetween('perentage', [$minPercentage, $maxPercentage])->get();
                    
                    $jobApp = JobApplications::with('post', 'candidate', 'candidate.jobApplications', 'candidate.jobApplications.post', 'candidate.user', 'candidate.user.candidatePro', 'candidate.user.candidateEdu', 'candidateDocument', 'postComp','examResult')->whereIn('id', $exam_result);
                    
                }

        if ($request->has('post') && $request->post != null) {
            $post = $request->post;
            $jobApp = $jobApp->whereHas('post', function ($query) use ($post) {
                $query->where('id', $post);
            });
        }
        if ($request->has('gender') && $request->gender != null) {
            $gender = $request->gender;
            $jobApp = $jobApp->whereHas('candidate', function ($query) use ($gender) {
                $query->where('gender', $gender);
            });
        }
        if ($request->has('validity') && $request->validity != null) {
            $validity = $request->validity;
            $jobApp = $jobApp->whereHas('post', function ($query) use ($validity) {
                $query->where('expiry_date', $validity);
            });
        }
        if ($request->has('posted_date') && $request->posted_date != null) {
            $posted_date = Carbon::parse($request->posted_date);
            $jobApp = $jobApp->whereHas('post', function ($query) use ($posted_date) {
                $query->where('created_at', '>=', $posted_date);
            });
            // dd($jobApp->get()->toArray());
        }
        if ($request->has('startDate') && $request->startDate != null && $request->has('endDate') && $request->endDate != null) {
            $startDate = Carbon::createFromFormat('d/m/Y', $request->startDate);
            $startDate = $startDate->format('Y-m-d');
            $endDate = Carbon::createFromFormat('d/m/Y', $request->endDate);
            $endDate = $endDate->format('Y-m-d');
            $jobApp = $jobApp->whereHas('post', function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            });
            // dd($jobApp->get()->toArray());
        }
        if ($request->has('exp') && $request->exp != null) {
            $exp = $request->exp;
            $jobApp = $jobApp->whereHas('post', function ($query) use ($exp) {
                $query->where('experience', $exp);
            });
        }
        if ($request->has('qualification') && $request->qualification != null) {
            $qualification = $request->qualification;
            $jobApp = $jobApp->whereHas('post', function ($query) use ($qualification) {
                $query->where('qualification', $qualification);
            });
        }
        if ($request->has('category') && $request->category != null) {
            $category = $request->category;
            $jobApp = $jobApp->whereHas('post', function ($query) use ($category) {
                $query->where('class_id', $category);
            });
        }
        if ($request->has('search') && $request->search != null) {
            $search = $request->search;
            $search = explode(' ', $search);
            $oldsearch = $search[0];
            $jobApp = $jobApp->whereHas('candidate', function ($query) use ($oldsearch) {
                $query->where('first_name', 'like', '%' . $oldsearch . '%')->orwhere('last_name', 'like', '%' . $oldsearch . '%');
                // ->orWhere('first_name'.''.'last_name', 'like', '%' . $search . '%');
            });

            if (isset($search[1])) {
                $newSearch = $search[1];
                $jobApp = $jobApp->whereHas('candidate', function ($query) use ($newSearch) {
                    $query->where('last_name', 'like', '%' . $newSearch . '%')->orwhere('first_name', 'like', '%' . $newSearch . '%');
                    // ->orWhere('first_name'.''.'last_name', 'like', '%' . $search . '%');
                });
            }
        }
        

        if($request->has('lat') && $request->lat != null && $request->has('lng') && $request->lng != null) {
            $lat = $request->lat;
            $lng = $request->lng;
            if ($request->has('radius')) {
                $radius = $request->radius;
            } else {
                $radius = 5;
            }
            $jobApp = $jobApp->whereHas('candidate', function ($query) use ($lat, $lng, $radius) {
                $query->select(
                    "candidates_details.id",
                    DB::raw("6371 * acos(cos(radians(" . $lat . "))
                * cos(radians(candidates_details.latitude))
                * cos(radians(candidates_details.longitude) - radians(" . $lng . "))
                + sin(radians(" . $lat . "))
                * sin(radians(candidates_details.latitude))) AS distance")
                );
                $query->having('distance', '<', $radius);
            });
            // dd($jobApp->get()->toArray());
        }
        // if ($request->has('radius')) {
        //     $lat = auth()->user()->company->lat;
        //     $lng = auth()->user()->company->lng;
        //     // dd($request->all());
        //     // dd($lat, $lng);
        //     $radius = $request->radius;
        //     $jobApp = $jobApp->whereHas('candidate', function ($query) use ($lat, $lng, $radius) {
        //         $query->select(
        //             "candidates_details.id",
        //             DB::raw("6371 * acos(cos(radians(" . $lat . "))
        //         * cos(radians(candidates_details.latitude))
        //         * cos(radians(candidates_details.longitude) - radians(" . $lng . "))
        //         + sin(radians(" . $lat . "))
        //         * sin(radians(candidates_details.latitude))) AS distance")
        //         );
        //         $query->having('distance', '<', $radius);
        //     });
        //     // dd($jobApp->get()->toArray());
        // }
        if ($request->lat == null && $request->lng == null && $request->posted_date == null && $request->validity == null && $request->search == null) {
            $jobApp = $jobApp->take(10);
        }
        $jobApp = $jobApp->get();
        
        return $jobApp;

    }
    // Hire a candidate
    public function changeJobAppStatus($id)
    {
        // dd($id);
        $jobApp = JobApplications::find($id);
        $jobApp->status = 2;
        $jobApp->save();

        // dd($data);
        return $jobApp;
    }

    public function findQst(Request $request)
    {

        $response = Http::get('https://api.e-rec.com.au/api/user/qst/Socre', [
            'user_id' => $request->new_user_id,
            'qst' => $request->qst,
        ]);
        $data = $response->json();
        // dd($data);
        return $data;
    }
}
