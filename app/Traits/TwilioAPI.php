<?php

namespace App\Traits;
use Twilio\Rest\Client;

trait TwilioAPI
{
	public function sendMessage($message, $recipients)
    {
        $account_sid = "ACbedec4ea2b30a5334db75f783d174a0a";
        $auth_token = "5041c10d739f0c749493fecff62fdd3b";
        $twilio_number = "+1 581 705 2401";
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients,
                ['from' => $twilio_number, 'body' => $message] );
    }
}
