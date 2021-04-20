@php
    $output = '';
    $last_id = '';
@endphp
 <div class="row">
    @forelse($data as $pool)
        <div class="col-md-4">
        <!-- Question Listing -->
            <div class="listing-grid ">
                <div class="row">

                    <div class="col-md-10 col-sm-8  col-xs-12">
                        <span>{{ $pool->category ?? '' }}</span>
                        <h4><a  href="#"> {{ $pool->title ?? '' }}</a></h4>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <img src="{{ asset('front/assets') }}/img/poll.png" alt="Image">
                    </div>
                    <div class="col-md-12 col-sm-12  col-xs-12 margin-top-10 ml-3">

                        @foreach($pool->poolOptions as $option)
                            <div class="form-check">
                              <input class="form-check-input" type="radio" disabled>
                              <label class="form-check-label" for="flexRadioDefault1">
                                {{ $option->title }}
                              </label>
                            </div>
                        @endforeach


                        <h5>15 Votes</h5>
                    </div>

                    <div class="col-md-2 col-sm-4 col-xs-12 hidden-xs">
                        <a href="#"><img  class="img-responsive center-block" src="{{ asset('front/assets') }}/img/a.png" alt="User-Image"></a>
                    </div>
                    <div class="col-md-6 col-sm-4 col-xs-12 hidden-xs margin-top-20">
                        <a href="#">Anonymas</a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs margin-top-20">
                        <a href="#" class="btn btn-primary btn-sm qbtn">Results</a>
                    </div>
                </div>
            </div>
        <!-- Question Listing End -->
    </div>
    @php
       $last_id = $pool->id;
    @endphp
    @empty
        <div class="text-center">
            <h3 class="alert alert-warning">Ahhh! No Questions has been posted yet.</h3>
        </div>
    @endforelse
</div>
    <!-- Pagination View More -->
    <div class="text-center clearfix margin-top-20">
        <button class="btn btn-primary btn-md qbtn"  name="load_more_button"  data-id="{{ $last_id }}" id="load_more_button">View More Pools</button>
    </div>
    <!-- Pagination View More End -->
