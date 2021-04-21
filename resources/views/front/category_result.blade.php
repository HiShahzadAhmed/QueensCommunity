@extends('layouts.front')
@section('title', $keyword)

@section('content')

    <!-- =-=-=-=-=-=-= Latest Questions  =-=-=-=-=-=-= -->
    <section class="white padding-bottom-80 index-videos">
        <div class="container">
            <div class="row">

                <!-- Content Area Bar -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- title-section -->
                <div class="main-heading margin-top-30 text-center">
                    <h2>Read and watch</h2>
                    <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span></div>
                </div>
                </div>

                @foreach($videos as $video)
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="blog-grid card-help border-0">
                        <iframe  src="https://www.youtube.com/embed/{{ $video->url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="blog-content border-0">
                            <h5>{{ $video->title }}</h5>
                            <p>{{ Str::Limit($video->description, 80) }}</p>
                        </div>
                    </div>
                </div>

                @endforeach

                @foreach($blogs as $video)
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="blog-grid card-help border-0">
                        <iframe  src="https://www.youtube.com/embed/{{ $video->url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="blog-content border-0">
                            <h5>{{ $video->title }}</h5>
                            <p>{{ Str::Limit($video->description, 80) }}</p>
                        </div>
                    </div>
                </div>

                @endforeach
                

            </div>
        </div>
    </section>

    <section class="white padding-bottom-80">
        <div class="container">
            <div class="row">

     <!-- Content Area Bar -->
     <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- title-section -->
        <div class="main-heading margin-top-30 text-center">
            <h2>All Polls</h2>
            <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
            </div>
        </div>
        <!-- End title-section -->
        <div class="panel-body">
            <div class="tab-content">
                {{ csrf_field() }}
                <div class="" id="post_pools">

                </div>

            </div>
        </div>
    </div>

    </div>
    </div>
    <!-- end container -->
    </section>

@endsection
@section('js')

@endsection
