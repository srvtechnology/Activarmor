@extends('admin.layouts.app')


@section('title')
<title>Activarmor | Manage Footer</title>
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
                    <h4 class="pull-left page-title">Manage Footer</h4>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                     @include('admin.includes.message')  
                    <div>
                        <!-- Personal-Information -->
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading">
                                <h3 class="panel-title">Manage Footer</h3>
                            </div>
                            <div class="panel-body rm02 rm04">
                                <form role="form" action="{{route('admin.manage.fotter.update')}}" method="POST" id="faq_form" enctype="multipart/form-data">
                                    @csrf

                                    


                                   
                                    <div class="form-group rm03">
                                                <label for="AboutMe">Facebook Link</label>
                                                <input type="text"  name="facebook"  class="form-control" id="facebook"  placeholder="Facebook Link" value="{{@$data->facebook}}" required> 
                                    </div>

                                    <div class="form-group rm03">
                                                <label for="AboutMe">Twitter Link</label>
                                                <input type="text"  name="twitter"  class="form-control" id="twitter"  placeholder="Twitter Link" value="{{@$data->twitter}}" required> 
                                    </div>

                                    <div class="form-group rm03">
                                                <label for="AboutMe">Instagram Link</label>
                                                <input type="text"  name="insta"  class="form-control" id="insta"  placeholder="Instagram Link" value="{{@$data->insta}}" required> 
                                    </div>

                                    <div class="form-group rm03">
                                                <label for="AboutMe">Youtube Link</label>
                                                <input type="text"  name="youtube"  class="form-control" id="youtube"  placeholder="Youtube Link" value="{{@$data->youtube}}" required> 
                                    </div>

                                    <div class="form-group rm03">
                                                <label for="AboutMe">Whatsapp Number</label>
                                                <input type="text"  name="wp"  class="form-control" id="wp"  placeholder="Whatsapp Number" value="{{@$data->wp}}" required> 
                                    </div>

                                    <div class="form-group rm03">
                                                <label for="AboutMe">Footer Description</label>
                                                <input type="text"  name="description"  class="form-control" id="description"  placeholder="Footer Description" value="{{@$data->description}}" required> 
                                    </div>

                                    <div class="form-group rm03">
                                                <label for="AboutMe">Copyright Text</label>
                                                <input type="text"  name="copyright" value="{{@$data->copyright}}"  class="form-control" id="copyright"  placeholder="Copyright Text" required> 
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
    $(document).ready(function(){
       $("#faq_form").validate({
        submitHandler: function(form){
            if(tinyMCE.get('mytextarea').getContent()==""){
              alert('Please enter heading');
              return false;
            }else{
                form.submit();
            }
           } 
      });
    })
</script>


@endsection
