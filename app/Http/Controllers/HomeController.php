<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Posts;
use App\Models\CompanyRecRelation;
use App\Models\JobApplications;
use App\Models\CandidateDocs;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Recruiter;
use App\Models\SubscriptionPackages;
use App\Models\SiteSetting;
use Carbon\Carbon;
use Pusher\Pusher;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function pusherAuth(Request $request)
    {

        $user = auth()->user();
        $socket_id = $request['socket_id'];
        $channel_name = $request['channel_name'];
        $key = getenv('PUSHER_APP_KEY');
        $secret = getenv('PUSHER_APP_SECRET');
        $app_id = getenv('PUSHER_APP_ID');
        // dd($app_id);

        if ($user) {

            $pusher = new Pusher($key, $secret, $app_id);
            $auth = $pusher->socket_Auth($channel_name, $socket_id);

            return response($auth, 200);
        } else {
            header('', true, 403);
            echo "Forbidden";
            return;
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role == "admin") {

            return redirect('/admin');
        } elseif ($user->role == "rec") {

            return redirect('/recruiter');
        } elseif ($user->role == "company") {

            return redirect('/company');
        } elseif ($user->role == "user") {

            return redirect('/user');
        }
    }

    public function profile()
    {
        // dd("check");
        // return view('home');
        $user = Auth::user();
        // dd($user->role);

        if ($user->role == "admin") {

            return redirect('/admin');
        } elseif ($user->role == "rec") {

            return redirect('/recruiter/details');
        } elseif ($user->role == "company") {

            return redirect('/company/details');
        } elseif ($user->role == "user") {

            return redirect('/user/details');
        }
    }

    public function dashboard(Request $request)
    {
        $user = Auth::user();
        // dd('ok');
        if ($user->role == "admin") {

            $job = Posts::orderBy('id', 'DESC')
                ->where('status', 1)
                ->where('expiry_date', '>=', Carbon::today())
                ->take(5)
                ->get();
            $can = Candidate::get();
            $com = Company::get();
            $rec = Recruiter::get();

            $UserCan = User::where('role', 'user')->get();
            $UserCom = User::where('role', 'company')->get();
            $UserRec = User::where('role', 'rec')->get();
            $user = User::where('role', '!=', 'admin')->orderBy('id', 'DESC')->get();
            $payment = User::with('package')->where('package_buy_stripe_token', '!=', '0')->where('package_buy_stripe_token', '!=', 'trial')->where('package_id', '!=', 0)->orderBy('id', 'DESC')->take(4)->get();

            $firstDayOfMonth = Carbon::now()->firstOfMonth();
            $lastDayOfMonth = Carbon::now()->lastOfMonth();


            $AlljobCount = Posts::count();
            $ActivejobCount = Posts::whereHas('jobAppRecComp')->count();
            $CurrentActivejobCount = Posts::whereHas('jobAppRecComp')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->count();
            // Query users where created_at is between the first and last day of the current month
            $CanUserCurrent = User::where('role', 'user')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get();
            $EmpUserCurrent = User::where('role', 'company')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get();
            $RecUserCurrent = User::where('role', 'rec')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get();

            $UserCanFive = User::where('role', 'user')->orderBy('id', 'DESC')->take(5)->get();
            $UserComFive = User::where('role', 'company')->orderBy('id', 'DESC')->take(5)->get();
            $UserRecFive = User::where('role', 'rec')->orderBy('id', 'DESC')->take(5)->get();

            $openCan = Candidate::where('status', 1)->count();
            $NotOpenCan = Candidate::where('status', 0)->count();
            $monthly = SubscriptionPackages::withCount('users')
                // Select the columns you need from SubscriptionPackages
                ->where('time_interval', 'month')
                ->where('status', 1)
                ->get();
            if($request->has('interval') && $request->interval == "monthly")
            {
                $monthly = SubscriptionPackages::withCount('users')
                // Select the columns you need from SubscriptionPackages
                ->where('time_interval', 'month')
                ->where('status', 1)
                ->get();
            }
            else
            {
                $monthly = SubscriptionPackages::withCount('users')
                // Select the columns you need from SubscriptionPackages
                ->where('time_interval', 'year')
                ->where('status', 1)
                ->get();
            }
            $labels = array();
            $PkgUserCount = array();
            foreach ($monthly as $row) {
                array_push($labels, '' . $row->name . '');
                array_push($PkgUserCount, $row->users_count);
            }
            // $labels = json_encode($labels);
            // $PkgUserCount = json_encode($PkgUserCount);
            // dd($labels);
            $graph_data['labels'] = $labels;
            $graph_data['PkgUserCount'] = $PkgUserCount;

            // Get the first and last day of the last month
            $firstDayLastMonth = Carbon::now()->subMonth()->startOfMonth();
            $lastDayLastMonth = Carbon::now()->subMonth()->endOfMonth();

            if ($request->has('statistics') && $request->statistics == "last-30-days") {
                $firstDayLastMonth = Carbon::now()->subDays(30)->startOfDay();
                $lastDayLastMonth = Carbon::now()->endOfDay();
            }
            if ($request->has('statistics') && $request->statistics == "last-month") {
                $firstDayLastMonth = Carbon::now()->subMonth()->startOfMonth();
                $lastDayLastMonth = Carbon::now()->subMonth()->endOfMonth();
            }
            if ($request->has('statistics') && $request->statistics == "last-year") {
                $startDate = Carbon::now()->subYear()->startOfMonth();
                $endDate = Carbon::now()->subYear()->endOfMonth();
            }
            // dd($lastDayLastMonth->toArray());

            // Initialize an array to store the counts for each week
            $weeklyCounts = [];
            $appliedCount = [];
            $shortCandListCount = [];
            $hiredListCount = [];
            if ($request->has('statistics') && $request->statistics == "last-year") {

                // Loop through each week of the last month
                for ($i = 0; $i < 12; $i++) {
                    // Calculate the start and end dates for the current week
                    $startOfMonth = $startDate->copy()->addMonths($i);
                    $endOfMonth = $startOfMonth->copy()->endOfMonth();

                    // Query the database to get the count of posts for the current week
                    $count = Posts::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
                    $applied = Posts::with('jobAppRecComp')->whereHas('jobAppRecComp')->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
                    $shortListCand = Posts::with('jobAppRecComp')->whereHas('jobAppRecComp', function ($q) {
                        $q->where('status', 1);
                    })->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
                    $hiredListCand = Posts::with('jobAppRecComp')->whereHas('jobAppRecComp', function ($q) {
                        $q->where('status', 2);
                    })->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

                    // Store the count in the array
                    $weeklyCounts[] = $count;
                    $appliedCount[] = $applied;
                    $shortCandListCount[] = $shortListCand;
                    $hiredListCount[] = $hiredListCand;
                }
            } else {

                // Loop through each week of the last month
                for ($i = 0; $i < 4; $i++) {
                    // Calculate the start and end dates for the current week
                    $startOfWeek = $firstDayLastMonth->copy()->addDays($i * 7);
                    $endOfWeek = $startOfWeek->copy()->addDays(6)->endOfDay();

                    // Query the database to get the count of posts for the current week
                    $count = Posts::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
                    $applied = Posts::with('jobAppRecComp')->whereHas('jobAppRecComp')->whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
                    $shortListCand = Posts::with('jobAppRecComp')->whereHas('jobAppRecComp', function ($q) {
                        $q->where('status', 1);
                    })->whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
                    $hiredListCand = Posts::with('jobAppRecComp')->whereHas('jobAppRecComp', function ($q) {
                        $q->where('status', 2);
                    })->whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();

                    // Store the count in the array
                    $weeklyCounts[] = $count;
                    $appliedCount[] = $applied;
                    $shortCandListCount[] = $shortListCand;
                    $hiredListCount[] = $hiredListCand;
                }
            }
            // dd($appliedCount);
            $graph_data['weeklyCounts'] = $weeklyCounts;
            $graph_data['appliedCount'] = $appliedCount;
            $graph_data['shortCandListCount'] = $shortCandListCount;
            $graph_data['hiredListCount'] = $hiredListCount;

            if ($request->has('statistics')) {
                return $graph_data;
            }
            if ($request->has('api')) {
                return $graph_data;
            }
            $tax = SiteSetting::select('tax_rate')->first();
            return view('adminpanel.pages.index', compact('tax', 'payment', 'labels', 'PkgUserCount', 'monthly', 'NotOpenCan', 'openCan', 'UserCanFive', 'UserComFive', 'UserRecFive', 'job', 'com', 'rec', 'can', 'user', 'UserCan', 'UserCom', 'UserRec', 'CanUserCurrent', 'EmpUserCurrent', 'RecUserCurrent', 'ActivejobCount', 'AlljobCount', 'CurrentActivejobCount'));
        } elseif ($user->role == "rec") {
            // dd('rec');

            // if (isset(auth()->user()->recruiter)) {
            if (isset(auth()->user()->recruiter->country_code) and isset(auth()->user()->recruiter->name) and isset(auth()->user()->recruiter->phone) and isset(auth()->user()->recruiter->abn)) {
                $recRelation = CompanyRecRelation::where('rec_id', auth()->user()->recruiter->id)->where('status', 1)->count();
                // dd($rec);
                $jobs = Posts::where('rec_id', auth()->user()->recruiter->id)->orderBy('id', 'DESC')->take(5)->get();
                $jobsTotal = Posts::where('rec_id', auth()->user()->recruiter->id)->get();
                // $apps = JobApplications::with('post')->get();
                $rec = auth()->user()->recruiter->id;
                $jobCount = JobApplications::with('candidateDocument', 'candidate', 'post')->whereHas('post', function ($q) use ($rec) {
                    // Query the name field in status table
                    $q->where('rec_id', '=', $rec); // '=' is optional
                })->get();
                // $jobCount = 0;
                // foreach ($apps as $row) {
                //     if ($row->post->recruiter->id == auth()->user()->recruiter->id) {
                //         $jobCount = $jobCount + 1;
                //     }
                // }
                return view('recruterpanel.pages.index', compact('rec', 'jobs', 'jobCount', 'jobsTotal', 'recRelation'));
            } else {
                return redirect()->route('recruiter.details');
                // return redirect()->route('recruiter.details')->with('error', 'Wait for admin approval, Thanks');
            }
        } elseif ($user->role == "company") {
            // dd(auth()->user()->company->toArray());
            $rec = CompanyRecRelation::where('com_id', auth()->user()->company->id)->where('status', 1)->count();
            $jobs = Posts::where('comp_id', auth()->user()->company->id)->orderBy('id', 'DESC')->take(5)->get();
            $jobsTotal = Posts::where('comp_id', auth()->user()->company->id)->get();
            $comp = auth()->user()->company->id;
            $jobCount = JobApplications::with('candidateDocument', 'candidate', 'post')->whereHas('post', function ($q) use ($comp) {
                // Query the name field in status table
                $q->where('comp_id', '=', $comp); // '=' is optional
            })->get();
            // echo $jobCount;

            // if (isset(auth()->user()->company->logo) and isset(auth()->user()->company->name)) {
            if (isset(auth()->user()->company->name) and isset(auth()->user()->company->abn)) {
                return view('companypanel.pages.index', compact('rec', 'jobs', 'jobCount', 'jobsTotal'));
            } else {
                return redirect()->route('company.details')->with('error', 'Wait for admin approval, Thanks');;
            }
        } elseif ($user->role == "user") {
            $related = array();

            foreach ($user->skills as $row) {
                array_push($related, $row->id);
            }

            $post = Posts::where('status', 1)->where('expiry_date', '>=', Carbon::today())->with('skills')->whereHas('skills', function ($query) use ($related) {
                $query->whereIn('skills.id', $related);
            })->orderBy('id', 'DESC')->get()->take(6);
            // dd($post->toArray());

            if (isset(auth()->user()->candidate)) {
                $apps = JobApplications::with('post')
                    ->where('candidate_id', auth()->user()->candidate->id)
                    ->get();
                $docs = CandidateDocs::where('user_id', auth()->user()->id)
                    ->get();
            }

            if ($user->candidate != '[]' && $user->candidatePro != '[]' && $user->candidateEdu != '[]') {
                // return view('candidates.detail', compact('post', 'apps', 'docs'));
                return view('candidatepanel.pages.index', compact('post', 'apps', 'docs'));
            } else {
                // dd($user->candidate);
                if ($user->candidate == NULL || $user->candidate->number == NULL) {
                    return redirect()->route('candidates.details');
                }
                if ($user->candidatePro == '[]') {
                    return redirect()->route('candidates.details.next');
                }
                if ($user->candidateEdu == '[]') {
                    return redirect()->route('candidates.details.profile');
                } else {
                    return redirect()->route('candidates.details')->with('error', 'Wait for admin approval, Thanks');
                }
            }
        }
    }

    public function mymapfile()
    {

        return view('pages.mapfile');
    }
}
