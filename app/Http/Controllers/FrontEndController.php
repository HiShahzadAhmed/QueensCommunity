<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Pool;
use App\Models\Blog;
use App\Models\Video;
use Auth;
use Str;
use App\Models\Users;

class FrontEndController extends Controller
{

    public function index()
    {


    	$questions = Question::latest()->take(6)->get();
        $pools = Pool::latest()->take(6)->get();
    	$videos = Video::latest()->take(3)->get();
    	$blogs = Blog::latest()->take(3)->get();
    	$trending_blogs = Blog::whereStatus('Trending')->take(3)->get();


        return view('front.index', get_defined_vars());
    }

    public function questionDetail($id, $slug)
    {


    	$question = Question::whereQid($id)->with('questionAnswers')->first();
        $hot_questions = Question::latest()->with('questionAnswers')->take(8)->get();
        

    	if(!$question)
    	{
    		abort(404);
    	}


        return view('front.questions.question', get_defined_vars());
    }



}
