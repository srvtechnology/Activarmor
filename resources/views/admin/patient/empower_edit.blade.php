@extends('admin.layouts.app')


@section('title')
<title>Activarmor | Edit  How & Empower</title>
@endsection

@section('style')
@include('admin.includes.style')
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
                    <h4 class="pull-left page-title">Edit  How & Empower</h4>
                    <ol class="breadcrumb pull-right">
                        <li class="active"><a href="{{route('admin.manage.empower')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                     @include('admin.includes.message')  
                    <div>
                        <!-- Personal-Information -->
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading">
                                <h3 class="panel-title">Edit  How & Empower</h3>
                            </div>
                            <div class="panel-body rm02 rm04">
                                <form role="form" action="{{route('admin.manage.empower.update')}}" method="POST" id="faq_form" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{@$data->id}}">


                                   
                                    <div class="form-group rm03">
                                                <label for="AboutMe">Heading</label>
                                                <input type="text"  name="heading"  class="form-control" value="{{@$data->heading}}" placeholder="heading">
                                    </div>

                                    <div class="form-group rm03">
                                              <label for="AboutMe">Description</label>
                                                <textarea style="height: 150px" name="description" id="description" class="form-control">{{@$data->description}}</textarea>
                                     </div>

                                     <div class="form-group">
                                        <label for="Email">Image (W X H: 489 X 541)</label>
                                        <div class="uplodimgfil">
                                            <input type="file" name="image" id="icon" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" onchange="fun1()" />
                                           {{--  <input type="file" id="icon" name="image"   class="inputfile inputfile-1" onchange="fun1()">
                                             <input type="hidden" name="profile_picture"  > --}}
                                            <label for="icon">Upload Image<img src="{{ URL::to('public/admin/assets/images/clickhe.png')}}" alt=""></label>
                                        </div>
                                       <div id="err_image"></div>
                                  </div>

                                  <div class="form-group rm03">
                                    {{-- <label>Image</label> --}}
                                  @if(@$data->image=='')
                                     <img src="{{ URL::to('public/admin/assets/images/videos2.jpg')}}" style="width: 25%;height: 300px" id="img2">
                                  @else
                                    <img src="{{ URL::to('storage/app/public/empower_min')}}/{{@$data->image}}" style="width: 25%;height: 300px" id="img2">
                                  @endif            
                                 </div>
                                    
                                <div class="clearfix"></div>
                                    <div class="col-lg-12"> <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button></div>
                                </form>

                            </div>
                        </div>
                        <!-- Personal-Information -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script>
        function fun1(){
        var i=document.getElementById('icon').files[0];
        var b=URL.createObjectURL(i);
        $("#img2").attr("src",b);
    }
</script>
<script>
    $(document).ready(function(){
       $("#faq_form").validate({
         rules: {
              
               heading:{
                required:true,
               },
               description:{
                required:true,
               },
               
              
          },
            
        messages: {
            heading:{
              required:'please enter heading',
            }, 
            description:{
              required:'please enter description',
            }, 
            
         },
         
        
      });
    })
</script>


@endsection
