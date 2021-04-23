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
                <h2>Questions & Pools</h2>
                <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
                </div>
            </div>
            <!-- End title-section -->
                <div class="panel-body">
                    <div class="tab-content">
                        <!-- Question Listing -->
                        {{ csrf_field() }}
                        <div class="" id="get_search_data">

                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <!-- Content Area Bar -->

    <!-- end container -->
</section>
<!-- =-=-=-=-=-=-= Blog & News =-=-=-=-=-=-= -->
<section id="blog" class="custom-padding">
    <div class="container">
        <!-- title-section -->
        <div class="main-heading text-center">
            <h2> Videos & Blogs</h2>
            <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
            </div>
        </div>
        <!-- End title-section -->
        <!-- Row -->
        {{ csrf_field() }}
        <div class="" id="get_data">

        </div>
        <!-- Row End -->

    </div>
    <!-- end container -->
</section>



@endsection
@section('js')
<script>
    $(document).ready(function(){

     var _token = $('input[name="_token"]').val();
     var q = "{{ $request->q }}" ;
     load_data('', _token);

     function load_data(id="", _token)
     {
      $.ajax({
       url:"{{ route('loadmore.load_search') }}",
       method:"POST",
       data:{id:id, q:q, _token:_token},
       success:function(data)
       {
        $('#load_more_button').remove();
        $('#get_search_data').append(data);
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
    {{-- FOr Video AND Blogs --}}
    <script>
    $(document).ready(function(){

     var _token = $('input[name="_token"]').val();
     var q = "{{ $request->q }}" ;
     load_more_data('', _token);

     function load_more_data(id="", _token)
     {
      $.ajax({
       url:"{{ route('loadmore.search_blogs_videos') }}",
       method:"POST",
       data:{id:id, q:q, _token:_token},
       success:function(data)
       {
        $('#load_more_data').remove();
        $('#get_data').append(data);
       }
      })
     }

     $(document).on('click', '#load_more_data', function(){
      var id = $(this).data('id');
      $('#load_more_data').html('<b>Loading...</b>');
      load_more_data(id, _token);
     });

    });
    </script>


@endsection
