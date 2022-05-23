@extends('admin.layouts.app')


@section('title')
<title>Activarmor | Add Sub Heading</title>
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
                    <h4 class="pull-left page-title">Add Sub Heading</h4>
                    <ol class="breadcrumb pull-right">
                        @if(@$type=="B")
                        <li class="active"><a href="{{route('admin.manage.sub.heading.banner')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a></li>
                        @elseif(@$type=="D")
                        <li class="active"><a href="{{route('admin.manage.doctor.banner.sub.heading.view')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a></li> 
                        @elseif(@$type=="C")
                        <li class="active"><a href="{{route('admin.contact.page.manage.sub.heading')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a></li> 
                        @else
                        <li class="active"><a href="{{route('admin.manage.patient.banner.sub.heading.view')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a></li>  
                        @endif
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
                                <h3 class="panel-title">Add Sub Heading</h3>
                            </div>
                            <div class="panel-body rm02 rm04">
                                <form role="form" action="{{route('admin.manage.sub.heading.insert')}}" method="POST" id="faq_form" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="type" value="{{@$type}}">


                                   
                                    <div class="form-group rm03">
                                                <label for="AboutMe">Heading</label>
                                                <input type="text"  name="name"  class="form-control" id="mytextarea"  placeholder="Heading" required> 
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


<script type="text/javascript">
    tinymce.init({
    selector: "#mytextarea",
    forced_root_block : "",
    relative_urls : false,
    entity_encoding: 'raw',

    
     plugins: [
    
    
  
    
    "emoticons template paste textcolor colorpicker textpattern imagetools"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft     aligncenter alignright alignjustify | bullist numlist outdent indent | link     image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    toolbar3: "cut,copy,paste,pastetext,pasteword,|outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,|,insertdate,inserttime,preview",
    toolbar4: "numlist bullist",
    image_advtab: true,
    templates: [
    {title: 'Test template 1', content: 'Test 1'},
    {title: 'Test template 2', content: 'Test 2'}
    ]
    });
    
    </script>


<script>
    $(document).ready(function(){
       $("#faq_form").validate({
        submitHandler: function(form){
            if(tinyMCE.get('mytextarea').getContent()==""){
              alert('Please enter sub heading');
              return false;
            }else{
                form.submit();
            }
           } 
      });
    })
</script>


@endsection
