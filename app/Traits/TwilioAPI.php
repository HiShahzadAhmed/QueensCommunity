<?php

namespace App\Traits;
use Twilio\Rest\Client;

trait TwilioAPI
{
	public function sendMessage($message, $recipients)
    {
        $account_sid = "AC683fc40da7af583fd4f3fdd747b72fc8";
        $auth_token = "397e5a51cf76a0b32388e34e6678b53d";
        $twilio_number = "QueensComm";
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients,
                ['from' => $twilio_number, 'body' => $message] );
    }
}
