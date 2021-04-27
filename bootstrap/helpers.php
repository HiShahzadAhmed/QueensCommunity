<?php
use Carbon\Carbon;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Video;
use App\Models\Question;
use App\Models\Pool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;




    function setting()
    {
        return Setting::pluck('value', 'key')->toArray();
    }

    function sendMail($data)
    {
        if (array_key_exists("pdf",$data)) {
            $mail = Mail::send($data['view'], ['data' => $data['data']], function ($message) use ($data) {
                $message->to($data['to'], $data['name'])->subject($data['subject'])->attachData($data['pdf']->output(), "invoice.pdf");
            });
        }else {
            $mail = Mail::send($data['view'], ['data' => $data['data']], function ($message) use ($data) {
                $message->to($data['to'], $data['name'])->subject($data['subject']);
            });
        }
    }


    function uploadAvatar($file, $path){
        $name = time().'-'.str_replace(' ', '-', $file->getClientOriginalName());
        $file->move($path,$name);
        return $path.'/'.$name;
    }

    function categories(){
        return Category::groupBy('category')->get();
    }

    function subCategories($category){

        return Category::whereCategory($category)->get()->pluck('sub_category');
    }

    function blogs()
    {
        return Blog::all();
    }

    function videos()
    {
        return Video::all();
    }
    function countQuestion()
    {
        return Question::all()->count();
    }
    function countPools()
    {
        return Pool::all()->count();
    }

    function countBlogs()
    {
        return Blog::all()->count();
    }

    function countVideos()
    {
        return Video::all()->count();
    }





?>
