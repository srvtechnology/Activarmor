@extends('layouts.app')

@section('title')
<title>Doctor</title>
@endsection

@section('style')
@include('includes.style')
<style type="text/css">.error{color: red}
.provider_custom{
  color: white;
}
.provider_custom:hover{
  color: black !important;
  text-decoration: none;
}
option{background: black}

</style>
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
  margin-top: 80px;
  display: flex;
  background: url({{url('/')}}/storage/app/public/banner_min/{{$banner->image}});
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;">
      <div class="max-theme-width">
        <div class="list-main my-auto">
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
    </div>

    <!-- -- Lab --  -->
    <div class="lab section-padding">
      <div class="max-theme-width">
        <div class="row display-flex align-items-center">
          <div class="col-md-6 col-12 my-3">
            <div class="lab-img">
              <img src="{{ URL::to('storage/app/public/about')}}/{{@$why->image}}" alt="" />
            </div>
          </div>
          <div class="col-md-6 col-12 my-3">
            <div class="lab-content">
              <p class="para">
                {{@$why->description}}
              </p>
              <div class="lists">
                <img src="{{asset('public/frontend/assets/img/doctor/check.png')}}" alt="" />
                <p class="text">
                  {{@$why->heading_one}}
                </p>
              </div>
              <div class="lists">
                <img src="{{asset('public/frontend/assets/img/doctor/check.png')}}" alt="" />
                <p class="text">
                 {{@$why->heading_two}}
                </p>
              </div>
              <div class="lists">
                <img src="{{asset('public/frontend/assets/img/doctor/check.png')}}" alt="" />
                <p class="text">
                  {{@$why->heading_three}}
                </p>
              </div>
              <div class="lists">
                <img src="{{asset('public/frontend/assets/img/doctor/check.png')}}" alt="" />
                <p class="text">
                  {{@$why->heading_four}}
                </p>
              </div>
              <div class="lists">
                <img src="{{asset('public/frontend/assets/img/doctor/check.png')}}" alt="" />
                <p class="text">
                  {{@$why->heading_five}}
                </p>
              </div>
              <div class="lists">
                <img src="{{asset('public/frontend/assets/img/doctor/check.png')}}" alt="" />
                <p class="text">
                  {{@$why->heading_six}}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- -- Provider --  -->
    <div class="provider section-padding">
      <div class="max-theme-width">
        <h4 class="heading">become a provider</h4>
        <div class="provider-img-box">
          @foreach(@$provider as $value)
          <div class="provider-left-box">
            <img src="{{ URL::to('storage/app/public/provider_min')}}/{{@$value->image}}" alt="" />
          </div>
          @endforeach
          
        </div>
      </div>
    </div>


    <a href="{{asset('public/pdf.pdf')}}" download id="download_pdf" class="download_pdf"> </a>

    <!-- -- Common --  -->
    <div class="common section-padding">
      <div class="max-theme-width">
        <div class="row display-flex align-items-center reverse">

          <div class="col-md-6 col-12 my-3">
            <div class="common-content">
              <h4 class="heading">
                {{@$common->heading}}
              </h4>
              <div class="main-lists">
                <div class="row">
                  @foreach(@$uses as $value)
                  <div class="col-md-6 col-12">
                    <div class="lists" style="display: flex;
    align-items: center;
    gap: 15px;">
                      <img src="{{asset('public/frontend/assets/img/patients/check.png')}}" alt="">
                      <p class="text" style="color: #fff;
    margin-top: 15px;">{{@$value->name}}</p>
                    </div>
                  </div>
                  @endforeach
                  
                </div>
              </div>
              <p>
                @if(Session::has('suggestion'))
                  <div class="alert alert-success alert-dismissible" style="text-align: center; margin-top: 10px;">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                      <strong>
                          {!!Session::get('suggestion')!!}
                      </strong>
                  </div>
              @endif


              @if(Session::has('prescription'))
                  <div class="alert alert-success alert-dismissible" style="text-align: center; margin-top: 10px;">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                      <strong>
                          {!!Session::get('prescription')!!}
                      </strong>
                  </div>
              @endif

              @if(Session::has('register'))
                  <div class="alert alert-success alert-dismissible" style="text-align: center; margin-top: 10px;">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                      <strong>
                          {!!Session::get('register')!!}
                      </strong>
                  </div>
              @endif
              </p>

              
              <div class="btn-div my-3">
                @if(Auth::check())
                
                <a class="btn common-btn custom-button" href="{{route('download.pdf',['id'=>@$pdf[0]->pdf])}}" >Become a provider</a>
             
                @else
                <button class="btn common-btn custom-button" data-toggle="modal" data-target="#warning" >Become a provider</button>
                @endif

                @if(Auth::check())
                <a class="btn common-btn custom-button" href="{{route('download.pdf',['id'=>@$pdf[1]->pdf])}}"  {{-- class="btn common-btn custom-button" data-toggle="modal" data-target="#exampleModal" --}} >researches & outcomes</a>
                @else
                <button class="btn common-btn custom-button" data-toggle="modal" data-target="#warning" >researches & outcome</button>
                @endif
              </div>
              <div class="btn-div my-3">
                <button class="btn common-btn video_play" data-toggle="modal" data-target="#video_modal">Products info</a> <img src="{{asset('public/frontend/assets/img/doctor/play.png')}}" alt=""></button>

                
               @if(Auth::check())
                <a class="btn common-btn custom-button" href="{{route('download.pdf',['id'=>@$pdf[2]->pdf])}}" download {{-- class="btn common-btn" data-toggle="modal" data-target="#prescription_model" --}}>prescription</a>
                @else
                 <button class="btn common-btn" data-toggle="modal" data-target="#warning">prescription</button>
                @endif
                
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12 my-3">
            <div class="common-img">
              <img src="{{ URL::to('storage/app/public/common_min')}}/{{@$common->image}}" alt="" />
            </div>
          </div>
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

    @include('includes.footer')



<div class="modal fade" id="video_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content" style="width: 750px;height: 700px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Video</h5>
        
      </div>
      @php
      $youtube = DB::table('youtube_link')->where('id',1)->first();
      @endphp


      <div class="modal-body">
        <iframe width="700" height="500"
        src="https://www.youtube.com/embed/{{$youtube->code}}"}>
        </iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="location.reload()">Close</button>
        
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="prescription_model" tabindex="-1" role="dialog" aria-labelledby="prescription_id" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="prescription_id">Please Provide Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      @csrf  
      <div class="modal-body">
        <div class="modal-body">
         <form method="post" action="{{route('send.prescription')}}" enctype="multipart/form-data">
              @csrf
           <div class="form-card">
            @include('admin.includes.message')
             
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="First Name" name="first_name" required

                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Last Name" name="last_name" required
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Phone Number"  name="phone_number" required
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Email" name="email" required />
                </div>
              </div>
              <div class="col-md-12 col-12">
                <div class="form-group">
                  <textarea
                    rows="10"
                    class="form-control"
                    placeholder="Type your message here" name="comment" required
                  ></textarea>
                </div>
              </div>

              <div class="col-md-12 col-12">
                <div class="form-group">
                  <input type="file" class="form-control"  name="prescription" required />
                </div>
              </div>
        </div>
        </div>
        <div class="modal-footer">
          
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
      </form>
  </div>
</div>
</div>
</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Please give your suggestion/feedback</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('send.suggestions')}}">
      @csrf  
      <div class="modal-body">
        <div class="col-md-12 col-12">
              <div class="form-group">
                <textarea
                  rows="10"
                  class="form-control"
                  placeholder="Type your suggestion/feedback here" name="suggestion" required
                ></textarea>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send Message</button>
      </div>
    </form>
    </div>
  </div>
</div>



{{-- warning --}}
<div class="modal fade" id="warning" tabindex="-1" role="dialog" aria-labelledby="warninglabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="warninglabel">You are not authenticated user .Please Login.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('send.suggestions')}}">
      @csrf  
      <div class="modal-body">
        <div class="col-md-12 col-12">
              <div class="form-group">
                <p>Please login to download the pdf</p>
                <p><a href="#" class="loginModal_button">Click here to login</a></p>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       {{--  <button type="submit" class="btn btn-primary">Send Message</button> --}}
      </div>
    </form>
    </div>
  </div>
</div>



@include('includes.modal')








{{-- <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="prescription_model" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="prescription_model">Please Provide The Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="modal-body">
            <form method="post" action="{{route('send.prescription')}}" enctype="multipart/form-data">
              @csrf
           <div class="form-card">
            @include('admin.includes.message')
             
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="First Name" name="first_name" required

                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Last Name" name="last_name" required
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Phone Number"  name="phone_number" required
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Email" name="email" required />
                </div>
              </div>
              <div class="col-md-12 col-12">
                <div class="form-group">
                  <textarea
                    rows="10"
                    class="form-control"
                    placeholder="Type your message here" name="comment" required
                  ></textarea>
                </div>
              </div>

              <div class="col-md-12 col-12">
                <div class="form-group">
                  <input type="file" class="form-control"  name="prescription" required />
                </div>
              </div>
        </div>
        </div>
        <div class="modal-footer">
          
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
</div>
</div> --}}












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



{{-- <script>
    $(document).ready(function(){
      jQuery.validator.addMethod("validate_email", function(value, element) {
            if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
                return true;
            } else {
                return false;
            }
        }, "Please enter your email properly");
       $("#register_form").validate({
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
                remote: {
                          url:  '{{route('custom.register.check.mail')}}',
                          type: "POST",
                          data: {
                            email: function() {
                              return $( "#email").val() ;
                            },
                            _token: '{{ csrf_token() }}',
                          }
                   }
            },
            
            phone_number:{
                required:true,
            },
            password:{
                  required: true,
                  // minlength: 8
            },
            password_confirmation:{
                    required: true,
                    // minlength: 8,
                    equalTo: "#password"
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
              remote:'Someone already used this email.Try another.'
            },
            comment:{
              required:'Please enter comment',
            },
            phone_number:{
              required:'Please enter phone number',
            },
         },
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
       $("#login_form").validate({
         rules: {
            
            email:{
                required:true,
                validate_email:true,
            },
            
            password:{
                  required: true,
                  // minlength: 8
            },
            
         },
            
        messages: {
            
            email:{
              required:'Please enter email',
            },
            password:{
              required:'Please enter password',
            },
         },
      });
    })
</script> --}}

{{-- <script type="text/javascript">
  $(document).ready(function(){
    $('#loginModal_button').on('click',function(){
      $('#register_model').modal('hide');
      // alert('sayan');
      $('#loginModal').modal('show');
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#register_button').on('click',function(){
      $('#register_model').modal('show');
      // alert('sayan');
      $('#loginModal').modal('hide');
    });
  });
</script>


<script type="text/javascript">
  $(document).ready(function(){
     @if(Session::has('login_error'))
     $('#loginModal').modal('show');
     @endif
  })
</script> --}}





@endsection
