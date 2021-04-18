@extends('layouts.front')
@section('title', 'Dashboard')




@section('content')
<div class="main-content-area">

    <section class="pt-3 white">
      <div class="container">
        <div class="row">
          
          <div class="col-sm-12 col-xs-12 col-md-4 mb-4">
            @include('user.components.sidebar')
          </div>
          
          </div>
          
          <div class="col-sm-12 col-md-8 mt-4 ">
                
            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="card card-help">
                  <div class="card-body text-center">
                    <h2>Questions</h2>
                    <hr class="">
                    <h1 class="text-site">{{ count(Auth::User()->questions) }}</h1>
                    <hr>

                    <a href="{{ route('user.post.question') }}" class="btn btn-dark btn-block">Post new question</a>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="card card-help">
                  <div class="card-body text-center">
                    <h2>Pools</h2>
                    <hr class="">
                    <h1 class="text-site">{{ count(Auth::User()->pools) }}</h1>
                    <hr>

                    <a href="{{ route('user.create.pool') }}" class="btn btn-dark btn-block">Create new pool</a>
                  </div>
                </div>
              </div>
              
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
