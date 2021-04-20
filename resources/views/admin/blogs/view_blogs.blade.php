@extends('layouts.front')
@section('title', 'Home')

@section('content')

    <!-- =-=-=-=-=-=-= Blog & News =-=-=-=-=-=-= -->
    <section id="blog" class="custom-padding">
        <div class="container">
            <!-- title-section -->
            <div class="main-heading text-center">
                <h2>All Blogs</h2>
                <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
                </div>
                <p>Cras varius purus in tempus porttitor ut dapibus efficitur sagittis cras vitae lacus metus nunc vulputate facilisis nisi
                    <br>eu lobortis erat consequat ut. Aliquam et justo ante. Nam a cursus velit</p>
            </div>
            <!-- End title-section -->
            {{ csrf_field() }}
            <div class="" id="get_blogs">

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
       url:"{{ route('loadmore.load_blogs') }}",
       method:"POST",
       data:{id:id, _token:_token},
       success:function(data)
       {
        $('#load_more_button').remove();
        $('#get_blogs').append(data);
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
