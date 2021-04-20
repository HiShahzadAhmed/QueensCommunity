@php
$output = '';
$last_id = '';
@endphp
 <!-- Row -->
 <div class="row">
    <!-- Blog Grid -->
    @foreach ($data as $blogs)
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="blog-grid">
            <div class="blog-image">
                <img alt="blog-image1" class="img-responsive" src="https://templates.scriptsbundle.com/knowledge/demo/images/blog/1.jpg">
            </div>
            <div class="blog-content">
                <h5><a href="#">{{ Str::limit($blogs->title,20) }}</a></h5>
                <p>{{ Str::limit($blogs->meta_description,40) }}</p>
            </div>
            <div class="blog-footer">
                <ul class="like-comment">
                    <li><a href="#"><i class="fa fa-heart"></i>23</a>
                    </li>
                </ul> <a href="#" class="more-btn pull-right"><i class="fa fa-long-arrow-right"></i>READ</a>
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
