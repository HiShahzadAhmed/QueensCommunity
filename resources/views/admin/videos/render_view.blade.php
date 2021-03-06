            @php
                $output = '';
                $last_id = '';
            @endphp
            <div class="row">
                @foreach($data as $video)
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <a href="{{ route('video.detail', $video->slug) }}">
                        <div class="blog-grid card-help border-0">
                        <img src="{{ asset($video->thumbnail) }}" class="w-100" style="max-height: 300px;">
                        <div class="blog-content border-0">
                            <h5 title="{{ $video->title }}">{{ Str::Limit($video->title, 30) }}</h5>
                        </div>
                    </div>
                    </a>
                </div>
                @php
                $last_id = $video->id;
                @endphp
                @endforeach
            </div>
            <!-- Pagination View More -->
            <div class="text-center clearfix margin-top-10 mb-4 margin-bottom-30">
                <button class="btn btn-primary btn-md qbtn"  name="load_more_button"  data-id="{{ $last_id }}" id="load_more_button">View More Videos</button>
            </div>
            <!-- Pagination View More End -->
