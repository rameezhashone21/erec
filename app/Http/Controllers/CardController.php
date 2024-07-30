<?php

namespace App\Http\Controllers;
use App\Traits\RequestValidation;
use App\Models\User;
use Illuminate\Http\Request;

class CardController extends Controller
{
    use RequestValidation;

    public function storecard(Request $request)
    {
        // dd($request->toArray());
        $validcard = $this->cardvalid($request);
        // dd('ok');
        try {

            $valid = $this->createNewCard($request);

            return redirect()->route('user.paymentedit')->with('success', 'Record updated successfully.');
            
        }catch(\Stripe\Exception\CardException $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
            
            // param is '' in this case

            return redirect()->back()->with('error',$e->getError()->message);
            
        }

    }

    public function editcard($id){

        $user_id = auth()->user()->id;

        $userdetails = User::where('id',$user_id)->first();

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $carddata = $stripe->customers->retrieveSource($userdetails->stripe_user_id,$id);

        return view('dashboard.user.pages.editCard')->with('carddata',$carddata)->with('userdetails',$userdetails);

    }

    public function updatecard(Request $request){


            $valid = $this->validate($request,[
                'card_name'         => 'required|string',
                // 'card_exp_month'    => 'required|numeric|max:12',
                // 'card_exp_year'     => 'required|numeric|after:yesterday',
            ]);
    
            // dd($expires);

            try {
    
                $user_id = auth()->user()->id;
        
                $userdetails = User::where('id',$user_id)->first();
        
                $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
                $token = $stripe->customers->updateSource($userdetails->stripe_user_id,$request->cardid,[
                    'name'      =>  $request->card_name,
                    'exp_month' =>  $request->card_exp_month,
                    'exp_year'  =>  $request->card_exp_year,
                ]);

                return redirect()->route('user.paymentedit')->with('success', 'Record updated successfully.');

            }catch(\Stripe\Exception\CardException $e) {
                // Since it's a decline, \Stripe\Exception\CardException will be caught
                
                // param is '' in this case

                return redirect()->back()->with('error',$e->getError()->message);
                
            }


    }

    public function deletecard($id){

        $user_id = auth()->user()->id;

        $userdetails = User::where('id',$user_id)->first();

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $carddata = $stripe->customers->deleteSource($userdetails->stripe_user_id,$id);

        return redirect()->route('user.paymentedit')->with('success', 'Card Delete successfully.');

    }
}
