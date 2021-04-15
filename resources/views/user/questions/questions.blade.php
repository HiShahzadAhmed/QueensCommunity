@extends('layouts.front')
@section('title', 'Questions')




@section('content')
<div class="main-content-area">

    
    <section class="pt-3 white">
      <div class="container">
        <div class="row">
          
          <div class="col-sm-12 col-xs-12 col-md-4 mb-4">
            @include('user.components.sidebar')
          </div>
          
          </div>
          
          <div class="col-sm-12 col-md-8 mt-4">


            <div id="accordion" class="questions-section">

              @foreach(Auth::User()->questions as $question)

                <div class="card mb-4 card-help">
                <div class="card-header">
                  <h5 class="mb-0">
                    <h4  data-toggle="collapse" data-target="#{{ $loop->iteration }}collapseOne" aria-expanded="true" aria-controls="{{ $loop->iteration }}collapseOne">{{ $question->title }}</h4>
                  </h5>
                </div>

                <div id="{{ $loop->iteration }}collapseOne" class="collapse" data-parent="#accordion">
                  <div class="card-body">
                    {{ $question->detail }}
                    <hr>
                    <div class="row">
                      <div class="col-sm-6 text-left">
                          <h4>Category: <strong>{{ $question->category }}</strong></h4>
                          <h4>Tags: <strong>{{ $question->tags }}</strong></h4>
                      </div>
                      <div class="col-sm-6 text-right">
                        <div class="btn-group mt-3">
                          <a href="{{ route('question.detail', $question->slug) }}" class="btn btn-sm btn-info">More detail</a>
                          <a href="{{ route('user.edit.question', base64_encode($question->id)) }}" class="btn btn-sm btn-success">Edit</a>
                          <a href="{{ route('user.remove.question', base64_encode($question->id)) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              @endforeach

              

            </div>

          </div>




          <div class="clearfix"></div>
        </div>
      </div>
      <!-- end container -->
    </section>
    <!-- =-=-=-=-=-=-= Post QuestionEnd =-=-=-=-=-=-= -->
  </div>
@endsection
