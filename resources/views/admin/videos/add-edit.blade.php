@extends('layouts.admin')
@section('title','video Management')
@section('heading','video Management')
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

                            @if((isset($video)))
                                <form action="{{ route('admin.videos.update',$video->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                            @else
                                <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data">
                            @endif
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $video->title ?? '' }}" required>
                                    </fieldset>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">URL</label>
                                        <input type="text" class="form-control" placeholder="ETUacdj8DJs" maxlength="11" name="url" required value="{{ $video->url ?? '' }}">
                                    </fieldset>
                                </div>

                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" placeholder="Description" name="description" required></textarea>
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
