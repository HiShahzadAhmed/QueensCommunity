@extends('layouts.admin')
@section('title','Product Management')
@section('heading','Product Management')

@section('content')
<div class="row">

    <div class="col-sm-12">
        <div class="card">
            <div class="card">
                <div class="card-header ml-auto">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-relief-primary">+ Add Product</a>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Link</th>
                                        <th>Created</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <th>{{ $product->title ?? 'N/A' }}</th>
                                        <th>{{ $product->price ?? 'N/A' }}</th>
                                        <th><a href="{{ $product->url ?? 'N/A' }}" target="_blank">URL</a></th>
                                        <td>{{ $product->created_at->diffForHumans() ?? 'N/A' }}</td>
                                        <td>
                                            <div class="btn-group pull-right">
                                                <a href="{{ route('admin.products.edit',$product->id) }}" class="btn btn-relief-dark">View</a>
                                                <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST">
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
