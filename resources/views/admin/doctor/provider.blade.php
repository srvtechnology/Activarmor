@extends('admin.layouts.app')


@section('title')
<title>Activarmor | Manage Provider</title>
@endsection

@section('style')
@include('admin.includes.style')
<style type="text/css">
    #img2{
        width: 80px;
        height: 80px;
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
                    <h4 class="pull-left page-title">Manage Provider</h4>
                    {{-- <ol class="breadcrumb pull-right">
                        <li class="active"><a href="{{route('admin.manage.uses.add')}}">+ Add Uses</a></li>
                        
                    </ol> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="clearfix"></div>
                    <div class="panel panel-default">
                       
                         <div class="panel-heading rm02 rm04">
                             <form method="post" action="{{route('manage.doctor.provider.upload')}}" enctype="multipart/form-data" id="provider">
                        @csrf    
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
                             <img src=""   id="img2" style="display: none;">
                         </div>
                         
                         <div class="rm05">
                                    <button class="btn btn-primary waves-effect waves-light w-md"
                                        type="submit">Save Changes</button>
                         </div>
                          </form>
                          </div>
                        



                     </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    @include('admin.includes.message')
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                   <th>Provider Logo</th>
                                                   <th class="rm07">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(@$data->isNotEmpty())
                                                @foreach (@$data as $value)
                                                <tr>
                                                    <td>
                                                        <img src="{{ URL::to('storage/app/public/provider_min')}}/{{@$value->image}}" style="width: 200px;height: 200px" id="img2">
                                                    </td>
                                                    
                                                  
                                                   <td class="rm07">
                                                        <a href="javascript:void(0);" class="action-dots" id="action{{$value->id}}"><img src="{{ URL::to('public/admin/assets/images/action-dots.png')}}" alt=""></a>
                                                        <div class="show-actions" id="show-{{$value->id}}" style="display: none;">
                                                            <span class="angle custom_angle"><img src="{{ URL::to('public/admin/assets/images/angle.png')}}" alt=""></span>
                                                            <ul>
                                                                <li><a href="{{route('manage.doctor.provider.delete',['id'=>@$value->id])}}" onclick="return confirm('Do you want to delete this logo ?')">Delete </a></li>
                                                               

                                                                

                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr><td colspan="4"><center> No Data </center></td></tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>


                                    <ul class="pagination rtg">
                                        {{@$data->links()}}
                                    </ul>

                                    


                                </div>
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
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
        function fun1(){
        var i=document.getElementById('icon').files[0];
        var b=URL.createObjectURL(i);
        $('#img2').show();
        $("#img2").attr("src",b);
    }
</script>
<script type="text/javascript">
  @foreach (@$data as $value)
    $("#action{{$value->id}}").click(function(){
        $('.show-actions:not(#show-{{$value->id}})').slideUp();
        $("#show-{{$value->id}}").slideToggle();
    });
 @endforeach
</script>


             <script type="text/javascript">
                 $(function(){
                  $('#provider').validate({
                  rules:{
                    image:{
                      required:true,
                      
                    },


                    
                  },
                  ignore:[],
                  messages:{
                   
                  },
                  errorPlacement: function(error, element) {
                 console.log("Error placement called");
                    if (element.attr("name") == "image") {
                         
                          $("#err_image").append(error);
                      }
                  }

                })
              })
             </script>
@endsection
