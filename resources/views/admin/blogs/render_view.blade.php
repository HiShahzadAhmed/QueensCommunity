@php
$output = '';
$last_id = '';
@endphp
 <!-- Row -->
 <div class="row">
    <!-- Blog Grid -->
    @foreach ($data as $blogs)
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="blog-grid card-help">
            <div class="blog-image">
                <img alt="blog-image1" class="img-responsive" src="{{ asset($blogs->featured_image) }}" style="min-height: 250px;">
            </div>
            <div class="blog-content">
                <h5><a href="{{ route('blog.detail', $blogs->slug) }}">{{ $blogs->title }}</a></h5>
                                <p>{{ Str::Limit($blogs->meta_description, 100) }}</p>
            </div>
            <div class="blog-footer">
                                <ul class="like-comment">
                                    </li>
                                </ul> <a href="{{ route('blog.detail', $blogs->slug) }}" class="more-btn pull-right"><i class="fa fa-long-arrow-right"></i>READ</a>
                            </div>
        </div>
    </div>
    <!-- Blog Grid -->
    @php
    $last_id = $blogs->id;
    @endphp
    @endforeach

</div>
<!-- Row End -->
            <!-- Pagination View More -->
            <div class="text-center clearfix margin-top-10 mb-4 margin-bottom-30">
                <button class="btn btn-primary btn-md qbtn"  name="load_more_button"  data-id="{{ $last_id }}" id="load_more_button">View More Blogs</button>
            </div>
            <!-- Pagination View More End -->

