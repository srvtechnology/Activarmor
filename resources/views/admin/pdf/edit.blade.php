@extends('admin.layouts.app')


@section('title')
<title>Activarmor | Edit Pdf</title>
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
                    <h4 class="pull-left page-title">Edit Pdf</h4>
                    <ol class="breadcrumb pull-right">
                        <li class="active"><a href="{{route('admin.manage.pdf')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a></li>
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
                                <h3 class="panel-title">Edit Pdf</h3>
                            </div>
                            <div class="panel-body rm02 rm04">
                                <form role="form" action="{{route('admin.manage.pdf.update')}}" method="POST" id="faq_form" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{@$data->id}}">


                                   
                                    <div class="form-group rm03">
                                                <label for="AboutMe">Title</label>
                                                <input type="text"  name="title"  class="form-control"  placeholder="title" value="{{@$data->name}}" disabled>
                                    </div>


                                    <div class="form-group">
                                        <label for="Email">Image</label>
                                        <div class="uplodimgfil">
                                            <input type="file" name="pdf" id="icon" class="inputfile inputfile-1"/ accept=".pdf"/>
                                           
                                            <label for="icon">Upload Pdf<img src="{{ URL::to('public/admin/assets/images/clickhe.png')}}" alt=""></label>
                                        </div>
                                       <div id="err_image"></div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="form-group">
                                        <label for="Email">Previous Uploaded Pdf</label>
                                        <br>
                                        <a href="{{route('admin.manage.pdf.download',['id'=>@$data->pdf])}}" class="btn btn-success">Download Pdf</a>
                                       <div id="err_image"></div>
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
            title:{
                required:true,
               },
         },
            
        messages: {
            title:{
              required:'please enter title',
            }, 
         },
      });
    })
</script>


@endsection
