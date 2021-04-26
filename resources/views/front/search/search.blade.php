@extends('layouts.front')
@section('title', 'Home')
@section('content')
<!-- =-=-=-=-=-=-= Latest Questions  =-=-=-=-=-=-= -->
<section class="white padding-bottom-80">
    <div class="container">
        <div class="panel-body">
            <div class="tab-content">
                <!-- Question Listing -->
                    <div class="row">
                            <div class="col-md-12">
                            <!-- Question Listing -->
                                <div class="listing-grid card-help">

                                        <div class="card-body p-0">
                                          <table class="table table-striped projects">
                                              <tbody>
                                                @forelse($questions as $question)
                                                  <tr>
                                                    <td><a target="_blank" href="{{ route('question.detail', ['id' => $question->qid, 'slug' => $question->slug]) }}">{{ $question->title }}  <span class="badge badge-info">Question</span></a></td>
                                                </tr>
                                                @empty
                                                <div class="text-center">
                                                    <h3 class="alert alert-warning">Ahhh! No Questions has been Found.</h3>
                                                </div>
                                                @endforelse
                                                  <!-- Blogs -->
                                                @forelse($blogs as $blog)
                                                <tr>
                                                  <td><a target="_blank" href="{{ route('blog.detail', $blog->slug) }}">{{ $blog->title }}  <span class="badge badge-info">Blog</span></a></td>
                                                </tr>
                                                @empty
                                                <div class="text-center">
                                                    <h3 class="alert alert-warning">Ahhh! No Blog has been Found.</h3>
                                                </div>
                                                @endforelse
                                                  <!-- End Blogs -->
                                                <!-- Pools -->
                                                @forelse($pools as $pool)
                                                <tr>
                                                  <td><a target="_blank" href="{{ route('pool.detail', ['id' => $pool->pid, 'slug' => $pool->slug]) }}">{{ $pool->title }}  <span class="badge badge-info">Pools</span></a></td>
                                                </tr>
                                                @empty
                                                <div class="text-center">
                                                    <h3 class="alert alert-warning">Ahhh! No Pools has been Found.</h3>
                                                </div>
                                                @endforelse
                                                  <!-- End Pools -->
                                                <!-- Videos -->
                                                @forelse($videos as $video)
                                                <tr>
                                                  <td><a target="_blank" href="">{{ $video->title }}  <span class="badge badge-info">Video</span></a></td>
                                                </tr>
                                                @empty
                                                <div class="text-center">
                                                    <h3 class="alert alert-warning">Ahhh! No Video has been Found.</h3>
                                                </div>
                                                @endforelse
                                                  <!-- End Videos -->
                                              </tbody>
                                          </table>
                                        </div>
                                        <!-- /.card-body -->
                                      </div>
                                      <!-- /.card -->

                            <!-- Question Listing End -->
                        </div>

                    </div>

    </div>

</section>



@endsection
