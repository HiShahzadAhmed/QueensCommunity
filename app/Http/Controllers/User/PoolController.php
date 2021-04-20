<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pool;
use App\Models\PoolOption;
use App\Models\PoolOptionResult;
use Auth;
use Carbon\Carbon;
use Str;
class PoolController extends Controller
{


	public function index()
    {
        return view('user.pools.pools', get_defined_vars());
    }

    public function createPool()
    {
        return view('user.pools.create_pool', get_defined_vars());
    }



    public function storePool(Request $request)
    {


	    	      $request->validate([
			        'title'		=>'required',
			        'category'	=>'required',
			        'tags' 		=>'required',
			      ]);


    	            $pool = Pool::create([

			        'user_id'	=>	Auth::Id(),
                    'pid'  		=> date('ymdhis'),
			        'title'		=>	$request->title,
			        'slug'		=>	Str::slug($request->title),
			        'category'	=>	$request->category,
                    'sub_category'	=>	$request->sub_category,
			        'tags'		=>	$request->tags,
			        'ended_at'	=>	Carbon::parse($request->ended_at)->format('Y-m-d H:i:s'),
                    'is_anonymous' => $request->is_anonymous ?? 0

			      ]);


		    	 for ($i=0; $i < count($request->option)  ; $i++)
		    	 {
		    	 	PoolOption::create([
		    	 		'pool_id'  => $pool->id,
		    	 		'title'       => $request->option[$i]
		    	 	]);
		    	 }



    	     return redirect()->route('user.index.pool')->withMessage('Your pool has been created.');
    }


    public function submitPoolSuggestion(Request $request)
    {

    	$option = PoolOptionResult::wherePoolId($request->pool_id)->whereUserId(Auth::Id())->first();

    	if($option)
    	{
    		$option->pool_option_id = $request->option;
    		$option->save();
    		return back()->withMessage('Pool suggestion has been updated.');
    	}

    	PoolOptionResult::create([
    		'pool_option_id' => $request->option,
    		'pool_id' => $request->pool_id,
    		'user_id' => Auth::Id(),
    	]);

    	return back()->withMessage('Your suggestion has been submitted.');

    }



}
