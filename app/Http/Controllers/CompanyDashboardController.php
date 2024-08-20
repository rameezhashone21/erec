<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Mail\Hired;
use App\Models\Company;
use App\Models\Exam;
use App\Models\ExamResult;
use App\Models\ExamNotification;
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
use DB;
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
                        'id'       => $data['test_id'],
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
                else{
                    $post->banner = "banner.png";
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
                return redirect()->route('company.jobs')->with('success', 'Job Post has been Created Successfully...');
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
        //dd($jobApp->toArray());
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
    
    public function candidates_filter(Request $request)
    {
        if($request->grade)
        // Get All Job Applications Against the job 
        $all_job_applications = JobApplications::select('id')->where("post_id",$request->job_id)->get();
        
        if($request->grade == "All")
        {
            // Filtering Job Application for specific grade
            $exam_results = ExamResult::whereIn('job_application_id',$all_job_applications)->get();
        }
        else{
            // Filtering Job Application for specific grade
            $exam_results = ExamResult::whereIn('job_application_id',$all_job_applications)->where('status', $request->grade)->get();
        }
        
        
        
        $output = '';
        foreach ($exam_results as $key => $row) {
        // Increment key for display purposes
        $key++;
        

        $user = User::where('new_user_id',$row->condidate_id)->first();
                
        $jobApplication = JobApplications::where("id",$row->job_application_id)->first();
        
        $candidate_doc_id = JobApplications::where("id",$row->job_application_id)->value('candidate_doc_Id');
        
        $candidate_doc = DB::table('candidates_doc')->where("id",$candidate_doc_id)->first();
        
        $candidate = DB::table('candidates_details')->where("user_id",$user->id)->first();
        

        $output .= '<tr>';
        $output .= '<td>' . $key . '.</td>';
        $output .= '<td>
                      <a href="' . route('candidate.detail', $candidate->slug) . '" style="color: #000;">
                        ' . $candidate->first_name . ' ' . $candidate->last_name . '
                      </a>
                    </td>';
        $output .= '<td>';
        
        if ($candidate_doc != null) {
            $output .= '<a href="' . asset('candidateDoc/doc/' . $candidate_doc->document) . '" target="_blank" class="text-decoration-underline d-flex text-dark">
                          <svg xmlns="http://www.w3.org/2000/svg" width="27.5" height="27.5" viewBox="0 0 27.5 27.5">
                            <g id="document-pdf" transform="translate(-2.25 -2.25)">
                              <path id="Path_3217" data-name="Path 3217" d="M32.893,19.964V18H27v9.821h1.964V23.893h2.946V21.929H28.964V19.964Z" transform="translate(-3.143 -2)" fill="#8b91a7" />
                              <path id="Path_3218" data-name="Path 3218" d="M20.8,27.821H16.875V18H20.8a2.949,2.949,0,0,1,2.946,2.946v3.929A2.949,2.949,0,0,1,20.8,27.821Zm-1.964-1.964H20.8a.983.983,0,0,0,.982-.982V20.946a.983.983,0,0,0-.982-.982H18.839Z" transform="translate(-1.857 -2)" fill="#8b91a7" />
                              <path id="Path_3219" data-name="Path 3219" d="M11.661,18H6.75v9.821H8.714V24.875h2.946a1.967,1.967,0,0,0,1.964-1.964V19.964A1.966,1.966,0,0,0,11.661,18ZM8.714,22.911V19.964h2.946v2.946Z" transform="translate(-0.571 -2)" fill="#8b91a7" />
                              <path id="Path_3220" data-name="Path 3220" d="M21.893,14.036V10.107A.894.894,0,0,0,21.6,9.42L14.724,2.545a.893.893,0,0,0-.688-.3H4.214A1.97,1.97,0,0,0,2.25,4.214V27.786A1.964,1.964,0,0,0,4.214,29.75H19.929V27.786H4.214V4.214h7.857v5.893a1.97,1.97,0,0,0,1.964,1.964h5.893v1.964Zm-7.857-3.929v-5.5l5.5,5.5Z" transform="translate(0)" fill="#8b91a7" />
                            </g>
                          </svg>
                          <span class="align-self-end ms-1">Click to view</span>
                        </a>';
        }
        
        $output .= '</td>';
        $output .= '<td>';

        if ($jobApplication->coverLetterFile != null) {
            $output .= '<a href="' . asset('storage/' . $jobApplication->coverLetterFile) . '" target="_blank" class="text-decoration-underline d-flex text-dark mb-3">
                          <svg xmlns="http://www.w3.org/2000/svg" width="27.5" height="27.5" viewBox="0 0 27.5 27.5">
                            <g id="document-pdf" transform="translate(-2.25 -2.25)">
                              <path id="Path_3217" data-name="Path 3217" d="M32.893,19.964V18H27v9.821h1.964V23.893h2.946V21.929H28.964V19.964Z" transform="translate(-3.143 -2)" fill="#8b91a7" />
                              <path id="Path_3218" data-name="Path 3218" d="M20.8,27.821H16.875V18H20.8a2.949,2.949,0,0,1,2.946,2.946v3.929A2.949,2.949,0,0,1,20.8,27.821Zm-1.964-1.964H20.8a.983.983,0,0,0,.982-.982V20.946a.983.983,0,0,0-.982-.982H18.839Z" transform="translate(-1.857 -2)" fill="#8b91a7" />
                              <path id="Path_3219" data-name="Path 3219" d="M11.661,18H6.75v9.821H8.714V24.875h2.946a1.967,1.967,0,0,0,1.964-1.964V19.964A1.966,1.966,0,0,0,11.661,18ZM8.714,22.911V19.964h2.946v2.946Z" transform="translate(-0.571 -2)" fill="#8b91a7" />
                              <path id="Path_3220" data-name="Path 3220" d="M21.893,14.036V10.107A.894.894,0,0,0,21.6,9.42L14.724,2.545a.893.893,0,0,0-.688-.3H4.214A1.97,1.97,0,0,0,2.25,4.214V27.786A1.964,1.964,0,0,0,4.214,29.75H19.929V27.786H4.214V4.214h7.857v5.893a1.97,1.97,0,0,0,1.964,1.964h5.893v1.964Zm-7.857-3.929v-5.5l5.5,5.5Z" transform="translate(0)" fill="#8b91a7" />
                            </g>
                          </svg>
                          <span class="align-self-end ms-1">Click to view</span>
                        </a>';
        }

        if ($jobApplication->coverLetter != null) {
            $output .= '<button type="button" class="btn btn_viewall" data-bs-toggle="modal" data-bs-target="#staticBackdrop-' . $jobApplication->id . '">Click to view</button>
                        <div class="modal fade" id="staticBackdrop-' . $jobApplication->id . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Cover Letter</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ' . $jobApplication->coverLetter . '
                                    </div>
                                </div>
                            </div>
                        </div>';
        }

        if ($jobApplication->coverLetter == null && $jobApplication->coverLetterFile == null) {
            $output .= 'No Record Found...';
        }

        $output .= '</td>';
        $output .= '<td id="td_id' . $jobApplication->id . '">';
        
        if ($jobApplication->qst_id != '0') {
            $output .= '<p>' . $jobApplication->qst($jobApplication->qst_id)['exam_title'] . '</p>';
        }

        $output .= '</td>';
        $output .= '<td id="td_id' . $jobApplication->id . '">';
        
        if ($jobApplication->qst_id != '0') {
            if ($row->perentage) {
                $output .= $row->perentage . '%';
            } else {
                $output .= 'Not Attempted';
            }
        }
        

        $output .= '</td>';
        $output .= '<td id="gradeTr-' . $row->id . '">';
        
        if ($row->status == "Average") {
            $output .= '<p class="orange_badge status_badge">' . $row->grade . '</p>';
        }if ($row->status == "Pass") {
            $output .= '<p class="green_badge status_badge">' . $row->grade . '</p>';
        }if ($row->status == "Fail") {
            $output .= '<p class="red_badge status_badge">' . $row->grade . '</p>';
        }

        $output .= '</td>';
        $output .= '<td id="hireTr-' . $row->id . '">';
        
        if ($jobApplication->status == 2) {
            $output .= '<p class="btn btn_viewall text-center p-2">Hired</p>';
        } else {
            if ($jobApplication->status == 1) {
                $output .= '<p onclick="hideCandidate(' . $jobApplication->id . ')" id="buttonHire(' . $jobApplication->id . ')" class="btn btn_viewall text-center p-2">Hire</p>';
            } elseif ($jobApplication->status == 0) {
                $output .= '<p onclick="shortCandidate(' . $jobApplication->id . ')" class="btn btn_viewall text-center p-2">Shortlist</p>';
            }
        }

        $output .= '</td>';
        $output .= '<td>';
        
        if ($row->notified == 0) {
            $output .= '<form action="' . route('candidate.notify', ['id' => $row->id]) . '" method="post" style="width:100%; display:flex; align-items:center;">';
            $output .= csrf_field();
            $output .= '<button type="submit" class="btn_theme border-0 fs-12 py-2 d-inline-block w-100">Notify Candidate</button>';
            $output .= '</form>';
        } else {
            $output .= 'Notified';
        }

        $output .= '</td>';
        $output .= '</tr>';
        

    }

    return response()->json($output);
        
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
    public function jobApplicantsCompBySlug($id)
    {
        $id = Posts::whereSlug($id)->first()->id;
        $post = Posts::with('jobAppRecComp', 'skills', 'company', 'jobAppRecComp.candidate')->findOrFail($id);
        
         //dd($post);
        return view('companypanel.pages.jobs.job_applicants', compact('post'));
    }
    public function jobApplicantsCompById($id, $notification_id)
    {
        $post = Posts::with('jobAppRecComp', 'skills', 'company', 'jobAppRecComp.candidate')->findOrFail($id);
        
        $notificationUpdate = ExamNotification::find($notification_id);
        $notificationUpdate->read = "1";
        $notificationUpdate->save();
        
         //dd($post);
        return view('companypanel.pages.jobs.job_applicants', compact('post'));
    }
    public function jobshortlistedComp($id)
    {
        $id = Posts::whereSlug($id)->first()->id;
        $post = Posts::with('jobAppRecComp', 'skills', 'company')->find($id);
        // dd($post->toArray());
        $job = Posts::with('jobAppRecComp', 'skills', 'company')->whereHas('jobAppRecComp', function ($query) {
            $query->whereIn('status', ["1","2"]);
        })->find($id);
        return view('companypanel.pages.jobs.jobs_shortlisted', compact('post', 'job'));
    }
    public function examResultComp($id)
    {
        $id = Posts::whereSlug($id)->first()->id;
        $post = Posts::with('jobAppRecComp', 'skills', 'company')->find($id);
        return view('companypanel.pages.jobs.exam_results', compact('post'));
    }
    public function mamrkerCandidate(Request $request)
    {
        $jobApp = JobApplications::with('post', 'candidate', 'candidate.jobApplications', 'candidate.jobApplications.post', 'candidate.user', 'candidate.user.candidatePro', 'candidate.user.candidateEdu', 'candidateDocument', 'postComp')->whereHas('post', function ($query) {
            $query->where('comp_id', auth()->user()->company->id);
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
        // if ($request->has('percentage')) {
        //     $data = $jobApp->where('qst_id','!=',0)->get();
        //     $rangePercentage = (int)$request->percentage;
        //     $ans_array = array();
        //     foreach ($data as $key => $value) {
        //         $sum = 0;
        //         foreach ($value->qst_total_marks as $row) {
        //             $sum = $sum + $row->value;
        //         }
        //     }
        //     $filteredQuestions = $data->filter(function ($ans) use ($rangePercentage, $sum) {
        //         if($ans->sec_qstSocre == null)
        //         {
        //             return false;
        //         }
        //         else
        //         {
        //             if ($ans->sec_qstSocre->mark != 0 || $ans->sec_qstSocre->mark != null) {
        //                 $percentage = ($ans->sec_qstSocre->mark * 100 )/ $sum;
        //             } else {
        //                 return false;
        //             }
        //         }

        //         return $percentage >= $rangePercentage;
        //     });
        //     $pluck_ids = $filteredQuestions->pluck('id')->toArray();
        //     $jobApp = $jobApp->whereIn('id',$pluck_ids);
        // }

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
    public function postAnExistingJob($id)
    {
        // dd("check");
        // if (auth()->user()->package->id == 21) {
        // if (count(auth()->user()->company->posts) < auth()->user()->package->no_of_posts) {
        $recruiter = CompanyRecRelation::where('com_id', auth()->user()->company->id)->where('status', 1)->get();
        $post = Posts::where('id', $id)->first();
        
        $data = JobCategory::orderby('title', 'asc')->get();
        $selected_job = JobCategory::where('id',$post->class_id)->first();

        // dd($post->toArray());
        $skill = Skills::all();
        $test = Http::get('https://api.e-rec.com.au/api/qst/to/classes', [
            'class_id' => $post->class_id,
        ]);
        
        $company_id = Company::where('user_id' , auth::user()->id)->value('id');
        $test_id = Exam::where('company_id',$company_id)->where('status',1)->get();

        $selected_exam = Exam::where('id',$post->test_id)->first();
        
        $postSkills = PostSkill::where('post_id', $post->id)->get();
        return view('companypanel.pages.jobs.postAnExisting.create', compact('post', 'skill', 'postSkills', 'recruiter', 'data', 'test_id','selected_job','selected_exam'));
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

        if ($jobApp->post->company != null){
            $postName = $jobApp->post->post;
            $postedBy = $jobApp->post->company->name;
        }
        elseif($jobApp->post->recruiter != null)
        {
            $postName = $jobApp->post->post;
            $postedBy = $jobApp->post->recruiter->name;
        }

        $email = $jobApp->candidate->user->email;
        $canName = $jobApp->candidate->user->name;

        $data = ['postName' => $postName, 'postedBy' => $postedBy, 'email' => $email, 'canName'=>$canName ];

        $hired = Mail::to($email)->send(new Hired($data));
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
        Mail::to($email)->send(new ShortListed($postName, $canName, $postedBy));

        exit;
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
        
        $data = Exam::where('company_id' , $company_id)->where('status',1)->has('questions')->with('questions')->get();

        return $data;

    }
}
