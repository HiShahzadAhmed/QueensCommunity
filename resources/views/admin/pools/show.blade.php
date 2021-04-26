@extends('layouts.admin')
@section('title','Question Management')
@section('heading','Question Management')

@section('content')


            <section class="page-users-view">
                <div class="row">
                    <!-- account start -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Question</div>
                            </div>
                            <div class="card-body">


                                    <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                                        <table>
                                            <tr>
                                                <td class="font-weight-bold"></td>
                                                <td> {{ ucfirst($pools->title ?? 'N/A') }}</td>
                                            </tr>

                                        </table>
                                    </div>


                            </div>
                        </div>
                    </div>
                    <!-- account end -->
                    <!-- information start -->
                    <div class="col-md-6 col-12 ">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title mb-2">Detail</div>
                            </div>
                            <div class="card-body">
                                {{ $pools->detail ?? 'N/A' }}
                            </div>
                        </div>
                    </div>
                    <!-- information start -->
                    <!-- social links end -->
                    <div class="col-md-6 col-12 ">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title mb-2"></div>
                            </div>
                            <div class="card-body">
                                <table>
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
                                        <td class="font-weight-bold">Status</td>
                                        <td><span class="badge badge-warning">{{ $pools->status ?? 'N/A' }}</span>
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

                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- social links end -->
                    <!-- permissions start -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom mx-2 px-0">
                                <h6 class="border-bottom py-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>Answers
                                </h6>
                            </div>
                            <div class="card-body px-75">
                                <div class="table-responsive users-view-permission">


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- permissions end -->
                </div>
            </section>
            <!-- page users view end -->


@endsection
