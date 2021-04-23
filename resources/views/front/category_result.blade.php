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

                @foreach($blogs as $blog)
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="blog-grid card-help">
                            <div class="blog-image">
                                <img alt="blog-image1" class="img-responsive" src="{{ asset($blog->featured_image) }}" style="min-height: 250px;">
                            </div>
                            <div class="blog-content">
                                <h5><a href="{{ route('blog.detail', $blog->slug) }}">{{ $blog->title }}</a></h5>
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
                    <h2>hangout</h2>
                    <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span></div>
                </div>
                </div>

                @foreach($pools as $pool)
                                        <div class="col-md-4">
                                        <!-- Question Listing -->
                                            <div class="listing-grid card-help">
                                                <div class="row">

                                                    <div class="col-md-10 col-sm-8  col-10">
                                                        <span>{{ $pool->category ?? '' }}</span>
                                                        <h4><a  href="{{ route('pool.detail', ['id' => $pool->pid, 'slug' => $pool->slug]) }}"> {{ $pool->title ?? '' }}</a></h4>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-2">
                                                        <img class="front-icons" src="{{ asset('front/assets') }}/img/poll.png" alt="Image">
                                                    </div>
                                                    <div class="col-md-12 col-sm-12  col-xs-12 margin-top-10 ml-3">

                                                        @foreach($pool->poolOptions as $option)
                                                            <div class="form-check">
                                                              <input class="form-check-input" type="radio" disabled>
                                                              <label class="form-check-label" for="flexRadioDefault1">
                                                                {{ $option->title }}
                                                              </label>
                                                            </div>
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





                @foreach($questions as $question)
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
                                    @endforeach



                

            </div>
        </div>

    </section>

@endsection
@section('js')

@endsection
