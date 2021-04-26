<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('updated_at', 'ASC')->get();
        return view('admin.products.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.add-edit', get_defined_vars());
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
            'detail'=>'required',
            'image'=>'required',
            'url'=>'required',
            'price'=>'required',
          ]);


        $product = new Product();
        $product->title   		= $request->title;
        $product->slug 			= Str::Slug($request->title);
		$product->uuid 			= date('ymdhis');
        $product->detail   		= $request->detail;
        $product->image = uploadAvatar($request->image, 'uploads/products');
        $product->url   		= $request->url;
        $product->price   		= $request->price;
        $product->position 		= $request->position;

        $product->blog_id 		= $request->blog_id ?? '';
        $product->video_id 		= $request->video_id ?? '';
        $product->save();

        return redirect()->route('admin.products.index')->with('message', 'Product has been added!');
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
        $product = Product::find($id);
        return view('admin.products.add-edit', get_defined_vars());
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
            'detail'=>'required',
            'url'=>'required',
            'price'=>'required',
          ]);


        $product = Product::find($id);
        $product->title   		= $request->title;
        $product->detail   		= $request->detail;

        if(isset($request->image))
        {
	        $product->image = uploadAvatar($request->image, 'uploads/products');
        }

        $product->url   		= $request->url;
        $product->price   		= $request->price;
        $product->position 		= $request->position;

        $product->blog_id 		= $request->blog_id ?? $product->blog_id;
        $product->video_id 		= $request->video_id ?? $product->video_id;
        $product->save();

        return redirect()->route('admin.products.index')->with('message', 'Product has been added!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with('message', 'Product has been deleted.');
    }
}
