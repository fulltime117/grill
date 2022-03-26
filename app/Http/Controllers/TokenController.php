<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\ChatGrant;

class TokenController extends Controller
{
    public function generate(Request $request)
    {
        $token = new AccessToken(
            config('t.acc_sid'), 
            config('t.api_sid'), 
            config('t.api_secret'), 
            3600,
            $request->email
        );
    
        $chatGrant = new ChatGrant();
        $chatGrant->setServiceSid(config('t.service_sid'));
        $token->addGrant($chatGrant);
    
        return response()->json([
                'token' => $token->toJWT()
        ]);
    }
}
