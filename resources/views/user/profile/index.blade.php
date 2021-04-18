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
                  <div class="box-panel">
                      <!-- form login -->
                      <form action="{{ route('user.save.profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" placeholder="Name" value="{{ auth()->user()->name }}" name="name" class="form-control @error('name') is-invalid @enderror">
                          @error('name')
                            <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Gender</label>
                          <select class="form-control @error('gender') is-invalid @enderror" name="gender" style="height: 55px">
                            <option value="">Select Gender</option>
                            <option value="Male" @if(auth()->user()->gender == "Male") selected @endif >Male</option>
                            <option value="Female" @if(auth()->user()->gender == "Female") selected @endif >Female</option>
                          </select>
                          @error('gender')
                            <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" placeholder="Your Email" name="email" value="{{ auth()->user()->email }}" class="form-control @error('email') is-invalid @enderror">
                          @error('email')
                            <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Profile Image</label>
                          <input type="file" name="avatar" class="form-control dropify" data-default-file="{{asset(Auth::User()->avatar)}}">
                         
                        </div>

                        <button class="btn btn-primary btn-lg">Update Profile</button>

                      </form>
                      <!-- form login -->

                    </div>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                
                  <div class="card card-help">
                    <div class="box-panel">
                        <!-- form login -->
                        <form action="{{ route('user.save.pin') }}" method="POST">
                          @csrf
                          <div class="form-group">
                            <label>Pin</label>
                            <input type="password" maxlength="4" placeholder="PIN" name="pin" class="form-control @error('pin') is-invalid @enderror" value="{{ auth()->user()->pin }}">
                            @error('pin')
                              <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                          </div>

                          <button class="btn btn-primary btn-lg">Update Pin</button>

                        </form>
                        <!-- form login -->

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
