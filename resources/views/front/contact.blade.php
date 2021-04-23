@extends('layouts.front')
@section('title', "Contact")
@section('content')
<div class="main-content-area">
  <section class="section-padding-80 white question-details pt-5">
    <div class="container">
      
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
              
            <div class="card-help">
              <div class="card-body">
                <form method="POST" action="{{ route('submit.inquiry') }}">
                  @csrf
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" placeholder="John Doe" name="name" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" placeholder="Your Email" name="email" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <input type="number" min="0" placeholder="090078601" name="phone" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Message</label>
                  <textarea placeholder="Message" class="form-control" name="message" required=""></textarea>
                </div>

                <div class="text-right">
                  <button class="btn btn-primary btn-lg" type="submit">Submit my inquiry</button>
                </div>

              </form>
              </div>
            </div>
      
        </div>

                <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
            <div class="card-help">
              <div class="card-body">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54508.42549003572!2d74.14597626862088!3d31.36514363318736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3918ff9a30fa362d%3A0x528615a7981ce611!2sBahria%20Town%2C%20Lahore%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1619033728503!5m2!1sen!2s"  style="border:0; width: 100%; min-height: 500px;" allowfullscreen=""></iframe>
              </div>
            </div>
        </div>

  </div>
</div>
</section>
</div>
@endsection