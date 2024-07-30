<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CanAppVisibility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CandidateDocs;
use App\Models\JobApplications;
use Illuminate\Support\Facades\Http;


class CandidateJobApplicationController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();
        if ($user->candidate != NULL && count($user->candidateEdu) != 0 && count($user->candidatePro) != 0) {
            $apps = JobApplications::with('post')
                ->with('result')
                ->where('candidate_id', auth()->user()->candidate->id)
                ->latest()
                ->get();
            // dd($apps);
            // dd($apps->toArray());
            // $session_id = NULL;
            // $url = "https://api.e-rec.com.au/api/logged/user";
            // $res = Http::get($url, [
            //     'u_id' => auth()->user()->new_user_id,
            // ]);
            // $response = $res->json();
            // // dd($response);
            // if ($response != NULL) {
            //     $session_id = $response['session_id'];
            // }

            $session_id = 'test';

            return view('candidatepanel.pages.jobApplications.index', compact('apps', 'session_id'));
        } else {
            return redirect()->route('candidates.details');
        }
    }
    public function create()
    {
        $user = auth()->user();
        if ($user->candidate != NULL && count($user->candidateEdu) != 0 && count($user->candidatePro) != 0) {
            $user = User::find(auth()->user()->id);
            return view('candidatepanel.pages.jobApplications.create', compact('user'));
        } else {
            return redirect()->route('candidates.details');
        }
    }
    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user->candidate != NULL && count($user->candidateEdu) != 0 && count($user->candidatePro) != 0) {
            $data = $request->all();
            // dd($data);
            $valid = Validator::make($data, [
                'title' => ['required', 'string', 'max:255'],
                'job_type' => ['required', 'string'],
                'experience' => ['required', 'string'],
                'location' => ['required', 'string'],
                'resume_id' => ['required', 'numeric'],
            ]);
            if ($valid) {
                $data['user_id'] = auth()->user()->id;
                CanAppVisibility::create($data);
                return redirect()->route('candidates.job.index')->withStatus("Job Application has been Created Successfully...");
            } else {
                return redirect()->back()->withError($valid->errors()->first());
            }
        } else {
            return redirect()->route('candidates.details');
        }
    }
    public function visibilityindex()
    {
        $user = auth()->user();
        if ($user->candidate != NULL && count($user->candidateEdu) != 0 && count($user->candidatePro) != 0) {
            $apps = CanAppVisibility::where('user_id', auth()->user()->id)->get();
            return view('candidatepanel.pages.visibility.index', compact('apps'));
        } else {
            return redirect()->route('candidates.details');
        }
    }
    public function visibility(Request $request, $id)
    {
        $user = auth()->user();
        if ($user->candidate != NULL && count($user->candidateEdu) != 0 && count($user->candidatePro) != 0) {
            $app = CanAppVisibility::find($id);
            $app->status = $request->status;
            $app->save();
            return redirect()->back();
        } else {
            return redirect()->route('candidates.details');
        }
    }
    public function cvUpload()
    {
        $user = auth()->user();
        if ($user->candidate != NULL && count($user->candidateEdu) != 0 && count($user->candidatePro) != 0) {
            return view('candidatepanel.pages.newCv');
        } else {
            return redirect()->route('candidates.details');
        }
    }
    public function storeCv(Request $request)
    {
        try {
            $user = auth()->user();
            $canDoc = count(auth()->user()->resume);
            if ($user->candidate != NULL && count($user->candidateEdu) != 0 && count($user->candidatePro) != 0) {
                # code...
                if ($request->hasFile('document')) {
                    foreach ($request->document as $key => $do) {
                        if ($canDoc < 6) {
                            $doc = new CandidateDocs;
                            $img = $do;
                            $number = rand(1, 999);
                            $numb = $number / 7;
                            $extension = $img->extension();
                            // dd($extension);
                            if ($extension == 'pdf' || $extension == 'docx') {
                                $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                                // $filenamenew = $do->getClientOriginalName();
                                $filenamepath = 'candidateDoc' . '/' . 'doc/' . $filenamenew;
                                $filename = $img->move(public_path('candidateDoc' . '/' . 'doc'), $filenamenew);
                                $doc->user_id = auth()->user()->id;
                                $doc->document = $filenamenew;
                                $doc->document_name = $do->getClientOriginalName();
                                $doc->save();
                            } else {
                                return redirect()->back()->with('error', 'File should be pdf or docs');
                            }
                            $canDoc = $canDoc + 1;
                        }
                    }
                }
                return redirect()->route("candidates.cvList");
            } else {
                return redirect()->route('candidates.details');
            }
        } catch (\Throwable $th) {
            // dd($th);
            //throw $th;
        }
    }
}
