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

                    if(isset($request->role))
                    {
                        $role = 'doctor';
                    }
                    else
                    {
                        $role = 'user';
                    }


    				$user = User::create([
	    				'phone'    => Session::get('phone'),
                        'avatar'   => 'uploads/users/default.png',
	    				'pin'      => $request->pin,
                        'role'     => $role
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

            $is_role = 1;
    		// $code = 1234;
    		$code = mt_rand(0000, 9999);

    		$this->sendMessage("Your QueensCommunity account PIN is: ".$code, $request->phone);
    		

            // try 
            // {
            //     $this->sendMessage("Your QueensCommunity account PIN is: ".$code, $request->phone);
            // } 
            // catch (\Exception $e) 
            // {
            //     $code = 1234;
            // }
            

            Session::Put('pin', $code);

    		return view('auth.login', get_defined_vars());



    	}




    	



    	

    	


    	






    	











    	
    	
    	// $request->dd();
    }
}
