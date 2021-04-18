<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Pool;
use App\Models\Blog;
use App\Models\Video;
use App\Models\Category;
use Auth;
use Str;
use App\Models\Users;

class FrontEndController extends Controller
{

    public function index()
    {


    	$questions = Question::latest()->take(6)->get();
    	$videos = Video::latest()->take(3)->get();
    	$blogs = Blog::latest()->take(3)->get();
    	$trending_blogs = Blog::whereStatus('Trending')->take(3)->get();


        return view('front.index', get_defined_vars());
    }

    public function questionDetail($slug)
    {

    	$question = Question::whereSlug($slug)->first();

    	if(!$question)
    	{
    		abort(404);
    	}


        return view('front.index', get_defined_vars());
    }

    public function fetchData(Request $request)
    {

     $select = $request->get('select');

     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = Category::where($select, $value)
       ->groupBy($dependent)
       ->get();
     $output = '';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
     }
     echo $output;
    }

}
