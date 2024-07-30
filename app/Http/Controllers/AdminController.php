<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use Carbon\Carbon;
use App\Models\Faq;
use App\Models\User;
use App\Models\Posts;
use App\Models\Skills;
use App\Models\Company;
use App\Models\Candidate;
use App\Models\PostSkill;
use App\Models\Recruiter;
use App\Models\SociaLink;
use App\Models\JobCategory;
use App\Models\Subscribers;
use Illuminate\Support\Str;
use App\Models\CandidateEdu;
use Illuminate\Http\Request;
use App\Models\CandidateDocs;
use App\Models\CandidateSkills;
use App\Models\CompanyCategory;
use App\Models\CompanyFeatures;
use App\Models\JobApplications;
use App\Models\CanAppVisibility;
use App\Models\SubscriptionPackages;
use Illuminate\Support\Facades\Http;
use App\Models\CandidateProfessionalExp;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function companyIndex()
    {
        $comp = Company::with('user')->orderBy('id', 'DESC')->get();
        // dd($comp->toArray());
        return view('adminpanel.pages.company.index', compact('comp'));
    }
    public function recruiterIndex()
    {
        $rec = Recruiter::with('user')->orderBy('id', 'DESC')->get();
        // $rec = Recruiter::with('user')->whereHas('user', function($query){
        //     $query->where('user.status',1);
        // })->orderBy('id', 'DESC')->get();
        // dd($rec->toArray());
        return view('adminpanel.pages.recruiter.index', compact('rec'));
    }
    public function candidateIndex()
    {
        $can = Candidate::with('user')->orderBy('id', 'DESC')->get();
        // dd($can->toArray());
        return view('adminpanel.pages.candidate.index', compact('can'));
    }
    public function companyDetails($id)
    {
        $comp = Company::with('user', 'features')->whereSlug($id)->first();
        $recruited = count(JobApplications::where('status', 2)->with('candidate', 'post')->whereHas('post', function ($q) use ($comp) {
            $q->where('post.comp_id', '=', $comp->id);
        })->get()->unique('candidate_id'));
        // dd($comp->toArray());
        return view('adminpanel.pages.company.detail', compact('comp','recruited'));
    }
    public function recruiterDetails($id)
    {
        $rec = Recruiter::with('user', 'features')->whereSlug($id)->first();
        // dd($rec->toArray());
        return view('adminpanel.pages.recruiter.detail', compact('rec'));
    }
    public function candidateDetails($id)
    {
        $can = Candidate::with('user')->whereSlug($id)->first();
        // dd($can->user->avatar);
        return view('adminpanel.pages.candidate.detail', compact('can'));
    }
    public function skills()
    {
        $skills = Skills::orderBy('id', 'DESC')->get();
        // dd($skills->toArray());
        return view('adminpanel.pages.skills.index', compact('skills'));
    }
    public function addSkill()
    {
        return view('adminpanel.pages.skills.create');
    }
    public function storeSkill(Request $request)
    {
        // dd($request->toArray());
        if ($request->has('skill_id')) {
            $skills = Skills::where('id', $request->skill_id)->first();
            $skills->name = $request->name;
            if ($request->has('description') && $request->description != null) {
                $skills->description = $request->description;
                # code...
            }
        } else {
            $skills = new Skills;
            $skills->name = $request->name;
            if ($request->has('description') && $request->description != null) {
                $skills->description = $request->description;
                # code...
            }
        }
        $skills->save();

        return redirect()->route('admin.skills');
    }
    public function editSkill($id)
    {
        $skills = Skills::where('id', $id)->first();
        // dd($skills->toArray());
        return view('adminpanel.pages.skills.edit', compact('skills'));
    }
    public function destroySkill($id)
    {
        $skills = Skills::where('id', $id)->first();
        // dd($skills->toArray());
        $skills->delete();
        return redirect()->route('admin.skills');
    }
    // Category
    public function category()
    {
        $cat = CompanyCategory::orderBy('id', 'DESC')->get();
        // dd($cat->toArray());
        return view('adminpanel.pages.category.index', compact('cat'));
    }
    public function addCategory()
    {
        return view('adminpanel.pages.category.create');
    }
    public function storeCategory(Request $request)
    {
        // dd($request->toArray());
        if ($request->has('cat_id')) {
            $cat = CompanyCategory::where('id', $request->cat_id)->first();
            $cat->name = $request->name;
            if ($request->has('img')) {
                $img = $request->img;
                $number = rand(1, 999);
                $numb = $number / 7;
                $extension = $img->extension();
                $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                $filenamepath = 'category' . '/' . 'img/' . $filenamenew;
                $filename = $img->move(public_path('storage/category' . '/' . 'img'), $filenamenew);
                $cat->img = $filenamepath;
            } else {
                $cat->img = "";
            }
        } else {
            $cat = new CompanyCategory;
            $cat->name = $request->name;
            if ($request->has('img')) {
                $img = $request->img;
                $number = rand(1, 999);
                $numb = $number / 7;
                $extension = $img->extension();
                $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                $filenamepath = 'category' . '/' . 'img/' . $filenamenew;
                $filename = $img->move(public_path('storage/category' . '/' . 'img'), $filenamenew);
                $cat->img = $filenamepath;
            } else {
                $cat->img = "";
            }
        }
        $cat->save();

        return redirect()->route('admin.category');
    }
    
    public function storeJobCategory(Request $request)
    {
        if($request->name) {
            $cat = new JobCategory;
            $cat->title = $request->name;
            $cat->save();
            
            return response()->json([
                'id' => $cat->id,
                'name' => $cat->title
            ]);
        }
        else{
            
            return response()->json(['data' => 'No Category Found']);

        }

    }
    
    public function editCategory($id)
    {
        $cat = CompanyCategory::where('id', $id)->first();
        // dd($skills->toArray());
        return view('adminpanel.pages.category.edit', compact('cat'));
    }
    public function destroyCategory($id)
    {
        $cat = CompanyCategory::where('id', $id)->first();
        // dd($skills->toArray());
        $cat->delete();
        return redirect()->route('admin.category');
    }
    // User
    public function allUsers()
    {
        $user = User::where('role', '!=', 'admin')->orderBy('id', 'DESC')->get();
        // dd($user->toArray());
        return view('adminpanel.pages.user.index', compact('user'));
    }
    public function editUser($id)
    {
        $user = User::find($id);
        // dd($user->toArray());
        return view('adminpanel.pages.user.edit', compact('user'));
    }
    public function approveUser(Request $request)
    {
        // dd($request->toArray());
        $user = User::where('id', $request->user_id)->first();
        // dd($user->toArray());
        // $user->role = $request->role;
        $user->status = $request->status;
        $user->save();
        return back()->with('message', 'Updated Successfully!');
    }
    public function deleteUser($id)
    {
        // dd($request->toArray());
        $user = User::where('id', $id)->first();
        // dd($user->toArray());
        // $user->role = $request->role;
        $user->delete();
        return back()->with('message', 'Updated Successfully!');
    }
    public function jobPosts()
    {
        $job = Posts::orderBy('id', 'DESC')->get();
        // dd($job->toArray());
        return view('adminpanel.pages.job.index', compact('job'));
    }

    public function jobPostDetails($id)
    {
        $job = Posts::with('recruiter', 'company')->whereSlug($id)->first();
        // dd($job->toArray());
        return view('adminpanel.pages.job.detail', compact('job'));
    }
    public function jobApplicantsComp($id)
    {
        $id = Posts::whereSlug($id)->first()->id;
        $post = Posts::with('jobAppRecComp', 'skills', 'company')->find($id);
        // dd($post->jobAppRecComp->toArray());
        return view('adminpanel.pages.job.job_applicants', compact('post'));
    }
    public function jobshortlistedComp($id)
    {
        $id = Posts::whereSlug($id)->first()->id;
        $post = Posts::with('jobAppRecComp', 'skills', 'company')->find($id);
        // dd($post->toArray());
        $job = Posts::with('jobAppRecComp', 'skills', 'company')->whereHas('jobAppRecComp', function ($query) {
            $query->where('job_applications.status', 1);
        })->find($id);
        return view('adminpanel.pages.job.jobs_shortlisted', compact('post', 'job'));
    }
    public function examResultComp($id)
    {
        $id = Posts::whereSlug($id)->first()->id;
        $post = Posts::with('jobAppRecComp', 'skills', 'company')->find($id);
        return view('adminpanel.pages.job.exam_results', compact('post'));
    }
    public function jobPostDelete($id)
    {
        $job = Posts::whereSlug($id)->first();
        $apps = JobApplications::where('post_id',$job->id)->orderBy('id', 'DESC')->get();
        if(count($apps) > 0)
        {
            foreach($apps as $row)
            {
                $row->delete();
            }
            $pst_skill = PostSkill::where('post_id',$job->id)->get();
            if(count($pst_skill) > 0)
            {
                foreach($pst_skill as $ro)
                {
                    $row->delete();
                }
            }
        }
        $job->delete();
        // dd($job->toArray());
        return redirect()->back()->with('success', 'Record has been Successfully deleted!');
    }
    public function jobApplications()
    {
        // $apps = CanAppVisibility::orderBy('id', 'DESC')->get();
        $apps = JobApplications::with('candidate', 'post', 'candidateDocument')->whereHas('candidate')->whereHas('post')->orderBy('id', 'DESC')->get();
        // dd($apps->toArray());
        return view('adminpanel.pages.application.index', compact('apps'));
    }
    public function subscribers()
    {
        // dd('ok');
        // $apps = CanAppVisibility::orderBy('id', 'DESC')->get();
        $apps = Subscribers::orderBy('id', 'DESC')->get();
        // dd($apps->toArray());
        return view('adminpanel.pages.subscribers.index', compact('apps'));
    }
    public function subscribersStatusChange($status, $id)
    {
        // dd($status, $id);
        $apps = Subscribers::find($id);
        $apps->status = $status;
        $apps->save();
        return $apps->status;
        // return with(['success', 'Updated Successfully!']);
    }
    public function jobApplicationsStatus($id)
    {
        $apps = JobApplications::find($id);
        // dd($apps->toArray());
        // if ($apps->status == 0) {
        //     $apps->status = 1;
        // } elseif ($apps->status == 1) {
        //     $apps->status = 0;
        // }
        $apps->delete();
        return back()->with('message', 'Updated Successfully!');
    }
    public function jobPostStatus(Request $request)
    {
        // dd($request->toArray());
        $apps = Posts::where('id', $request->post_id)->first();
        $apps->status = $request->status;
        $apps->save();
        return response()->json(['data' => 'Status Has Been Changed...']);
    }
    public function companyDestroy($id)
    {
        // dd('ok');
        $comp = Company::find($id);
        $comp->delete();

        return back();
    }
    public function recruiterDestroy($id)
    {
        // dd('ok');
        $comp = Recruiter::find($id);
        $comp->delete();

        return back();
    }
    public function candidateDestroy($id)
    {
        // dd('ok');
        $can = Candidate::find($id);
        $pro = CandidateProfessionalExp::get();
        $edu = CandidateEdu::get();
        $skill = CandidateSkills::get();
        $doc = CandidateDocs::get();
        $app = CanAppVisibility::get();
        foreach ($pro as $row) {
            $row->where('user_id', $can->user_id)->delete();
        }
        foreach ($edu as $row) {
            $row->where('user_id', $can->user_id)->delete();
        }
        foreach ($skill as $row) {
            $row->where('user_id', $can->user_id)->delete();
        }
        foreach ($doc as $row) {
            $row->where('user_id', $can->user_id)->delete();
        }
        foreach ($app as $row) {
            $row->where('user_id', $can->user_id)->delete();
        }
        $can->delete();

        return back();
    }
    // Subscription Packages
    public function packages()
    {
        $pkg = SubscriptionPackages::where('status','!=',2)->orderBy('id', 'DESC')->get();
        // dd($apps->toArray());
        return view('adminpanel.pages.subscriptions.index', compact('pkg'));
    }
    public function packagesDestroy($id)
    {
        $pkg = SubscriptionPackages::find($id);
        $pkg->status = 2;
        $pkg->save();
        // dd($apps->toArray());
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function packagesAdd()
    {
        $pkg = SubscriptionPackages::get();
        // dd($apps->toArray());
        return view('adminpanel.pages.subscriptions.add', compact('pkg'));
    }
    public function packagesEdit($id)
    {
        $pkg = SubscriptionPackages::whereSlug($id)->first();
        // dd($pkg->toArray());
        return view('adminpanel.pages.subscriptions.edit', compact('pkg'));
    }
    public function packagesStore(Request $request)
    {
        // dd($request->toArray());
        $valid = $this->validate($request, [
            'name' => 'required|string|string|unique:packages,name',
            'no_of_posts' => 'required',
            'class' => 'required|in:bronze,silver,gold',
            'applicantProfiling' => 'required|numeric|in:0,1',
            'applicantTracking' => 'required|numeric|in:0,1',
            'erecDashboard' => 'required|numeric|in:0,1',
            'erecReportingEngine' => 'required|numeric|in:0,1',
            'databaseSearch' => 'required|numeric|in:0,1',
            'uploadCV' => 'required|numeric|in:0,1',
            'longlistAssessment' => 'required|numeric|in:0,1',
            'shortlistAssessment' => 'required|numeric|in:0,1',
            'emailIntegration' => 'required|numeric|in:0,1',
            'smsIntegration' => 'required|numeric|in:0,1',
            'liveBasedChatting' => 'required|numeric|in:0,1',
            'industryBasedAssessment' => 'required|numeric|in:0,1',
            'aiEngineIntegration' => 'required|numeric|in:0,1',
            'mlEngineIntegration' => 'required|numeric|in:0,1',
            'predictiveAnalysisEngine' => 'required|numeric|in:0,1',
            'ctatEngine' => 'required|numeric|in:0,1',
            'rasvEngine' => 'required|numeric|in:0,1',
            'tatiEngine' => 'required|numeric|in:0,1',
            'iagmEngine' => 'required|numeric|in:0,1',
            'rtwEngine' => 'required|numeric|in:0,1',
            'amiEngine' => 'required|numeric|in:0,1',
            'price' => 'required|numeric',
            'status' => 'required|numeric|in:0,1',
            'time_interval' => 'required|string|in:month,year',
            'desc' => 'required|string',
            'slogan' => 'required|string',
            'shortdesc' => 'required|string',
        ]);

        $time_interval = "";
        if ($request->time_interval == "month") {
            $time_interval = "month";
        } else {
            $time_interval = "year";
        }
        $slug = Str::slug($request->name . '-' . $request->time_interval);
        // dd($slug);

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        if (isset($stripe)) {

            // $stripeproductkey = null;

            $stripeproductkey = $stripe->products->create([
                'name' => $request->name,
            ]);




            if (isset($stripeproductkey->id)) {

                // $stripepricekey = null;

                $stripepricekey = $stripe->prices->create([
                    'unit_amount' => $request->price * 100,
                    'currency' => 'usd',
                    'recurring' => ['interval' => $time_interval],
                    'product' => $stripeproductkey->id,
                ]);

                if (isset($stripepricekey->id)) {
                    // dd($stripeproductkey->id,$stripepricekey->id);
                    $data = [
                        'name' => $request->name,
                        'no_of_posts' => $request->no_of_posts,
                        'applicantProfiling' => $request->applicantProfiling,
                        'applicantTracking' => $request->applicantTracking,
                        'erecDashboard' => $request->erecDashboard,
                        'erecReportingEngine' => $request->erecReportingEngine,
                        'databaseSearch' => $request->databaseSearch,
                        'uploadCV' => $request->uploadCV,
                        'longlistAssessment' => $request->longlistAssessment,
                        'shortlistAssessment' => $request->shortlistAssessment,
                        'emailIntegration' => $request->emailIntegration,
                        'smsIntegration' => $request->smsIntegration,
                        'liveBasedChatting' => $request->liveBasedChatting,
                        'industryBasedAssessment' => $request->industryBasedAssessment,
                        'aiEngineIntegration' => $request->aiEngineIntegration,
                        'stripe_package_id' => $stripeproductkey->id,
                        'stripe_price_id' => $stripepricekey->id,
                        'slug' => $slug,
                        'mlEngineIntegration' => $request->mlEngineIntegration,
                        'predictiveAnalysisEngine' => $request->predictiveAnalysisEngine,
                        'ctatEngine' => $request->ctatEngine,
                        'rasvEngine' => $request->rasvEngine,
                        'tatiEngine' => $request->tatiEngine,
                        'iagmEngine' => $request->iagmEngine,
                        'rtwEngine' => $request->rtwEngine,
                        'amiEngine' => $request->amiEngine,
                        'price' => $request->price,
                        'status' => $request->status,
                        'time_interval' => $request->time_interval,
                        'desc' => $request->desc,
                        'slogan' => $request->slogan,
                        'shortdesc' => $request->shortdesc,
                        'class' => $request->class,

                    ];

                    // dd($data);
                    $add = SubscriptionPackages::create($data);

                    if ($add) {
                        return redirect()->route('admin.packages')->with('success', 'Record created successfully.');
                    } else {
                        return redirect()->route('admin.packages')->with('error', 'Record not created!');
                    }
                } else {
                    return redirect()->route('admin.packages')->with('error', 'Record not created!');
                }
            } else {
                return redirect()->route('admin.packages')->with('error', 'Record not created!');
            }
        } else {
            return redirect()->route('admin.packages')->with('error', 'Record not created!');
        }
    }
    // public function packagesUpdate(Request $request)
    // {
    //     dd($request->toArray());
    //     $pkg = SubscriptionPackages::get();
    //     return view('adminpanel.pages.subscriptions.index',compact('apps'));
    // }
    public function packagesUpdate(Request $request)
    {
        // dd($request->toArray());
        $valid = $this->validate($request, [
            'name' => 'required|string|string',
            'no_of_posts' => 'required',
            'applicantProfiling' => 'required|numeric|in:0,1',
            'applicantTracking' => 'required|numeric|in:0,1',
            'erecDashboard' => 'required|numeric|in:0,1',
            'erecReportingEngine' => 'required|numeric|in:0,1',
            'databaseSearch' => 'required|numeric|in:0,1',
            'uploadCV' => 'required|numeric|in:0,1',
            'longlistAssessment' => 'required|numeric|in:0,1',
            'shortlistAssessment' => 'required|numeric|in:0,1',
            'emailIntegration' => 'required|numeric|in:0,1',
            'smsIntegration' => 'required|numeric|in:0,1',
            'liveBasedChatting' => 'required|numeric|in:0,1',
            'industryBasedAssessment' => 'required|numeric|in:0,1',
            'aiEngineIntegration' => 'required|numeric|in:0,1',
            'mlEngineIntegration' => 'required|numeric|in:0,1',
            'predictiveAnalysisEngine' => 'required|numeric|in:0,1',
            'ctatEngine' => 'required|numeric|in:0,1',
            'rasvEngine' => 'required|numeric|in:0,1',
            'tatiEngine' => 'required|numeric|in:0,1',
            'iagmEngine' => 'required|numeric|in:0,1',
            'rtwEngine' => 'required|numeric|in:0,1',
            'amiEngine' => 'required|numeric|in:0,1',
            'price' => 'required|numeric',
            'status' => 'required|numeric|in:0,1',
            // 'time_interval' => 'required|string|in:month,year',
            'time_interval' => 'required|string',
            'desc' => 'required|string',
            'slogan' => 'required|string',
            'shortdesc' => 'required|string',
        ]);
        // dd('ok');

        $time_interval = "";
        if ($request->time_interval == "month") {
            $time_interval = "month";
        } else {
            $time_interval = "year";
        }

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        // $slug = Str::slug($request->name . '-' . $request->time_interval);
        $stripeproductkey = $stripe->products->create([
            'name' => $request->name,
        ]);
        // dd($stripeproductkey->toArray());
        $stripepricekey = $stripe->prices->create([
            'unit_amount' => $request->price * 100,
            'currency' => 'usd',
            'recurring' => ['interval' => $time_interval],
            'product' => $stripeproductkey->id,
        ]);

        $slug = Str::slug($request->name . '-' . $request->time_interval);
        $data = [
            'name' => $request->name,
            // 'price' => $request->price,
            'no_of_posts' => $request->no_of_posts,
            'applicantProfiling' => $request->applicantProfiling,
            'applicantTracking' => $request->applicantTracking,
            'erecDashboard' => $request->erecDashboard,
            'erecReportingEngine' => $request->erecReportingEngine,
            'databaseSearch' => $request->databaseSearch,
            'uploadCV' => $request->uploadCV,
            'longlistAssessment' => $request->longlistAssessment,
            'shortlistAssessment' => $request->shortlistAssessment,
            'emailIntegration' => $request->emailIntegration,
            'smsIntegration' => $request->smsIntegration,
            'liveBasedChatting' => $request->liveBasedChatting,
            'industryBasedAssessment' => $request->industryBasedAssessment,
            'aiEngineIntegration' => $request->aiEngineIntegration,
            'slug' => $slug,
            'mlEngineIntegration' => $request->mlEngineIntegration,
            'predictiveAnalysisEngine' => $request->predictiveAnalysisEngine,
            'ctatEngine' => $request->ctatEngine,
            'rasvEngine' => $request->rasvEngine,
            'tatiEngine' => $request->tatiEngine,
            'iagmEngine' => $request->iagmEngine,
            'rtwEngine' => $request->rtwEngine,
            'amiEngine' => $request->amiEngine,
            'stripe_package_id' => $stripeproductkey->id,
            'stripe_price_id' => $stripepricekey->id,
            'price' => $request->price,
            'status' => $request->status,
            'time_interval' => $request->time_interval,
            'desc' => $request->desc,
            'slogan' => $request->slogan,
            'shortdesc' => $request->shortdesc,
            'class' => $request->class,
            'no_of_posts' => $request->no_of_posts,


        ];
        $update = SubscriptionPackages::where('id', $request->pkg_id)->update($data);

        if ($update) {
            return redirect()->route('admin.packages')->with('success', 'Record created successfully.');
        } else {
            return back()->with('error', 'Record not created!');
        }
        // dd($slug);

        // return redirect()->route('admin.packages')->with('success', 'Record created successfully.');
        // return redirect()->route('admin.packages')->with('error', 'Record not created!');
    }
    public function create_social_link()
    {
        return view('adminpanel.pages.social_links.create');
    }
    public function AddSocial_links(Request $request)
    {
        $social = SociaLink::create([
            'facebook_link' => $request->facebook_link,
            'linkedin_link' => $request->linkedin_link,
            'insta_link' => $request->insta_link,
            'youtube_link' => $request->youtube_link,

        ]);
        if ($social) {
            return Redirect::route('social.links')->with('status', 'Succefully Added');
        } else {
            return Redirect::route('social.links')->with('status', 'Error While Adding');
        }
    }
    public function all_social_links()
    {
        $socials = SociaLink::all();
        return view('adminpanel.pages.social_links.index', compact('socials'));
    }
    public function destory_social($id)
    {
        $socials = SociaLink::where('id', $id)->first();
        // dd($skills->toArray());
        $socials->delete();
        return redirect()->route('social.links');
    }
    public function faqs()
    {
        $faqs = Faq::where('status', 1)->get();
        return view('adminpanel.pages.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('adminpanel.pages.faqs.create');
    }

    public function store(Request $request)
    {

        $rules = Validator::make($request->all(), [
            'heading' => 'required',
            'subject' => 'required'
        ]);
        if ($rules->fails()) {
            return back()->withErrors($rules);
        };

        $faqs = Faq::create([
            'heading'      => $request->heading,
            'subject'   => $request->subject,
            'status'   => isset($request->status) ? 1 : 0,

        ]);

        if ($faqs) {
            return redirect()->route('faqs')->with('success', '  Faq add successfully❤');
        } else {
            return redirect()->route('faqs')->with('error', ' Sorry there is some error🤦‍♂️🤦‍♂️');
        }
    }
    public function editFaq($id)
    {
        $faqs = Faq::findOrfail($id);
        return view('adminpanel.pages.faqs.edit', compact('faqs'));
    }
    public function updateFaq(Request $request)
    {

        $per_id = $request->id;

        $faqs = Faq::findOrfail($per_id)->update([
            'heading' => $request->heading,
            'subject' => $request->subject,
            'status' => isset($request->status) ? 1 : 0,
        ]);
        if ($faqs) {
            return redirect()->route('faqs')->with('success', ' Edited done');
        } else {
            return redirect()->route('faqs')->with('error', ' Sorry there is some error🤦‍♂️🤦‍♂️');
        }
    }
    public function destory($id)
    {
        $faqs = Faq::where('id', $id)->first();
        // dd($skills->toArray());
        $faqs->delete();
        return redirect()->route('faqs');
    }
    public function jobCategory()
    {
        // $cat = CompanyCategory::get();
        $cat = JobCategory::orderby('title', 'asc')->get();
        // dd($cat);
        return view('adminpanel.pages.jobCategory.index', compact('cat'));
    }
    public function jobCategoryCreate()
    {
        // $cat = CompanyCategory::get();
        $cat = JobCategory::orderby('title', 'asc')->get();
        // dd($cat);
        return view('adminpanel.pages.jobCategory.create', compact('cat'));
    }
    public function jobCategoryStore(Request $request)
    {
        // dd($request->class_name);
        // $cat = CompanyCategory::get();
        $cat = Http::post('https://api.e-rec.com.au/api/classes/create', [
            'name' => $request->class_name,
        ]);
        $data = $cat->json();
        // dd($data);
        return redirect()->route('admin.jobCategory');
    }
    public function jobCategoryEdit($id)
    {
        // dd($id);
        // $cat = CompanyCategory::get();
        $cat = Http::get('https://api.e-rec.com.au/api/single/class', [
            'class_id' => $id,
        ]);
        $cat = $cat->json();
        // $cat['id'] = $id;
        // dd($cat);
        // return view('adminpanel.pages.jobCategory.edit', compact('cat'));
        return view('adminpanel.pages.jobCategory.edit', compact('cat'));
    }
    public function jobCategoryUpdate(Request $request)
    {
        // dd($request->toArray());
        // $cat = CompanyCategory::get();
        $cat = Http::post('https://api.e-rec.com.au/api/classes/update', [
            'class_id' => $request->cat_id,
            'name' => $request->name,
        ]);
        $data = $cat->json();
        // dd($data);
        return redirect()->route('admin.jobCategory');
    }
}
