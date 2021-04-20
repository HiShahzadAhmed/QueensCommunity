<?php

namespace App\Traits;
use Twilio\Rest\Client;

trait TwilioAPI
{
	public function sendMessage($message, $recipients)
    {
        $account_sid = "AC26f00a4622e091bb230a9f75bfc32546";
        $auth_token = "5cb2d770aff39de160aeb6d6c92c7f9d";
        $twilio_number = "+16572454571";
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients,
                ['from' => $twilio_number, 'body' => $message] );
    }
}
