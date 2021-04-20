<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard', get_defined_vars());
    }

    public function profile()
    {
        return view("user.profile.index");
    }

    public function savePin(Request $req)
    {
    	$req->validate([
    		'pin' => 'required'
    	]);
    	$user = auth()->user();
    	$user->pin = $req->pin;
    	$user->save();
    	return redirect()->back()->withMessage("Pin has been updated.");

    }

    public function saveProfile(Request $req)
    {
    	$req->validate([
    		'name' => 'required',
    		'email' => 'required|email',
    		'gender' => 'required'
    	]);
    	$user = auth()->user();
    	$user->name = $req->name;
    	$user->email = $req->email;
    	$user->gender = $req->gender;

    	if ($req->has('avatar'))
        {
            $user->avatar = uploadAvatar($req->avatar, 'uploads/users');
        }
        else
        {
            $user->avatar = $user->avatar;
        }

    	$user->save();
    	return redirect()->back()->withMessage("Profile has been updated.");
    }


    public function submitDoctorDetail()
    {
        return view('user.doctor.detail', get_defined_vars());
    }
    public function updateDoctorDetail(Request $request)
    {

        $user = Auth::User();

        $user->pmdc_no = $request->pmdc_no;
        $user->name = 'Dr. New User';
        $user->save();

        return redirect()->route('user.dashboard')->withMessage('Hello! Welcome to your dashboard');
    }

}
