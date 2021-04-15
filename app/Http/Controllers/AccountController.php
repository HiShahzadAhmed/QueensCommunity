<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Carbon\Carbon;
use Mail;
use App\Traits\TwilioAPI;
use Session;

class AccountController extends Controller
{

    use TwilioAPI;

    public function attemptLogin(Request $request)
    {


    	if(!Session::has('phone'))
    	{
    		Session::Put('phone', $request->phone);
    	}

    	$user = User::wherePhone(Session::get('phone'))->first();



    	if(isset($request->pin))
    	{

    		if($request->pin == Session::get('pin'))
    		{
    			if(!$user)
    			{
    				$user = User::create([
	    				'phone' => Session::get('phone'),
	    				'pin' => $request->pin,
	    			]);
    			}

    			Auth::loginUsingId($user->id);
    			return redirect()->route('user.dashboard');
    		}
    		
    		$invalid = 1;
    		return view('auth.login', get_defined_vars());
    		
    	}


    	if($user)
    	{
    		Session::Put('pin', $user->pin);
    		return view('auth.login', get_defined_vars());
    	}
    	else
    	{


    		$code = 1234;
    		// $code = mt_rand(0000, 9999);
    		// $this->sendMessage("Your QueensQommunity account PIN is: ".$code, $request->phone);
    		Session::Put('pin', $code);

    		return view('auth.login', get_defined_vars());



    	}




    	



    	

    	


    	






    	











    	
    	
    	// $request->dd();
    }
}
