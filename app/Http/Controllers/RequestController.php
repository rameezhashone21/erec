<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Recruiter;
use App\Models\ExamNotification;
use App\Models\CompanyRecRelation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConnectionRequest;
use DB;

class RequestController extends Controller
{
    
    public function markConnectionNotificationRead($id)
    {
        $notification = DB::table('exam_notifications')
              ->where('id', $id)
              ->first();
              
        $markRead = DB::table('exam_notifications')
              ->where('id', $id)
              ->update(['read' => 1]);
        
        //dd($notification->status);     
        if($notification->status == "Company Connection Request Accepted" || $notification->status == "Company Connection Request Rejected"  ||
        $notification->status == "Recruiter Connection Request" || $notification->status == "Recruiter Connection Request")
        {
            return redirect()->route('company.recruiters');
        }
        elseif($notification->status == "Recruiter Connection Request Accepted" || $notification->status == "Recruiter Connection Request Rejected" ||
        $notification->status == "Company Connection Request" || $notification->status == "Company Connection Request"){
            return redirect()->route('recruiter.companyIndex');

        }
              
    }
    
    public function recruiterMarknotificationRead($id)
    {

        $markNotificationread = DB::table('exam_notifications')
              ->where('id', $id)
              ->update(['read' => 1]);
        
        return redirect()->route('company.recruiters');
    }
    //
    public function recruiter()
    {
        // dd('ok');
        // $rec = Recruiter::with('user')->get();
        $rec = Recruiter::with('recRelation')->whereHas('recRelation',function($query)
        {
            $query->where('com_id',auth()->user()->company->id);
        })->orderBy('id','DESC')->get();
        // $rec = Recruiter::with('user')->whereHas('rec', function ($query) {
        //     $query->where('status', 1);
        // })->orderBy('id', 'DESC');
        // dd($rec->toArray());
        return view('companypanel.pages.request.index',compact('rec'));
    }
    public function connectedRecruiter(Request $request)
    {

        // if(auth()->user()->role == "company")
        // {
        //     $rec = Recruiter::with('recRelation')->whereHas('recRelation',function($query)
        //     {
        //         $query->where('com_id',auth()->user()->company->id);
        //     })->get();
        // }
        // if(auth()->user()->role == "rec")
        // {
        //     $rec = Company::with('rec')->whereHas('rec',function($query)
        //     {
        //         $query->where('rec_id',auth()->user()->recruiter->id);
        //     })->get();
        // }
        $rec = User::with('secondUsers')->find(auth()->user()->id)->secondUsers->unique('id');
        if($rec == "[]")
        {
            $rec = User::with('secondUsers_two')->find(auth()->user()->id)->secondUsers_two->unique('id');
        }
        if($request->has('q'))
        {
            $searchString = $request->q;
            // $rec = User::with('secondUsers')->find(auth()->user()->id)->secondUsers->unique('id');
            $rec = User::with(['secondUsers'=>function($query)use($searchString){
                $query->where('name', 'like', '%'.$searchString.'%');
            }])->find(auth()->user()->id)->secondUsers->unique('id');
            // dd($rec->toArray());

        }
        foreach($rec as $recuser){

            $ids = [auth()->user()->id,$recuser->id];
            $recuser->messagecount = Message::with('user','user.company')->whereIn('user_id',$ids)->whereIn('second_user',$ids)->where('status','=',0)->count();
            $rec['totalunreadmsg'] =+ $recuser->messagecount;
            $recuser->firstmsg = Message::with('user','user.company')->whereIn('user_id',$ids)->whereIn('second_user',$ids)->latest()->first();

        }
    //     if($request->has('q'))
    //     {
    //     dd($rec->toArray());
    // }

        return $rec;
    }
    public function sendRequest($id)
    {
        // dd($id);
        $relation = CompanyRecRelation::create([
            'com_id'=> auth()->user()->company->id,
            'rec_id'=> $id,
            'sender'=> "comp",
        ]);

        $rec = Recruiter::findOrFail($id);
        $email = $rec->user->email;
        $sender = auth()->user()->company->name;
        // $reciever = $rec->name.' '.$rec->lastName;
        $reciever = $rec->name;
        // $compId = auth()->user()->id;
        $confirm = $relation->id;

        $company = Company::where('id',auth()->user()->company->id)->value('user_id');
        $recruiter = Recruiter::where('id',$id)->value('user_id');
                
        $company_user_id = User::where('id',$company)->value('id');
        $recruiter_user_id = User::where('id',$recruiter)->value('id');

        $notification = ExamNotification::create([
            'content' => auth()->user()->name . " has send You Connection Request",
            'status'       => "Company Connection Request",
            'receiver_id'       => $recruiter_user_id,
            'sender_id'       =>  $company_user_id
        ]);

        $mail = Mail::to($email)->send(new ConnectionRequest($sender, $reciever, $confirm));

        return redirect()->back();
    }
    public function sendRequestToComp($id)
    {
        // dd($id);
        $relation = CompanyRecRelation::create([
            'com_id'=> $id,
            'rec_id'=> auth()->user()->recruiter->id,
            'sender'=> "rec",
        ]);

        $comp = Company::findOrFail($id);
        $email = $comp->user->email;
        $sender = auth()->user()->recruiter->name;
        // $reciever = $rec->name.' '.$rec->lastName;
        $reciever = $comp->name;
        // $compId = auth()->user()->id;
        $confirm = $relation->id;
        
        $company = Company::where('id',$id)->value('user_id');
        $recruiter = Recruiter::where('id',auth()->user()->recruiter->id)->value('user_id');
                
        $company_user_id = User::where('id',$company)->value('id');
        $recruiter_user_id = User::where('id',$recruiter)->value('id');

        $notification = ExamNotification::create([
            'content' => auth()->user()->name . " has send You Connection Request",
            'status'       => "Recruiter Connection Request",
            'receiver_id'       => $company_user_id,
            'sender_id'       =>   $recruiter_user_id
        ]);

        $mail = Mail::to($email)->send(new ConnectionRequest($sender, $reciever, $confirm));

        return redirect()->back();
    }

}
