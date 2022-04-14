@extends('admin.layouts.app')


@section('title')
<title>Activarmor | Manage Common Use</title>
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
                    <h4 class="pull-left page-title">Manage Common Use</h4>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="clearfix"></div>
                    <div class="panel panel-default">
                        <div class="panel-heading rm02 rm04">
                          @include('admin.includes.message')
                            <form role="form" action="{{route('admin.manage.common.use.update')}}" method="post" id="banner" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="page" value="" id="page">


                                  
                







                                <div class="form-group rm03">
                                  @if(@$data->image=='')
                                     <img src="{{ URL::to('public/admin/assets/images/videos2.jpg')}}" style="width: 100%;height: 400px" id="img2">
                                  @else
                                    <img src="{{ URL::to('storage/app/public/common_min')}}/{{@$data->image}}" style="width: 100%;height: 400px" id="img2">
                                  @endif            
                                 </div>

                                

                                  <div class="form-group">
                                        <label for="Email">Image</label>
                                        <div class="uplodimgfil">
                                            <input type="file" name="image" id="icon" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" onchange="fun1()" />
                                           {{--  <input type="file" id="icon" name="image"   class="inputfile inputfile-1" onchange="fun1()">
                                             <input type="hidden" name="profile_picture"  > --}}
                                            <label for="icon">Upload Image<img src="{{ URL::to('public/admin/assets/images/clickhe.png')}}" alt=""></label>
                                        </div>
                                       <div id="err_image"></div>
                                  </div>

                                  

                                  <div class="form-group rm03">
                                        <label for="Email">Heading</label>
                                        <input type="text" name="heading" class="form-control" value="{{@$data->heading}}">
                                   </div>

                                   <div class="form-group rm03">
                                        <label for="Email">Description</label>
                                        <textarea rows="5" class="form-control" name="description">{{@$data->description}}</textarea>
                                        
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
                  $('#banner').validate({
                  rules:{
                    heading:{
                      required:true,
                      // minlength : 10,
                      // maxlength:100,
                    },

                    description:{
                      required:true,
                      // minlength : 10,
                      // maxlength:100,
                    },

                    
                  },
                  ignore:[],
                  messages:{
                   
                  },
                  

                })
              })
             </script>





<script src="{{ URL::to('public/tiny_mce/tinymce.min.js') }}"></script>

@endsection
