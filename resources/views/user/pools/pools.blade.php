@extends('layouts.front')
@section('title', 'Pools')




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

              @foreach(Auth::User()->pools as $pool)

                <div class="card mb-4 card-help">
                <div class="card-header">
                  <h5 class="mb-0">
                    <h4  data-toggle="collapse" data-target="#{{ $loop->iteration }}collapseOne" aria-expanded="true" aria-controls="{{ $loop->iteration }}collapseOne">{{ $pool->title }}</h4>
                  </h5>
                </div>

                <div id="{{ $loop->iteration }}collapseOne" class="collapse" data-parent="#accordion">
                  <div class="card-body">
                    <h3 class="font-weight-bold">{{ $pool->title }}</h3>
                    <hr>
                    @foreach($pool->poolOptions as $option)
                    <h4 class="alert alert-warning py-1"><strong>{{ $loop->iteration }}:</strong> {{ $option->title }}</h4>
                    @endforeach



                    <hr>
                    <div class="row">
                      <div class="col-sm-6 text-left">
                          <h4>Category: <strong>{{ $pool->category }}</strong></h4>
                          <h4>Tags: <strong>{{ $pool->tags }}</strong></h4>
                      </div>
                      <div class="col-sm-6 text-right">
                        <div class="btn-group mt-3">
                          <a href="{{ route('pool.detail', ['id' => $pool->pid, 'slug' => $pool->slug]) }}" class="btn btn-sm btn-info">More detail</a>
                          <a href="{{ route('user.remove.pool', base64_encode($pool->id)) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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
