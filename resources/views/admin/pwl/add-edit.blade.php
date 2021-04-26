@extends('layouts.admin')
@section('title','PQL Management')
@section('heading','PQL Management')
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

                            @if((isset($pwl)))
                                <form action="{{ route('admin.pwls.update',$pwl->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                            @else
                                <form action="{{ route('admin.pwls.store') }}" method="POST" enctype="multipart/form-data">
                            @endif
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $pwl->name ?? '' }}" required>
                                    </fieldset>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $pwl->title ?? '' }}" required>
                                    </fieldset>
                                </div>
                                
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" id="description" name="detail">{{ $pwl->detail ?? 'Your detail here' }}</textarea>
                                    </fieldset>
                                </div>


                                <div class="col-xl-6">
                                        <label>Profile Avatar</label>
                                    <input type="file" name="avatar" class="form-control dropify" data-default-file="{{asset($pwl->avatar ?? '')}}">
                                </div>

                                <div class="col-xl-6">
                                        <label>Cover Photo</label>
                                    <input type="file" name="cover_photo" class="form-control dropify" data-default-file="{{asset($pwl->cover_photo ?? '')}}">
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
