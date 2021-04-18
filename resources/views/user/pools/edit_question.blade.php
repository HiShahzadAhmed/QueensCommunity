@extends('layouts.front')
@section('title', 'Update Question')




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

            <div class="box-panel pt-2">
              <!-- form login -->
              <form class="" method="POST" action="{{ route('user.update.question') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $id }}">
                <div class="form-group">
                  <label>Question Title</label>
                  <input type="text" name="title" value="{{ $question->title }}" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Category</label>
                  <select class="questions-category form-control" name="category" style="height: 55px">
                    <option selected="" value="{{ $question->category }}" hidden="">{{ $question->category }}</option>
                    <option value="Fashion">Fashion</option>
                    <option value="Beauty">Beauty</option>
                    <option value="Lifestyle">Lifestyle</option>
                    <option value="Wedding">Wedding</option>
                    <option value="Wellness">Wellness</option>
                    <option value="Entertainment">Entertainment</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Tags</label>

                  <input type="text" id="tags" value="{{ $question->tags }}" name="tags" class="form-control" data-role="tagsinput" required="">
                </div>

                <div class="form-group">
                  <label>Question Detials</label>
                  <textarea cols="12" rows="12" id="message" name="detail" class="form-control" required="">{{ $question->detail }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary pull-right">Save changes </button>

              </form>
              <!-- form login -->

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
