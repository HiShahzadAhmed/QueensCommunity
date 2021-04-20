@php
    $output = '';
    $last_id = '';
@endphp
<div class="row">
@forelse($data as $question)
<div class="col-md-4">
<!-- Question Listing -->
    <div class="listing-grid ">
        <div class="row">

            <div class="col-md-10 col-sm-8  col-xs-12">
                <span>{{ $question->category ?? '' }}</span>
                <h5><a  href="{{ route('question.detail', ['id' => $question->qid, 'slug' => $question->slug]) }}"> {{ $question->title ?? '' }}</a></h5>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12">
                <img src="{{ asset('front/assets') }}/img/question.svg" alt="Image">
            </div>
            <div class="col-md-12 col-sm-12  col-xs-12 margin-top-10">
                <h5>Top Answer</h5>
                <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                <h5>15 Answers</h5>
            </div>


            @if($question->is_anonymous)
                <div class="col-md-2 col-sm-4 col-xs-12 hidden-xs">
                    <img  class="img-responsive center-block" src="{{ asset('uploads/users/default.png') }}">
                </div>
                <div class="col-md-6 col-sm-4 col-xs-12 hidden-xs margin-top-20">
                    <a href="#">Anonymous</a>
                </div>
            @else

                <div class="col-md-2 col-sm-4 col-xs-12 hidden-xs">
                    <img  class="img-responsive center-block" src="{{ asset($question->user->avatar) }}">
                </div>
                <div class="col-md-6 col-sm-4 col-xs-12 hidden-xs margin-top-20">
                    <a href="#">{{ $question->user->name ?? '' }}</a>
                </div>

            @endif
                <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs margin-top-20">
                    <a href="{{ route('question.detail', ['id' => $question->qid, 'slug' => $question->slug]) }}" class="btn btn-primary btn-sm qbtn">Answer</a>
                </div>



        </div>
    </div>
<!-- Question Listing End -->
</div>
@php
$last_id = $question->id;
@endphp
@empty
<div class="text-center">
<h3 class="alert alert-warning">Ahhh! No Questions has been posted yet.</h3>
</div>

@endforelse
</div>
    <!-- Pagination View More -->
    <div class="text-center clearfix margin-top-20">
        <button class="btn btn-primary btn-md qbtn"  name="load_more_question"  data-id="{{ $last_id }}" id="load_more_question">View More Question</button>
    </div>
    <!-- Pagination View More End -->
