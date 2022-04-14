@extends('layouts.app')

@section('title')
<title>Contact Us</title>
@endsection

@section('style')
@include('includes.style')
<style type="text/css">.error{color: red} option{background: black}</style>
</style> 
@endsection





@section('body')
    
    @section('header')
    @include('includes.header')
    @endsection
  <!-- -- banner --  -->
  <div class="banner" style="  width: 100%;
  min-height: 65vh;
  margin-top: 78px;
  display: flex;
  background: url({{url('/')}}/storage/app/public/contact_min/{{$data->image}});
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;">
    <div class="max-theme-width">
      <h4 class="heading">contact us</h4>
    </div>
  </div>

<!-- -- contact --  -->
    <div class="contact-us section-padding" id="contact_section">
      <div class="max-theme-width">
        <h4 class="heading">CONTACT US</h4>
        <p class="para">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi
          harum aliquid id, nam excepturi eum.
        </p>
        <form id="contact" method="post" action="{{route('contact.us.submit')}}">
          @csrf
        <div class="form-card">
          @include('admin.includes.message')
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="First Name" name="first_name"

                />
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Last Name" name="last_name"
                />
              </div>
            </div>
            @php
            $countries = DB::table('countries')->get();
            @endphp
            <div class="col-md-6 col-12">
              <div class="form-group">
               
               <select class="form-control" name="country">
                <option value="">Select Country</option>
                @foreach($countries as $value) 
                 <option value="{{@$value->name}} - {{@$value->sortname}}">{{@$value->name}} ({{@$value->sortname}})</option>
                  @endforeach
               </select>
              
              </div>
            </div>

            <div class="col-md-6 col-12">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Phone Number"  name="phone_number"
                />
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Email" name="email" />
              </div>
            </div>

            <div class="col-md-6 col-12">
              <div class="form-group">
               
               <select class="form-control" name="type" id="type">
                <option value="">Select User Type</option>
                <option value="Patient">Patient</option>
                <option value="Doctor">Doctor</option>
                <option value="Provider">Provider</option>
               </select>
              
              </div>
            </div>

            <div class="col-md-12 col-12">
              <div class="form-group">
                <textarea
                  rows="10"
                  class="form-control"
                  placeholder="Type your message here" name="comment" id="comment"
                ></textarea>
              </div>
            </div>
            <div class="col-md-12 col-12">
              <div class="captcha">
                <img src="./assets/img/home/contact/captcha.png" alt="" />
              </div>
            </div>
            <div class="col-md-12 col-12">
              <div class="btn-div">
                <button class="btn btn-submit">SUBMIT</button>
              </div>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>

@include('includes.footer')

@include('includes.modal')
@endsection
@section('script')
@include('includes.script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

@if(Session::get('success'))
<script type="text/javascript">
  $([document.documentElement, document.body]).animate({
        scrollTop: $("#contact_section").offset().top
    }, 1000);
</script>
@endif


<script type="text/javascript">
  $(document).ready(function(){
    
    $('#type').on('change',function(e){
      var select = $('#type').val();
      if (select=='Patient') {
        $('#comment').attr("placeholder", "Please provide the information regarding your injury or type of injury.");
      }else{
        $('#comment').attr("placeholder", "Type your message here");

      }
    });
  })
</script>


<script>
    $(document).ready(function(){
      jQuery.validator.addMethod("validate_email", function(value, element) {
            if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
                return true;
            } else {
                return false;
            }
        }, "Please enter your email properly");
       $("#contact").validate({
         rules: {
            first_name:{
                required:true,
            },
            last_name:{
                required:true,
            },
            email:{
                required:true,
                validate_email:true,
            },
            comment:{
                required:true,
            },
            phone_number:{
                required:true,
                // minlenght:10,
                // maxlenght:10,
            },
            type:{
              required:true,
            },
            country:{
              required:true,
            },
         },
            
        messages: {
            first_name:{
              required:'please enter first name',
            }, 
            last_name:{
              required:'Please enter last name',
            },
            email:{
              required:'Please enter email',
            },
            comment:{
              required:'Please enter comment',
            },
            phone_number:{
              required:'Please enter phone number',
            },
            type:{
              required:'Please select type',
            },
            country:{
              required:'Please select country',
            },
         },
      });
    })
</script>
@endsection
