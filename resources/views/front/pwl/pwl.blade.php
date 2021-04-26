@extends('layouts.front')
@section('title', "Power Queens List")
@section('content')
<div class="main-content-area">
  <section class="section-padding-80 white question-details pt-3">
    <div class="container">
        

        <div class="text-center mt-0 pt-0 mb-4">
          <h2>Power Queens List {{ date('Y') }}</h2>
        </div>

      <div class="row">
        @foreach($pwls as $pwl)
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4 card-help text-center">      
          <a href="{{ route('pwl.detail', [$pwl->uuid, $pwl->slug]) }}">
            <img class="card-img-top" src="{{ asset($pwl->avatar) }}" alt="{{ $pwl->name ?? 'N/A' }}">
           <div class="card-body">
            <h5 >{{ $pwl->name ?? 'N/A' }}</h5>
          </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </section>
</div>
@endsection