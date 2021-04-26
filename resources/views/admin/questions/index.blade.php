@extends('layouts.admin')
@section('title','Question Management')
@section('heading','Question Management')

@section('content')
<div class="row">

    <div class="col-sm-12">
        <div class="card">
            <div class="card">
                <div class="card-header ml-auto">

                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Created</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $question)
                                    <tr>
                                        <td>{{ $question->title ?? 'N/A' }}</td>
                                        <td>{{ $question->category ?? 'N/A' }}</td>
                                        <td>{{ $question->updated_at->diffForHumans() ?? 'N/A' }}</td>
                                        <td>
                                            <div class="btn-group pull-right">
                                                <a href="{{ route('admin.questions.show',$question->id) }}" class="btn btn-relief-dark">View</a>
                                                <form action="{{ route('admin.questions.destroy',$question->id) }}" method="POST">
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
