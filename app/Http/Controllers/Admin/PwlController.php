<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pwl;
use Str;

class PwlController extends Controller
{
	public function index()
    {
        $pwls = Pwl::orderBy('updated_at', 'ASC')->get();
        return view('admin.pwl.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pwl.add-edit', get_defined_vars());
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
            'name'=>'required',
            'title'=>'required',
            'detail'=>'required',
            'avatar'=>'required',
            'cover_photo'=>'required',
          ]);


        $pwl = new Pwl();
        $pwl->name = $request->name;
        $pwl->title   = $request->title;
        $pwl->slug = 'power-queens-list-'.Str::Slug($request->name);
		$pwl->uuid 			= date('ymdhis');
        $pwl->detail   = $request->detail;
        $pwl->avatar = uploadAvatar($request->avatar, 'uploads/pwls');
        $pwl->cover_photo = uploadAvatar($request->cover_photo, 'uploads/pwls');
        $pwl->save();
        return redirect()->route('admin.pwls.index')->with('message', 'Pwl has been added!');
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
        $pwl = Pwl::find($id);
        return view('admin.pwl.add-edit', get_defined_vars());
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
            'name'=>'required',
            'title'=>'required',
            'detail'=>'required',
          ]);


        $pwl = Pwl::find($id);
        $pwl->name = $request->name;
        $pwl->title   = $request->title;
        $pwl->detail   = $request->detail;

        if(isset($request->avatar))
        {
            $pwl->avatar = uploadAvatar($request->avatar, 'uploads/pwls');
        }

        if(isset($request->cover_photo))
        {
            $pwl->cover_photo = uploadAvatar($request->cover_photo, 'uploads/pwls');
        }

        $pwl->save();
        return redirect()->route('admin.pwls.index')->with('message', 'Pwl has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pwl::find($id)->delete();
        return redirect()->back()->with('message', 'Pwl has been deleted.');
    }
}
