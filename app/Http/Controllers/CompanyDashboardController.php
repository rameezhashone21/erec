<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Mail\Hired;
use App\Models\Company;
use App\Models\Exam;
use App\Models\User;
use App\Models\Posts;
use App\Models\Skills;
use App\Mail\ShortListed;
use App\Models\Candidate;
use App\Models\PostSkill;
use App\Models\Recruiter;
use App\Mail\NewJobsPosted;
use App\Models\JobCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CompanyCategory;
use App\Models\CompanyFeatures;
use App\Models\JobApplications;
use App\Models\CompanyRecRelation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\RecruiterDashboardController;

class CompanyDashboardController extends Controller
{
    //
    protected $RecruiterDashboardController;
    public function profile()
    {
        $user = User::with('company')->find(auth()->user()->id);
        $category = CompanyCategory::all();
        $post = Posts::where('comp_id', $user->company->id)->orderBy('id', 'DESC')->take(5)->get();
        // dd($category->toArray());
        // dd($user->toArray());
        // dd($user->company->features[1]);
        return view('companypanel.pages.profileSetup', compact('user', 'category', 'post'));
    }
    public function profileUpdate(Request $request)
    {
        // dd($request->toArray());
        $userName = auth()->user();
        $user = User::with('company')->find(auth()->user()->id);
        if ($request->has('name')) {
            $userName->name = $request->name;
            $userName->save();

            $user->company->name = $request->name;
        }
        if ($request->has('country_code')) {
            $user->company->country_code = $request->country_code;
        }
        if ($request->has('phone')) {
            $user->company->phone = $request->phone;
        }
        if ($request->has('abn')) {
            $user->company->abn = $request->abn;
        }
        if ($request->has('acn')) {
            $user->company->acn = $request->acn;
        }
        if ($request->has('description')) {
            $user->company->description = $request->description;
        }
        if ($request->has('terms')) {
            $user->company->terms = $request->terms;
        }
        if ($request->has('whatWeDo')) {
            $user->company->whatWeDo = $request->whatWeDo;
        }
        if ($request->has('mission')) {
            $user->company->mission = $request->mission;
        }
        if ($request->has('website')) {
            $user->company->website = $request->website;
        }
        if ($request->has('industry')) {
            $user->company->industry = $request->industry;
        }
        if ($request->has('cSizeFrom')) {
            $user->company->cSizeFrom = $request->cSizeFrom;
        }
        if ($request->has('tagline')) {
            $user->company->tagline = $request->tagline;
        }
        // if($request->has('cSizeTo'))
        // {
        //     $user->company->cSizeTo = $request->cSizeTo;
        // }
        if ($request->has('type')) {
            $user->company->type = $request->type;
        }
        if ($request->has('founded')) {
            $user->company->founded = $request->founded;
        }
        if ($request->has('specialties')) {
            $user->company->specialties = $request->specialties;
        }
        if ($request->has('linkedIn')) {
            $user->company->linkedIn = $request->linkedIn;
        }
        if ($request->has('twitter')) {
            $user->company->twitter = $request->twitter;
        }
        if ($request->has('facebook')) {
            $user->company->facebook = $request->facebook;
        }
        if ($request->has('insta')) {
            $user->company->insta = $request->insta;
        }
        if ($request->has('lat')) {
            $user->company->lat = $request->lat;
        }
        if ($request->has('lng')) {
            $user->company->lng = $request->lng;
        }
        if ($request->has('postal_code')) {
            $user->company->postal_code = $request->postal_code;
        }
        if ($request->has('city')) {
            $user->company->city = $request->city;
        }
        if ($request->has('country')) {
            $user->company->country = $request->country;
        }
        if ($request->has('headQuarter')) {
            $user->company->headQuarter = $request->headQuarter;
        }
        if ($request->has('category')) {
            $features = CompanyFeatures::where('com_id', $user->company->id)->get();
            $features->each->delete();
            foreach ($request->category as $row) {
                CompanyFeatures::create([
                    'comp_cat_id' => $row,
                    'com_id' => $user->company->id,
                ]);
            }
        }
        if ($request->hasFile('logo')) {
            // $img = $request->logo;
            // $number = rand(1, 999);
            // $numb = $number / 7;
            // $extension = $img->extension();
            // $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
            // $filenamepath = 'companyLogo' . '/' . 'img/' . $filenamenew;
            // $filename = $img->move(public_path('storage/companyLogo' . '/' . 'img'), $filenamenew);
            // $user->company->logo = $filenamepath;
            // $user = User::find(auth()->user()->id);
            // $user->avatar = $filenamepath;
            // $user->save();

            $img = $request->logo;
            $number = rand(1, 999);
            $numb = $number / 7;
            $extension = $img->extension();
            $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
            $filenamepath = 'companyLogo' . '/' . 'img/' . $filenamenew;
            $filename = $img->move(public_path('storage/companyLogo' . '/' . 'img'), $filenamenew);

            $user = User::with('company')->where('id', auth()->user()->id)->first();
            // dd($user->toArray());
            $user->avatar = $filenamepath;
            $user->company->logo = $filenamepath;
            $user->save();
        }
        if ($request->hasFile('banner')) {
            $img = $request->banner;
            $number = rand(1, 999);
            $numb = $number / 7;
            $extension = $img->extension();
            $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
            $filenamepath = 'companyBanner' . '/' . 'img/' . $filenamenew;
            $filename = $img->move(public_path('storage/companyBanner' . '/' . 'img'), $filenamenew);
            $user = User::where('id', auth()->user()->id)->first();
            $user->banner = $filenamepath;
            $user->save();
        }
        $user->company->save();

        if ($request->has('source')) {
            return response()->json(['success', 'Updated Successfully!']);
        }

        return back()->withStatus("Your Information has successfully Updated..");
    }
    public function jobs()
    {
        $post = Posts::where('comp_id', auth()->user()->company->id)->orderBy('id', 'DESC')->get();
        // dd($post->toArray());
        return view('companypanel.pages.jobs.index', compact('post'));
    }
    public function createJobs()
    {
        // dd('ok');
        if (auth()->user()->package->id != 21) {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

            $customerdata = $stripe->subscriptions->retrieve(
                auth()->user()->package_buy_stripe_token,
                []
            );

            $validDate = date("Y-m-d", $customerdata->current_period_start);
        } else {
            $validDate = auth()->user()->package_expiry;
        }
        $post = Posts::where('comp_id', auth()->user()->company->id)
            ->where('created_at', '>=', $validDate)
            ->get();

        // dd($validDate, count($post));
        // dd(date("Y-m-d H:i:s", $customerdata->current_period_end));
        if (auth()->user()->posts_count > 0) {
            if (count($post) < auth()->user()->package->no_of_posts) {
                // dd(auth()->user()->posts_count > 0);
                $recruiter = CompanyRecRelation::where('com_id', auth()->user()->company->id)->where('status', 1)->get();
                $data = JobCategory::orderby('title', 'asc')->get();
                // $data = null;
                // dd($data);
                $skill = Skills::all();
                return view('companypanel.pages.jobs.create', compact('recruiter', 'skill', 'data'));
            } else {
                return back();
            }
        } else {
            return back()->withStatus("You need to upgrade your package first..");
        }
        // } else {
        //     $recruiter = CompanyRecRelation::where('com_id', auth()->user()->company->id)->where('status', 1)->get();
        //     $response = Http::get('https://api.e-rec.com.au/api/classes/list');
        //     $data = $response->json();
        //     $response = Http::get('http://api.e-rec.com.au/api/classes/list');
        //     $data = $response->json();
        //     // $data = null;
        //     // dd($data);
        //     $skill = Skills::all();
        //     return view('companypanel.pages.jobs.create', compact('recruiter', 'skill', 'data'));
        // }
    }
    public function incrementSlug($slug)
    {

        $original = $slug;

        $count = 2;

        while (Posts::whereSlug($slug)->exists()) {
            $slug = "{$original}-" . '00' . $count++;
        }

        return $slug;
    }
    public function StoreJob(Request $request)
    {
        if (auth()->user()->posts_count > 0) {
            $user = Auth::user();
            $data = $request->all();
            // dd($request->all());
            $valid = Validator::make($data, [
                'post' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'job_type' => ['required', 'string'],
                'experience' => ['required', 'string'],
                'address' => ['required', 'string'],
                'skill' => ['required', 'numeric'],
                'category' => ['required', 'numeric'],
                'banner' => ['mimes:jpg,jpeg,png,bmp,giff,svg']
            ]);
            // if (Posts::whereSlug($slug = Str::slug($request->post))->exists()) {
            //     $max = Posts::wherePost($request->post)->latest('id')->skip(1)->value('slug');
            //     if (isset($max[-1]) && is_numeric($max[-1])) {
            //         return preg_replace_callback('/(\d+)$/', function($mathces) {
            //             return $mathces[1] + 1;
            //         }, $max);
            //     }
            // }
            if (Posts::whereSlug($slug = Str::slug($request->post))->exists()) {

                $slug = $this->incrementSlug($slug);
            }

            $this->attributes['slug'] = $slug;

            // dd($data);

            if ($valid) {
                $post = new Posts;
                $post->class_id = $data['category'];
                $post->post = $data['post'];
                $post->description = $data['description'];
                $post->job_type = $data['job_type'];
                $post->experience = $data['experience'];
                if ($request->has('increment')) {
                    # code...
                    $post->increment = $data['increment'];
                }
                $post->gender = $data['gender'];
                $post->qualification = $data['qualification'];
                $post->expiry_date = \Carbon\Carbon::parse($data['expiry_date'])->format('Y-m-d');
                $post->key_responsibility = $data['key_responsibility'];
                $post->skill_exp = $data['skill_exp'];
                if ($request->has('test_attached') && $request->test_attached == 1) {
                    // Get exam id from slug
                    $exam = Exam::select('id')->where([
                        'slug'       => $data['test_id'],
                        'company_id' => auth()->user()->company->id
                    ])->first();

                    $post->test_attached = $data['test_attached'];
                    if ($request->has('test_id')) {
                        $post->test_id = $exam->id;
                    }
                    if ($request->has('criteria')) {
                        $post->criteria = $data['criteria'];
                    }
                } else {
                    $post->test_id = null;
                    $post->criteria = null;
                }
                $post->offer_salary = $data['offer_salary'];
                $post->location = $data['address'];
                if (isset($request->rec_id)) {
                    $post->rec_id = $data['rec_id'];
                } else {
                    $post->rec_id = 0;
                }
                $post->status = 1;
                $post->comp_id = auth()->user()->company->id;
                if ($request->has('banner')) {
                    $img = $data['banner'];
                    $number = rand(1, 999);
                    $numb = $number / 7;
                    $extension = $img->extension();
                    $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                    $filenamepath = 'jobPosts' . '/' . 'img/' . $filenamenew;
                    $filename = $img->move(public_path('storage/jobPosts' . '/' . 'img'), $filenamenew);
                    $post->banner = $filenamepath;
                } elseif ($request->has('existingBanner')) {
                    $post->banner = $request->existingBanner;
                }
                $post->slug = $slug;
                $post->save();
                foreach ($request->skill as $row) {
                    PostSkill::create([
                        'post_id' => $post->id,
                        'skill_id' => $row,
                    ]);
                }

                $postedBy = $post->company->name;
                $postName = $post->post;
                $postDesc = $post->description;
                $postSlug = $post->slug;
                if ($post->recruiter != null) {
                    # code...
                    $email = $post->recruiter->user->email;
                    $recName = $post->recruiter->name;
                    // dd('compName:' . $compName, 'postName:' . $postName, 'postDesc:' . $postDesc, 'postSlug:' . $postSlug, 'email:' . $email, 'postSlug:' . $postSlug);
                    $mail = Mail::to($email)->send(new NewJobsPosted($recName, $postedBy, $postName, $postDesc, $postSlug));
                }

                if ($post->save()) {
                    $user->decrement('posts_count');
                    $user->decrement('total_no_of_posts');
                }
                return redirect()->route('company.jobs')->withStatus("Job Post has been Created Successfully...");
            } else {
                return redirect()->back()->withError($valid->errors()->first());
            }
        } else {
            return back()->withStatus("You need to upgrade your package first..");
        }
    }
    public function jobApplications()
    {
        $user = User::with('company')->where('id', auth()->user()->id)->first();
        $post = Posts::where('comp_id', $user->company->id)->get();
        // $jobApp = JobApplications::with('post', 'candidate', 'candidateDocs')->get();
        $value = auth()->user()->company->id;
        $jobApp = JobApplications::with('candidateDocument', 'candidate', 'post')->whereHas('post', function ($q) use ($value) {
            // Query the name field in status table
            $q->where('comp_id', '=', $value); // '=' is optional
        })->get();
        // dd($jobApp->toArray());
        return view('companypanel.pages.jobs.jobApplications', compact('jobApp'));
    }
    public function editPost($id)
    {
        $id = Posts::whereSlug($id)->first()->id;
        $recruiter = CompanyRecRelation::where('com_id', auth()->user()->company->id)->where('status', 1)->get();
        $post = Posts::where('id', $id)->first();
        // $response = Http::get('https://api.e-rec.com.au/api/classes/list');
        // $data = $response->json();
        $data = JobCategory::orderby('title', 'asc')->get();
        // $test = Http::get('https://api.e-rec.com.au/api/qst/to/classes', [
        //     'class_id' => $post->class_id,
        // ]);
        $test = Exam::all();
        $test_id = $test;
        // dd($test_id);
        $skill = Skills::all();
        $postSkills = PostSkill::where('post_id', $post->id)->get();
        return view('companypanel.pages.jobs.editPost', compact('post', 'skill', 'postSkills', 'recruiter', 'data', 'test_id'));
    }
    public function updateJob(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $valid = Validator::make($data, [
            'post' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'job_type' => ['required', 'string'],
            'experience' => ['required', 'string'],
            'address' => ['required', 'string'],
            'skill' => ['required', 'numeric'],
            'category' => ['required', 'numeric'],

            // 'banner' => ['required', 'mimes:jpg,jpeg,png,bmp,giff,svg'],
            // 'recruiter'  => ['required']

        ]);
        if (Posts::whereSlug($slug = Str::slug($request->post))->exists()) {

            $slug = $this->incrementSlug($slug);
        }

        $this->attributes['slug'] = $slug;

        if ($valid) {
            $post = Posts::where('id', $request->post_id)->first();
            // dd($post->toArray());
            $post->post = $data['post'];
            $post->class_id = $data['category'];
            $post->description = $data['description'];
            $post->job_type = $data['job_type'];
            if ($request->has('increment')) {
                # code...
                $post->increment = $data['increment'];
            }
            $post->experience = $data['experience'];
            $post->gender = $data['gender'];
            $post->qualification = $data['qualification'];
            $post->expiry_date = \Carbon\Carbon::parse($data['expiry_date'])->format('Y-m-d');
            $post->key_responsibility = $data['key_responsibility'];
            $post->skill_exp = $data['skill_exp'];
            $post->offer_salary = $data['offer_salary'];
            if ($request->has('test_attached') && $request->test_attached == 1) {
                $post->test_attached = $data['test_attached'];
                if ($request->has('test_id')) {
                    $post->test_id = $data['test_id'];
                }
                if ($request->has('criteria')) {
                    $post->criteria = $data['criteria'];
                }
                $jobApp = JobApplications::where('post_id', $post->id)->get();
                foreach ($jobApp as $row) {
                    $jobApp = JobApplications::find($row->id)->id;
                    $assignedData =
                        [
                            "id" => $jobApp,
                            "selectedId" => $data['test_id'],
                        ];
                    $assigned_request = new Request($assignedData);
                    $assign = new RecruiterDashboardController();
                    $test = $assign->assignJob($assigned_request);
                    // dd($test);
                    $row->qst_id = $data['test_id'];
                    $row->status = 1;
                    $row->save();
                }
            } else {
                $post->test_id = null;
                $post->criteria = null;
            }
            // $post->test_attached = $data['test_attached'];
            // if ($request->has('criteria')) {
            //     $post->criteria = $data['criteria'];
            // }
            // if ($request->has('test_id')) {
            //     $post->test_id = $data['test_id'];
            // }
            $post->location = $data['address'];
            if (isset($request->rec_id)) {
                $post->rec_id = $data['rec_id'];
            } else {
                $post->rec_id = 0;
            }
            $post->comp_id = auth()->user()->company->id;
            if ($request->has('banner')) {
                $img = $data['banner'];
                $number = rand(1, 999);
                $numb = $number / 7;
                $extension = $img->extension();
                $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                $filenamepath = 'jobPosts' . '/' . 'img/' . $filenamenew;
                $filename = $img->move(public_path('storage/jobPosts' . '/' . 'img'), $filenamenew);
                $post->banner = $filenamepath;
            }
            $post->slug = $slug;
            $post->save();

            if ($request->has('skill')) {

                $PostSkills = PostSkill::where('post_id', $post->id);
                $PostSkills->delete();
                foreach ($request->skill as $row) {
                    PostSkill::create([
                        'post_id' => $post->id,
                        'skill_id' => $row,
                    ]);
                }
            }
            return redirect()->route('company.jobs')->withStatus("Job Post has been Created Successfully...");
        } else {
            return redirect()->back()->withError($valid->errors()->first());
        }
    }
    public function jobAppStatus($id)
    {
        $jobApp = JobApplications::find($id);
        // dd($jobApp->toArray());
        if ($jobApp->status == 0 || $jobApp->status == 2) {
            $jobApp->status = 1;
        } elseif ($jobApp->status == 1) {
            $jobApp->status = 0;
        }
        $jobApp->save();
        return back();
    }
    public function jobAppStatus2($id)
    {
        // dd('okay');
        $jobApp = JobApplications::find($id);
        // dd($jobApp->toArray());
        // $jobApp->status = 2;
        if ($jobApp->status == 0 || $jobApp->status == 1) {
            $jobApp->status = 2;
        } elseif ($jobApp->status = 2) {
            $jobApp->status = 0;
        }
        $jobApp->save();
        return back();
    }
    public function updatePostStatus($id)
    {
        // dd($id);
        $post = Posts::find($id);
        // dd($post->toArray());
        $post->status = 1;
        $post->save();
        // return back();
    }
    public function deactivePostStatus($id)
    {
        // dd($id);
        $post = Posts::find($id);
        // dd($post->toArray());
        $post->status = 0;
        $post->save();
        // return back();
    }
    public function deleteCompPost($id)
    {
        $post = Posts::find($id);
        // dd($post->toArray());
        $post->delete();
        return back();
    }
    public function assignJob(Request $request)
    {
        // dd($request->toArray());
        try {
            $job = JobApplications::with('candidate', 'candidate.user')->find($request->id);
            $user_id = $job->candidate->user->new_user_id;
            $qst = $request->selectedId;
            $class_id = $job->class_id;
            // $response = Http::post('https://api.e-rec.com.au/api/user/assign/test', [
            //     'class_id' => $class_id,
            //     'qst_no' => $qst,
            //     'u_id' => $user_id,
            // ]);
            // $data = $response->json();
            $data = $job->status;
            $newJobs = new JobApplications();
            $assinQst = $newJobs->qst($qst);
            // dd($assinQst['name']);
            // dd($data);
            if ($data == 0 || $data == 1) {
                $job->status = 1;
                $job->qst_id = $qst;
                $job->save();
                return $assinQst['exam_title'];
            } else {
                return false;
            }
        } catch (\Throwable $e) {
            return response()->json('error', $e->getMessage());
        }
    }
    public function jobDetailsComp($id)
    {
        $id = Posts::whereSlug($id)->first()->id;
        // dd($id);
        $post = Posts::with('jobAppRecComp', 'skills', 'company')->find($id);
        return view('companypanel.pages.jobs.job_detail', compact('post'));
    }
    public function jobApplicantsComp($id)
    {
        $id = Posts::whereSlug($id)->first()->id;
        $post = Posts::with('jobAppRecComp', 'skills', 'company', 'jobAppRecComp.candidate')->findOrFail($id);
        // dd($post->jobAppRecComp->toArray());
        return view('companypanel.pages.jobs.job_applicants', compact('post'));
    }
    public function jobshortlistedComp($id)
    {
        $id = Posts::whereSlug($id)->first()->id;
        $post = Posts::with('jobAppRecComp', 'skills', 'company')->find($id);
        // dd($post->toArray());
        $job = Posts::with('jobAppRecComp', 'skills', 'company')->whereHas('jobAppRecComp', function ($query) {
            $query->where('status', 1);
        })->find($id);
        return view('companypanel.pages.jobs.jobs_shortlisted', compact('post', 'job'));
    }
    public function examResultComp($id)
    {
        $id = Posts::whereSlug($id)->first()->id;
        $post = Posts::with('jobAppRecComp', 'skills', 'company')->find($id);
        return view('companypanel.pages.jobs.exam_results', compact('post'));
    }
    public function mamrkerCandidate()
    {
        $comp = auth()->user()->company->id;
        $jobApp = JobApplications::with('candidateDocument', 'candidate', 'post')->whereHas('post', function ($q) use ($comp) {
            // Query the name field in status table
            $q->where('comp_id', '=', $comp); // '=' is optional
        })->get();
        // dd($jobApp->toArray());
        return $jobApp;
    }
    public function postAnExistingJob($id)
    {
        // dd("check");
        // if (auth()->user()->package->id == 21) {
        // if (count(auth()->user()->company->posts) < auth()->user()->package->no_of_posts) {
        $recruiter = CompanyRecRelation::where('com_id', auth()->user()->company->id)->where('status', 1)->get();
        $post = Posts::where('id', $id)->first();
        $data = JobCategory::orderby('title', 'asc')->get();
        // dd($post->toArray());
        $skill = Skills::all();
        $test = Http::get('https://api.e-rec.com.au/api/qst/to/classes', [
            'class_id' => $post->class_id,
        ]);
        $test_id = $test->json();
        $postSkills = PostSkill::where('post_id', $post->id)->get();
        return view('companypanel.pages.jobs.postAnExisting.create', compact('post', 'skill', 'postSkills', 'recruiter', 'data', 'test_id'));
        // } else {
        //     return back();
        // }
        // }
        // else {
        //     $recruiter = CompanyRecRelation::where('com_id', auth()->user()->company->id)->where('status', 1)->get();
        //     $post = Posts::where('id', $id)->first();
        //     $response = Http::get('https://api.e-rec.com.au/api/classes/list');
        //     $data = $response->json();
        //     // dd($post->toArray());
        //     $skill = Skills::all();
        //     $test = Http::get('https://api.e-rec.com.au/api/qst/to/classes', [
        //         'class_id' => $post->class_id,
        //     ]);
        //     $test_id = $test->json();
        //     $postSkills = PostSkill::where('post_id', $post->id)->get();
        //     return view('companypanel.pages.jobs.postAnExisting.create', compact('post', 'skill', 'postSkills', 'recruiter', 'data', 'test_id'));
        // }
    }
    public function candidateIndex()
    {
        $comp = auth()->user()->company->id;
        $can = JobApplications::with('candidate', 'post')->whereHas('post', function ($q) use ($comp) {
            $q->where('post.comp_id', '=', $comp);
        })->get()->unique('candidate_id');
        // dd($can->toArray());
        return view('companypanel.pages.candidate.index', compact('can'));
    }
    public function existingJobs()
    {
        $post = Posts::where('comp_id', auth()->user()->company->id)->orderBy('post')->get();
        return $post;
    }
    public function getCompCategory()
    {
        $data['skill'] = CompanyCategory::all();
        $data['candSkills'] = CompanyFeatures::where('com_id', auth()->user()->company->id)->get();

        // dd($data);
        return $data;
    }
    public function companygettest($id)
    {
        // dd('ok');
        $jobApp = JobApplications::find($id);
        $data = $jobApp->test($jobApp->class_id);
        return $data;
    }
    public function hirecandidate($id)
    {
        // dd('ok');
        $jobApp = JobApplications::with('candidate')->find($id);
        $jobApp->status = 2;
        $jobApp->save();

        $email = $jobApp->candidate->user->email;
        // $hired = Mail::to($email)->send(new Hired($email));
    }
    public function shortListCandidate($id)
    {
        // dd('ok');
        $jobApp = JobApplications::with('candidate')->find($id);
        $jobApp->status = 1;
        $jobApp->save();

        $canEmail = $jobApp->candidate->user->email;
        $canName = $jobApp->candidate->first_name . ' ' . $jobApp->candidate->last_name;
        $postName = $jobApp->post->post;

        if ($jobApp->post->company != null) {
            $email = $jobApp->post->company->user->email;
            $postedBy = $jobApp->post->company->name;
        } elseif ($jobApp->post->recruiter != null) {
            $email = $jobApp->post->recruiter->user->email;
            $postedBy = $jobApp->post->recruiter->name;
        }

        $email = $jobApp->candidate->user->email;
        // Mail::to($email)->send(new ShortListed($postName, $canName, $postedBy));
    }
    public function hireReject(Request $request)
    {
        // dd('ok');
        $jobApp = JobApplications::with('candidate')->find($request->id);
        $jobApp->status = $request->status;
        $jobApp->save();

        $email = $jobApp->candidate->user->email;
        // $hired = Mail::to($email)->send(new Hired($email));
    }
    public function getTest(Request $request)
    {
        // $response = Http::get('https://api.e-rec.com.au/api/qst/to/classes', [
        //     'class_id' => $id,
        // ]);
        // $data = $response->json();
        //$datas = Exam::with('questions')->get()->toArray();
        $company_id = Company::where('user_id' , $request->user_id)->value('id');
        
        $data = Exam::where('company_id' , $company_id)->has('questions')->with('questions')->get();

        return $data;

    }
}
