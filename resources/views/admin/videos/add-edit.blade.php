@extends('layouts.admin')
@section('title','video Management')
@section('heading','video Management')
@section('css')
<style>
    .ck-editor__editable
    {
        min-height: 30vw !important;
    }
    .ck-file-dialog-button
    {
        display: none !important;
    }
</style>
@endsection
@section('content')
<div class="row">


        <div class="col-sm-12">
            <div class="card">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if((isset($video)))
                                <form action="{{ route('admin.videos.update',$video->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                            @else
                                <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data">
                            @endif
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $video->title ?? '' }}" required>
                                    </fieldset>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">URL</label>
                                        <input type="text" class="form-control" placeholder="ETUacdj8DJs" maxlength="11" name="url" required value="{{ $video->url ?? '' }}">
                                    </fieldset>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    {{-- CATEGORIES --}}
                                    <fieldset  class="form-group">
                                        <label>Category</label>
                                        <select class="questions-category form-control dynamic" id="category"  data-dependent="sub_category" name="category" >
                                            @if(isset($video->category))
                                            <option value="{{ $video->category }}" hidden>{{ $video->category }}</option>
                                            @endif
                                            @foreach (categories() as $data)
                                            <option hidden>Select Category</option>
                                            <option value="{{ $data->category }}">{{ $data->category }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset  class="form-group">
                                        <label>Sub Category</label>
                                        <select class="questions-category form-control" id="sub_category"  name="sub_category" >
                                            @if(isset($video->sub_category))
                                            <option value="{{ $video->sub_category }}" hidden>{{ $video->sub_category }}</option>
                                            @endif
                                        </select>
                                    </fieldset>
                                        {{ csrf_field() }}
                                        {{-- END CATEGORIES  --}}
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" id="description" name="description">{{ $video->description ?? 'My new description' }}</textarea>
                                    </fieldset>
                                </div>

                                <div class="col-xl-12 mb-2">
                                        <label>Image</label>
                                    <input type="file" name="thumbnail" class="form-control dropify" @if(!isset($video->thumbnail)) required @endif data-default-file="{{asset($video->thumbnail ?? '')}}">
                                </div>


                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group pull-right">
                                        <button class="btn btn-relief-primary" type="submit">Save Changes</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
@section('js')
{{-- CATEGORIES AJAX --}}
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
