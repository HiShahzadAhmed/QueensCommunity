@extends('layouts.front')
@section('title', $pool->title)
@section('content')
<div class="main-content-area">
  <section class="section-padding-80 white question-details pt-5">
    <div class="container">
      <!-- Row -->
      <div class="row">
        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
          <!-- Question Detail -->
          <!-- Question Listing -->
          <div class="listing-grid card-help">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 margin-bottom-40">
                <h3>{{ $pool->title ?? '' }}</h3>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12 pl-4">
                <form method="POST" action="{{ route('user.submit.pool.suggestion') }}">
                  @csrf
                  <input type="hidden" name="pool_id" value="{{ $pool->id }}">

                <ul class="list-group p-0">
                @foreach($pool->poolOptions as $option)


                <li class="list-group-item d-flex justify-content-between align-items-center p-1">
                  

                  <div class="form-check">
                  <input class="" type="radio" name="option" value="{{ $option->id }}" id="{{ $option->id }}">
                  <label class="form-check-label" for="{{ $option->id }}">
                    {{ $option->title }}
                  </label>
                </div>
                  <span class="badge badge-dark " style="font-size: 18px">{{ count($option->poolOptionResults) }}</span>
                </li>


                
                @endforeach
              </ul>


              @if(Auth::check())
                  <button type="submit" class="btn btn-dark btn-sm mt-2">update pool suggestion</button>
                @endif
              </div>
              </form>
            </div>
          </div>
          
        </div>
        <!-- Right Sidebar -->
        <div class="col-md-4 col-sm-12 col-xs-12 clearfix">
          <!-- sidebar -->
          <div class="side-bar">
            <!-- widget -->
            <div class="widget">
              <div class="recent-comments">
                <h2>More Pools</h2>
                <hr class="widget-separator no-margin">
                <ul>
                  @foreach($pools as $pool)
                  <li><a href="{{ route('pool.detail', ['id' => $pool->pid, 'slug' => $pool->slug]) }}">{{ $pool->title ?? '' }}</a></li>
                  @endforeach
                  
                </ul>
              </div>
            </div>
            <!-- widget -->
          </div>
          <!-- sidebar end -->
        </div>
        <!-- Right Sidebar End -->
      </div>
      <!-- Row End -->
    </div>
  </section>
</div>
@endsection