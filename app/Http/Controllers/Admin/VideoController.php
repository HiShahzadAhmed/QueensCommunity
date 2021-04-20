<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Str;
use Auth;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy('updated_at', 'ASC')->get();
        return view('admin.videos.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.add-edit', get_defined_vars());
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
            'url'=>'required',
            'description'=>'required',
          ]);


        $video = new Video();
        $video->title = $request->title;
        $video->url   = $request->url;
        $video->description   = $request->description;
        $video->category   = $request->category;
        $video->sub_category   = $request->sub_category;
        $video->user_id = Auth::Id();
        $video->save();
        return redirect()->route('admin.videos.index')->with('message', 'Video has been created!');
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
        $video = Video::find($id);
        return view('admin.videos.add-edit', get_defined_vars());
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
            'url'=>'required',
            'description'=>'required',
          ]);


        $video = Video::find($id);
        $video->title = $request->title;
        $video->url   = $request->url;
        $video->description   = $request->description;
        $video->category   = $request->category;
        $video->sub_category   = $request->sub_category;
        $video->user_id = Auth::Id();
        $video->save();
        return redirect()->route('admin.videos.index')->with('message', 'Video has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Video::find($id)->delete();
        return redirect()->back()->with('message', 'Video has been deleted.');
    }
}
