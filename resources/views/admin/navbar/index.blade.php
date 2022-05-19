@extends('admin.layouts.app')


@section('title')
<title>Activarmor | Manage Nvabar Link</title>
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
                    <h4 class="pull-left page-title">Manage Nvabar Link</h4>
                    <ol class="breadcrumb pull-right">
                        {{-- <li class="active"><a href="{{route('admin.manage.uses.add')}}">+ Add Uses</a></li> --}}
                        
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
                                                   <th>Title</th>
                                                   <th>Status</th>
                                                   <th class="rm07">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(@$data->isNotEmpty())
                                                @foreach (@$data as $value)
                                                <tr>
                                                    <td>{{@$value->name}}</td>
                                                   <td>
                                                     @if(@$value->status=="A")
                                                     Active @else Inactive @endif
                                                   </td>
                                                    <td class="rm07">
                                                        <a href="javascript:void(0);" class="action-dots" id="action{{$value->id}}"><img src="{{ URL::to('public/admin/assets/images/action-dots.png')}}" alt=""></a>
                                                        <div class="show-actions" id="show-{{$value->id}}" style="display: none;">
                                                            <span class="angle custom_angle"><img src="{{ URL::to('public/admin/assets/images/angle.png')}}" alt=""></span>
                                                            <ul>

                                                                @if(@$value->status=="A")
                                                                <li><a href="{{route('admin.manage.navbar.status',['id'=>@$value->id])}}">Inactive </a></li>
                                                                @else
                                                                <li><a href="{{route('admin.manage.navbar.status',['id'=>@$value->id])}}">Active </a></li>
                                                                @endif
                                                                 
                                                                 <li><a href="{{route('admin.manage.navbar.edit',['id'=>@$value->id])}}">Edit </a></li>
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
