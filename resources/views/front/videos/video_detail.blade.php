@extends('layouts.front')
@section('title', $video->title)




@section('content')
<div class="main-content-area">

  <section class="section-padding-80 white question-details pt-5">
      <div class="container">
        <!-- Row -->
        <div class="row">
          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <!-- Question Detail -->

            <!-- Question Listing -->
            <div class="listing-grid card-help">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 margin-bottom-40">

                        <iframe class="w-100" style="height: 40vw;"  src="https://www.youtube.com/embed/{{ $video->url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  <h3 class="mt-3">{{ $video->title ?? '' }}</h3>
                 </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <p>{!! $video->description  !!}</p>
          
                </div>
              </div>
            </div>


            <!-- Thread Reply End -->
          </div>
        </div>
        <!-- Row End -->
      </div>

      <div class="container">
            <div class="row">

                <!-- Content Area Bar -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- title-section -->
                <div class="main-heading margin-top-30 text-center">
                    <h4>Queens Community Recommended Products</h4>
                    <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
                    </div>
                </div>

                <div class="row">
                                    @foreach($products as $product)
                                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                          <div class="blog-grid card-help border-0">
                                              <img src="{{ asset($product->image) }}" class="w-100" style="max-height: 250px;">
                                              <div class="blog-content border-0">
                                                  <h5>{{ $product->title }}</h5>
                                                  <p>{{ Str::Limit($product->detail, 60) }}</p>
                                                  <hr>
                                              <div class="row">
                                                <div class="col-sm-6 mr-auto"><h5>Price: {{ $product->price." PKR" }}</h5></div>
                                                <div class="col-sm-6 text-right"><a class="btn btn-primary btn-sm" target="_blank" href="{{ $product->url }}">BUY NOW</a></div>
                                              </div>
                                              </div>
                                          </div>
                                      </div>

                                      @endforeach
                                </div>

            </div>
        </div>


    </section>  

</div>
@endsection
