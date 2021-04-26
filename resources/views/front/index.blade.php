@extends('layouts.front')
@section('title', 'Home')




@section('content')

<div class="full-section search-section" style="background-image: url({{ asset($setting['banner_bg'] ?? '')  }})">
    <div class="search-area container">
        <h3 class="search-title">{{$setting['banner_heading'] ?? ''}}</h3>
        <p class="search-tag-line">{{$setting['banner_description'] ?? ''}}</p>
        <form autocomplete="off" method="get" action="{{ route('search.form') }}" class="search-form clearfix" id="search-form">
            <input type="text" title="* Please enter a search term!" name="q"  placeholder="Type your search terms here" class="search-term " autocomplete="off">
            <input type="submit" value="Search" class="search-btn">
        </form>
    </div>
</div>

<div class="main-content-area">

    <div class="container padding-40">
        <!-- title-section -->
            <div class="main-heading margin-top-30 text-center">
                <h2>Trending</h2>
                <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
                </div>
            </div>
            <!-- End title-section -->
        <div class="row">
            <div class="col-md-9">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">

                    @foreach($trending_blogs as $trending)
                        <div class="carousel-item   @if ($loop->first) active @endif">
                          <img src="{{ asset($trending->featured_image) }}" alt="{{ $trending->slug }}">
                          <div class="carousel-caption d-none d-md-block">
                            <h4><a href="{{ route('blog.detail', $trending->slug) }}">{{ $trending->title }}</a></h4>
                          </div>
                        </div>
                    @endforeach
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>

            <div class="col-md-3 text-center " >
                <img src="{{ asset('front/assets') }}/img/zachabachaad.jpeg" alt="Banner">
            </div>
        </div>
    </div>

    <!-- =-=-=-=-=-=-= Blog & News =-=-=-=-=-=-= -->
    <section id="blog" class="index-videos">
        <div class="container">
            <!-- title-section -->
            <div class="main-heading margin-top-30 text-center">
                <h2>Latest Videos</h2>
                <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
                </div>
            </div>
            <!-- End title-section -->
            <!-- Row -->

            <div class="row">

                @foreach($videos as $video)
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <a href="{{ route('video.detail', $video->slug) }}">
                        <div class="blog-grid card-help border-0">
                        <img src="{{ asset($video->thumbnail) }}" class="w-100" style="max-height: 300px;">
                        <div class="blog-content border-0">
                            <h5 title="{{ $video->title }}">{{ Str::Limit($video->title, 30) }}</h5>
                        </div>
                    </div>
                    </a>
                </div>

                @endforeach

            </div>
            <!-- Row End -->
            <!-- Pagination View More -->
                <div class="text-center clearfix margin-top-10 margin-bottom-30">
                    <a href="{{ route('view.videos') }}" class="btn btn-primary btn-md qbtn">View All Videos</a>
                </div>
            <!-- Pagination View More End -->
        </div>
        <!-- end container -->
    </section>
    <!-- =-=-=-=-=-=-= Blog & News end =-=-=-=-=-=-= -->


    <!-- =-=-=-=-=-=-= Latest Questions  =-=-=-=-=-=-= -->
    <section class="white padding-bottom-80">
        <div class="container">
            <div class="row">

                <!-- Content Area Bar -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- title-section -->
                <div class="main-heading margin-top-30 text-center">
                    <h2>Latest Questions</h2>
                    <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
                    </div>
                </div>
                <!-- End title-section -->
                    <div class="panel-body">
                        <div class="tab-content">
                            <!-- Question Listing -->

                                <div class="row">
                                    @forelse($questions as $question)
                                        <div class="col-md-4">
                                        <!-- Question Listing -->
                                            <div class="listing-grid card-help">
                                                <div class="row">

                                                    <div class="col-md-10 col-sm-8  col-10">
                                                        <span>{{ $question->category ?? '' }}</span>
                                                        <h5><a  href="{{ route('question.detail', ['id' => $question->qid, 'slug' => $question->slug]) }}"> {{ $question->title ?? '' }}</a></h5>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-2">
                                                        <img class="front-icons" src="{{ asset('front/assets') }}/img/question.svg" alt="Image">
                                                    </div>
                                                    <div class="col-md-12 col-sm-12  col-xs-12 margin-top-10">
                                                        <h5>Answer</h5>
                                                        <p>{{ Str::Limit($question->questionAnswers[0]->answer ?? '' , 100) }}</p>
                                                        <h5>{{ count($question->questionAnswers) }} Answers</h5>
                                                    </div>


                                                    @if($question->is_anonymous)
                                                        <div class="col-md-2 col-sm-4 col-2 hidden-xs">
                                                            <img  class="img-responsive center-block front-icons" src="{{ asset('uploads/users/default.png') }}">
                                                        </div>
                                                        <div class="col-md-6 col-sm-4 col-6 hidden-xs margin-top-20">
                                                            <a href="#">Anonymous</a>
                                                        </div>
                                                    @else

                                                        <div class="col-md-2 col-sm-4 col-xs-12 hidden-xs">
                                                            <img  class="img-responsive center-block front-icons" src="{{ asset($question->user->avatar) }}">
                                                        </div>
                                                        <div class="col-md-6 col-sm-4 col-xs-12 hidden-xs margin-top-20">
                                                            <a href="#">{{ $question->user->name ?? '' }}</a>
                                                        </div>

                                                    @endif
                                                        <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs margin-top-20">
                                                            <a href="{{ route('question.detail', ['id' => $question->qid, 'slug' => $question->slug]) }}" class="btn btn-primary btn-sm qbtn">Answers</a>
                                                        </div>
                                                </div>
                                            </div>
                                        <!-- Question Listing End -->
                                    </div>
                                    @empty
                                    <div class="text-center">
                                        <h3 class="alert alert-warning">Ahhh! No Questions has been posted yet.</h3>
                                    </div>
                                    @endforelse
                                </div>

                            <!-- Pagination View More -->
                            <div class="text-center clearfix margin-top-20">
                                <a href="{{ route('view.question') }}" class="btn btn-primary btn-md qbtn">View All Question</a>
                            </div>
                            <!-- Pagination View More End -->
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>

                <!-- Content Area Bar -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- title-section -->
                    <div class="main-heading margin-top-30 text-center">
                        <h2>Latest Polls</h2>
                        <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
                        </div>
                    </div>
                    <!-- End title-section -->
                    <div class="panel-body">
                        <div class="tab-content">
                            <!-- Question Listing -->
                                <div class="row">
                                    @foreach($pools as $pool)
                                        <div class="col-md-4">
                                        <!-- Question Listing -->
                                            <div class="listing-grid card-help">
                                                <div class="row">

                                                    <div class="col-md-10 col-sm-8  col-10">
                                                        <span>{{ $pool->category ?? '' }}</span>

                                                        <h4 class="">{{ $pool->title ?? '' }}</h4>
                                                        {{-- <h4><a  href="{{ route('pool.detail', ['id' => $pool->pid, 'slug' => $pool->slug]) }}"> </a></h4> --}}
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-2">
                                                        <img class="front-icons" src="{{ asset('front/assets') }}/img/poll.png" alt="Image">
                                                    </div>
                                                    <div class="col-md-12 col-sm-12  col-xs-12 margin-top-10 ">

                                                        @foreach($pool->poolOptions as $option)
                                                            <h5 class="alert alert-secondary p-1">{{ $option->title }}</h5>
                                                        @endforeach


                                                        <h5>{{ count($pool->poolOptionResults) }} Votes</h5>
                                                    </div>

                                                    <div class="col-md-12 text-right hidden-xs margin-top-20">
                                                        <a href="{{ route('pool.detail', ['id' => $pool->pid, 'slug' => $pool->slug]) }}" class="btn btn-primary btn-sm qbtn">Results</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Question Listing End -->
                                    </div>
                                    @endforeach
                                </div>
                            <!-- Pagination View More -->
                            <div class="text-center clearfix margin-top-20">
                                <a href="{{ route('view.polls') }}" class="btn btn-primary btn-md qbtn">View All Polls</a>

                            </div>
                            <!-- Pagination View More End -->
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- =-=-=-=-=-=-= Latest Questions  End =-=-=-=-=-=-= -->

    <!-- =-=-=-=-=-=-= Blog & News =-=-=-=-=-=-= -->
    <section id="blog" class="custom-padding">
        <div class="container">
            <!-- title-section -->
            <div class="main-heading text-center">
                <h2>Latest Blogs</h2>
                <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
                </div>
            </div>
            <!-- End title-section -->
            <!-- Row -->
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="blog-grid card-help">
                            <div class="blog-image">
                                <img alt="blog-image1" class="img-responsive" src="{{ asset($blog->featured_image) }}" style="min-height: 250px;">
                            </div>
                            <div class="blog-content">
                                <h5><a href="{{ route('blog.detail', $blog->slug) }}">{{ $blog->title }}</a></h5>
                                <p>{{ Str::Limit($blog->meta_description, 100) }}</p>
                            </div>
                            <div class="blog-footer">
                                <ul class="like-comment">
                                    </li>
                                </ul> <a href="{{ route('blog.detail', $blog->slug) }}" class="more-btn pull-right"><i class="fa fa-long-arrow-right"></i>READ</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Row End -->
            <!-- Pagination View More -->
                <div class="text-center clearfix margin-top-10 margin-bottom-20">
                    <button class="btn btn-primary btn-lg qbtn">View All Posts</button>
                </div>
            <!-- Pagination View More End -->
        </div>
        <!-- end container -->
    </section>
    <!-- =-=-=-=-=-=-= Blog & News end =-=-=-=-=-=-= -->
</div>

@endsection
