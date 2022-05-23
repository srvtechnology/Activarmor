@extends('layouts.app')

@section('title')
<title>Contact Us</title>
@endsection

@section('style')
@include('includes.style')
<style type="text/css">.error{color: red} option{background: black}</style>
</style> 
@endsection
@php
 $data = DB::table('image')->where('id',1)->first();
@endphp

<meta property="og:url" content="{{URL::current()}}">
<meta property="og:image" content="{{ URL::to('storage/app/public/logo')}}/{{@$data->logo}}" alt="">




@section('body')
    
    @section('header')
    @include('includes.header')
    @endsection
  <!-- -- banner --  -->
  <div class="banner" style="  width: 100%;
  min-height: 65vh;
  margin-top: 78px;
  display: flex;
  background: url({{url('/')}}/storage/app/public/contact/{{$contact->image}});
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;">
    <div class="max-theme-width">
      <div class="heading">
            @foreach(@$heading as $value)
            <h4 class="custom" style="font-size: 60px;">{!!@$value->name!!}</h4>
            @endforeach
            
          </div>
          <div class="list-main my-auto">
            @foreach(@$sub_heading as $value)
            <div class="list-item">
              <img src="{{asset('public/frontend/assets/img/home/banner/check.png')}}" alt="" />
              <span>{!!@$value->name!!}</span>
            </div>
            @endforeach
            
          </div>
    </div>
  </div>

<!-- -- contact --  -->
    <div class="contact-us section-padding" id="contact_section" style="background: url({{url('/')}}/storage/app/public/bg_image/{{$contact->bg_image}});background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  width: 100%;
  min-height: 100vh;
  transform: translateY(0px);">
      <div class="max-theme-width">
        <h4 class="heading">CONTACT US</h4>
        <p class="para">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi
          harum aliquid id, nam excepturi eum.
        </p>
        <form id="contact" method="post" action="{{route('contact.us.submit')}}" >
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
                 <option value="{{@$value->name}} - {{+ @$value->phonecode}}">{{@$value->name}} (+ {{@$value->phonecode}})</option>
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

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2096468.504292492!2d48.83187540678634!3d28.27481225009731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fc5363fbeea51a1%3A0x74726bcd92d8edd2!2sKuwait!5e0!3m2!1sen!2sin!4v1653060248894!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

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
