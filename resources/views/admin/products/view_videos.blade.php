@extends('layouts.front')
@section('title', 'Home')

@section('content')
<section id="blog" class="index-videos">
    <div class="container">
        <!-- title-section -->
        <div class="main-heading margin-top-30 text-center">
            <h2>All Videos</h2>
            <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
            </div>
        </div>
        <!-- End title-section -->
        <!-- Row -->
            {{ csrf_field() }}
            <div class="" id="get_videos">

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
       url:"{{ route('loadmore.load_videos') }}",
       method:"POST",
       data:{id:id, _token:_token},
       success:function(data)
       {
        $('#load_more_button').remove();
        $('#get_videos').append(data);
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
