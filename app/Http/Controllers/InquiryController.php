<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
class InquiryController extends Controller
{
    public function submitInquiry(Request $request)
    {

    	Inquiry::create($request->all());
    	return back()->withMessage('Your inquiry has been submitted.');
    }
}
