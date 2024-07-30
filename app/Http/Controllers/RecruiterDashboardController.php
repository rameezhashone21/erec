<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Posts;
use App\Models\Skills;
use App\Models\Company;
use App\Mail\ShortListed;
use App\Models\Candidate;
use App\Models\PostSkill;
use App\Models\Recruiter;
use App\Mail\TestAssigned;
use App\Mail\NewJobsPosted;
use App\Models\JobCategory;
use Illuminate\Support\Str;
use App\Models\CandidateEdu;
use Illuminate\Http\Request;
use App\Models\CandidateDocs;
use Illuminate\Http\Response;
use App\Models\CandidateSkills;
use App\Models\CompanyCategory;
use App\Models\CompanyFeatures;
use App\Models\JobApplications;
use App\Models\RecruiterFeatures;
use App\Models\CompanyRecRelation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Mail;
use App\Models\CandidateProfessionalExp;
use Illuminate\Support\Facades\Validator;


class RecruiterDashboardController extends Controller
{
    // use JobApplications;

    public function profileSetup()
    {
        // $user = Recruiter::with('recruiter')->get();
        $user = User::with('recruiter')->where('id', auth()->user()->id)->first();
        $skill = CompanyCategory::all();
        // $skill = Skills::get();
        $candSkills = RecruiterFeatures::where('rec_id', auth()->user()->recruiter->id)->get();
        // dd($candSkills->toArray());

        // dd($user->toArray());
        return view('recruterpanel.pages.profileSetup', compact('user', 'skill', 'candSkills'));
    }
    public function assignJob(Request $request)
    {
        try {
            $job = JobApplications::with('candidate', 'candidate.user')->find($request->id);
            if ($request->has('onlyStatus')) {

                $job->status = 1;
                $job->save();
                $canEmail = $job->candidate->user->email;
                $canName = $job->candidate->first_name . ' ' . $job->candidate->last_name;
                $postName = $job->post->post;

                if ($job->post->company != null) {
                    $email = $job->post->company->user->email;
                    $postedBy = $job->post->company->name;
                } elseif ($job->post->recruiter != null) {
                    $email = $job->post->recruiter->user->email;
                    $postedBy = $job->post->recruiter->name;
                }
                // if($job->post->test_id != null)
                // {
                Mail::to($canEmail)->send(new ShortListed($postName, $canName, $postedBy));
                // }
                return true;
            }
            $email = $job->candidate->user->email;
            $testAssign = Mail::to($email)->send(new TestAssigned($email));
            // dd($testAssign);
            $user_id = $job->candidate->user->new_user_id;
            $qst = $request->selectedId;
            $class_id = $job->class_id;
            $response = Http::post('https://api.e-rec.com.au/api/user/assign/test', [
                'class_id' => $class_id,
                'qst_no' => $qst,
                'u_id' => $user_id,
            ]);
            $data = $response->json();
            $newJobs = new JobApplications();
            $assinQst = $newJobs->qst($qst);
            // dd($assinQst['name']);
            // dd($data);
            // if ($data['status'] == false || $data['message'] == "Test is already assigned to this user...") {
            //     $job->status = 1;
            //     $job->qst_id = $qst;
            //     $job->save();
            //     return $assinQst['name'];
            // } else {
            return true;
            // }
            // $testAssign = Mail::to($email)->send(new TestAssigned($name, $phone, $email, $message, $subject));
        } catch (\Throwable $e) {
            // dd($e);
            return response()->json('error', $e->getMessage());
        }
    }
    public function profileUpdate(Request $request)
    {
        // dd('ok');
        // dd($request->toArray());
        try {
            DB::beginTransaction();
            $userName = auth()->user();

            $user = User::with('recruiter')->where('id', auth()->user()->id)->first();
            // dd($user->toArray());
            if ($request->has('name')) {
                $user->recruiter->name = $request->name;
                $userName->name = $request->name;
                $userName->save();
            }
            if ($request->has('lastName')) {
                $userName->lname = $request->lastName;
                $user->recruiter->lastName = $request->lastName;
                $userName->save();
            }
            // dd($rec->toArray());
            if ($request->has('country_code')) {
                $user->recruiter->country_code = $request->country_code;
            }
            if ($request->has('phone')) {
                $user->recruiter->phone = $request->phone;
            }
            if ($request->has('abn')) {
                $user->recruiter->abn = $request->abn;
            }
            if ($request->has('acn')) {
                $user->recruiter->acn = $request->acn;
            }
            if ($request->has('description')) {
                $user->recruiter->description = $request->description;
            }
            if ($request->has('address')) {
                $user->recruiter->address = $request->address;
            }
            if ($request->has('tagline')) {
                $user->recruiter->tagline = $request->tagline;
            }
            if ($request->has('lat')) {
                $user->recruiter->lat = $request->lat;
            }
            if ($request->has('lng')) {
                $user->recruiter->lng = $request->lng;
            }
            if ($request->has('country')) {
                $user->recruiter->country = $request->country;
            }
            if ($request->has('city')) {
                $user->recruiter->city = $request->city;
            }
            if ($request->has('postal_code')) {
                $user->recruiter->postal_code = $request->postal_code;
            }
            if ($request->terms == 1) {
                $user->recruiter->terms = $request->terms;
            } else {
                $user->recruiter->terms = 0;
            }
            if ($request->has('category')) {
                $features = RecruiterFeatures::where('rec_id', $user->recruiter->id)->get();
                $features->each->delete();
                // dd($request->category);
                foreach ($request->category as $row) {
                    $fea = new RecruiterFeatures;
                    $fea->cat_id = $row;
                    $fea->rec_id = $user->recruiter->id;
                    $fea->save();
                }
                $newFeatures = RecruiterFeatures::with('category')->where('rec_id', $user->recruiter->id)->get();
            }
            if ($request->hasFile('avatar')) {
                // $img = $request->avatar;

                // $number = rand(1, 999);

                // $numb = $number / 7;

                // $extension = $img->extension();
                // $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                // $filenamepath = 'recruiterAvatar' . '/' . 'img/' . $filenamenew;
                // $filename = $img->move(public_path('storage/recruiterAvatar' . '/' . 'img'), $filenamenew);
                // $user->recruiter->avatar = $filenamepath;
                // $user = User::find(auth()->user()->id);
                // $user->avatar = $filenamepath;
                // $user->save();
                $img = $request->avatar;
                $number = rand(1, 999);
                $numb = $number / 7;
                $extension = $img->extension();
                $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                $filenamepath = 'recruiterAvatar' . '/' . 'img/' . $filenamenew;
                $filename = $img->move(public_path('storage/recruiterAvatar' . '/' . 'img'), $filenamenew);

                $user = User::with('recruiter')->where('id', auth()->user()->id)->first();
                $user->avatar = $filenamepath;
                $user->recruiter->avatar = $filenamepath;
                $user->save();
            }
            if ($request->hasFile('banner')) {
                $img = $request->banner;
                $number = rand(1, 999);
                $numb = $number / 7;
                $extension = $img->extension();
                $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                $filenamepath = 'recruiterBanner' . '/' . 'img/' . $filenamenew;
                $filename = $img->move(public_path('storage/recruiterBanner' . '/' . 'img'), $filenamenew);

                $user = User::where('id', auth()->user()->id)->first();
                $user->banner = $filenamepath;
                $user->save();
            }
            $user->recruiter->save();
            DB::commit();
            if ($request->has('source')) {
                if ($request->has('category')) {
                    $newArray = array();
                    foreach ($newFeatures as $row) {
                        array_push($newArray, $row->category->name);
                    }
                    // dd($newArray);
                    return response()->json(['data', $newArray]);
                } else {
                    return response()->json(['success', 'Updated Successfully!']);
                }
            }
            return back()->with('success', 'Profile Updated Successfully!');
        } catch (\Throwable $e) {
            dd($e->getMessage());
            DB::rollback();

            return back()->with('error', $e->getMessage());
        }
        return back()->with('error', 'Error in Update!');
    }
    public function companyIndex()
    {
        $comp = CompanyRecRelation::with('recruiter', 'company')->where('rec_id', auth()->user()->recruiter->id)->latest()->get();
        // dd($comp->toArray());
        return view('recruterpanel.pages.company.index', compact('comp'));
    }
    public function rejectRequest($id)
    {
        // dd($id);
        $comp = CompanyRecRelation::find($id);
        // dd($comp->toArray());
        $comp->delete();
        return redirect()->route('recruiter.companyIndex');
    }
    public function AcceptRequest($id)
    {
        $comp = CompanyRecRelation::find($id);
        $comp->status = 1;
        $comp->save();
        return redirect()->back();
    }
    public function candidateIndex()
    {
        $rec = auth()->user()->recruiter->id;
        $can = JobApplications::with('candidate', 'post')->whereHas('post', function ($q) use ($rec) {
            $q->where('post.rec_id', '=', $rec);
        })->get()->unique('candidate_id');
        // dd($can->toArray());
        return view('recruterpanel.pages.candidate.index', compact('can'));
    }
    public function companyDetails($id)
    {
        $comp = Company::with('user')->where('id', $id)->first();
        // dd($comp->toArray());
        return view('recruterpanel.pages.company.detail', compact('comp'));
    }
    public function candidateDetails($id)
    {
        $can = Candidate::with('user')->where('id', $id)->first();
        // dd($can->toArray());
        return view('recruterpanel.pages.candidate.detail', compact('can'));
    }
    public function jobs()
    {
        $post = Posts::where('rec_id', auth()->user()->recruiter->id)->orderBy('id', 'DESC')->get();
        // dd($post->toArray());
        return view('recruterpanel.pages.jobs.index', compact('post'));
    }
    public function createJobs()
    {
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
        $post = Posts::where('rec_id', auth()->user()->recruiter->id)
            ->where('created_at', '>=', $validDate)
            ->get();

        if (auth()->user()->posts_count > 0) {
            // if (auth()->user()->package->id == 21) {
            // if (count(auth()->user()->recruiter->openPosts) < auth()->user()->package->no_of_posts) {
            if (count($post) < auth()->user()->package->no_of_posts) {
                # code...
                $recruiter = CompanyRecRelation::where('rec_id', auth()->user()->recruiter->id)->where('status', 1)->get();
                // dd($recruiter->toArray());
                $data = JobCategory::orderby('title', 'asc')->get();
                $skill = Skills::all();
                return view('recruterpanel.pages.jobs.create', compact('recruiter', 'skill', 'data'));
            } else {
                // $recruiter = CompanyRecRelation::where('rec_id', auth()->user()->recruiter->id)->where('status', 1)->get();
                // // dd($recruiter->toArray());
                // $response = Http::get('https://api.e-rec.com.au/api/classes/list');
                // $data = $response->json();
                // $skill = Skills::all();
                return back();
            }
        } else {
            return back()->withStatus("You need to upgrade your package first..");
        }

        // } else {
        //     $recruiter = CompanyRecRelation::where('rec_id', auth()->user()->recruiter->id)->where('status', 1)->get();
        //     // dd($recruiter->toArray());
        //     $response = Http::get('https://api.e-rec.com.au/api/classes/list');
        //     $data = $response->json();
        //     $skill = Skills::all();
        //     return view('recruterpanel.pages.jobs.create', compact('recruiter', 'skill', 'data'));
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
                'banner' => ['mimes:jpg,jpeg,png,bmp,giff,svg'],
                // 'company' => ['required']

            ]);
            if (Posts::whereSlug($slug = Str::slug($request->post))->exists()) {

                $slug = $this->incrementSlug($slug);
            }

            $this->attributes['slug'] = $slug;

            // return $slug;
            // $slug = generateSlug($request->post);
            // dd($slug);
            if ($valid) {
                $post = new Posts;
                $post->class_id = $data['category'];
                $post->post = $data['post'];
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
                if ($request->has('test_attached') && $request->test_attached == 1) {
                    $post->test_attached = $data['test_attached'];
                    if ($request->has('test_id')) {
                        $post->test_id = $data['test_id'];
                    }
                    if ($request->has('criteria')) {
                        $post->criteria = $data['criteria'];
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
                $post->offer_salary = $data['offer_salary'];
                $post->location = $data['address'];
                $post->rec_id = auth()->user()->recruiter->id;
                // $post->comp_id = $data['company'];
                if (isset($request->comp_id)) {
                    $post->comp_id = $data['comp_id'];
                } else {
                    $post->status = 1;
                    $post->comp_id = 0;
                }
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

                $user = auth()->user();

                $postedBy = $post->recruiter->name;
                $postName = $post->post;
                $postDesc = $post->description;
                $postSlug = $post->slug;
                if ($post->company != null) {
                    # code...
                    $email = $post->company->user->email;
                    $recName = $post->company->name;
                    // dd('compName:' . $compName, 'postName:' . $postName, 'postDesc:' . $postDesc, 'postSlug:' . $postSlug, 'email:' . $email, 'postSlug:' . $postSlug);
                    $mail = Mail::to($email)->send(new NewJobsPosted($recName, $postedBy, $postName, $postDesc, $postSlug));
                }

                if ($post->save()) {
                    $user->decrement('posts_count');
                    $user->decrement('total_no_of_posts');
                }
                return redirect()->route('recruiter.jobs')->withStatus("Job Post has been Created Successfully...");
            } else {
                return redirect()->back()->withError($valid->errors()->first());
            }
        } else {
            return back()->withStatus("You need to upgrade your package first..");
        }
    }
    public function editJobs($id)
    {
        $id = Posts::whereSlug($id)->first()->id;
        $post = Posts::with('skills')->find($id);
        // dd($post->skills->toArray());
        $recruiter = CompanyRecRelation::where('rec_id', auth()->user()->recruiter->id)->where('status', 1)->get();
        $skill = Skills::all();
        $data = JobCategory::orderby('title', 'asc')->get();
        $test = Http::get('https://api.e-rec.com.au/api/qst/to/classes', [
            'class_id' => $post->class_id,
        ]);
        $test_id = $test->json();
        return view('recruterpanel.pages.jobs.edit', compact('recruiter', 'skill', 'post', 'data', 'test_id'));
    }
    public function updateJob(Request $request)
    {
        // dd($request->all());
        $post = Posts::where('id', $request->post_id)->first();
        // dd($post->toArray());
        $data = $request->all();
        $valid = Validator::make($data, [
            'post' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'job_type' => ['required', 'string'],
            'experience' => ['required', 'string'],
            'address' => ['required', 'string'],
            'skill' => ['required', 'numeric'],
            // 'banner' => ['required', 'mimes:jpg,jpeg,png,bmp,giff,svg'],
            'category' => ['required', 'numeric'],
            'company' => ['required']
        ]);
        if (Posts::whereSlug($slug = Str::slug($request->post))->exists()) {

            $slug = $this->incrementSlug($slug);
        }

        $this->attributes['slug'] = $slug;

        if ($valid) {
            // $post = new Posts;
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
                    // dd($test);
                }
            } else {
                $post->test_id = null;
                $post->criteria = null;
            }
            // dd($jobApp);
            // $post->test_attached = $data['test_attached'];
            // if ($request->has('test_id')) {
            //     $post->test_id = $data['test_id'];
            // }
            // if ($request->has('criteria')) {
            //     $post->criteria = $data['criteria'];
            // }
            $post->location = $data['address'];
            $post->rec_id = auth()->user()->recruiter->id;
            if (isset($request->comp_id)) {
                $post->comp_id = $data['comp_id'];
            } else {
                $post->status = 1;
                $post->comp_id = 0;
            }
            if ($request->has('banner')) {
                $img = $data['banner'];
                $number = rand(1, 999);
                $numb = $number / 7;
                $extension = $img->extension();
                $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                $filenamepath = 'jobPosts' . '/' . 'img/' . $filenamenew;
                $filename = $img->move(public_path('storage/jobPosts' . '/' . 'img'), $filenamenew);
                $post->banner = $filenamepath;
                $post->save();
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
            return redirect()->route('recruiter.jobs')->withStatus("Job Post has been Created Successfully...");
        } else {
            return redirect()->back()->withError($valid->errors()->first());
        }
    }
    public function jobApplications()
    {
        // $user = User::with('recruiter')->where('id', auth()->user()->id)->first();
        // $post = Posts::where('comp_id', $user->recruiter->id)->get();
        // $jobApp = JobApplications::with('post', 'candidate', 'candidateDocs')->get();
        $value = auth()->user()->recruiter->id;
        $jobApp = JobApplications::where('status', '!=', 2)->with([
            'post' => function ($q) use ($value) {
                // Query the name field in status table
                $q->where('rec_id', '=', $value); // '=' is optional
            }
        ])->get();
        // dd($data);
        return view('recruterpanel.pages.jobs.jobApplications', compact('jobApp'));
    }
    public function jobAppStatus(Request $request, $id)
    {

        dd($request->all());
        $jobApp = JobApplications::find($id);
        if ($jobApp->status == 0) {
            $jobApp->status = 1;
        }
        $jobApp->save();
        return back();
    }

    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

    public function importCsv(Request $request)
    {
        $file = $request->csv_file;

        $customerArr = $this->csvToArray($file);
        // dd($customerArr);

        foreach ($customerArr as $key => $pro) {
            try {
                DB::beginTransaction();

                $post = Posts::create([
                    'post' => $customerArr[$key]['post'],
                    'job_type' => $customerArr[$key]['job_type'],
                    'experience' => $customerArr[$key]['experience'],
                    'gender' => $customerArr[$key]['gender'],
                    'offer_salary' => $customerArr[$key]['offer_salary'],
                    'qualification' => $customerArr[$key]['qualification'],
                    'location' => $customerArr[$key]['location'],
                    'expiry_date' => $customerArr[$key]['expiry_date'],
                    'key_responsibility' => $customerArr[$key]['key_responsibility'],
                    'skill_exp' => $customerArr[$key]['skill_exp'],
                    'description' => $customerArr[$key]['description'],
                    'banner' => $customerArr[$key]['banner'],
                    'comp_id' => $customerArr[$key]['comp_id'],
                    'rec_id' => auth()->user()->recruiter->id,
                ]);
                $post->status = 0;
                $post->save();
                // $post->status = 0;
                // $post->rec_id = auth()->user()->recruiter->id;

                DB::commit();
            } catch (\Throwable $e) {
                // throw $th;
                DB::rollBack();
                return back()->with('error', $e->getMessage());
            }
        }

        return 'Jobi done or what ever';
    }
    public function jobDetailsRec($id)
    {
        $id = Posts::whereSlug($id)->first()->id;
        $post = Posts::with('jobAppRecComp', 'skills', 'company')->find($id);
        return view('recruterpanel.pages.jobs.job_detail', compact('post'));
    }
    public function jobApplicantsRec($id)
    {
        $id = Posts::whereSlug($id)->first()->id;
        $post = Posts::with('jobAppRecComp', 'skills', 'company')->find($id);
        // dd($post->jobAppRecComp->toArray());
        return view('recruterpanel.pages.jobs.job_applicants', compact('post'));
    }
    public function jobshortlistedRec($id)
    {
        $id = Posts::whereSlug($id)->first()->id;
        $post = Posts::with('jobAppRecComp', 'skills', 'company')->find($id);
        $job = Posts::with('jobAppRecComp', 'skills', 'company')->whereHas('jobAppRecComp', function ($query) {
            $query->where('job_applications.status', 1);
        })->find($id);
        // dd($post->jobAppRecComp->toArray());
        // dd($job->toArray());
        return view('recruterpanel.pages.jobs.jobs_shortlisted', compact('post', 'job'));
    }
    public function examResultRec($id)
    {
        $id = Posts::whereSlug($id)->first()->id;
        $post = Posts::with('jobAppRecComp', 'skills', 'company')->find($id);
        return view('recruterpanel.pages.jobs.exam_results', compact('post'));
    }
    public function destroyJobs($id)
    {
        $post = Posts::with('jobApp', 'skills', 'company')->find($id);
        // dd($post->toArray());
        $post->rec_delete = 1;
        $post->save();
        return redirect()->route('dashboard');
    }
    public function postAnExistingJob($id)
    {

        // if (auth()->user()->package->id == 21) {
        // if (count(auth()->user()->recruiter->openPosts) < auth()->user()->package->no_of_posts) {
        $post = Posts::with('skills')->find($id);
        // dd($post->skills->toArray());
        $recruiter = CompanyRecRelation::where('rec_id', auth()->user()->recruiter->id)->where('status', 1)->get();
        $skill = Skills::all();
        $data = JobCategory::orderby('title', 'asc')->get();
        $test = Http::get('https://api.e-rec.com.au/api/qst/to/classes', [
            'class_id' => $post->class_id,
        ]);
        $test_id = $test->json();
        return view('recruterpanel.pages.jobs.postAnExisting.create', compact('recruiter', 'skill', 'post', 'data', 'test_id'));
        // } else {
        // $recruiter = CompanyRecRelation::where('rec_id', auth()->user()->recruiter->id)->where('status', 1)->get();
        // // dd($recruiter->toArray());
        // $response = Http::get('https://api.e-rec.com.au/api/classes/list');
        // $data = $response->json();
        // $skill = Skills::all();
        //     return back();
        // }

        // } else {
        //     $post = Posts::with('skills')->find($id);
        //         // dd($post->skills->toArray());
        //         $recruiter = CompanyRecRelation::where('rec_id', auth()->user()->recruiter->id)->where('status', 1)->get();
        //         $skill = Skills::all();
        //         $response = Http::get('https://api.e-rec.com.au/api/classes/list');
        //         $data = $response->json();
        //         $test = Http::get('https://api.e-rec.com.au/api/qst/to/classes', [
        //             'class_id' => $post->class_id,
        //         ]);
        //         $test_id = $test->json();
        //         return view('recruterpanel.pages.jobs.postAnExisting.create', compact('recruiter', 'skill', 'post', 'data', 'test_id'));
        // }
    }
    public function mamrkerCandidate()
    {
        $rec = auth()->user()->recruiter->id;
        $jobApp = JobApplications::with('candidateDocument', 'candidate', 'post')->whereHas('post', function ($q) use ($rec) {
            // Query the name field in status table
            $q->where('rec_id', '=', $rec); // '=' is optional
        })->get();
        // dd($jobApp->toArray());
        return $jobApp;
    }
    public function existing_jobs()
    {
        $post = Posts::where('rec_id', auth()->user()->recruiter->id)->orderBy('post')->get();
        // dd($post->toArray());
        return $post;
    }
    public function getRecCategory()
    {
        $data['skill'] = CompanyCategory::all();
        $data['candSkills'] = RecruiterFeatures::where('rec_id', auth()->user()->recruiter->id)->get();

        // dd($data);
        return $data;
    }
}
