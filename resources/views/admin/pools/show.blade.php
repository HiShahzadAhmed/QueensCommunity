@extends('layouts.admin')
@section('title','Pools Management')
@section('heading','Pools Management')

@section('content')


            <section class="page-users-view">
                <div class="row">
                    <!-- account start -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Pools</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                                        <table>
                                            <tr>
                                                <td class="font-weight-bold"></td>
                                                <td> {{ ucfirst($pools->title ?? 'N/A') }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                                        <table>
                                            <tr>
                                                <tr>
                                                    <td class="font-weight-bold">Category</td>
                                                    <td> {{ $pools->category ?? 'N/A' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Sub Category</td>
                                                    <td>{{ $pools->sub_category ?? 'N/A' }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="font-weight-bold">Tags</td>
                                                    <td>{{ $pools->tags ?? 'N/A' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Views</td>
                                                    <td>{{ $pools->views ?? 'N/A' }}
                                                    </td>
                                                </tr>
                                            </tr>
                                        </table>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- account end -->

                    <!-- permissions start -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom mx-2 px-0">
                                <h6 class="border-bottom py-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>Pools
                                </h6>
                            </div>
                            <div class="card-body px-75">
                                <div class="table-responsive users-view-permission">

                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Pools</th>
                                                <th>Result</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pools->poolOptions as $option)
                                            <tr>
                                                <td>   {{ $option->title }} </td>
                                                <td>{{ count($option->poolOptionResults) }}</td>
                                            </tr>
                                            @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- permissions end -->
                </div>
            </section>
            <!-- page users view end -->


@endsection
