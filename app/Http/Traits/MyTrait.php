<?php

namespace App\Http\Traits;

use Config;
use App\Models\User;
use Twilio\Rest\Client;


trait MyTrait {
    
    // create channel for new registered user
    public function create_channel($user) {
        
        $authUser = $user; // this is login user;
        $otherUser = User::whereHas('roles', function($query) {
            $query->where('name', 'admin');
        })->first(); // admin;
        $chanelId = $authUser->id .'_'. $authUser->identity;
        $authMember = $authUser->email;
        $otherMember = $otherUser->email;
        //$users = User::where('id', '<>', $authUser->id)->get();
        $twilio = new Client(config('t.acc_sid'), config('t.acc_auth'));
        // dd(env('TWILIO_AUTH_TOKEN'), $twilio, $ids); // 1-77, 1-78,,,
        
        // Fetch channel or create a new one if it doesn't exist
        try {
            $channel = $twilio->chat->v2->services(config('t.service_sid'))
                ->channels($chanelId)
                ->fetch();
        } catch (\Twilio\Exceptions\RestException $e) {
            $channel = $twilio->chat->v2->services(config('t.service_sid'))
                ->channels
                ->create([
                    'uniqueName' => $chanelId,
                    'type' => 'private',
                ]);
        }

        // Add first user to the channel
        try {
            $twilio->chat->v2->services(config('t.service_sid'))
                ->channels($chanelId)
                ->members($authMember)
                ->fetch();

        } catch (\Twilio\Exceptions\RestException $e) {
            $member = $twilio->chat->v2->services(config('t.service_sid'))
                ->channels($chanelId)
                ->members
                ->create($authMember);
        }

        // Add second user to the channel
        try {
            $twilio->chat->v2->services(config('t.service_sid'))
                ->channels($chanelId)
                ->members($otherMember)
                ->fetch();

        } catch (\Twilio\Exceptions\RestException $e) {
            $twilio->chat->v2->services(config('t.service_sid'))
                ->channels($chanelId)
                ->members
                ->create($otherMember);
        }
    }
    
    public function getUserName($user){
        // trait test
        dd($user);
    }

}