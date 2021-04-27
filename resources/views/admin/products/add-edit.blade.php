@extends('layouts.admin')
@section('title','Product Management')
@section('heading','Product Management')
@section('css')
@endsection
@section('content')
<div class="row">


        <div class="col-sm-12">
            <div class="card">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if((isset($product)))
                                <form action="{{ route('admin.products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                            @else
                                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            @endif
                            @csrf
                            <div class="row">
                                <div class="col-xl-6 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $product->title ?? '' }}" required>
                                    </fieldset>
                                </div>
                                
                                <div class="col-xl-6 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">URL</label>
                                        <input type="text" class="form-control" name="url" placeholder="Url" value="{{ $product->url ?? '' }}" required>
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Price</label>
                                        <input type="text" class="form-control" name="price" placeholder="Price" value="{{ $product->price ?? '' }}" required>
                                    </fieldset>
                                </div>

                                <div class="col-xl-6 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Position</label>
                                        
                                        <select class="form-control" name="position">
                                            <option value="bottom">Bottom</option>
                                            <option value="sidebar">Sidebar</option>
                                        </select>

                                    </fieldset>
                                </div>


                                
                                
                                
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label>Detail</label>
                                        <textarea class="form-control" name="detail">{{ $product->detail ?? '' }}</textarea>
                                    </fieldset>
                                </div>


                                <div class="col-xl-12 mb-2">
                                        <label>Image</label>
                                    <input type="file" name="image" class="form-control dropify" data-default-file="{{asset($product->image ?? '')}}">
                                </div>

                                <div class="col-xl-6 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Attach Blog</label>
                                        
                                        <select class="form-control select2-option" name="blog_id">
                                            <option value="">Select Blog</option>
                                            @foreach(blogs() as $blog)
                                                <option value="{{ $blog->id }}" 
                                                    @if(isset($product->blog_id) && $blog->id == $product->blog_id) selected @endif>
                                                    {{ $blog->title }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </fieldset>
                                </div>

                                <div class="col-xl-6 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Attach Video</label>
                                        
                                        <select class="form-control select2-option" name="video_id">
                                            <option value="">Select Video</option>
                                            @foreach(videos() as $video)
                                                <option value="{{ $video->id }}"
                                                    @if(isset($product->video_id) && $video->id == $product->video_id) selected @endif>
                                                    {{ $video->title }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </fieldset>
                                </div>
                                

                                

                                
                                <div class="col-xl-12 col-md-12 col-12 mb-1 mt-3">
                                    <fieldset class="form-group pull-right">
                                        <button class="btn btn-relief-primary" type="submit">Save</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
@section('js')

@endsection
