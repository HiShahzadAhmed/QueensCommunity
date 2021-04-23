@php
    $output = '';
    $last_id = '';
@endphp
<div class="row">
    @foreach($videos as $video)
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="blog-grid card-help border-0">
            <iframe  src="https://www.youtube.com/embed/{{ $video->url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="blog-content border-0">
                <h5>{{ $video->title }}</h5>
                <p>{{ Str::Limit($video->description, 80) }}</p>
            </div>
        </div>
    </div>
    @php
        $last_id = $video->id;
    @endphp
    @endforeach


    @foreach($blogs as $blog)
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="blog-grid card-help">
            <div class="blog-image">
                <img alt="blog-image1" class="img-responsive" src="{{ asset($blog->featured_image) }}" style="min-height: 250px;">
            </div>
            <div class="blog-content">
                <h5><a href="{{ route('blog.detail', $blog->slug) }}">{{ $blog->title }}</a></h5>
                <p>{{ Str::Limit($blog->meta_description, 100) }}</p>
            </div>
            <div class="blog-footer">
                <ul class="like-comment">
                    </li>
                </ul> <a href="{{ route('blog.detail', $blog->slug) }}" class="more-btn pull-right"><i class="fa fa-long-arrow-right"></i>READ</a>
            </div>
        </div>
    </div>
    @php
    $last_id = $blog->id;
@endphp
@endforeach

</div>
    <!-- Pagination View More -->
    <div class="text-center clearfix margin-top-20">
        <button class="btn btn-primary btn-md qbtn"  name="load_more_data"  data-id="{{ $last_id }}" id="load_more_data">View More Data</button>
    </div>
    <!-- Pagination View More End -->
