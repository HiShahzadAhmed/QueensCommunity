<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Str;
use Auth;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('updated_at', 'ASC')->get();
        return view('admin.blogs.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.add-edit', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'featured_image'=>'required',
            'status'=>'required',
            'meta_description'=>'required',
            'keywords'=>'required',
          ]);


        $post = new Blog();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;


        if(isset($request->featured_image))
        {
            $post->featured_image = uploadAvatar($request->featured_image, 'uploads/blogs');
        }
        else
        {
            $post->featured_image ='uploads/blogs/default-blogs.png';
        }


        $post->status = $request->status;
        $post->meta_description = $request->meta_description;
        $post->keywords = $request->keywords;
        $post->category = $request->category;
        $post->user_id = Auth::Id();
        $post->save();
        return redirect()->route('admin.blogs.index')->with('message', 'Blog has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blogs.add-edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'status'=>'required',
            'meta_description'=>'required',
            'keywords'=>'required',
          ]);


        $post = Blog::find($id);
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;

        if(isset($request->featured_image))
        {
            $post->featured_image = uploadAvatar($request->featured_image, 'uploads/blogs');
        }
        else
        {
            $post->featured_image = $post->featured_image;
        }

        $post->status = $request->status;
        $post->meta_description = $request->meta_description;
        $post->keywords = $request->keywords;
        $post->category = $request->category;
        $post->user_id = Auth::Id();
        $post->save();
        return redirect()->route('admin.blogs.index')->with('message', 'Blog has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
        return redirect()->back()->with('message', 'Blog has been deleted.');
    }
}
