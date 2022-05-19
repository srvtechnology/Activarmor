@extends('admin.layouts.app')


@section('title')
<title>Activarmor | Manage Heading</title>
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
                    <h4 class="pull-left page-title">Manage Heading</h4>
                    <ol class="breadcrumb pull-right">
                        @if(@$type=="B")
                        <li class="active"><a href="{{route('admin.manage.heading.banner.add')}}">+ Add Heading</a></li>
                        @elseif(@$type=="D")
                        <li class="active"><a href="{{route('admin.manage.doctor.banner.heading.add.view')}}">+ Add Heading</a></li>
                        @else
                        <li class="active"><a href="{{route('admin.manage.doctor.banner.heading.add.view')}}">+ Add Heading</a></li>
                        @endif
                        
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="clearfix"></div>
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    @include('admin.includes.message')
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                   <th>Heading</th>
                                                   <th class="rm07">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(@$data->isNotEmpty())
                                                @foreach (@$data as $value)
                                                <tr>
                                                    <td>{!!@$value->name!!}</td>
                                                    
                                                  
                                                   <td class="rm07">
                                                        <a href="javascript:void(0);" class="action-dots" id="action{{$value->id}}"><img src="{{ URL::to('public/admin/assets/images/action-dots.png')}}" alt=""></a>
                                                        <div class="show-actions" id="show-{{$value->id}}" style="display: none;">
                                                            <span class="angle custom_angle"><img src="{{ URL::to('public/admin/assets/images/angle.png')}}" alt=""></span>
                                                            <ul>

                                                                @if(@$value->type=="B")
                                                                <li><a href="{{route('admin.manage.heading.banner.edit',['id'=>@$value->id])}}">Edit </a></li>
                                                                @elseif(@$value->type=="P")
                                                                <li><a href="{{route('admin.manage.patient.banner.heading.edit.view',['id'=>@$value->id])}}">Edit </a></li>
                                                                @else
                                                                <li><a href="{{route('admin.manage.doctor.banner.heading.edit.view',['id'=>@$value->id])}}">Edit </a></li>
                                                                @endif




                                                                <li><a href="{{route('admin.manage.heading.delete',['id'=>@$value->id])}}" onclick="return confirm('Are you sure want to delete this ?')">Delete </a></li>
                                                               

                                                                

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
<script type="text/javascript">
  @foreach (@$data as $value)
    $("#action{{$value->id}}").click(function(){
        $('.show-actions:not(#show-{{$value->id}})').slideUp();
        $("#show-{{$value->id}}").slideToggle();
    });
 @endforeach
</script>
@endsection
