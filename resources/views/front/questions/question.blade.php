@extends('layouts.front')
@section('title', $question->title)




@section('content')
<div class="main-content-area">

  <section class="section-padding-80 white question-details pt-5">
      <div class="container">
        <!-- Row -->
        <div class="row">
          <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
            <!-- Question Detail -->

            <!-- Question Listing -->
            <div class="listing-grid ">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 margin-bottom-40">
                  <h3>{{ $question->title ?? '' }}</h3>
                 </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <p>{{ $question->detail ?? '' }}</p>
          
                </div>
              </div>
            </div>
            <!-- Question Listing End -->

            @forelse($question->questionAnswers as $answer)
              <div class="card-help p-3 mb-3">
                  <h4>{{ $answer->answer ?? '' }}</h4>
                  <hr>
                  <div class="media m-0">
                    <img class="answer-user-avatar" src="{{ asset($answer->user->avatar) }}">
                    <div class="media-body">
                      <h5 class="mt-0">{{ $answer->user->name }}</h5> 
                      <h6>{{ $answer->created_at->diffForHumans() }}</h6>
                    </div>
                  </div>
            </div>
            
            @empty
              <div class="text-center">
                  <h3 class="alert alert-warning">Ahhh! No Questions has been posted yet.</h3>
              </div>
            @endforelse


            <div class="clearfix"></div>
            <!-- Thread Reply -->
            <div class="thread-reply">
      
              <form method="POST" action="{{ route('user.post.question.answer') }}">
                @csrf
                <input type="hidden" name="question_id" value="{{ base64_encode($question->id) }}">
                <div class="form-group">
                  <label>Post Your Answer</label>
                  <textarea cols="12" rows="7" name="answer" class="form-control" placeholder="I Have The Aswert"></textarea>
                </div>
                @if(Auth::Check())
                  <button class="btn btn-primary btn-lg btn-block">Post Your Answer</button>
                @else
                  <a href="{{ route('login') }}" class="btn btn-primary btn-lg btn-block">Login to post answer</a>
                @endif

                
              </form>

            </div>
            <!-- Thread Reply End -->
          </div>

          <!-- Right Sidebar -->
          <div class="col-md-4 col-sm-12 col-xs-12 clearfix">

            <!-- sidebar -->
            <div class="side-bar">

              <!-- widget -->
              <div class="widget">
                <div class="recent-comments">
                  <h2>More Questions</h2>
                  <hr class="widget-separator no-margin">
                  <ul>
                    @foreach($hot_questions as $question)
                      <li><a href="{{ route('question.detail', ['id' => $question->qid, 'slug' => $question->slug]) }}">{{ $question->title ?? '' }}</a></li>
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
