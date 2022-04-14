@extends('admin.layouts.app')


@section('title')
<title>Activarmor | Manage Why Section</title>
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
                    <h4 class="pull-left page-title">Manage Why Section</h4>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="clearfix"></div>
                    <div class="panel panel-default">
                        <div class="panel-heading rm02 rm04">
                          @include('admin.includes.message')
                            <form role="form" action="{{route('admin.manage.why.update')}}" method="post" id="what" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="page" value="" id="page">
                                <div class="form-group rm03">
                                        <label for="Email">Heading</label>
                                        <input type="text" name="heading" class="form-control" value="{{@$data->heading}}">
                                  </div>

                                  <div class="form-group rm03">
                                        <label for="Email">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="3">{{@$data->description}}</textarea>
                                  </div>



                                
                               <div class="clearfix"></div>
                                <div class="rm05">
                                    <button class="btn btn-primary waves-effect waves-light w-md"
                                        type="submit">Save Changes</button>
                                </div>
                            </form>
                          </div>



                          <div class="row">
                <div class="col-md-12">
                    <div class="clearfix"></div>
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    {{-- @include('admin.includes.message') --}}
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Heading</th>
                                                    <th>Description</th>
                                                    <th class="rm07">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(@$content->isNotEmpty())
                                                @foreach (@$content as $value)
                                                <tr>
                                                    <td>
                                                       {{@$value->heading}}
                                                    </td>
                                                    <td>
                                                        @if(@$value->description!="")
                                                         @if(strlen(@$value->description) >70)
                                                            {!! substr(@$value->description, 0, 70 ) . '...' !!}
                                                          @else
                                                          {!!$value->description!!}
                                                          @endif
                                                          @else
                                                          --
                                                          @endif
                                                    </td>

                                                    <td class="rm07">
                                                        <a href="javascript:void(0);" class="action-dots" id="action{{$value->id}}"><img src="{{ URL::to('public/admin/assets/images/action-dots.png')}}" alt=""></a>
                                                        <div class="show-actions" id="show-{{$value->id}}" style="display: none;">
                                                            <span class="angle custom_angle"><img src="{{ URL::to('public/admin/assets/images/angle.png')}}" alt=""></span>
                                                            <ul>
                                                                <li><a href="{{route('admin.manage.why.content',['id'=>@$value->id])}}">Edit</a></li>

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





                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End row -->
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
    $(document).ready(function(){
  @foreach (@$content as $value)

    $("#action{{$value->id}}").click(function(){
        $('.show-actions:not(#show-{{$value->id}})').slideUp();
        $("#show-{{$value->id}}").slideToggle();
    });
 @endforeach
});
</script>
             <script type="text/javascript">
                 $(function(){
                  $('#what').validate({
                  rules:{
                    heading:{
                      required:true,
                    },
                    description:{
                      required:true,
                      maxlength:400,
                    },

                  },
                 
                  messages:{
                   heading:{
                    required:'Please enter heading',
                   },
                   description:{
                    required:'Please enter description',
                   },
                  },

                  

                })
              })
             </script>
@endsection
