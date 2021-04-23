@extends('layouts.admin')
@section('title','Video Management')
@section('heading','Video Management')

@section('content')
<div class="row">

    <div class="col-sm-12">
        <div class="card">
            <div class="card">
                <div class="card-header ml-auto">
                    <a href="{{ route('admin.videos.create') }}" class="btn btn-relief-primary">+ Add video</a>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>URL</th>
                                        <th>Created</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($videos as $video)
                                    <tr>
                                        <td>{{ $video->title ?? 'N/A' }}</td>
                                        <td><a href="https://www.youtube.com/watch?v={{ $video->url ?? 'N/A' }}" target="_blank">Video URL</a></td>
                                        <td>{{ $video->updated_at->diffForHumans() ?? 'N/A' }}</td>
                                        <td>
                                            <div class="btn-group pull-right">
                                                <a href="{{ route('admin.videos.edit',$video->id) }}" class="btn btn-relief-dark">View</a>
                                                <form action="{{ route('admin.videos.destroy',$video->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-relief-danger" onclick="return confirm('Are you sure you want to delete?')" type="submit">Trash</button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
