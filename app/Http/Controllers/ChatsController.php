<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use App\Models\Recruiter;
use App\Models\Company;
use App\Models\Candidate;
use App\Models\CompanyRecRelation;
use Exception;


use App\Models\User;

class ChatsController extends Controller
{
    //
    public function index($user,$slug)
    {
        $rec = 0;
        if($user == "candidate")
        {
            $rec =  Candidate::where('slug',$slug)->first();
        }
        if($user == "recruiter")
        {
            $rec =  Recruiter::where('slug',$slug)->first();
        }
        if($user == "company")
        {
            $rec =  Company::where('slug',$slug)->first();
        }
        $sec_user = User::find($rec->user_id);
        return view('companypanel.pages.chat.chat',compact('sec_user'));
    }

    public function AllMessge(Request $request)
    {
        $data['comp_rec'] = User::with('recruiter','company','candidate')->where('id',$request->id)->first();
        $ids = [auth()->user()->id,$request->id];
        $data['message'] = Message::with('user','user.company')->whereIn('user_id',$ids)->whereIn('second_user',$ids)->get();
        $data['messageread'] = Message::with('user','user.company')->whereIn('user_id',$ids)->whereIn('second_user',$ids)->update(['status' => 1]);

        return $data;
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        return Message::with('user','seconduser','user.company','seconduser.recruiter')->where('user_id',auth()->user()->id)->orwhere('second_user',auth()->user()->id)->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        // dd($request->all());
        try{

            $user = Auth::user();

            $message = $user->messages()->create([
                'message' => $request->input('message'),
                'second_user' => $request->input('second_user'),
            ]);
            $change_status = Message::where('user_id',$user->id)->where('second_user',$request->input('second_user'))->get();
            foreach($change_status as $row)
            {
                $row->status = 1;
                $row->save();
            }
            $getMessage = Message::with('user','seconduser','user.company','seconduser.recruiter')->find($message->id);
            broadcast(new MessageSent($user, $getMessage))->toOthers();

            return ['status' => 'Message Sent!'];
        }
        catch(Exception $ex)
        {
            return ['error' => $ex->getMessage()];
        }
    }
}
