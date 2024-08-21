<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CandidateDocs;
use App\Models\Candidate;
use App\Models\JobApplications;
use App\Models\Posts;
use Illuminate\Support\Facades\Http;
use App\Mail\JobApplyCandidate;
use App\Mail\JobApplyCandidateTestLink;
use App\Mail\ShortListed;
use App\Mail\JobApply;
use Illuminate\Support\Facades\Mail;


class JobApplicationController extends Controller
{
    public function applyNow(Request $request)
    {
        // dd($request->all());
        try {
            $user = auth()->user();
            $canDoc = count(auth()->user()->resume);
            $post = Posts::find($request->post_id);
            $postedBy = null;
            // dd($post->post);
            if ($user->candidate != NULL && count($user->candidateEdu) != 0 && count($user->candidatePro) != 0) {

                if ($request->hasFile('new_doc')) {
                    if ($canDoc < 6) {
                        $doc = new CandidateDocs;
                        $img = $request->new_doc;
                        // dd($img);
                        $number = rand(1, 999);
                        $numb = $number / 7;
                        $extension = $img->extension();
                        $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                        $filenamepath = 'candidateDoc' . '/' . 'doc/' . $filenamenew;
                        $filename = $img->move(public_path('candidateDoc' . '/' . 'doc'), $filenamenew);
                        $doc->user_id = auth()->user()->id;
                        $doc->document = $filenamenew;
                        $doc->document_name = $img->getClientOriginalName();
                        $doc->save();

                        $jobApp = new JobApplications;
                        $jobApp->post_id = $request->post_id;
                        $jobApp->candidate_id = auth()->user()->candidate->id;
                        $jobApp->candidate_doc_Id = $doc->id;
                        if($post->test_id != null)
                        {
                            $jobApp->qst_id = $post->test_id;
                        }
                        $jobApp->class_id = $post->class_id;
                        if ($request->has('coverLetter')) {
                            $jobApp->coverLetter = $request->coverLetter;
                        }
                        $jobApp->save();

                    }
                } elseif ($request->has('cv_file')) {
                    $jobApp = new JobApplications;
                    $jobApp->post_id = $request->post_id;
                    $jobApp->candidate_id = auth()->user()->candidate->id;
                    $jobApp->candidate_doc_Id = $request->cv_file;
                    if($post->test_id != null)
                    {
                        $jobApp->qst_id = $post->test_id;
                    }
                    $jobApp->class_id = $post->class_id;
                    if ($request->has('coverLetter')) {
                        $jobApp->coverLetter = $request->coverLetter;
                    }
                    $jobApp->save();
                }
                if ($request->has('coverLetterFile')) {
                    $img = $request->coverLetterFile;
                    $number = rand(1, 999);
                    $numb = $number / 7;
                    $extension = $img->extension();
                    $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                    $filenamepath = 'coverLetterFile' . '/' . 'file/' . $filenamenew;
                    $filename = $img->move(public_path('storage/coverLetterFile' . '/' . 'file'), $filenamenew);
                    $jobApp->coverLetterFile = $filenamepath;
                    $jobApp->save();
                }
                if($jobApp->post->test_id != null)
                {
                    // $jobApp->qst_id = $post->test_id;
                    // $jobApp = JobApplications::find($row->id)->id;
                    $assignedData =
                    [
                        "id" => $jobApp->id,
                        "selectedId" => $jobApp->post->test_id,
                    ];
                    $assigned_request = new Request($assignedData);
                    $assign = new RecruiterDashboardController();
                    $test = $assign->assignJob($assigned_request);
                    // dd($test);
                    $jobApp->qst_id = $jobApp->post->test_id;
                    $jobApp->status = 0;
                    $jobApp->save();

                }
                $canEmail = $jobApp->candidate->user->email;
                // $canName = auth()->user()->first_name . ' ' . auth()->user()->last_name;
                $canName = $jobApp->candidate->first_name.' '.$jobApp->candidate->last_name;
                $canSlug = $jobApp->candidate->slug;
                // $canResume = $jobApp->candidate_doc_Id;
                $canResume = $jobApp->candidateDocument->document;
                // dd($canResume);
                $postName = $jobApp->post->post;
                $postSlug = $jobApp->post->slug;
                $postDesc = $jobApp->post->description;

                // dd($jobApp->post->company->name);
                if ($jobApp->post->company != null){
                    $email = $jobApp->post->company->user->email;
                    $postedBy = $jobApp->post->company->name;
                }
                elseif($jobApp->post->recruiter != null)
                {
                    $email = $jobApp->post->recruiter->user->email;
                    $postedBy = $jobApp->post->recruiter->name;
                }
                // if($jobApp->post->test_id != null)
                // {
                //     Mail::to($canEmail)->send(new ShortListed($postName, $canName, $postedBy));
                // }
                // dd($canEmail ,'postName:'.$postName, 'canName:'.$canName, 'postSlug:'.$postSlug, 'postDesc:'.$postDesc, 'postedBy:'.$postedBy, 'canSlug:'.$canSlug);
                if($jobApp->post->test_id == NULL)
                {
                    $can = Mail::to($canEmail)->send(new JobApplyCandidate($postName, $postSlug, $postDesc, $canName, $postedBy,$email));
                }
                else{
                    //dd($postedBy);
                    $testLink = "https://backend.hostingladz.com/webapp/erec/public/user/candidates/job/application";
                    $can = Mail::to($canEmail)->send(new JobApplyCandidateTestLink($postName, $postSlug, $postDesc, $canName, $postedBy, $email, $testLink));
                }
                if ($jobApp->post->company != null) {
                    $compEmail = $jobApp->post->company->user->email;
                    $jobAppPartner = $jobApp->post->company->name;
                    $comp = Mail::to($compEmail)->send(new JobApply($postName, $canName, $postSlug, $postDesc, $canSlug, $postedBy, $canResume, $jobAppPartner,$compEmail));
                }
                if ($jobApp->post->recruiter != null) {
                    $recEmail = $jobApp->post->recruiter->user->email;
                    $jobAppPartner = $jobApp->post->recruiter->name.' '.$jobApp->post->recruiter->lastName;
                    $rec = Mail::to($recEmail)->send(new JobApply($postName, $canName, $postSlug, $postDesc, $canSlug, $postedBy, $canResume, $jobAppPartner,$recEmail));
                }
                $url = "https://api.e-rec.com.au/api/user/classes/create";
                $res = Http::post($url, [
                    'u_id' => auth()->user()->new_user_id,
                    'class_id' => $post->class_id,
                ]);
                $response = $res->json();
                // if($response == true)
                // {
                return back();
                // }
                // else
                // {

                // }
            }

            // else {
            // }

        } catch (\Throwable $th) {
            // dd($th);
            // return redirect()->route('candidates.details')->with('error', $th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
            // dd($th);
            //throw $th;
        }
    }
}
