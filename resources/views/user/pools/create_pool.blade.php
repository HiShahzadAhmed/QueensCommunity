@extends('layouts.front')
@section('title', 'Create Pool')

@section('css')
<style>
  .option-field
  {
    height: 30px !important;
    margin-bottom: 5px;
  }
</style>
@endsection



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

            <div class="box-panel">

              <h2>Create Your Pool</h2>
              <p>What people say about your pool just post and leave to members</p>
              <hr>
              <!-- form login -->
              <form class="margin-top-40" method="POST" action="{{ route('user.store.pool') }}">
                @csrf
                <div class="form-group">
                  <label>Pool Title</label>
                  <input type="text" name="title" placeholder="Title" class="form-control" required="">
                </div>

                <div class="form-group">
                  <label>Pool Options (double click on options to remove added options)</label>
                  <input type="text" name="option[]" class="form-control option-field" required="">
                  <input type="text" name="option[]" class="form-control option-field" required="">
                  <div class="append-fields"></div>
                  <div class="text-right">
                    <button type="button" class="btn btn-sm btn-success btn-append-fields">Add option</button>
                  </div>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="questions-category form-control dynamic" id="category"  data-dependent="sub_category" name="category" style="height: 55px">
                     <option selected hidden>Select Category</option>
                      @foreach (categories() as $data)
                         <option value="{{ $data->category }}">{{ $data->category }}</option>
                     @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                      <label>Sub Category</label>
                      <select class="questions-category form-control" id="sub_category"  name="sub_category" style="height: 55px">
                          <option value="" hidden selected>Select Sub Category</option>
                      </select>
                    </div>
                    {{ csrf_field() }}


                <div class="form-group">
                  <label>Tags</label>
                  <input type="text" id="tags" placeholder="nature, beauty, health" name="tags" class="form-control" data-role="tagsinput" required="">
                </div>

                <div class="form-group">
                  <label>Pool End Time</label>
                  <input type="datetime-local" name="ended_at" class="form-control" required="">
                </div>

                <div class="form-group text-right mb-0">
                  <input type="checkbox" name="is_anonymous" value="1">
                  <label>Post anonymously</label>
                </div>


                <button type="submit" class="btn btn-primary pull-right">Publish Your Pool</button>

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



@section('js')
<script>
  $( ".btn-append-fields" ).click(function() {

    $('.append-fields').append('<input type="text" name="option[]" class="form-control option-field appended-fields" required="">');

  });

  $(document).on('dblclick', '.appended-fields', function() {
    $(this).remove();
  });

</script>
<script>
    $(document).ready(function(){
     $('.dynamic').change(function(){
      if($(this).val() != '')
      {
       var select = $(this).attr("id");
       var value = $(this).val();
       var dependent = $(this).data('dependent');
       var _token = $('input[name="_token"]').val();
       $.ajax({
         url:"{{ route('category.fetch') }}",
         method:"POST",
        data:{select:select, value:value, _token:_token, dependent:dependent},
        success:function(result)
        {
         $('#'+dependent).html(result);
        }

       })
      }
     });

     $('#category').change(function(){
      $('#sub_category').val('');
     });



    });
    </script>
@endsection
