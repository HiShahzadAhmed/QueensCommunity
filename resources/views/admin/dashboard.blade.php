@extends('layouts.admin')
@section('title','Dashboard')
@section('heading','Dashboard')


@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                Question
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>{{ countQuestion() }}</h3>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                Pools
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>{{ countPools() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                Blogs
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>{{ countBlogs() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
              Videos
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>{{ countVideos() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

