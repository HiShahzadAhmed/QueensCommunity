@extends('layouts.admin')
@section('title','PWL Management')
@section('heading','PWL Management')

@section('content')
<div class="row">

    <div class="col-sm-12">
        <div class="card">
            <div class="card">
                <div class="card-header ml-auto">
                    <a href="{{ route('admin.pwls.create') }}" class="btn btn-relief-primary">+ Add pwl</a>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Avatar</th>
                                        <th>Created</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pwls as $pwl)
                                    <tr>
                                        <td>{{ $pwl->title ?? 'N/A' }}</td>
                                        <td><img src="{{ asset($pwl->avatar) }}" class="img-fluid"></td>
                                        <td>{{ $video->created_at->diffForHumans() ?? 'N/A' }}</td>
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
