<?php

namespace App\Http\Controllers;

use Auth;
use Stripe;
use Session;
use Carbon\Carbon;
use App\Models\Faq;
use App\Models\User;
use App\Models\ExamNotification;
use App\Models\Posts;
use App\Models\Skills;
use App\Models\Company;
use Stripe\Subscription;
use App\Models\Candidate;
use App\Models\Recruiter;
use App\Models\JobCategory;
use App\Models\SiteSetting;
use App\Models\Subscribers;
use App\Models\CandidateEdu;
use Illuminate\Http\Request;
use App\Models\CandidateDocs;
use App\Models\CandidateSkills;
use App\Models\CompanyCategory;
use App\Models\CompanyFeatures;
use App\Models\JobApplications;
use App\Models\CanAppVisibility;
use App\Mail\PackageSubscription;
use App\Traits\RequestValidation;
use App\Models\CompanyRecRelation;
use App\Models\SubscriptionPackages;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Models\CandidateProfessionalExp;
use DB;

class FrontendController extends Controller
{
    use RequestValidation;
    public function recruiter()
    {
        $user = User::where('status', 1)->get();
        $company = Company::with('user')
            ->whereHas('user', function ($query) {
                $query->where('user.status', 1);
            })->get();
        $posts = Posts::where('status', 1)->get();
        $postsCount = count($posts);
        $postsToday = count(Posts::whereDate('created_at', Carbon::today())->where('status', 1)->get());
        $jobApps = JobApplications::get();
        $faqs = Faq::where('status', 1)->get();
        $data = JobCategory::orderby('title', 'asc')->get();
        // $jobsCount = Post
        return view('recruiter.index', compact('user', 'company', 'posts', 'jobApps', 'postsCount', 'postsToday', 'faqs', 'data'));
    }
    public function employer()
    {
        $user = User::where('status', 1)->get();
        $company = Company::with('user')
            ->whereHas('user', function ($query) {
                $query->where('user.status', 1);
            })->get();
        $posts = Posts::where('status', 1)->get();
        $postsCount = count($posts);
        $postsToday = count(Posts::whereDate('created_at', Carbon::today())->where('status', 1)->get());
        $jobApps = JobApplications::get();
        $data = JobCategory::orderby('title', 'asc')->get();
        // dd($data);
        return view('company.index', compact('user', 'company', 'posts', 'jobApps', 'postsCount', 'postsToday', 'data'));
    }
    public function candidates()
    {
        // $cand = Candidate::with('user')->where('status', 1)->take(4)->get();
        $cand = Candidate::with('user')->where('status', 1)
            ->whereHas('user', function ($query) {
                $query->where('user.status', 1);
            })->orderBy('id', 'desc')->take(4)->get();
        // dd($cand->toArray());
        $user = User::where('status', 1)->get();
        $company = Company::with('user')
            ->whereHas('user', function ($query) {
                $query->where('user.status', 1);
            })->get();
        $posts = Posts::where('status', 1)->get();
        $postsCount = count($posts);
        $postsToday = count(Posts::whereDate('created_at', Carbon::today())->where('status', 1)->get());
        $jobApps = JobApplications::get();
        $data = JobCategory::orderby('title', 'asc')->get();
        return view('candidates.index', compact('cand', 'user', 'company', 'posts', 'jobApps', 'postsCount', 'postsToday', 'data'));
    }
    public function recruiterDetails()
    {
        $user = User::where('id', auth()->user()->id)->firstOrFail();
        // $name = $user->name." ".$user->lname;
        $name = $user->name;
        $avatar = "";
        $lastName = $user->lname;
        $country_code = "";
        $phone = "";
        $abn = "";
        $acn = "";
        $description = "";
        $terms = "";
        $address = "";
        $tagline = "";
        $rec = Recruiter::where('user_id', auth()->user()->id)->firstOrFail();
        // dd($user->toArray());
        if (isset($rec)) {
            $name = $rec->name;
            // $lastName = $rec->lname;
            $country_code = $rec->country_code;
            $phone = $rec->phone;
            $abn = $rec->abn;
            $acn = $rec->acn;
            $avatar = $rec->avatar;
            $description = $rec->description;
            $terms = $rec->terms;
            $address = $rec->address;
            $tagline = $rec->tagline;
        }
        // dd($lastName);
        return view('recruiter.detail', compact('name', 'avatar', 'description', 'terms', 'rec', 'phone', 'abn', 'acn', 'country_code', 'address', 'tagline', 'lastName'));
    }
    public function createSession()
    {
        session()->put('before_login_url', url()->previous());
        return redirect('/login');
    }
    public function companyDetails()
    {
        // dd('ok');
        $name = "";
        $logo = "";
        $country_code = "";
        $phone = "";
        $abn = "";
        $acn = "";
        $description = "";
        $category = "";
        $terms = "";
        $tagline = "";
        $comp = Company::with('features')->where('user_id', auth()->user()->id)->first();
        $category = CompanyFeatures::where('com_id', auth()->user()->id)->first();
        $cat = CompanyCategory::get();
        // dd($comp->toArray());
        if (isset($comp)) {
            $name = $comp->name;
            $country_code = $comp->country_code;
            $phone = $comp->phone;
            $abn = $comp->abn;
            $acn = $comp->acn;
            $logo = $comp->logo;
            $description = $comp->description;
            $terms = $comp->terms;
            $tagline = $comp->tagline;
        }
        if (isset($category)) {
            $category = $category->category;
        }
        return view('company.detail', compact('name', 'logo', 'description', 'terms', 'comp', 'cat', 'category', 'phone', 'abn', 'acn', 'country_code', 'tagline'));
    }
    public function candidatesDetailsShow()
    {
        $user = User::where('id', auth()->user()->id)->firstOrFail();
        // dd($user->toArray());
        $first_name = $user->name;
        $last_name = $user->lname;
        $gender = "";
        $nationality = "";
        $address = "";
        $email = $user->email;
        $country_code = "";
        $number = "";
        $terms = "";
        $zipCode = "";
        $Lat = "";
        $Lng = "";
        $cand = Candidate::where('user_id', auth()->user()->id)->firstOrFail();
        // dd($cand->toArray());

        if (isset($cand)) {
            $first_name = $cand->first_name;
            $last_name = $cand->last_name;
            $gender = $cand->gender;
            $nationality = $cand->nationality;
            $address = $cand->address;
            $email = $cand->email;
            $country_code = $cand->country_code;
            $number = $cand->number;
            $zipCode = $cand->zipCode;
            $terms = $cand->terms;
            $Lat = $cand->latitude;
            $Lng = $cand->longitude;
        }

        return view('candidates.detail', compact('Lat', 'Lng', 'first_name', 'last_name', 'gender', 'nationality', 'zipCode', 'address', 'email', 'country_code', 'number', 'terms'));
    }
    public function candidatesNext()
    {
        $month_exp = array();
        $year_exp = array();
        $designation = array();
        $company_name = array();
        $comp_loc = array();
        $currency = array();
        $salary = array();
        $skill_id = array();
        $pro_id = array();
        $description = array();

        $skill = Skills::get();
        $pro = CandidateProfessionalExp::where('delete', '!=', 1)->where('user_id', auth()->user()->id)->get();
        $candSkills = CandidateSkills::where('user_id', auth()->user()->id)->get();
        if (isset($pro)) {
            foreach ($pro as $key => $proo) {
                $month_exp[$key] = $proo->month_exp;
                $year_exp[$key] = $proo->year_exp;
                $designation[$key] = $proo->designation;
                $company_name[$key] = $proo->company_name;
                $comp_loc[$key] = $proo->comp_loc;
                $currency[$key] = $proo->currency;
                $salary[$key] = $proo->salary;
                $description[$key] = $proo->description;
                $pro_id[$key] = $proo->id;
            }
        }
        if (isset($candSkills)) {
            foreach ($candSkills as $key => $sk) {
                $skill_id[$key] = $sk->skill_id;
            }
        }

        return view('candidates.professional', compact('skill', 'pro_id', 'month_exp', 'year_exp', 'designation', 'company_name', 'comp_loc', 'currency', 'salary', 'skill_id', 'candSkills', 'description'));
    }
    public function candidatesProfile()
    {
        $candDocs = CandidateDocs::where('user_id', auth()->user()->id)->get();
        // dd($candDocs->toArray());
        $education = array();
        $course = array();
        $institute = array();
        $institute_loc = array();
        $passing_year = array();
        $edu_id = array();
        $grade = array();
        $description = array();
        $head_line = "";
        $visa_status = "";
        $dob = "";
        $languages = "";
        $religion = "";
        $marital_status = "";
        $driving_license = "";
        $avatar = "";

        $cand = Candidate::where('user_id', auth()->user()->id)->firstOrFail();
        $edu = CandidateEdu::where('user_id', auth()->user()->id)->get();
        $user = User::where('id', auth()->user()->id)->firstOrFail();

        // dd(explode(',', $cand->languages));

        if (isset($user)) {
            $avatar = $user->avatar;
        }
        // dd($cand->toArray());

        if (isset($cand)) {
            $head_line = $cand->head_line;
            $visa_status = $cand->visa_status;
            $dob = $cand->dob;
            $languages = $cand->languages;
            $religion = $cand->religion;
            $marital_status = $cand->marital_status;
            $driving_license = $cand->driving_license;
        }
        // dd($head_line);

        if (isset($edu)) {
            foreach ($edu as $key => $ed) {
                $education[$key] = $ed->education;
                $course[$key] = $ed->course;
                $institute[$key] = $ed->institute;
                $institute_loc[$key] = $ed->institute_loc;
                $passing_year[$key] = $ed->passing_year;
                $grade[$key] = $ed->grade;
                $description[$key] = $ed->description;
                $edu_id[$key] = $ed->id;
            }
            // dd($edu_id);
        }
        return view('candidates.profile', compact('head_line', 'edu_id', 'education', 'course', 'institute', 'institute_loc', 'passing_year', 'head_line', 'visa_status', 'dob', 'languages', 'religion', 'marital_status', 'driving_license', 'avatar', 'candDocs', 'user', 'cand', 'edu', 'grade', 'description'));
        // return back();
    }
    public function job()
    {
        $app = CanAppVisibility::orderBy('id', 'DESC')->where('status', 1)->paginate(10);
        // dd($app->toArray());
        return view('job.index', compact('app'));
    }
    public function jobPost(Request $request)
    {
        // dd($request->all());
        $pg = 10;
        $sort = "";
        $shareButtons = \Share::page(
            'https://www.itsolutionstuff.com',
            'Your share text comes here',
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit();
        // dd("check");
        $comp = NULL;
        $search = NULL;
        $search_location = NULL;
        $designation = array();
        $job_type = array();
        $exp_level = array();
        $appRecommend = array();
        $jobCategory = array();
        $app = Posts::with('company')->where('expiry_date', '>=', Carbon::today())->where('status', 1);
        if ($request->has('company') && $request->company != NULL) {
            $comp = $request->company;
            $app = $app->with('company')->whereHas('company', function ($query) use ($comp) {
                $query->where('name', 'like', '%' . $comp . '%');
            });
        }
        if ($request->has('search') && $request->search != NULL) {
            $app = $app->where('post', 'like', '%' . $request->search . '%');
            // ->orWhere('description', 'like', '%' . $request->search . '%');
            $search = $request->search;
            if (Auth::check()) {
                $user = Auth::user();
                # code...
                if ($user->role == 'user') {
                    # code...
                    if ($app->get()->toArray() == null) {
                        // dd('null');
                        // $appRecommend = $app->where('post', 'like', '%' . $request->search . '%');
                        $related = array();

                        foreach ($user->skills as $row) {
                            array_push($related, $row->id);
                        }
                        $appRecommend = Posts::where('status', 1)->where('expiry_date', '>=', Carbon::today())->with('skills')->whereHas('skills', function ($query) use ($related) {
                            $query->whereIn('skills.id', $related);
                        })->orderBy('id', 'DESC')->get()->take(6);
                        # code...
                    }
                }
                // dd($appRecommend->toArray());
            }
        }
        if ($request->has('search_location') && $request->search_location != NULL) {
            $app = $app->where('location', 'like', '%' . $request->search_location . '%');
            $search_location = $request->search_location;
        }
        if ($request->has('designation') && $request->designation != NULL) {
            $app = $app->whereIn('post', $request->designation);
            $designation = $request->designation;
        }
        if ($request->has('job_type') && $request->job_type != NULL) {
            $app = $app->whereIn('job_type', $request->job_type);
            $job_type = $request->job_type;
            // dd($job_type);
        }
        if ($request->has('exp_level') && $request->exp_level != NULL) {
            $app = $app->whereIn('experience', $request->exp_level);
            $exp_level = $request->exp_level;
        }
        if ($request->has('sort_by') && $request->sort_by != NULL) {
            $sort = $request->sort_by;
            // dd($sort);
            $date = \Carbon\Carbon::today()->subDays($sort);
            $app = $app->where('created_at', '>=', $date);
        }

        if ($request->has('job_cat') && $request->job_cat != NULL) {
            $app = $app->whereIn('class_id', $request->job_cat);
            $jobCategory = $request->job_cat;
            // dd($jobCategory);
        }
        if ($request->has('per_page') && $request->per_page != NULL) {
            $pg = $request->per_page;
            $app = $app->orderBy('id', 'DESC')->paginate($pg);
        } else {

            // dd($pg);
            $app = $app->where('rec_delete', 0)->orderBy('id', 'DESC')->paginate($pg);
            // $app = $app->get();
        }
        // dd($comp);
        // dd($app->toArray());

        $title = Posts::where('status', 1)->get('post')->groupBy('post');
        $type = Posts::where('status', 1)->get('job_type')->groupBy('job_type');
        $exp = Posts::where('status', 1)->get('experience')->groupBy('experience');
        $data = JobCategory::orderby('title', 'asc')->get();
        // dd($comp);
        return view('company.jobpost', compact('appRecommend', 'jobCategory', 'data', 'comp', 'app', 'shareButtons', 'title', 'type', 'exp', 'search', 'search_location', 'designation', 'job_type', 'exp_level', 'pg', 'sort'));
    }
    public function searchtitle(Request $request)
    {
        // dd($request->toArray());
        $app = Posts::with('company')->where('expiry_date', '>=', Carbon::today())->where('status', 1);
        $title = $app->where('post', 'like', '%' . $request->value . '%')->get()->take(5);
        return ['title' => $title];
    }
    public function searchlocation(Request $request)
    {
        // dd($request->toArray());
        $app = Posts::with('company')->where('status', 1);
        $search_location = $app->where('location', 'like', '%' . $request->value . '%')->get()->take(5);
        return ['location' => $search_location];
    }
    public function searchCompany(Request $request)
    {
        $comp = Company::where('name', 'like', '%' . $request->value . '%')->get()->take(5);
        return ['comp' => $comp];
    }
    public function jobDetails($id)
    {
        // dd($id);
        $comp = Company::with('features')->where('slug', $id)->firstOrFail();
        $data = [];
        $post = Posts::where('comp_id', $comp->id)->where('status', 1)->where('expiry_date', '>=', Carbon::today())->orderBy('id', 'DESC')->get();
        foreach ($comp->features as $row) {
            $data['similar'] = CompanyFeatures::with('company')->where('comp_cat_id', $row->id)->get();
            // dd($comp->toArray());
        }
        $compAll = Company::where('id', '!=', $comp->id)->inRandomOrder()->take('5')->get();
        $recruited = count(JobApplications::where('status', 2)->with('candidate', 'post')->whereHas('post', function ($q) use ($comp) {
            $q->where('post.comp_id', '=', $comp->id);
        })->get()->unique('candidate_id'));
        return view('job.details', compact('comp', 'data', 'post', 'compAll', 'recruited'));
    }
    public function cv(Request $request)
    {
        // phpinfo();
        // dd($request);
    }
    public function jobListingDetails($id)
    {
        $user = Auth::user();
        $id = Posts::where('slug', $id)->firstOrFail();
        // dd($id);
        $id = $id->id;
        $app = Posts::with('skills')->where('id', $id)->firstOrFail();
        $related = array();
        // dd($app->toArray());
        foreach ($app->skills as $row) {
            array_push($related, $row->id);
        }

        $post = Posts::where('status', 1)->with('skills')->where('id', '!=', $id)->whereHas('skills', function ($query) use ($related) {
            $query->whereIn('skills.id', $related);
        })->where('expiry_date', '>=', Carbon::today())->get();

        return view('job.jobListingDetails', compact('app', 'post'));
    }
    public function about()
    {
        $user = User::where('status', 1)->get();
        $company = Company::with('user')
            ->whereHas('user', function ($query) {
                $query->where('user.status', 1);
            })->get();
        $posts = Posts::where('status', 1)->get();
        $jobApps = JobApplications::get();
        return view('pages.about', compact('user', 'company', 'posts', 'jobApps'));
    }
    public function services()
    {
        return view('pages.services');
    }
    public function endUserAgreement()
    {
        return view('pages.endUserAgreement');
    }
    public function professionalServicesStandard()
    {
        return view('pages.professionalServicesStandard');
    }
    public function antiSpamPolicy()
    {
        return view('pages.antiSpamPolicy');
    }
    public function cancellationPolicy()
    {
        return view('pages.cancellationPolicy');
    }
    public function copyright()
    {
        return view('pages.copyright');
    }
    public function jobApplications(Request $request)
    {
        dd($request->toArray());
        $job = new JobApplications;
    }
    public function candidatesList(Request $request)
    {
        $cand = Candidate::with('user')->where('status', 1);
        // $candJob = User::with('candidatePro')->get()->groupBy('month_exp');
        // $candJob = User::with('candidatePro')->whereHas('candidatePro', function ($query) {
        //     $query->where('delete', 0)->orderBy('year_exp', 'DESC')->groupBy('month_exp');
        // })->get();
        // dd($candJob->toArray());
        $count = $cand->count();
        $pg = 12;
        $sort = "";
        $search_word = "";
        $experience = "";
        $exp = "";
        $value = [];
        $designation = array();
        // $title = Posts::where('status',1)->get('post')->groupBy('post');
        $skill = Skills::get();
        $related = array();
        if ($request->has('skill') && $request->skill != NULL) {
            foreach ($request->skill as $row) {
                array_push($related, $row);
            }
            $cand = $cand->whereHas('user.skills', function ($query) use ($related) {
                $query->whereIn('skills.id', $related);
            });
            // dd($cand->toArray());
        }
        if ($request->has('name') && $request->name != NULL) {
            $search_word = $request->name;
            $cand = $cand->where('first_name', 'LIKE', '%' . $request->name . '%')
                ->orWhere('last_name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->has('sort_by') && $request->sort_by != NULL) {
            $sort = $request->sort_by;
            $date = \Carbon\Carbon::today()->subDays($sort);
            $cand = $cand->where('created_at', '>=', $date);
        }
        if ($request->has('experience') && $request->experience != NULL) {
            // dd('ok');
            $exp = $request->experience;
            $experience = $request->experience;
            // $experience = $cand->where('date_diff', '>=', $experience);
            $experience = $cand->whereHas('user.candidatePro', function ($query) use ($experience) {
                // $query->where('user.candidatePro.date_diff', '>=', $experience);
                $query->where('date_diff', '>=', $experience);
                // $query->get();
            });
            // dd($experience->get()->toArray());
        }
        if ($request->has('per_page') && $request->per_page != NULL) {
            $pg = $request->per_page;
            $cand = $cand->orderBy('id', 'DESC')->paginate($pg);
        } else {
            $cand = $cand->orderBy('id', 'DESC')->paginate($pg);
        }
        // dd($request->experience);
        return view('candidates.candidateList', compact('exp', 'designation', 'cand', 'count', 'pg', 'sort', 'skill', 'search_word', 'related', 'experience'));
    }
    public function candidatesDetail($id)
    {
        // dd($id);
        $cand = Candidate::where('slug', $id)->firstOrFail();
        $allCand = Candidate::where('id', '!=', $cand->id)->where('status', 1)->inRandomOrder()->orderBy('id', 'DESC')->take(5)->get();
        $user = User::where('status', 1)->with('candidate', 'candidateEdu', 'candidatePro', 'resume', 'skills')->where('id', $cand->user_id)->firstOrFail();
        return view('candidates.show', compact('user', 'allCand'));
    }
    public function employerList(Request $request)
    {
        // $comp = Company::with('features');
        $comp = Company::with('user', 'openPosts')->whereHas('user', function ($query) {
            $query->where('user.status', 1);
        })->orderBy('id', 'DESC');
        $pg = 12;
        $sort = "";
        $search_word = "";
        $value = [];
        $comp_fea = CompanyCategory::get();
        if ($request->has('search_comp')) {
            $search_word = $request->search_comp;
            $comp = $comp->where('name', 'LIKE', '%' . $request->search_comp . '%');
        }
        if ($request->has('search_skills')) {
            $value = $request->search_skills;
            $comp = $comp->whereHas('features', function ($q) use ($value) {
                $q->where('comp_cat_id', '=', $value);
            });
        }
        if ($request->has('sort_by') && $request->sort_by != NULL) {
            $sort = $request->sort_by;
            $date = \Carbon\Carbon::today()->subDays($sort);
            $comp = $comp->where('created_at', '>=', $date);
        }
        if ($request->has('per_page') && $request->per_page != NULL) {
            $pg = $request->per_page;
            $comp = $comp->orderBy('id', 'DESC')->paginate($pg);
        } else {
            $comp = $comp->orderBy('id', 'DESC')->paginate($pg);
        }
        // $comp = $comp->paginate(10);
        $count = $comp->count();
        return view('company.companyList', compact('comp', 'count', 'comp_fea', 'pg', 'sort', 'value', 'search_word'));
    }
    public function recruiterList(Request $request)
    {
        // dd($request->toArray());
        // $rec = Recruiter::with('features');
        $rec = Recruiter::with('user')->whereHas('user', function ($query) {
            $query->where('user.status', 1);
        })->orderBy('id', 'DESC');
        $pg = 12;
        $sort = "";
        $search_word = "";
        $value = [];
        $comp_fea = CompanyCategory::get();
        if ($request->has('search_rec')) {
            $search_word = $request->search_rec;
            $rec = $rec->where('name', 'LIKE', '%' . $request->search_rec . '%');
        }

        if ($request->has('search_skills')) {
            $value = $request->search_skills;
            $rec = $rec->with('features')->whereHas('features', function ($q) use ($value) {
                $q->where('cat_id', '=', $value);
            });
            // dd($rec->get()->toArray(), $value);
        }
        if ($request->has('sort_by') && $request->sort_by != NULL) {
            $sort = $request->sort_by;
            $date = \Carbon\Carbon::today()->subDays($sort);
            $rec = $rec->where('created_at', '>=', $date);
        }
        if ($request->has('per_page') && $request->per_page != NULL) {
            $pg = $request->per_page;
            $rec = $rec->orderBy('id', 'DESC')->paginate($pg);
        } else {
            $rec = $rec->orderBy('id', 'DESC')->paginate($pg);
        }
        $count = $rec->where('status', 1)->count();
        $skill = Skills::get();
        return view('recruiter.list', compact('rec', 'count', 'skill', 'pg', 'sort', 'comp_fea', 'search_word', 'value'));
    }
    public function recruiterShow($id)
    {
        $rec = Recruiter::with('recRelation', 'features')->where('slug', $id)->firstOrFail();
        // $similar = Recruiter::where('id', '!=', $rec->id)->get();
        $recid = $rec->id;
        // dd($rec->toArray());
        // $similar = [];
        // if (count($rec->recRelation) > 0) {
        //     $comid = $rec->recRelation[0]->com_id;
        //     $similar = Recruiter::where('id', '!=', $rec->id)->whereHas('recRelation', function ($q) use ($comid) {
        //         $q->where('com_id', '=', $comid);
        //     })->get();
        // }
        $post = Posts::where('rec_id', $rec->id)->where('expiry_date', '>=', Carbon::today())->where('status', 1)->get();
        $posted_jobs = count(Posts::where('status', 1)->where('rec_id', $rec->id)->get());
        $similar = Recruiter::where('id', '!=', $rec->id)->inRandomOrder()->take('5')->get();
        // $jobs = Posts::where('status', 1)->where('rec_id', $rec->id)->where('expiry_date', '>=', Carbon::today())->orderBy('id', 'DESC')->get();
        $jobs = Posts::where('status', 1)->with('skills')->orderBy('id', 'DESC')->get();
        $related = array();
        foreach ($rec->features as $row) {
            array_push($related, $row->id);
        }
        $recruited = count(JobApplications::where('status', 2)->with('candidate', 'post')->whereHas('post', function ($q) use ($rec) {
            $q->where('post.rec_id', '=', $rec->id);
        })->get()->unique('candidate_id'));
        $comp_count = count(CompanyRecRelation::with('recruiter', 'company')->where('rec_id', $rec->id)->where('status', 1)->get());
        // dd(count($post));
        return view('recruiter.show', compact('rec', 'jobs', 'similar', 'posted_jobs', 'recruited', 'comp_count', 'post'));
    }
    public function privacy()
    {
        // dd('ok');
        return view('pages.privacyPolicy');
    }
    public function platform()
    {
        // dd('ok');
        return view('pages.platform');
    }
    public function terms()
    {
        // dd('ok');
        return view('pages.terms');
    }
    public function subscriber(Request $request)
    {
        // dd($request->toArray());
        $valid = $this->validate($request, [
            'user' => ['required', 'string', 'email', 'unique:subscribers,email'],
        ]);
        $sub = new Subscribers;
        $sub->email = $request->user;
        $sub->status = 1;
        $sub->save();
        // return $sub;
        return response()->json(['data' => 'Your Have Successfully Subscribed...']);
    }
    public function subscription()
    {
        $year = SubscriptionPackages::where('time_interval', 'year')->where('status', 1)->get();
        $month = SubscriptionPackages::where('time_interval', 'month')->where('status', 1)->get();
        $trial = SubscriptionPackages::where('id', 21)->firstOrFail();
        // dd($trial);
        return view('subscription.package', compact('year', 'month', 'trial'));
    }
    public function subscriptionPayment($slug)
    {
        $user = Auth::user();
        if (isset(auth()->user()->package)) {
            if (auth()->user()->package->id != '0' && auth()->user()->package->id != 0 && auth()->user()->package->id != '21') {
                // dd($slug);
                \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $subscriptionId = $user->package_buy_stripe_token;
                // Cancel the subscription
                $subscription = Subscription::retrieve($subscriptionId);
                // dd($subscription->status);
                if ($subscription->status != 'canceled') {
                    $subscription->cancel();
                }
            }
        }
        // else {
        //     $user->package_id = $pkg->id;
        //     $user->package_status = 1;
        //     $user->package_buy_stripe_token = 'trial';
        //     // dd($user->toArray());
        //     $user->total_no_of_posts = 12 * $pkg->no_of_posts;
        //     $user->total_no_of_posts = $pkg->no_of_posts;
        //     $user->posts_count = $pkg->no_of_posts;
        //     $user->package_expiry = $current->addMonth()->format('Y-m-d');
        //     $user->package_expiry = $current->addYear()->format('Y-m-d');
        // }
        if ($slug == '21') {
            $current = Carbon::now();
            $pkg = SubscriptionPackages::where('id', $slug)->firstOrFail();
            # code...
            $userDetail = User::where('id', auth()->user()->id)->firstOrFail();

            $userDetail->package_id = $pkg->id;
            $userDetail->package_status = 1;
            $userDetail->stripe_id = 0;
            $userDetail->package_buy_stripe_token = 'trial';
            // dd($userDetail->toArray());
            if ($pkg->time_interval == "month") {
                $userDetail->total_no_of_posts = 12 * $pkg->no_of_posts;
            } else {
                $userDetail->total_no_of_posts = $pkg->no_of_posts;
            }
            $userDetail->posts_count = $pkg->no_of_posts;
            if ($pkg->time_interval == "month" || $pkg->id == 21) {
                $userDetail->package_expiry = $current->addMonth()->format('Y-m-d');
            } elseif ($pkg->time_interval == "year") {
                $userDetail->package_expiry = $current->addYear()->format('Y-m-d');
            }

            $userDetail->save();
            // dd($userDetail->toArray());
            if (auth()->user()->role == 'rec') {
                # code...
                $userName = auth()->user()->recruiter->name . ' ' . auth()->user()->recruiter->lastName;
                $address = auth()->user()->recruiter->address . ' ' . auth()->user()->recruiter->city . ', ' . auth()->user()->recruiter->country . ', ' . auth()->user()->recruiter->postal_code;
            } else {
                # code...
                $userName = auth()->user()->company->name;
                $address = auth()->user()->company->address . ' ' . auth()->user()->company->city . ', ' . auth()->user()->company->country . ', ' . auth()->user()->company->postal_code;
            }
            $site = SiteSetting::first();
            $email = $userDetail->email;
            $packageName = $pkg->name;
            $tax = (int)$site->tax_rate;
            $tax_price = ((int)$pkg->price * $tax) / 100;
            $packageNo_of_posts = $pkg->no_of_posts;
            $packagePrice_show = $pkg->price;
            $packagePrice = $pkg->price + $tax_price;
            $currentDateTime = Carbon::now();
            $formattedDateTime = $currentDateTime->format('H:i & d/m/Y');
            $packageTime_interval = $formattedDateTime;

            $tax = $tax_price;
            $mail = Mail::to($email)->send(new PackageSubscription($packageName, $packageNo_of_posts, $packagePrice, $tax, $packagePrice_show, $packageTime_interval, $userName, $address));
            // $mail = Mail::to($email)->send(new PackageSubscription($email));
            return redirect()->route('home');
        } else {
            $pkg = SubscriptionPackages::where('slug', $slug)->firstOrFail();
            return view('subscription.payment', compact('pkg'));
        }

        // dd($pkg->toArray());
    }
    public function cancelPayment()
    {
        $current = Carbon::now();
        // Set your Stripe secret key
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // Retrieve the user for whom you want to renew the subscription
        $user = Auth::user();

        // Retrieve the current subscription ID from the user's record

        try {
            $subscriptionId = $user->package_buy_stripe_token;
            // dd('ok');
            // Retrieve the subscription from Stripe
            $package = SubscriptionPackages::whereId($user->package->id)->firstOrFail();

            if ($user->package->id != 21) {
                # code...
                $subscription = Subscription::retrieve($subscriptionId);

                // Extend the subscription (for example, extend it by 30 days)
                $subscription->items->data[0]->billing_cycle_anchor = 'now';
                $subscription->items->data[0]->proration_behavior = 'create_prorations';

                // Save the updated subscription
                $subscription->save();

                // Optionally, you can update the user's record with the new subscription details
                $user->package_buy_stripe_token = $subscription->id;


                // if (auth()->user()->package->time_interval == "month") {
                //     $user->total_no_of_posts = 12 * auth()->user()->package->no_of_posts;
                // } else {
                //     $user->total_no_of_posts = auth()->user()->package->no_of_posts;
                // }
                // $user->posts_count = auth()->user()->package->no_of_posts;

                if ($package->time_interval == "month") {
                    $user->total_no_of_posts = 12 * $package->no_of_posts + auth()->user()->posts_count;
                } else {
                    $user->total_no_of_posts = $package->no_of_posts + auth()->user()->posts_count;
                }
                $user->all_posts_count = $package->no_of_posts + $user->all_posts_count;

                $user->posts_count = $package->no_of_posts + auth()->user()->posts_count;

                if (auth()->user()->package->time_interval == "month") {
                    $user->package_expiry = $current->addMonth()->format('Y-m-d');
                } elseif (auth()->user()->package->time_interval == "year") {
                    $user->package_expiry = $current->addYear()->format('Y-m-d');
                }
                $user->save();
                return redirect()->route('successPayment');
                // dd($subscription->id, $user->toArray());
            } else {
                $user->package_id = auth()->user()->package->id;
                $user->package_status = 1;
                $user->package_buy_stripe_token = 'trial';
                $user->stripe_id = 0;
                // dd($user->toArray());
                // if (auth()->user()->package->time_interval == "month") {
                //     $user->total_no_of_posts = 12 * auth()->user()->package->no_of_posts;
                // } else {
                //     $user->total_no_of_posts = auth()->user()->package->no_of_posts;
                // }
                // $user->posts_count = auth()->user()->package->no_of_posts;

                if ($package->time_interval == "month") {
                    $user->total_no_of_posts = 12 * $package->no_of_posts + auth()->user()->posts_count;
                    $user->all_posts_count = $package->no_of_posts + auth()->user()->posts_count;
                } else {
                    $user->total_no_of_posts = $package->no_of_posts + auth()->user()->posts_count;
                }
                $user->posts_count = $package->no_of_posts + auth()->user()->posts_count;

                if (auth()->user()->package->time_interval == "month" || auth()->user()->package->id == 21) {
                    $user->package_expiry = $current->addMonth()->format('Y-m-d');
                } elseif (auth()->user()->package->time_interval == "year") {
                    $user->package_expiry = $current->addYear()->format('Y-m-d');
                }

                $user->save();
            }
            // dd($subscription->id, $user->toArray());

            // Redirect or return a response indicating success
            // return redirect()->route('home')->with('success', 'Subscription renewed successfully.');
            // return redirect()->route('home')->with('success', 'Updated Successfully!');
        } catch (\Exception $e) {
            // dd($e);
            // Handle any errors that occur during the renewal process
            return redirect()->back()->with('error', 'Error renewing subscription: ' . $e->getMessage());
        }
    }
    public function subscriptionSuccess(Request $request)
    {
        $current = Carbon::now();
        $package = SubscriptionPackages::whereId($request->plan_id)->firstOrFail();
        // dd($package->toArray());
        $site = SiteSetting::first();
        $packageName = $package->name;
        $packageNo_of_posts = $package->no_of_posts;
        $tax = (int)$site->tax_rate;
        $tax_price = ((int)$package->price * $tax) / 100;
        $packagePrice_show = $package->price;
        $packagePrice = $package->price + $tax_price;
        $currentDateTime = Carbon::now();
        $formattedDateTime = $currentDateTime->format('H:i & d/m/Y');
        $packageTime_interval = $formattedDateTime;
        $valid = $this->validate($request, [
            // 'price' => 'required|numeric',
            // 'plan_id' => 'required|numeric|exists:packages,id',

        ]);
        if ($request->payment_mode == "stripe") {
            $valid = $this->valid($request);
        }
        try {
            if ($request->payment_method == "eway") {
                // Session::put();
                $package = SubscriptionPackages::whereSlug($request->package)->firstOrFail();
                $amount = $package->price;
                $url = $this->ewayPayment($amount);
                // dd($url);
                $userDetail = User::where('id', auth()->user()->id)->firstOrFail();

                $userDetail->package_id = $package->id;
                $userDetail->package_status = 1;
                $userDetail->package_buy_stripe_token = '';

                $userDetail->save();

                return response()->json(['type' => 'eway', 'url' => $url]);
            } else {
                if ($request->payment_mode == "stripe") {

                    $valid = $this->createNewCard($request);

                    $data["price"] = $request->price;


                    $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

                    $user_id = auth()->user();

                    $userDetail = User::where('id', auth()->user()->id)->firstOrFail();
                    

                    $stripe_subscribe_token = $stripe->subscriptions->create([
                        'customer' => $userDetail->stripe_id,
                        'items' => [
                            ['price' => $request->plan_stripe_id],
                        ],
                    ]);
                    
                }

                $userDetail->package_id = $request->plan_id;
                $userDetail->package_status = 1;
                $userDetail->package_buy_stripe_token = $stripe_subscribe_token->id;
                // $userDetail->total_no_of_posts = 12 * $package->no_of_posts;
                if ($package->time_interval == "month") {
                    $userDetail->total_no_of_posts = 12 * $package->no_of_posts + auth()->user()->posts_count;
                    // $userDetail->all_posts_count = $package->no_of_posts + auth()->user()->posts_count;
                } else {
                    $userDetail->total_no_of_posts = $package->no_of_posts + auth()->user()->posts_count;
                }
                $userDetail->all_posts_count = $package->no_of_posts + $userDetail->all_posts_count;

                $userDetail->posts_count = $package->no_of_posts + auth()->user()->posts_count;
                if ($package->time_interval == "month") {
                    $userDetail->package_expiry = $current->addMonth()->format('Y-m-d');
                } elseif ($package->time_interval == "year") {
                    $userDetail->package_expiry = $current->addYear()->format('Y-m-d');
                }

                $userDetail->save();
                // dd($userDetail->toArray());

                $email = $userDetail->email;
                // $email = $userDetail->email;
                // $email = $userDetail->email;
                // $email = $userDetail->email;
                if (auth()->user()->role == 'rec') {
                    # code...
                    $userName = auth()->user()->recruiter->name . ' ' . auth()->user()->recruiter->lastName;
                    $address = auth()->user()->recruiter->address . ' ' . auth()->user()->recruiter->city . ', ' . auth()->user()->recruiter->country . ', ' . auth()->user()->recruiter->postal_code;
                } elseif(auth()->user()->role == 'company') {
                    
                    # code...
                    $userName = auth()->user()->name;
                    $address = auth()->user()->company->address . ' ' . auth()->user()->company->city . ', ' . auth()->user()->company->country . ', ' . auth()->user()->company->postal_code;
                }else {
                    
                    $candiatedetails = DB::table('candidates_details')->where('user_id',auth()->user()->id)->first();
                    # code...
                    $userName = $candiatedetails->first_name . ' ' . $candiatedetails->last_name;
                    $address = $candiatedetails->address . ' ' . $candiatedetails->city . ', ' . $candiatedetails->country . ', ' . $candiatedetails->zipCode;
                }
                
                // dd($userName);
                $tax = $tax_price;
                $mail = Mail::to($email)->send(new PackageSubscription($packageName, $packageNo_of_posts, $packagePrice, $tax, $packagePrice_show, $packageTime_interval, $userName, $address));
            }

            return response()->json(['message' => "You're Payment has been successfully Completed..."], 200);
        } catch (Exception $ex) {
            // return response()->json([$ex],500);
            // return redirect()->route('user.dashboard')->with('error', 'Record not Updated!');
            return $ex;
        }
    }
    public function ewayPayment($amount)
    {
        $apiKey = 'C3AB9CmfayW88Iqbw3Bf5K80V0BT1088a/1/68bTYxkxHF6bv0UA5PppY76Y5JoU0FSPjX';
        $apiPassword = 'j7PyYjcP';
        $apiEndpoint = 'Sandbox';
        $client = \Eway\Rapid::createClient($apiKey, $apiPassword, $apiEndpoint);

        $transaction = [
            'RedirectUrl' => route('successPayment'),
            'CancelUrl' => route('subscription'),
            'TransactionType' => \Eway\Rapid\Enum\TransactionType::PURCHASE,
            'Payment' => [
                'TotalAmount' => $amount * 100,
            ],
        ];

        $response = $client->createTransaction(\Eway\Rapid\Enum\ApiMethod::RESPONSIVE_SHARED, $transaction);

        $sharedURL = '';
        if (!$response->getErrors()) {
            $sharedURL = $response->SharedPaymentUrl;
        }
        // dd($sharedURL);
        return $sharedURL;
    }
    // public function bookingFail()
    // {
    //     return redirect()->route('subscription');
    // }
    // public function bookingSuccess()
    // {
    //     return redirect()->route('successPayment');
    // }
    public function successPayment()
    {
        return view('subscription.success');
    }
    public function searchKeyword(Request $request)
    {
        // dd($request->toArray());
        $cand = [];
        $comp = [];
        $rec = [];
        $job = [];
        if ($request->has('value') && $request->value != NULL) {
            if ($request->for == "post") {
                $job = Posts::where('status', 1)
                    ->where('post', 'like', '%' . $request->value . '%')
                    ->where('expiry_date', '>=', Carbon::today())
                    ->get();
            }
            if ($request->for == "users") {
                // $search = $request->value;
                // $search = explode(' ', $search);
                // $oldsearch = $search[0];
                // $cand = Candidate::with('user')
                //     ->whereHas('user', function ($query) {
                //         $query->where('user.status', 1);
                //     })->where('status', 1)
                //     ->orwhere('first_name', 'like', '%' . $oldsearch . '%')
                //     ->orWhere('last_name', 'like', '%' . $oldsearch . '%');

                // if (isset($search[1])) {
                //     $newSearch = $search[1];
                //     $cand = Candidate::with('user')
                //         ->whereHas('user', function ($query) {
                //             $query->where('user.status', 1);
                //         })->where('status', 1)
                //         ->where('last_name', 'like', '%' . $newSearch . '%');
                // }
                // $cand = $cand->get();
                $search = $request->value;
                $search = explode(' ', $search);
                $oldsearch = $search[0];
                $cand = Candidate::with('user')
                    ->whereHas('user', function ($query) {
                        $query->where('user.status', 1);
                    })->where('status', 1)
                    ->where('keyword', 'like', '%' . $request->value . '%')
                    ->orderBy('id', 'DESC');
                // $cand = Candidate::with('user')
                //     ->whereHas('user', function ($query) {
                //         $query->where('user.status', 1);
                //     })->where('status', 1);
                // $cand = $cand->where('first_name', 'like', '%' . $oldsearch . '%')->orwhere('last_name', 'like', '%' . $oldsearch . '%');

                // if (isset($search[1])) {
                //     $newSearch = $search[1];
                //     $cand = $cand->where('last_name', 'like', '%' . $newSearch . '%')->orwhere('first_name', 'like', '%' . $newSearch . '%');
                // }
                $cand = $cand->get();
                $comp = Company::with('features', 'user')
                    ->whereHas('user', function ($query) {
                        $query->where('user.status', 1);
                    })
                    ->where('name', 'like', '%' . $request->value . '%')
                    ->orWhere('country_code', $request->value)
                    ->orWhere('phone', $request->value)
                    ->orderBy('id', 'DESC')
                    ->get();
                $rec = Recruiter::with('features', 'user')
                    ->whereHas('user', function ($query) {
                        $query->where('user.status', 1);
                    })
                    ->where('name', 'like', '%' . $request->value . '%')
                    ->orWhere('country_code', $request->value)
                    ->orWhere('phone', $request->value)
                    ->orderBy('id', 'DESC')
                    ->get();
            }
        }


        // dd($cand);
        return ['can' => $cand, 'comp' => $comp, 'rec' => $rec, 'job' => $job];
    }
    public function searchKeywordView(Request $request)
    {

        $cand = [];
        $comp = [];
        $rec = [];
        if ($request->has('for')) {
            if ($request->for == "users") {
                // $search = $request->searchKeyword;
                // $search = explode(' ', $search);
                // $oldsearch = $search[0];
                $cand = Candidate::with('user')
                    ->whereHas('user', function ($query) {
                        $query->where('user.status', 1);
                    })->where('status', 1)
                    ->where('keyword', 'like', '%' . $request->searchKeyword . '%')->orderBy('id', 'DESC');

                // if (isset($search[1])) {
                //     $newSearch = $search[1];
                //     $cand = Candidate::with('user')
                //         ->whereHas('user', function ($query) {
                //             $query->where('user.status', 1);
                //         })->where('status', 1)
                //         ->where('last_name', 'like', '%' . $newSearch . '%')
                //         ->orwhere('first_name', 'like', '%' . $newSearch . '%');
                // }
                $cand = $cand->get();
                // dd($cand->get()->toArray());
                // $cand = Candidate::with('user')
                //     ->whereHas('user', function ($query) {
                //         $query->where('user.status', 1);
                //     })
                //     ->where('first_name', 'like', '%' . $request->searchKeyword . '%')
                //     ->orWhere('last_name', 'like', '%' . $request->searchKeyword . '%')
                //     ->orWhere('country_code', $request->searchKeyword)
                //     ->orWhere('number', $request->searchKeyword)
                //     ->where('status', 1)
                //     ->get();
                $comp = Company::with('features', 'user')
                    ->whereHas('user', function ($query) {
                        $query->where('user.status', 1);
                    })
                    ->where('name', 'like', '%' . $request->searchKeyword . '%')
                    ->orWhere('country_code', $request->searchKeyword)
                    ->orWhere('phone', $request->searchKeyword)
                    ->orderBy('id', 'DESC')
                    ->get();
                $rec = Recruiter::with('features', 'user')
                    ->whereHas('user', function ($query) {
                        $query->where('user.status', 1);
                    })
                    ->where('name', 'like', '%' . $request->searchKeyword . '%')
                    ->orWhere('country_code', $request->searchKeyword)
                    ->orWhere('phone', $request->searchKeyword)
                    ->orderBy('id', 'DESC')
                    ->get();
            }
            if ($request->for == "post") {
                return redirect('/browse/jobs?search=' . $request->searchKeyword);
            }
        } else {
            if ($request->has('role') && $request->role != NULL) {
                if ($request->role == 'user') {
                    // $search = $request->searchKeyword;
                    // $search = explode(' ', $search);
                    // $oldsearch = $search[0];
                    $cand = Candidate::with('user')
                        ->whereHas('user', function ($query) {
                            $query->where('user.status', 1);
                        })->where('status', 1)
                        ->where('keyword', 'like', '%' . $request->searchKeyword . '%')->orderBy('id', 'DESC');

                    // if (isset($search[1])) {
                    //     $newSearch = $search[1];
                    //     $cand = Candidate::with('user')
                    //         ->whereHas('user', function ($query) {
                    //             $query->where('user.status', 1);
                    //         })->where('status', 1)
                    //         ->where('last_name', 'like', '%' . $newSearch . '%');
                    // }
                    $cand = $cand->get();
                    // dd($request->toArray());
                    // $cand = Candidate::with('user')
                    //     ->whereHas('user', function ($query) {
                    //         $query->where('user.status', 1);
                    //     })
                    //     ->where('first_name', 'like', '%' . $request->searchKeyword . '%')
                    //     ->orWhere('last_name', 'like', '%' . $request->searchKeyword . '%')
                    //     ->orWhere('country_code', $request->searchKeyword)
                    //     ->orWhere('number', $request->searchKeyword)
                    //     ->where('status', 1)
                    //     ->get();

                }
                if ($request->role == 'company') {

                    $comp = Company::with('features', 'user')
                        ->whereHas('user', function ($query) {
                            $query->where('user.status', 1);
                        })
                        ->where('name', 'like', '%' . $request->searchKeyword . '%')
                        ->orWhere('country_code', $request->searchKeyword)
                        ->orWhere('phone', $request->searchKeyword)
                        ->orderBy('id', 'DESC')
                        ->get();
                }

                if ($request->role == 'rec') {
                    $rec = Recruiter::with('features', 'user')
                        ->whereHas('user', function ($query) {
                            $query->where('user.status', 1);
                        })
                        ->where('name', 'like', '%' . $request->searchKeyword . '%')
                        ->orWhere('country_code', $request->searchKeyword)
                        ->orWhere('phone', $request->searchKeyword)
                        ->orderBy('id', 'DESC')
                        ->get();
                }

                if ($request->role == 'all') {
                    // $search = $request->searchKeyword;
                    // $search = explode(' ', $search);
                    // $oldsearch = $search[0];
                    $cand = Candidate::with('user')
                        ->whereHas('user', function ($query) {
                            $query->where('user.status', 1);
                        })->where('status', 1)
                        ->where('keyword', 'like', '%' . $request->searchKeyword . '%')->orderBy('id', 'DESC');

                    // if (isset($search[1])) {
                    //     $newSearch = $search[1];
                    //     $cand = Candidate::with('user')
                    //         ->whereHas('user', function ($query) {
                    //             $query->where('user.status', 1);
                    //         })->where('status', 1)
                    //         ->where('last_name', 'like', '%' . $newSearch . '%');
                    // }
                    $cand = $cand->get();
                    // $cand = Candidate::with('user')
                    //     ->whereHas('user', function ($query) {
                    //         $query->where('user.status', 1);
                    //     })
                    //     ->where('first_name', 'like', '%' . $request->searchKeyword . '%')
                    //     ->orWhere('last_name', 'like', '%' . $request->searchKeyword . '%')
                    //     ->orWhere('country_code', $request->searchKeyword)
                    //     ->orWhere('number', $request->searchKeyword)
                    //     ->where('status', 1)
                    //     ->get();

                    $comp = Company::with('features', 'user')
                        ->whereHas('user', function ($query) {
                            $query->where('user.status', 1);
                        })
                        ->where('name', 'like', '%' . $request->searchKeyword . '%')
                        ->orWhere('country_code', $request->searchKeyword)
                        ->orWhere('phone', $request->searchKeyword)
                        ->orderBy('id', 'DESC')
                        ->get();

                    $rec = Recruiter::with('features', 'user')
                        ->whereHas('user', function ($query) {
                            $query->where('user.status', 1);
                        })
                        ->where('name', 'like', '%' . $request->searchKeyword . '%')
                        ->orWhere('country_code', $request->searchKeyword)
                        ->orWhere('phone', $request->searchKeyword)
                        ->orderBy('id', 'DESC')
                        ->get();
                }
            } else {
                // $search = $request->searchKeyword;
                // $search = explode(' ', $search);
                // $oldsearch = $search[0];
                $cand = Candidate::with('user')
                    ->whereHas('user', function ($query) {
                        $query->where('user.status', 1);
                    })->where('status', 1)
                    ->where('keyword', 'like', '%' . $request->searchKeyword . '%')->orderBy('id', 'DESC');
                // ->orWhere('last_name', 'like', '%' . $oldsearch . '%');

                // if (isset($search[1])) {
                //     $newSearch = $search[1];
                //     $cand = Candidate::with('user')
                //         ->whereHas('user', function ($query) {
                //             $query->where('user.status', 1);
                //         })->where('status', 1)
                //         ->where('last_name', 'like', '%' . $newSearch . '%');
                // }
                $cand = $cand->get();
                // $cand = Candidate::with('user')
                //     ->whereHas('user', function ($query) {
                //         $query->where('user.status', 1);
                //     })
                //     ->where('first_name', 'like', '%' . $request->searchKeyword . '%')
                //     ->orWhere('last_name', 'like', '%' . $request->searchKeyword . '%')
                //     ->orWhere('country_code', $request->searchKeyword)
                //     ->orWhere('number', $request->searchKeyword)
                //     ->where('status', 1)
                //     ->get();

                $comp = Company::with('features', 'user')
                    ->whereHas('user', function ($query) {
                        $query->where('user.status', 1);
                    })
                    ->where('name', 'like', '%' . $request->searchKeyword . '%')
                    ->orWhere('country_code', $request->searchKeyword)
                    ->orWhere('phone', $request->searchKeyword)
                    ->orderBy('id', 'DESC')
                    ->get();

                $rec = Recruiter::with('features', 'user')
                    ->whereHas('user', function ($query) {
                        $query->where('user.status', 1);
                    })
                    ->where('name', 'like', '%' . $request->searchKeyword . '%')
                    ->orWhere('country_code', $request->searchKeyword)
                    ->orWhere('phone', $request->searchKeyword)
                    ->orderBy('id', 'DESC')
                    ->get();
            }
        }
        //kam kara raha


        $request = $request->searchKeyword;
        // dd($cand->toArray(), $comp, $rec);

        return view('pages.searchKeywordView', compact('request'))->with(['cand' => $cand, 'comp' => $comp, 'rec' => $rec]);
    }
    public function getCategoriesApi()
    {
        $data = JobCategory::orderby('title', 'asc')->get();
        // dd($data);
        return $data;
    }
    public function searchCandidate(Request $request)
    {
        // dd('ok');
        $cand = [];
        if ($request->has('value') && $request->value != NULL) {
            // $search = $request->value;
            // $search = explode(' ', $search);
            // $oldsearch = $search[0];
            $cand = Candidate::with('user')
                ->whereHas('user', function ($query) {
                    $query->where('user.status', 1);
                })->where('status', 1)
                ->where('keyword', 'like', '%' . $request->value . '%');
            //     ->orWhere('last_name', 'like', '%' . $oldsearch . '%');

            // if (isset($search[1])) {
            //     $newSearch = $search[1];
            //     $cand = Candidate::with('user')
            //         ->whereHas('user', function ($query) {
            //             $query->where('user.status', 1);
            //         })->where('status', 1)
            //         ->where('last_name', 'like', '%' . $newSearch . '%');
            // }
            $cand = $cand->get();
        }


        // dd($cand);
        return ['can' => $cand];
    }
    public function searchCompanySmart(Request $request)
    {
        $comp = [];
        if ($request->has('value') && $request->value != NULL) {
            $comp = Company::with('features', 'user')
                ->whereHas('user', function ($query) {
                    $query->where('user.status', 1);
                })
                ->where('name', 'like', '%' . $request->value . '%')
                ->orWhere('country_code', $request->value)
                ->orWhere('phone', $request->value)
                ->get();
        }
        return ['comp' => $comp];
    }
    public function searchRecruiterSmart(Request $request)
    {
        $rec = [];
        if ($request->has('value') && $request->value != NULL) {

            $rec = Recruiter::with('features', 'user')
                ->whereHas('user', function ($query) {
                    $query->where('user.status', 1);
                })
                ->where('name', 'like', '%' . $request->value . '%')
                ->orWhere('country_code', $request->value)
                ->orWhere('phone', $request->value)
                ->get();
        }
        return ['rec' => $rec];
    }
    public function searchAnythingAdmin(Request $request)
    {
        // dd($request->toArray());
        $cand = [];
        $comp = [];
        $rec = [];
        $job = [];
        if ($request->has('value') && $request->value != NULL) {
            $job = Posts::where('status', 1)
                ->where('post', 'like', '%' . $request->value . '%')
                ->where('expiry_date', '>=', Carbon::today())
                ->get();
            $search = $request->value;
            $search = explode(' ', $search);
            $oldsearch = $search[0];
            $cand = Candidate::with('user')
                ->whereHas('user', function ($query) {
                    $query->where('user.status', 1);
                })->where('status', 1)
                ->where('keyword', 'like', '%' . $request->value . '%');
            $cand = $cand->get();
            $comp = Company::with('features', 'user')
                ->whereHas('user', function ($query) {
                    $query->where('user.status', 1);
                })
                ->where('name', 'like', '%' . $request->value . '%')
                ->orWhere('country_code', $request->value)
                ->orWhere('phone', $request->value)
                ->get();
            $rec = Recruiter::with('features', 'user')
                ->whereHas('user', function ($query) {
                    $query->where('user.status', 1);
                })
                ->where('name', 'like', '%' . $request->value . '%')
                ->orWhere('country_code', $request->value)
                ->orWhere('phone', $request->value)
                ->get();
        }
        return ['can' => $cand, 'comp' => $comp, 'rec' => $rec, 'job' => $job];
    }
    public function delRelation($rec_id, $comp_id)
    {
        $comp = CompanyRecRelation::where('com_id', $comp_id)->where('rec_id', $rec_id)->firstOrFail();
        // dd($comp->toArray());
        $comp->delete();

        return back();
    }
    
    public function allNotifications()
    {
        $allnotifications = ExamNotification::where('receiver_id', auth::user()->id)->get();

        return view('companypanel.pages.notifications.index', compact('allnotifications'));
    }
    
    public function markAllNotificationsRead()
    {
        $markAllNotificationsread = DB::table('exam_notifications')
              ->where('receiver_id', auth::user()->id)
              ->update(['read' => 1]);
              
        return redirect()->route('company.allNotifications')->with('message', 'Marked All Notifitions Read');
    }
    
    // public function markallNotifications()
    // {
    //     $markAllNotificationsread = DB::table('exam_notifications')
    //           ->where('user_id', auth::user()->id)
    //           ->update(['read' => 1]);
    //     return redirect()->route('company.allNotifications')->with('message', 'Marked All Notifitions Read');
    // }
}
