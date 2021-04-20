@extends('layouts.front')
@section('title', 'Go to Account')

@section('css')
<link rel="stylesheet" href="https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css?40">
<style>
.intl-tel-input{
  width: 100%;
}

.iti {
    width: 100%;
}
</style>
@endsection


@section('content')
<div class="main-content-area">

    <section class="section-padding-80 white" id="login">
        <div class="container">
          <div class="row">
              <div class="col-md-3"></div>
            <div class="col-md-6">

              <div class="card card-help p-4">
                <h4>Phone number in order to redirect to your desired place.<br> Awesome? Yeah fill it please</h4>
                @if(isset($invalid))
                  <h4 class="text-danger">Invalid PIN Code</h4>                
                @endif
                <hr>
                <!-- form login -->
                <form method="POST" action="{{ route('attempt.login') }}">
                  @csrf
                  

                  @if(!Session::has('phone'))

                    <div class="form-group">
                    <p id="output">Please enter a valid number below</p>
                    <input type="tel" id="phone" class="form-control" required="">
                    <input type="hidden" id="number" name="phone">
                  </div>

                  @endif


                  @if(Session::has('pin'))
                    <div class="form-group">
                      <p>Please Enter 4 digit PIN or  (<a href="{{ route('login') }}">Change phone number</a>)</p>
                      <input required="" type="number"  min="0" max="9999" id="pin" name="pin" class="form-control" >
                    </div>

                    @if(isset($is_role))
                      <div class="form-group">
                        <input type="checkbox" id="role" name="role" value="doctor">
                        <label for="role">Are you a doctor?</label>
                      </div>
                    @endif

                    
                  @endif

                  


                  <button type="submit" class="btn btn-primary btn-lg btn-block btn-submit">
                    
                  @if(Session::has('phone'))
                    Verify now
                  @else
                    Continue
                  @endif
                    
                  

                  </button>

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

@section('js')
<script src="https://intl-tel-input.com/node_modules/intl-tel-input/build/js/intlTelInput.js"></script>
<script>




var input = document.querySelector("#phone"),
  output = document.querySelector("#output");

var iti = window.intlTelInput(input, {
  nationalMode: true,
  utilsScript: "https://intl-tel-input.com/node_modules/intl-tel-input/build/js/utils.js"
});

var handleChange = function() {
  var text = (iti.isValidNumber()) ? "Phone number: " + iti.getNumber() : "Please enter a number below";

  if(iti.isValidNumber())
  {
    $('#number').val(iti.getNumber());
    $('.btn-submit').prop('disabled', false);
  }
  else
  {
    $('#number').val('');
    $('.btn-submit').prop('disabled', true);
  }


  var textNode = document.createTextNode(text);
  output.innerHTML = "";
  output.appendChild(textNode);
};

// listen to "keyup", but also "change" to update when the user selects a country
input.addEventListener('change', handleChange);
input.addEventListener('keyup', handleChange);



</script>
@endsection
