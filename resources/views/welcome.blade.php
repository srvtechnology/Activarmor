@extends('layouts.app')

@section('title')
<title>Home</title>
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
    <div class="banner" style="background: url({{url('/')}}/storage/app/public/banner_min/{{$banner->image}});background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  width: 100%;
  min-height: 100vh;
  margin-top: 88px;
  transform: translateY(0px);">
      <div class="max-theme-width">
        <div>
          <div class="heading">
            @foreach(@$heading as $value)
            <h4 class="custom">{!!@$value->name!!}</h4>
            @endforeach
            {{-- <h4 class="water">{{@$banner->banner_heading_one}}</h4>
            <h4 class="custom">{{@$banner->banner_heading_two}}</h4>
            <h4 class="casts">{{@$banner->banner_heading_three}}</h4>
            <h4 class="splints">{{@$banner->banner_heading_four}}</h4> --}}
          </div>
          <div class="list-main">
            @foreach(@$sub_heading as $value)
            <div class="list-item">
              <img src="{{asset('public/frontend/assets/img/home/banner/check.png')}}" alt="" />
              <span>{!!@$value->name!!}</span>
            </div>
            @endforeach
            {{-- <div class="list-item">
              <img src="{{asset('public/frontend/assets/img/home/banner/check.png')}}" alt="" />
              <span>{{@$banner->heading_two}}</span>
            </div>
            <div class="list-item">
              <img src="{{asset('public/frontend/assets/img/home/banner/check.png')}}" alt="" />
              <span>{{@$banner->heading_three}}</span>
            </div>
            <div class="list-item">
              <img src="{{asset('public/frontend/assets/img/home/banner/check.png')}}" alt="" />
              <span>{{@$banner->heading_four}}</span>
            </div>
            <div class="list-item">
              <img src="{{asset('public/frontend/assets/img/home/banner/check.png')}}" alt="" />
              <span>{{@$banner->heading_five}} </span>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
    <!-- -- what-activarmor --  -->
    <div class="what-activarmor section-padding" style="padding: 60px 0;">
      <div class="max-theme-width">
        <div class="row">
          <div class="col-md-6 col-12 my-3 left-content">
            <img
              src="{{ URL::to('storage/app/public/what_min')}}/{{@$what->image}}"
              alt=""
            />
          </div>
          <div class="col-md-6 col-12 my-3">
            <h4 class="heading1">{{@$what->heading}}{{-- What is activarmor <span>TM</span>? --}}</h4>
            <p class="para1">
              {{@$what->description}}
            </p>
            @foreach(@$what_content as $value)
            <div class="activa-list">
              <div class="activa-list-img">
                <img
                  src="{{asset('public/frontend/assets/img/home/what-activarmor/checked.png')}}"
                  alt=""
                />
              </div>
              <div class="activa-list-content">
                <h4 class="heading2">{{@$value->heading}}</h4>
                <p class="para2">
                  {{@$value->description}}
                </p>
              </div>
            </div>
            @endforeach
            
          </div>
        </div>
      </div>
    </div>
    <!-- -- why-activarmor --  -->
    <div class="why-activarmor section-padding" id="why-activarmor">
      <div class="max-theme-width">
        <h4 class="heading">{{@$why->heading}}</h4>
        <p class="para">
          {{@$why->description}}
        </p>
        <div class="row">
          <div class="col-md-4 col-12 my-3">
            <div class="img">
              <img src="{{asset('public/frontend/assets/img/home/why-activarmor/student.png')}}" alt="">
            </div>
            <div class="heading2">
              <h4>{{@$why_content[0]->heading}}</h4>
            </div>
            <div class="para2">
              <p>{{@$why_content[0]->description}}</p>
            </div>
          </div>
          <div class="col-md-4 col-12 my-3">
            <div class="img">
              <img src="{{asset('public/frontend/assets/img/home/why-activarmor/copy.png')}}" alt="">
            </div>
            <div class="heading2">
              <h4>{{@$why_content[1]->heading}}</h4>
            </div>
            <div class="para2">
              <p>{{@$why_content[1]->description}}</p>
            </div>
          </div>
          <div class="col-md-4 col-12 my-3">
            <div class="img">
              <img src="{{asset('public/frontend/assets/img/home/why-activarmor/copy.png')}}" alt="">
            </div>
            <div class="heading2">
              <h4>{{@$why_content[2]->heading}}</h4>
            </div>
            <div class="para2">
              <p>{{@$why_content[2]->description}}</p>
            </div>
          </div>
          <div class="col-md-4 col-12 my-3">
            <div class="img">
              <img src="{{asset('public/frontend/assets/img/home/why-activarmor/prescription.png')}}" alt="">
            </div>
            <div class="heading2">
              <h4>{{@$why_content[3]->heading}}</h4>
            </div>
            <div class="para2">
              <p>{{@$why_content[3]->description}}</p>
            </div>
          </div>
          <div class="col-md-4 col-12 my-3">
            <div class="img">
              <img src="{{asset('public/frontend/assets/img/home/why-activarmor/mirror.png')}}" alt="">
            </div>
            <div class="heading2">
              <h4>{{@$why_content[4]->heading}}</h4>
            </div>
            <div class="para2">
              <p>{{@$why_content[4]->description}}</p>
            </div>
          </div>
          <div class="col-md-4 col-12 my-3">
            <div class="img">
              <img src="{{asset('public/frontend/assets/img/home/why-activarmor/healthcare.png')}}" alt="">
            </div>
            <div class="heading2">
              <h4>{{@$why_content[5]->heading}}</h4>
            </div>
            <div class="para2">
              <p>{{@$why_content[5]->description}}</p>
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
    <!-- -- footer --  -->
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