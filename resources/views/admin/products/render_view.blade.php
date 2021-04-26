            @php
                $output = '';
                $last_id = '';
            @endphp
            <div class="row">
                @foreach($data as $video)
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="blog-grid">
                        <iframe  src="https://www.youtube.com/embed/{{ $video->url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="blog-content">
                            <h5>{{ $video->title }}</h5>
                            <p>{{ $video->description }}</p>
                        </div>
                    </div>
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
