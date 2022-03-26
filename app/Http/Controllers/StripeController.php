<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Stripe;
use Session;

class StripeController extends Controller
{

    public function stripe()
    {
        return view('stripe');
    }
  
    public function stripePost(Request $request)
    {
        // dd(config('app.stripe_secret'));
        Stripe\Stripe::setApiKey(config('app.stripe_secret'));
        Stripe\Charge::create ([
                "amount" => 120 * 100,
                "currency" => "ils",
                "source" => $request->stripeToken,
                "description" => "course 3" 
        ]);
  
        Session::flash('success', 'Payment successfully made.');
          
        return back();
    }
}