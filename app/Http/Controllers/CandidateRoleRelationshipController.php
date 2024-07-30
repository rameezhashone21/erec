<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CandidateRoleRelationship;
use App\Models\Candidate;

class CandidateRoleRelationshipController extends Controller
{
    public function create($candidate_id)
    {
        $user = User::with('company', 'recruiter')->whereId(auth()->user()->id)->first();
        $candidate = Candidate::with('user')->whereSlug($candidate_id)->first();
        // dd($candidate->toArray());
        $candidate_id = $candidate->id;
        if($user->role == 'company')
        {
            $user_id = $user->company->id;
            $role = 'Company';
        }
        elseif($user->role == 'rec')
        {
            $user_id = $user->recruiter->id;
            $role = 'Recruiter';
        }
        $check = CandidateRoleRelationship::where('user_id', $user_id)
        ->where('candidate_id', $candidate_id)
        ->where('role', $role)
        ->first();
          
        if($check == null)
        {         
            $chat = new CandidateRoleRelationship;
            $chat->candidate_id = $candidate_id;
            $chat->user_id = $user_id;
            $chat->role = $role;
            $chat->status = 1;
            $chat->save();
        }

        if($user->role == 'company')
        {
            return redirect()->route('company.candidateIndex');
        }
        elseif($user->role == 'rec')
        {
            return redirect()->route('recruiter.candidateIndex');
        }
    }
}
