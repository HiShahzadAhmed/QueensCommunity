@extends('layouts.admin')
@section('title','Blog Management')
@section('heading','Blog Management')
@section('css')
<style>
    .ck-editor__editable
    {
        min-height: 30vw !important;
    }
    .ck-file-dialog-button
    {
        display: none !important;
    }
</style>
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

                            @if((isset($blog)))
                                <form action="{{ route('admin.blogs.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                            @else
                                <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                            @endif
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $blog->title ?? '' }}" required>
                                    </fieldset>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <label for="">Description</label>
                                        <textarea name="description" class="form-control" id="description">{!! $blog->description ?? '' !!}</textarea>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <label for="basicInput">Featured Image</label>
                                    <input type="file" class="dropify" name="featured_image" data-default-file="@if(isset($blog->featured_image)){{ asset($blog->featured_image) ?? '' }}@endif">
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Category</label>
                                        <select class="form-control" name="category" required>
                                            @if(isset($blog->category))
                                            <option value="{{ $blog->category }}" hidden>{{ $blog->category }}</option>
                                            @endif
                                            <option value="Fashion">Fashion</option>
                                            <option value="Beauty">Beauty</option>
                                            <option value="Lifestyle">Lifestyle</option>
                                            <option value="Wedding">Wedding</option>
                                            <option value="Wellness">Wellness</option>
                                            <option value="Entertainment">Entertainment</option>
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Status</label>
                                        <select class="form-control" name="status" required>
                                            @if(isset($blog->status))
                                            <option value="{{ $blog->status }}" hidden>{{ $blog->status }}</option>
                                            @endif
                                            <option value="Latest">Latest</option>
                                            <option value="Trending">Trending</option>
                                            <option value="Featured">Featured</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </fieldset>
                                </div>

                                
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" id="" required>{{ $blog->meta_description ?? '' }}</textarea>
                                    </fieldset>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Keywords</label>
                                        <input type="text" class="form-control" placeholder="nature, wallpaper, health" name="keywords" required value="{{ $blog->keywords ?? '' }}">
                                    </fieldset>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group pull-right">
                                        <button class="btn btn-relief-primary" type="submit">Save Changes</button>
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
