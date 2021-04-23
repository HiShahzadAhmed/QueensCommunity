<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Pool;
use App\Models\Video;
use App\Models\Blog;

class SearchController extends Controller
{
        public function makeSearch(Request $request){
        dd($request->all());
        $post = Post::where('id', $id)->first();
        // split on 1+ whitespace & ignore empty (eg. trailing space)
        $searchValues = preg_split('/\s*,\s*/', $post->tags, -1, PREG_SPLIT_NO_EMPTY);

        $posts = Post::where(function ($q) use ($searchValues) {
            foreach ($searchValues as $value) {
              $q->orWhere('tags', 'like', "%{$value}%");
            }
          })
          ->where('id', '!=', $id)
          ->inRandomOrder()
          ->limit(20)
          ->get();
        return \View::make('single')
                                    ->with('post', $post)
                                    ->with('relatedPosts', $posts);

    }



    public function searchCategory($type, $keyword)
    {

    	if($type == 'main')
    	{
    		$cat_type = 'category';
    	}
    	else
    	{
    		$cat_type = 'sub_category';
    	}

    	$pools 		= Pool::where($cat_type, $keyword)->get();
    	$questions  = Question::where($cat_type, $keyword)->get();
    	$videos     = Video::where($cat_type, $keyword)->get();
    	$blogs      = Blog::where($cat_type, $keyword)->get();

    	return view('front.category_result', get_defined_vars());

    }
    public function SearchData(Request $request){

        $videos      = Video::where('title', 'like', '%'.$request->q.'%')->orWhere('description', 'like', '%'.$request->q.'%')->get();
        $blogs       = Blog::where('title', 'like', '%'.$request->q.'%')->orWhere('description', 'like', '%'.$request->q.'%')->get();
        $questions   = Question::where('title', 'like', '%'.$request->q.'%')->orWhere('detail', 'like', '%'.$request->q.'%')->get();
        $pools       = Pool::where('title', 'like', '%'.$request->q.'%')->get();
        return view('front.search.search', get_defined_vars());
    }



    public function loadSearchData(Request $request){

        if($request->ajax())
        {
         if($request->id > 0)
         {
          $questions = Question::where('id', '<', $request->id)
                                ->where('title', 'like', '%'.$request->q.'%')->orWhere('detail', 'like', '%'.$request->q.'%')
                                ->orderBy('id', 'DESC')
                                ->limit(6)
                                ->get();

          $pools     = Pool::where('id', '<', $request->id)
                                ->where('title', 'like', '%'.$request->q.'%')
                                ->orderBy('id', 'DESC')
                                ->limit(6)
                                ->get();
         }
         else
         {
          $questions = Question::where('title', 'like', '%'.$request->q.'%')->orWhere('detail', 'like', '%'.$request->q.'%')
                                ->orderBy('id', 'DESC')
                                ->limit(6)
                                ->get();
          $pools = Pool::where('title', 'like', '%'.$request->q.'%')
                                ->orderBy('id', 'DESC')
                                ->limit(6)
                                ->get();
         }

         $output = '';
         $last_id = '';

         if(!$questions->isEmpty() && !$pools->isEmpty())
         {
            $html = view('front.search.render-search', get_defined_vars())->render();
            $output .=$html;

         }
         else
         {
          $output .= '
          <div class="text-center clearfix mb-4 margin-top-20">
          <button class="btn btn-primary btn-md qbtn"  name="load_more_button"  id="load-no-data">No More Data has been Found</button>
           </div>
          ';
         }
         echo $output;
        }

    }
    public function loadData(Request $request){

        if($request->ajax())
        {
         if($request->id > 0)
         {
          $blogs = Blog::where('id', '<', $request->id)
                                ->where('title', 'like', '%'.$request->q.'%')->orWhere('description', 'like', '%'.$request->q.'%')
                                ->orderBy('id', 'DESC')
                                ->limit(6)
                                ->get();

          $videos     = Video::where('id', '<', $request->id)
                                ->where('title', 'like', '%'.$request->q.'%')->orWhere('description', 'like', '%'.$request->q.'%')
                                ->orderBy('id', 'DESC')
                                ->limit(6)
                                ->get();
         }
         else
         {
          $blogs = Blog::where('title', 'like', '%'.$request->q.'%')->orWhere('description', 'like', '%'.$request->q.'%')
                                ->orderBy('id', 'DESC')
                                ->limit(6)
                                ->get();
          $videos = Video::where('title', 'like', '%'.$request->q.'%')->orWhere('description', 'like', '%'.$request->q.'%')
                                ->orderBy('id', 'DESC')
                                ->limit(6)
                                ->get();
         }
         $output = '';
         $last_id = '';

         if(!$blogs->isEmpty() && !$videos->isEmpty())
         {
            $html = view('front.search.render-blog-videos', get_defined_vars())->render();

            $output .= $html;
         }
         else
         {
          $output .= '
          <div class="text-center clearfix mb-4 margin-top-20">
          <button class="btn btn-primary btn-md qbtn"  name="load_more_data"  id="load-no-data">No More Data has been Found</button>
           </div>
          ';
         }
         echo $output;
        }
    }

}
