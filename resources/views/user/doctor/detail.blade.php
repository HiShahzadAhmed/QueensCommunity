@extends('layouts.front')
@section('title', 'Doctor Detail')



@section('content')
<div class="main-content-area">

    <section class="section-padding-80 white" id="login">
        <div class="container">
          <div class="row">
              <div class="col-md-3"></div>
            <div class="col-md-6">

              <div class="card card-help p-4">
                <h4>Your registration number required in order to activate your account at QueensCommunity as a doctor<br> Awesome? Yeah fill it please</h4>
                @if(isset($invalid))
                  <h4 class="text-danger">Invalid PIN Code</h4>                
                @endif
                <hr>
                <!-- form login -->
                <form method="POST" action="{{ route('update.doctor.detail') }}">
                  @csrf
                  <div class="form-group">
                      <p>Please Enter your registration number</a>)</p>
                      <input required="" type="number"  min="0" name="pmdc_no" class="form-control" >
                    </div>
                  <button type="submit" class="btn btn-primary btn-lg btn-block btn-submit">Submit Registration number</button>

                </form>
                <!-- form login -->

              </div>
            </div>
          <div class="col-md-3"></div>
            <div class="clearfix"></div>
          </div>
        </div>
        <!-- end container -->
      </section>

</div>
@endsection
