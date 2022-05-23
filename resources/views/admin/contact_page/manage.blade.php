@extends('admin.layouts.app')


@section('title')
<title>Activarmor | Manage Contact Page</title>
@endsection

@section('style')
@include('admin.includes.style')
<style type="text/css">
.uplodimgfilimg {
    margin-left: 20px;
    padding-top: 20px;
}
.uplodimgfilimg em {
    width: 58px;
    height: 58px;
    position: relative;
    display: inline-block;
    overflow: hidden;
    border-radius: 4px;
}

 .uplodimgfilimg em img{
    position: absolute;
    max-width: 100%;
    max-height: 100%;
  }
  .tox {
       height: 5x !important;
        width: 100% !important;
       margin-left: 2px;
 }
 .uplodimgfil label {
  width: 80%;

 }
</style>
@endsection

@section('content')
<!-- Top Bar Start -->
@include('admin.includes.header')
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->
@include('admin.includes.sidebar')
<!-- Left Sidebar End -->



<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Manage Contact Page</h4>
                    <ol class="breadcrumb pull-right">
                    <li class="active"><a href="{{route('admin.contact.page.manage.heading')}}">Heading Management</a></li>
                    
                    <li class="active"><a href="{{route('admin.contact.page.manage.sub.heading')}}">Sub Heading Management</a></li>
                  </ol>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="clearfix"></div>
                    <div class="panel panel-default">
                        <div class="panel-heading rm02 rm04">
                          @include('admin.includes.message')
                            <form role="form" action="{{route('admin.contact.page.update')}}" method="post" id="banner" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="page" value="" id="page">


                                  
                







                                <div class="form-group rm03">
                                  @if(@$data->image=='')
                                     <img src="{{ URL::to('public/admin/assets/images/videos2.jpg')}}" style="width: 100%;height: 400px" id="img2">
                                  @else
                                    <img src="{{ URL::to('storage/app/public/contact_min')}}/{{@$data->image}}" style="width: 100%;height: 400px" id="img2">
                                  @endif            
                                 </div>

                                

                                  <div class="form-group">
                                        <label for="Email">Image (W X H : 1707 × 508 px)</label>
                                        <div class="uplodimgfil">
                                            <input type="file" name="image" id="icon" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" onchange="fun1()" />
                                           {{--  <input type="file" id="icon" name="image"   class="inputfile inputfile-1" onchange="fun1()">
                                             <input type="hidden" name="profile_picture"  > --}}
                                            <label for="icon">Upload Image<img src="{{ URL::to('public/admin/assets/images/clickhe.png')}}" alt=""></label>
                                        </div>
                                       <div id="err_image"></div>
                                  </div>

                                  <div class="clearfix"></div>

                                  <div class="form-group">
                                        <label for="Email">Contact BG Image (W X H : 1750 × 802 px)</label>
                                        <div class="uplodimgfil">
                                            <input type="file" name="bg_image" id="icon2"  onchange="fun2()" />
                                           {{--  <input type="file" id="icon" name="image"   class="inputfile inputfile-1" onchange="fun1()">
                                             <input type="hidden" name="profile_picture"  > --}}
                                            <label for="icon2">Upload Image<img src="{{ URL::to('public/admin/assets/images/clickhe.png')}}" alt=""></label>
                                        </div>
                                       <div id="err_image"></div>
                                  </div>

                                  <div class="form-group rm03">
                                    {{-- <label>Image</label> --}}
                                  @if(@$data->bg_image=='')
                                     <img src="{{ URL::to('public/admin/assets/images/videos2.jpg')}}" style="width: 100%;height: 300px" id="img3">
                                  @else
                                    <img src="{{ URL::to('storage/app/public/bg_image')}}/{{@$data->bg_image}}" style="width: 100%;height: 300px" id="img3">
                                  @endif            
                                 </div>

                                  

                                  <div class="form-group rm03">
                                        <label for="Email">Email</label>
                                        <input type="text" name="email" class="form-control" value="{{@$data->email}}">
                                        
                                  </div>

                                  <div class="form-group rm03">
                                        <label for="Email">Address</label>
                                        <input type="text" name="address" class="form-control" value="{{@$data->address}}">
                                  </div>

                                  



                                
                               <div class="clearfix"></div>
                                <div class="rm05">
                                    <button class="btn btn-primary waves-effect waves-light w-md"
                                        type="submit">Save Changes</button>
                                </div>
                            </form>
                          </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- End row -->

        </div>
        <!-- container -->

    </div>
    <!-- content -->

    @include('admin.includes.footer')
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

@endsection

@section('script')
@include('admin.includes.script')
<script src="{{ URL::to('public/tiny_mce/tinymce.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
        function fun1(){
        var i=document.getElementById('icon').files[0];
        var b=URL.createObjectURL(i);
        $("#img2").attr("src",b);
    }
</script>

             <script type="text/javascript">
                 $(function(){
                   jQuery.validator.addMethod("validate_email", function(value, element) {
                    if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
                        return true;
                    } else {
                        return false;
                    }
                }, "Please enter your email properly");
                  $('#banner').validate({
                  rules:{
                    email:{
                    required:true,
                    validate_email:true,
                    },
                    address:{
                      required:true,
                    },
                  },
                  ignore:[],
                  messages:{
                   
                  },
                  

                })
              })
             </script>

<script>
        function fun2(){
        var i=document.getElementById('icon2').files[0];
        var b=URL.createObjectURL(i);
        $("#img3").attr("src",b);
    }
</script>



<script src="{{ URL::to('public/tiny_mce/tinymce.min.js') }}"></script>

@endsection
