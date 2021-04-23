@extends('layouts.front')
@section('title', $blog->title)




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
                  <h3>{{ $blog->title ?? '' }}</h3>
                 </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <p>{!! $blog->description  !!}</p>
          
                </div>
              </div>
            </div>

            <div class="text-center">
                <h6>Share Questions to Social Media with Freinds!</h6>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->full()}}" target="_blank" class="btn btn-website fb-color" rel="nofollow"><i class="fab fa-facebook"></i> Facebook</a>
                    <a  href="https://twitter.com/share?text=Free PNG by PNGUP&url={{url()->full()}}" target="_blank" class="btn btn-website twitter-color" rel="nofollow"><i class="fab fa-twitter"></i> Twitter</a>
                    <a href="http://pinterest.com/pin/create/button/?url={{url()->full()}}" class="btn btn-website pinterest-color" target="_blank"><i class="fab fa-pinterest"></i> Pinterest</a>
                    <a href="http://wa.me/?text={{url()->full()}}" class="btn btn-website whatsapp-color" target="_blank" rel="nofollow"><i class="fab fa-whatsapp"></i> Whatsapp</a>
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
                  <h2>More Blogs</h2>
                  <hr class="widget-separator no-margin">
                  <ul>
                    @foreach($blogs as $latest)
                      <li><a href="{{ route('blog.detail', $latest->slug) }}">{{ $latest->title ?? '' }}</a></li>
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
