@extends('layouts.front')
@section('title', 'Home')

@section('content')

    <!-- =-=-=-=-=-=-= Latest Questions  =-=-=-=-=-=-= -->
    <section class="white padding-bottom-80">
        <div class="container">
            <div class="row">

                <!-- Content Area Bar -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- title-section -->
                <div class="main-heading margin-top-30 text-center">
                    <h2>All Questions</h2>
                    <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
                    </div>
                </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <!-- Question Listing -->
                                    {{ csrf_field() }}
                                    <div class="" id="post_data">

                                    </div>
                        </div>
                    </div>
                </div>
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
            <h2>All Polls</h2>
            <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
            </div>
        </div>
        <!-- End title-section -->
        <div class="panel-body">
            <div class="tab-content">
                {{ csrf_field() }}
                <div class="" id="post_pools">

                </div>

            </div>
        </div>
    </div>

    </div>
    </div>
    <!-- end container -->
    </section>

@endsection
@section('js')

<script>
    $(document).ready(function(){

     var _token = $('input[name="_token"]').val();

     load_data('', _token);

     function load_data(id="", _token)
     {
      $.ajax({
       url:"{{ route('loadmore.load_data') }}",
       method:"POST",
       data:{id:id, _token:_token},
       success:function(data)
       {
        $('#load_more_question').remove();
        $('#post_data').append(data);
       }
      })
     }

     $(document).on('click', '#load_more_question', function(){
      var id = $(this).data('id');
      $('#load_more_question').html('<b>Loading...</b>');
      load_data(id, _token);
     });

    });
    </script>

<script>
    $(document).ready(function(){

     var _token = $('input[name="_token"]').val();

     load_data('', _token);

     function load_data(id="", _token)
     {
      $.ajax({
       url:"{{ route('loadmore.load_pools') }}",
       method:"POST",
       data:{id:id, _token:_token},
       success:function(data)
       {
        $('#load_more_button').remove();
        $('#post_pools').append(data);
       }
      })
     }

     $(document).on('click', '#load_more_button', function(){
      var id = $(this).data('id');
      $('#load_more_button').html('<b>Loading...</b>');
      load_data(id, _token);
     });

    });
    </script>
@endsection
