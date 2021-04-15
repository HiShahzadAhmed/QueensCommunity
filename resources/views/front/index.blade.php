@extends('layouts.front')
@section('title', 'Home')




@section('content')

<div class="full-section search-section">
    <div class="search-area container">
        <h3 class="search-title">Queen's Community</h3>
        <p class="search-tag-line">Welcome to Queen's Community Female Only Platform to Ask, Share and Consult Doctors About Health Related Issues.</p>
        <form autocomplete="off" method="get" class="search-form clearfix" id="search-form">
            <input type="text" title="* Please enter a search term!" placeholder="Type your search terms here" class="search-term " autocomplete="off">
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
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">

                    @foreach($trending_blogs as $trending)
                        <div class="carousel-item   @if ($loop->first) active @endif">
                          <img src="{{ asset($trending->featured_image) }}" alt="{{ $trending->slug }}">
                          <div class="carousel-caption d-none d-md-block">
                            <h4><a href="">{{ $trending->title }}</a></h4>
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
                    <div class="blog-grid">
                        <iframe  src="https://www.youtube.com/embed/{{ $video->url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="blog-content">
                            <h5>{{ $video->title }}</h5>
                            <p>{{ $video->description }}</p>
                        </div>
                    </div>
                </div>
                
                @endforeach

            </div>
            <!-- Row End -->
            <!-- Pagination View More -->
                <div class="text-center clearfix margin-top-10 margin-bottom-30">
                    <button class="btn btn-primary btn-lg qbtn">View All Videos</button>
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
                                    <div class="col-md-4">
                                        <!-- Question Listing -->
                                            <div class="listing-grid ">
                                                <div class="row">

                                                    <div class="col-md-10 col-sm-8  col-xs-12">
                                                        <span>Health</span>
                                                        <h5><a  href="#"> Change navbar color in Twitter Bootstrap 3</a></h5>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <img src="{{ asset('front/assets') }}/img/question.svg" alt="Image">
                                                    </div>
                                                    <div class="col-md-12 col-sm-12  col-xs-12 margin-top-10">
                                                        <h5>Top Answer</h5>
                                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                                        <h5>15 Answers</h5>
                                                    </div>

                                                    <div class="col-md-2 col-sm-4 col-xs-12 hidden-xs">
                                                        <a href="#"><img  class="img-responsive center-block" src="{{ asset('front/assets') }}/img/a.png" alt="User-Image"></a>
                                                    </div>
                                                    <div class="col-md-6 col-sm-4 col-xs-12 hidden-xs margin-top-20">
                                                        <a href="#">Anonymas</a>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs margin-top-20"">
                                                        <a href="#" class="btn btn-primary btn-sm qbtn">Answer</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Question Listing End -->
                                    </div>

                                    <div class="col-md-4">
                                        <!-- Question Listing -->
                                            <div class="listing-grid ">
                                                <div class="row">

                                                    <div class="col-md-10 col-sm-8  col-xs-12">
                                                        <span>Health</span>
                                                        <h5><a  href="#"> Change navbar color in Twitter Bootstrap 3</a></h5>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <img src="{{ asset('front/assets') }}/img/question.svg" alt="Image">
                                                    </div>
                                                    <div class="col-md-12 col-sm-12  col-xs-12 margin-top-10">
                                                        <h5>Top Answer</h5>
                                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                                        <h5>15 Answers</h5>
                                                    </div>

                                                    <div class="col-md-2 col-sm-4 col-xs-12 hidden-xs">
                                                        <a href="#"><img  class="img-responsive center-block" src="{{ asset('front/assets') }}/img/a.png" alt="User-Image"></a>
                                                    </div>
                                                    <div class="col-md-6 col-sm-4 col-xs-12 hidden-xs margin-top-20">
                                                        <a href="#">Anonymas</a>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs margin-top-20"">
                                                        <a href="#" class="btn btn-primary btn-sm qbtn">Answer</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Question Listing End -->
                                    </div>

                                    <div class="col-md-4">
                                        <!-- Question Listing -->
                                            <div class="listing-grid ">
                                                <div class="row">

                                                    <div class="col-md-10 col-sm-8  col-xs-12">
                                                        <span>Health</span>
                                                        <h5><a  href="#"> Change navbar color in Twitter Bootstrap 3</a></h5>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <img src="{{ asset('front/assets') }}/img/question.svg" alt="Image">
                                                    </div>
                                                    <div class="col-md-12 col-sm-12  col-xs-12 margin-top-10">
                                                        <h5>Top Answer</h5>
                                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                                        <h5>15 Answers</h5>
                                                    </div>

                                                    <div class="col-md-2 col-sm-4 col-xs-12 hidden-xs">
                                                        <a href="#"><img  class="img-responsive center-block" src="{{ asset('front/assets') }}/img/a.png" alt="User-Image"></a>
                                                    </div>
                                                    <div class="col-md-6 col-sm-4 col-xs-12 hidden-xs margin-top-20">
                                                        <a href="#">Anonymas</a>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs margin-top-20"">
                                                        <a href="#" class="btn btn-primary btn-sm qbtn">Answer</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Question Listing End -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Question Listing -->
                                            <div class="listing-grid ">
                                                <div class="row">

                                                    <div class="col-md-10 col-sm-8  col-xs-12">
                                                        <span>Health</span>
                                                        <h5><a  href="#"> Change navbar color in Twitter Bootstrap 3</a></h5>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <img src="{{ asset('front/assets') }}/img/question.svg" alt="Image">
                                                    </div>
                                                    <div class="col-md-12 col-sm-12  col-xs-12 margin-top-10">
                                                        <h5>Top Answer</h5>
                                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                                        <h5>15 Answers</h5>
                                                    </div>

                                                    <div class="col-md-2 col-sm-4 col-xs-12 hidden-xs">
                                                        <a href="#"><img  class="img-responsive center-block" src="{{ asset('front/assets') }}/img/a.png" alt="User-Image"></a>
                                                    </div>
                                                    <div class="col-md-6 col-sm-4 col-xs-12 hidden-xs margin-top-20">
                                                        <a href="#">Anonymas</a>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs margin-top-20"">
                                                        <a href="#" class="btn btn-primary btn-sm qbtn">Answer</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Question Listing End -->
                                    </div>

                                    <div class="col-md-4">
                                        <!-- Question Listing -->
                                            <div class="listing-grid ">
                                                <div class="row">

                                                    <div class="col-md-10 col-sm-8  col-xs-12">
                                                        <span>Health</span>
                                                        <h5><a  href="#"> Change navbar color in Twitter Bootstrap 3</a></h5>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <img src="{{ asset('front/assets') }}/img/question.svg" alt="Image">
                                                    </div>
                                                    <div class="col-md-12 col-sm-12  col-xs-12 margin-top-10">
                                                        <h5>Top Answer</h5>
                                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                                        <h5>15 Answers</h5>
                                                    </div>

                                                    <div class="col-md-2 col-sm-4 col-xs-12 hidden-xs">
                                                        <a href="#"><img  class="img-responsive center-block" src="{{ asset('front/assets') }}/img/a.png" alt="User-Image"></a>
                                                    </div>
                                                    <div class="col-md-6 col-sm-4 col-xs-12 hidden-xs margin-top-20">
                                                        <a href="#">Anonymas</a>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs margin-top-20"">
                                                        <a href="#" class="btn btn-primary btn-sm qbtn">Answer</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Question Listing End -->
                                    </div>

                                    <div class="col-md-4">
                                        <!-- Question Listing -->
                                            <div class="listing-grid ">
                                                <div class="row">

                                                    <div class="col-md-10 col-sm-8  col-xs-12">
                                                        <span>Health</span>
                                                        <h5><a  href="#"> Change navbar color in Twitter Bootstrap 3</a></h5>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <img src="{{ asset('front/assets') }}/img/question.svg" alt="Image">
                                                    </div>
                                                    <div class="col-md-12 col-sm-12  col-xs-12 margin-top-10">
                                                        <h5>Top Answer</h5>
                                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                                        <h5>15 Answers</h5>
                                                    </div>

                                                    <div class="col-md-2 col-sm-4 col-xs-12 hidden-xs">
                                                        <a href="#"><img  class="img-responsive center-block" src="{{ asset('front/assets') }}/img/a.png" alt="User-Image"></a>
                                                    </div>
                                                    <div class="col-md-6 col-sm-4 col-xs-12 hidden-xs margin-top-20">
                                                        <a href="#">Anonymas</a>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs margin-top-20"">
                                                        <a href="#" class="btn btn-primary btn-sm qbtn">Answer</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Question Listing End -->
                                    </div>
                                </div>
                            <!-- Pagination View More -->
                            <div class="text-center clearfix margin-top-20">
                                <button class="btn btn-primary btn-md qbtn">View All Question</button>
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
                                    <div class="col-md-4">
                                        <!-- Question Listing -->
                                            <div class="listing-grid ">
                                                <div class="row">

                                                    <div class="col-md-10 col-sm-8  col-xs-12">
                                                        <span>Health</span>
                                                        <h4><a  href="#"> What is your favourite color?</a></h4>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <img src="{{ asset('front/assets') }}/img/poll.png" alt="Image">
                                                    </div>
                                                    <div class="col-md-12 col-sm-12  col-xs-12 margin-top-10">
                                                        <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                          <label class="form-check-label" for="flexRadioDefault1">
                                                            Default radio
                                                          </label>
                                                        </div>
                                                        <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                          <label class="form-check-label" for="flexRadioDefault2">
                                                            Default checked radio
                                                          </label>
                                                        </div>
                                                        <h5>15 Votes</h5>
                                                    </div>

                                                    <div class="col-md-2 col-sm-4 col-xs-12 hidden-xs">
                                                        <a href="#"><img  class="img-responsive center-block" src="{{ asset('front/assets') }}/img/a.png" alt="User-Image"></a>
                                                    </div>
                                                    <div class="col-md-6 col-sm-4 col-xs-12 hidden-xs margin-top-20">
                                                        <a href="#">Anonymas</a>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs margin-top-20"">
                                                        <a href="#" class="btn btn-primary btn-sm qbtn">Results</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Question Listing End -->
                                    </div>

                                    <div class="col-md-4">
                                        <!-- Question Listing -->
                                            <div class="listing-grid ">
                                                <div class="row">

                                                    <div class="col-md-10 col-sm-8  col-xs-12">
                                                        <span>Health</span>
                                                        <h4><a  href="#"> What is your favourite color?</a></h4>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <img src="{{ asset('front/assets') }}/img/poll.png" alt="Image">
                                                    </div>
                                                    <div class="col-md-12 col-sm-12  col-xs-12 margin-top-10">
                                                        <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                          <label class="form-check-label" for="flexRadioDefault1">
                                                            Default radio
                                                          </label>
                                                        </div>
                                                        <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                          <label class="form-check-label" for="flexRadioDefault2">
                                                            Default checked radio
                                                          </label>
                                                        </div>
                                                        <h5>15 Votes</h5>
                                                    </div>

                                                    <div class="col-md-2 col-sm-4 col-xs-12 hidden-xs">
                                                        <a href="#"><img  class="img-responsive center-block" src="{{ asset('front/assets') }}/img/a.png" alt="User-Image"></a>
                                                    </div>
                                                    <div class="col-md-6 col-sm-4 col-xs-12 hidden-xs margin-top-20">
                                                        <a href="#">Anonymas</a>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs margin-top-20"">
                                                        <a href="#" class="btn btn-primary btn-sm qbtn">Results</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Question Listing End -->
                                    </div>

                                    <div class="col-md-4">
                                        <!-- Question Listing -->
                                            <div class="listing-grid ">
                                                <div class="row">

                                                    <div class="col-md-10 col-sm-8  col-xs-12">
                                                        <span>Health</span>
                                                        <h4><a  href="#"> What is your favourite color?</a></h4>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <img src="{{ asset('front/assets') }}/img/poll.png" alt="Image">
                                                    </div>
                                                    <div class="col-md-12 col-sm-12  col-xs-12 margin-top-10">
                                                        <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                          <label class="form-check-label" for="flexRadioDefault1">
                                                            Default radio
                                                          </label>
                                                        </div>
                                                        <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                          <label class="form-check-label" for="flexRadioDefault2">
                                                            Default checked radio
                                                          </label>
                                                        </div>
                                                        <h5>15 Votes</h5>
                                                    </div>

                                                    <div class="col-md-2 col-sm-4 col-xs-12 hidden-xs">
                                                        <a href="#"><img  class="img-responsive center-block" src="{{ asset('front/assets') }}/img/a.png" alt="User-Image"></a>
                                                    </div>
                                                    <div class="col-md-6 col-sm-4 col-xs-12 hidden-xs margin-top-20">
                                                        <a href="#">Anonymas</a>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs margin-top-20"">
                                                        <a href="#" class="btn btn-primary btn-sm qbtn">Results</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Question Listing End -->
                                    </div>

                                    <div class="col-md-4">
                                        <!-- Question Listing -->
                                            <div class="listing-grid ">
                                                <div class="row">

                                                    <div class="col-md-10 col-sm-8  col-xs-12">
                                                        <span>Health</span>
                                                        <h4><a  href="#"> What is your favourite color?</a></h4>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <img src="{{ asset('front/assets') }}/img/poll.png" alt="Image">
                                                    </div>
                                                    <div class="col-md-12 col-sm-12  col-xs-12 margin-top-10">
                                                        <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                          <label class="form-check-label" for="flexRadioDefault1">
                                                            Default radio
                                                          </label>
                                                        </div>
                                                        <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                          <label class="form-check-label" for="flexRadioDefault2">
                                                            Default checked radio
                                                          </label>
                                                        </div>
                                                        <h5>15 Votes</h5>
                                                    </div>

                                                    <div class="col-md-2 col-sm-4 col-xs-12 hidden-xs">
                                                        <a href="#"><img  class="img-responsive center-block" src="{{ asset('front/assets') }}/img/a.png" alt="User-Image"></a>
                                                    </div>
                                                    <div class="col-md-6 col-sm-4 col-xs-12 hidden-xs margin-top-20">
                                                        <a href="#">Anonymas</a>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs margin-top-20"">
                                                        <a href="#" class="btn btn-primary btn-sm qbtn">Results</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Question Listing End -->
                                    </div>

                                    <div class="col-md-4">
                                        <!-- Question Listing -->
                                            <div class="listing-grid ">
                                                <div class="row">

                                                    <div class="col-md-10 col-sm-8  col-xs-12">
                                                        <span>Health</span>
                                                        <h4><a  href="#"> What is your favourite color?</a></h4>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <img src="{{ asset('front/assets') }}/img/poll.png" alt="Image">
                                                    </div>
                                                    <div class="col-md-12 col-sm-12  col-xs-12 margin-top-10">
                                                        <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                          <label class="form-check-label" for="flexRadioDefault1">
                                                            Default radio
                                                          </label>
                                                        </div>
                                                        <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                          <label class="form-check-label" for="flexRadioDefault2">
                                                            Default checked radio
                                                          </label>
                                                        </div>
                                                        <h5>15 Votes</h5>
                                                    </div>

                                                    <div class="col-md-2 col-sm-4 col-xs-12 hidden-xs">
                                                        <a href="#"><img  class="img-responsive center-block" src="{{ asset('front/assets') }}/img/a.png" alt="User-Image"></a>
                                                    </div>
                                                    <div class="col-md-6 col-sm-4 col-xs-12 hidden-xs margin-top-20">
                                                        <a href="#">Anonymas</a>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs margin-top-20"">
                                                        <a href="#" class="btn btn-primary btn-sm qbtn">Results</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Question Listing End -->
                                    </div>

                                    <div class="col-md-4">
                                        <!-- Question Listing -->
                                            <div class="listing-grid ">
                                                <div class="row">

                                                    <div class="col-md-10 col-sm-8  col-xs-12">
                                                        <span>Health</span>
                                                        <h4><a  href="#"> What is your favourite color?</a></h4>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <img src="{{ asset('front/assets') }}/img/poll.png" alt="Image">
                                                    </div>
                                                    <div class="col-md-12 col-sm-12  col-xs-12 margin-top-10">
                                                        <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                          <label class="form-check-label" for="flexRadioDefault1">
                                                            Default radio
                                                          </label>
                                                        </div>
                                                        <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                          <label class="form-check-label" for="flexRadioDefault2">
                                                            Default checked radio
                                                          </label>
                                                        </div>
                                                        <h5>15 Votes</h5>
                                                    </div>

                                                    <div class="col-md-2 col-sm-4 col-xs-12 hidden-xs">
                                                        <a href="#"><img  class="img-responsive center-block" src="{{ asset('front/assets') }}/img/a.png" alt="User-Image"></a>
                                                    </div>
                                                    <div class="col-md-6 col-sm-4 col-xs-12 hidden-xs margin-top-20">
                                                        <a href="#">Anonymas</a>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs margin-top-20"">
                                                        <a href="#" class="btn btn-primary btn-sm qbtn">Results</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Question Listing End -->
                                    </div>
                                </div>
                            <!-- Pagination View More -->
                            <div class="text-center clearfix margin-top-20">
                                <button class="btn btn-primary btn-lg qbtn">View All Polls</button>
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
                <p>Cras varius purus in tempus porttitor ut dapibus efficitur sagittis cras vitae lacus metus nunc vulputate facilisis nisi
                    <br>eu lobortis erat consequat ut. Aliquam et justo ante. Nam a cursus velit</p>
            </div>
            <!-- End title-section -->
            <!-- Row -->
            <div class="row">
                <!-- Blog Grid -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="blog-grid">
                        <div class="blog-image">
                            <img alt="blog-image1" class="img-responsive" src="https://templates.scriptsbundle.com/knowledge/demo/images/blog/1.jpg">
                        </div>
                        <div class="blog-content">
                            <h5><a href="#">6 Summer-Friendly Moisturisers That Won't Make Your Skin Feel Sticky</a></h5>
                            <p>We can make table scrollable by adding table-responsive class to it, but how can we loop it so that once the loop ends..</p>
                        </div>
                        <div class="blog-footer">
                            <ul class="like-comment">
                                <li><a href="#"><i class="fa fa-heart"></i>23</a>
                                </li>
                            </ul> <a href="#" class="more-btn pull-right"><i class="fa fa-long-arrow-right"></i>READ</a>
                        </div>
                    </div>
                </div>
                <!-- Blog Grid -->
                <!-- Blog Grid -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="blog-grid">
                        <div class="blog-image">
                            <img alt="blog-image1" class="img-responsive" src="https://templates.scriptsbundle.com/knowledge/demo/images/blog/1.jpg">
                        </div>
                        <div class="blog-content">
                            <h5><a href="#">6 Summer-Friendly Moisturisers That Won't Make Your Skin Feel Sticky</a></h5>
                            <p>We can make table scrollable by adding table-responsive class to it, but how can we loop it so that once the loop ends..</p>
                        </div>
                        <div class="blog-footer">
                            <ul class="like-comment">
                                <li><a href="#"><i class="fa fa-heart"></i>23</a>
                                </li>
                            </ul> <a href="#" class="more-btn pull-right"><i class="fa fa-long-arrow-right"></i>READ</a>
                        </div>
                    </div>
                </div>
                <!-- Blog Grid -->
                <!-- Blog Grid -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="blog-grid">
                        <div class="blog-image">
                            <img alt="blog-image1" class="img-responsive" src="https://templates.scriptsbundle.com/knowledge/demo/images/blog/1.jpg">
                        </div>
                        <div class="blog-content">
                            <h5><a href="#">6 Summer-Friendly Moisturisers That Won't Make Your Skin Feel Sticky</a></h5>
                            <p>We can make table scrollable by adding table-responsive class to it, but how can we loop it so that once the loop ends..</p>
                        </div>
                        <div class="blog-footer">
                            <ul class="like-comment">
                                <li><a href="#"><i class="fa fa-heart"></i>23</a>
                                </li>
                            </ul> <a href="#" class="more-btn pull-right"><i class="fa fa-long-arrow-right"></i>READ</a>
                        </div>
                    </div>
                </div>
                <!-- Blog Grid -->
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
