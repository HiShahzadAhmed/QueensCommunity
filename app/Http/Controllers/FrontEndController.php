<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Pool;
use App\Models\Blog;
use App\Models\Video;
use App\Models\Category;
use Auth;
use Spatie\Permission\Models\Permission;
use Str;
use App\Models\Users;

class FrontEndController extends Controller
{

    public function index()
    {

        // Permission::create(['name' => 'browse_category']);

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
    // View Question
    public function viewQuestion(){
      return view('front.questions.view');
    }

    public function load_data(Request $request){

        if($request->ajax())
        {
         if($request->id > 0)
         {
          $data = Question::where('id', '<', $request->id)
             ->orderBy('id', 'DESC')
             ->limit(12)
             ->get();
         }
         else
         {
          $data = Question::orderBy('id', 'DESC')
             ->limit(12)
             ->get();
         }
         $output = '';
         $last_id = '';

         if(!$data->isEmpty())
         {
            $html = view('front.questions.render-question', get_defined_vars())->render();
            $output .=$html;

         }
         else
         {
          $output .= '
          <div class="text-center clearfix margin-top-20">
          <button class="btn btn-primary btn-md qbtn"  name="load_more_question"  id="load-no-data">No More Questions has been Found</button>
           </div>
          ';
         }
         echo $output;
        }

       }

          // View All POlls
          public function viewPolls(){
            return view('user.pools.view_pools');
        }
        public function loadPools(Request $request){
            if($request->ajax())
            {
             if($request->id > 0)
             {
              $data = Pool::where('id', '<', $request->id)
                 ->orderBy('id', 'DESC')
                 ->limit(12)
                 ->get();
             }
             else
             {
              $data = Pool::orderBy('id', 'DESC')
                 ->limit(12)
                 ->get();
             }
             $output = '';
             $last_id = '';

             if(!$data->isEmpty())
             {
                $html = view('user.pools.render_view', get_defined_vars())->render();
                $output .=$html;

             }
             else
             {
              $output .= '
              <div class="text-center clearfix margin-top-20">
              <button class="btn btn-primary btn-md qbtn"  name="load_more_button"  id="load-no-data">No More Pools has been Found</button>
               </div>
              ';
             }
             echo $output;
            }
        }

        // Videos
        public function viewVideos(){
            return view('admin.videos.view_videos');
        }
        public function loadVideos(Request $request){
            if($request->ajax())
            {
             if($request->id > 0)
             {
              $data = Video::where('id', '<', $request->id)
                 ->orderBy('id', 'DESC')
                 ->limit(12)
                 ->get();
             }
             else
             {
              $data = Video::orderBy('id', 'DESC')
                 ->limit(12)
                 ->get();
             }
             $output = '';
             $last_id = '';

             if(!$data->isEmpty())
             {
                $html = view('admin.videos.render_view', get_defined_vars())->render();
                $output .=$html;

             }
             else
             {
              $output .= '
              <div class="text-center clearfix mb-4 margin-top-20">
              <button class="btn btn-primary btn-md qbtn"  name="load_more_button"  id="load-no-data">No More Videos has been Found</button>
               </div>
              ';
             }
             echo $output;
            }
        }
        // Blogs
           // Videos
           public function viewBlogs(){
            return view('admin.blogs.view_blogs');
        }
        public function loadBlogs(Request $request){
            if($request->ajax())
            {
             if($request->id > 0)
             {
              $data = Blog::where('id', '<', $request->id)
                 ->orderBy('id', 'DESC')
                 ->limit(12)
                 ->get();
             }
             else
             {
              $data = Blog::orderBy('id', 'DESC')
                 ->limit(12)
                 ->get();
             }
             $output = '';
             $last_id = '';

             if(!$data->isEmpty())
             {
                $html = view('admin.blogs.render_view', get_defined_vars())->render();
                $output .=$html;

             }
             else
             {
              $output .= '
              <div class="text-center clearfix mb-4 margin-top-20">
              <button class="btn btn-primary btn-md qbtn"  name="load_more_button"  id="load-no-data">No More Blogs has been Found</button>
               </div>
              ';
             }
             echo $output;
            }
        }
         // Hangout
         public function viewHangout(){
            return view('front.hangout');
        }


        public function blogDetail($slug)
        {
            $blog = Blog::whereSlug($slug)->first();
            $blogs = Blog::latest()->take(8)->get();

            return view('front.blog_detail', get_defined_vars());

        }

            public function about()
            {
                return view('front.about', get_defined_vars());
            }
            public function contact()
            {
                return view('front.contact', get_defined_vars());
            }

}
