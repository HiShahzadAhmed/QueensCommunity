@extends('layouts.admin')
@section('title','Category Management')
@section('heading','Category Management')

@section('content')
<div class="row">

    <div class="col-sm-12">
        <div class="card">
            <div class="card">
                <div class="card-header ml-auto">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-relief-primary">+ Add Category</a>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->category ?? 'N/A' }}</td>
                                        <td>{{ $category->sub_category ?? 'N/A' }}</td>
                                        <td>
                                            <div class="btn-group pull-right">
                                                <a href="{{ route('admin.categories.edit',$category->id) }}" class="btn btn-relief-dark">View</a>
                                                <form action="{{ route('admin.categories.destroy',$category->id) }}" method="POST">
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
