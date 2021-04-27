@extends('layouts.front')
@section('title', $pwl->title)




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
                  <h3>{{ $pwl->title ?? '' }}</h3>

                  <div>
                    <img src="{{ asset($pwl->cover_photo) }}" style="width: 100%;">
                  </div>

                 </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <p>{!! $pwl->detail !!}</p>
          
                </div>
              </div>
            </div>


            <!-- Thread Reply End -->
          </div>

          <!-- Right Sidebar -->
          <div class="col-md-4 col-sm-12 col-xs-12 clearfix">

            <!-- sidebar -->
            <div class="side-bar card-help">

              <!-- widget -->
              <div class="widget" style="box-shadow: none;">
                <div class="recent-comments">
                  <h2>More Pqls</h2>
                  <hr class="widget-separator no-margin">
                  <ul>
                    @foreach($pwls as $pwl)
                      <li><a href="{{ route('pwl.detail', [$pwl->uuid, $pwl->slug]) }}"><img style="width: 20px;" src="{{ asset($pwl->avatar) }}"> {{ $pwl->name ?? '' }}</a></li>
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
