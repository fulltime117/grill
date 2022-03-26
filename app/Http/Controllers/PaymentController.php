<?php

namespace App\Http\Controllers;

use Cardcom\Iframe;
use App\Models\Temp;
use App\Models\User;
use Cardcom\Invoice;
use Cardcom\Setting;
use App\Models\Course;
use App\Models\Usertemp;
use App\Mail\PurchaseMail;
use App\Mail\RegisterMail;
use Cardcom\InvoiceProduct;
use App\Http\Traits\MyTrait;
use Illuminate\Http\Request;

use App\Mail\PurchaseFailMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\CourseBuyNotify;


class PaymentController extends Controller
{
    use MyTrait;
    
    public function charge($token)
    {
        $user = Usertemp::where('phone_token', $token)->first();
        
        if($user == null) {
            return view('errors.error404');
        }
        
        $user->update(['sign_data' => request()->sign_data]);
        
        // dd('card com payment gatway', );
        $user_name = $user->first_name . ' ' . $user->last_name;
        $course= Course::find($user->course_id);
        
        $price = $course->course_price;
        
        if($user->lessons){
            $price = $user->amount;
        }
        
        if($user->coupon_code) {
            $price = $user->amount;
        }
        
        try {
            Setting::setTerminal(123718);
            Setting::setUser("K6a5z6IPdmGPWaK3K5Zo");
            
            // Setting::setTerminal(111459);
            // Setting::setUser("balilti007");

            $invoice = new Invoice($user_name, $user->email);
            $product = new InvoiceProduct($course->course_name, $price, 1);

            $invoice->setProducts([$product]);
            $invoice->setSetting(['InvoiceHead.Language' => 'he']);

            $iframe = new Iframe();
            $iframe->setSetting(["CoinID" => 1, "Language" => "he", "maxNumOfPayments" => "12"]); // 1:COIN_SHEKEL, 2: COIN_DOLLAR
            $iframe->setPrice($price);
            $iframe->setInvoice($invoice);
            $iframe->docTypeToCreate = 400;

            $iframe->setGoodUrl(route('paymentsuccess', $token));
            $iframe->setErrorUrl(route('paymenterror', $token));

            // dd($iframe->getSetting());
            $result = $iframe->getIframe();
            //dd($result);

            if ($result->isSuccess()) {
                return redirect($result->getUrl());
                echo "<script>window.open('" . $result->getUrl() . "', '_blank')</script>";
            }
            else
                return redirect()->back()->with('alert', $result->getError());

        } catch(Exception $e) {
            return redirect()->back()->with('alert',$e->getMessage());
        }
        
    }
   
    
    public function paymentsuccess($phone_token) 
    {
        // register user if new user
        $temp_user = Usertemp::where('phone_token', $phone_token)->first();
        
        
        $user = Usertemp::select('firstname', 'lastname', 'email', 'phone', 'identity', 'username', 'password', 'address', 'company')
            ->where('phone_token', $phone_token)->first()->toArray();
            
        $password = ['password' => Hash::make($temp_user->password)];
        $phone = ['phone' => substr($temp_user->phone, 4)];
        
        if(User::where('email', $temp_user->email)->count() > 0) {
            $user = User::where('email', $temp_user->email)->first();
        }else {
            $user = User::create(array_merge($user, $password, $phone)); // created new user
            
            // create channel for chat
            $this->create_channel($user);
            
            // send register email to user to access website
            Mail::to($temp_user->email)
            ->send(new RegisterMail($temp_user));
        }
        
        
        
        
        // update course_user table
        if($temp_user->lessons) {
            DB::table('course_user')->insert([
                'user_id' => $user->id,
                'course_id' => $temp_user->course_id,
                'active' => 1,
                'lesson_number' => 1,
                'sign_data' => $temp_user->sign_data,
                'mode' => 'spilt',
                'lessons' => $temp_user->lessons,
                'coupon_code' => NULL,
                'amount' => $temp_user->amount,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]);
        }elseif($temp_user->coupon_code){
            
            DB::table('course_user')->insert([
                'user_id' => $user->id,
                'course_id' => $temp_user->course_id,
                'active' => 1,
                'lesson_number' => 1,
                'sign_data' => $temp_user->sign_data,
                'mode' => 'coupon',
                'lessons' => NULL,
                'coupon_code' => $temp_user->coupon_code,
                'amount' => $temp_user->amount,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]);
        }else{
        
            DB::table('course_user')->insert([
                'user_id' => $user->id,
                'course_id' => $temp_user->course_id,
                'active' => 1,
                'lesson_number' => 1,
                'sign_data' => $temp_user->sign_data,
                'mode' => 'full',
                'lessons' => NULL,
                'coupon_code' => NULL,
                'amount' => $temp_user->amount,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]);
            
        }
        
        
        $admin = User::whereHas('roles', function($query) {
            $query->where('name', 'admin');
        })->first();
        
        $admin->notify(new CourseBuyNotify([
            'user_id' => $user->id,
            'course_id' => $temp_user->course_id,
        ]));
        
        $user->notify(new CourseBuyNotify([
            'user_id' => $user->id,
            'course_id' => $temp_user->course_id,
        ]));
        
        // send mail for purchase course
        Mail::to($temp_user->email)
        ->send(new PurchaseMail($temp_user));       
        
        // delete temp user
        Usertemp::where('phone_token', $phone_token)->delete();        
        
        return view('front.complete_contract');
    }
    
    
    public function paymenterror($phone_token)
    {
        $temp_user = Usertemp::where('phone_token', $phone_token)->first();
        
        // send mail for purchase course
        Mail::to($temp_user->email)
        ->send(new PurchaseFailMail($temp_user));   
        return back();
    }
    
    
}
