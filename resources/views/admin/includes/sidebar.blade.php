<div class="left side-menu" style="font-size: 12px!important">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                @if(auth()->guard('admin')->user()->image=="")
                <img src="{{ URL::to('public/admin/assets/images/users/avatar-1.jpg')}}" alt="" class="thumb-md img-circle">
                @else
                <img src="{{ URL::to('storage/app/public/admin_image')}}/{{auth()->guard('admin')->user()->image}}" alt="" class="thumb-md img-circle">
                @endif

            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{auth()->guard('admin')->user()->name}} <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('admin.profile')}}"><i class="fas fa-user-circle"></i> Profile</a></li>
                        <li><a href="{{route('admin.change.password')}}"><i class="fas fa-cog"></i> Change Password</a></li>
                        <li><a href="{{route('admin.logout')}}"><i class="fas fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>

                <p class="text-muted m-0">Administrator</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu" style=" height: 600px;
  overflow-y: scroll;">
            <ul >

                

                <li><a href="{{route('admin.dashboard')}}" class="waves-effect @if(Request::segment(2)=="") active @endif"><i class="fa fa-money"></i><span>Banner Management</span></a></li>

                <li><a href="{{route('admin.manage.what')}}" class="waves-effect @if(Request::segment(2)=="what-section") active @endif"><i class="fa fa-quote-left" aria-hidden="true"></i><span>What Content Management</span></a></li>

                <li><a href="{{route('admin.manage.why')}}" class="waves-effect @if(Request::segment(2)=="why-section") active @endif"><i class="fa fa-question-circle" aria-hidden="true"></i><span>Why Content Management</span></a></li>



                <li data-id = "patient" class="dropdown  dropdown_lef @if(request()->segment(2)=="manage-patient-banner" || request()->segment(2)=="manage-empower-how" || request()->segment(2)=="manage-uses") open @endif ">

                                <a href="#" class="waves-effect dropdown-toggle @if(request()->segment(2)=="manage-patient-banner" || request()->segment(2)=="manage-empower-how" || request()->segment(2)=="manage-uses") subdrop @endif" data-toggle="dropdown">
                                <i class="fa fa-hospital-o" aria-hidden="true"></i><span> Patient </span><span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu sub_menu" @if(request()->segment(2)=="manage-patient-banner" || request()->segment(2)=="manage-empower-how" || request()->segment(2)=="manage-uses") style="display: block;" @endif  id="d_patient">


                                 <li><a href="{{route('admin.manage.patient.banner')}}" class="waves-effect @if(Request::segment(2)=="manage-patient-banner") active @endif"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span>Banner Management</span></a></li>

                                 <li><a href="{{route('admin.manage.empower')}}" class="waves-effect @if(Request::segment(2)=="manage-empower-how") active @endif"><i class="fa fa-empire" aria-hidden="true"></i><span>Empower & How</span></a></li>

                                 <li><a href="{{route('admin.manage.uses')}}" class="waves-effect @if(Request::segment(2)=="manage-uses") active @endif"><i class="fa fa-anchor" aria-hidden="true"></i><span>Manage Uses</span></a></li>
                        </ul>
            </li>



            <li data-id = "doctor" class="dropdown doctor_drop dropdown_lef @if(request()->segment(2)=="manage-doctor-banner" || request()->segment(2)=="manage-about-doctor" || request()->segment(2)=="manage-provider" || request()->segment(2)=="manage-common-uses" ||request()->segment(2)=="manage-youtube-link") open @endif ">

                                <a href="#" class="waves-effect dropdown-toggle @if(request()->segment(2)=="manage-doctor-banner" || request()->segment(2)=="manage-about-doctor" || request()->segment(2)=="manage-provider" || request()->segment(2)=="manage-common-uses" ||request()->segment(2)=="manage-youtube-link") subdrop @endif" data-toggle="dropdown">
                                <i class="fa fa-user-md" aria-hidden="true"></i><span> Doctor </span><span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu sub_menu" @if(request()->segment(2)=="manage-doctor-banner" || request()->segment(2)=="manage-about-doctor" || request()->segment(2)=="manage-provider" || request()->segment(2)=="manage-common-uses" ||request()->segment(2)=="manage-youtube-link") style="display: block;" @endif  id="d_doctor">


                                 <li><a href="{{route('manage.doctor.banner')}}" class="waves-effect @if(Request::segment(2)=="manage-doctor-banner") active @endif"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span>Banner Management</span></a></li>

                                 <li><a href="{{route('manage.about.doctor')}}" class="waves-effect @if(Request::segment(2)=="manage-about-doctor") active @endif"><i class="fa fa-address-card-o" aria-hidden="true"></i><span>Manage About</span></a></li>

                                 <li><a href="{{route('manage.doctor.provider')}}" class="waves-effect @if(Request::segment(2)=="manage-provider") active @endif"><i class="fa fa-user" aria-hidden="true"></i><span>Manage Provider</span></a></li>

                                 <li><a href="{{route('admin.manage.common.use')}}" class="waves-effect @if(Request::segment(2)=="manage-common-uses") active @endif"><i class="fa fa-shopping-basket" aria-hidden="true"></i><span>Manage Common Uses</span></a></li>

                                 <li><a href="{{route('admin.manage.youtube.link')}}" class="waves-effect @if(Request::segment(2)=="manage-youtube-link") active @endif"><i class="fa fa-youtube" aria-hidden="true"></i><span>Manage Youtube Link</span></a></li>
                        </ul>
            </li>




            <li><a href="{{route('admin.manage.users')}}" class="waves-effect @if(Request::segment(2)=="manage-users") active @endif"><i class="fa fa-users" aria-hidden="true"></i><span> Manage Users</span></a></li>


            <li><a href="{{route('admin.contact.page')}}" class="waves-effect @if(Request::segment(2)=="manage-contact-us") active @endif"><i class="fa fa-envelope-open-o" aria-hidden="true"></i><span> Conatct Us </span></a></li>


                <li><a href="{{route('admin.manage.contact')}}" class="waves-effect @if(Request::segment(2)=="manage-contact") active @endif"><i class="fa fa-envelope-open-o" aria-hidden="true"></i><span> Conatct Mails </span></a></li>


                <li><a href="{{route('admin.manage.suggestion')}}" class="waves-effect @if(Request::segment(2)=="manage-suggestion") active @endif"><i class="fa fa-comments" aria-hidden="true"></i><span> Suggestions</span></a></li>

                <li><a href="{{route('admin.manage.prescription')}}" class="waves-effect @if(Request::segment(2)=="manage-prescription") active @endif"><i class="fa fa-file-text-o" aria-hidden="true"></i><span> Manage Prescription</span></a></li>

                <li><a href="{{route('admin.manage.pdf')}}" class="waves-effect @if(Request::segment(2)=="manage-pdf") active @endif"><i class="fa fa-file" aria-hidden="true"></i><span> Manage Pdf</span></a></li>

                <li><a href="{{route('admin.manage.logo')}}" class="waves-effect @if(Request::segment(2)=="manage-logo") active @endif"><i class="fa fa-spinner" aria-hidden="true"></i><span> Manage Logo</span></a></li>

                <li><a href="{{route('admin.manage.navbar')}}" class="waves-effect @if(Request::segment(2)=="manage-navbar") active @endif"><i class="fa fa-link" aria-hidden="true"></i><span> Manage Navbar Links</span></a></li>

                <li><a href="{{route('admin.manage.fotter')}}" class="waves-effect @if(Request::segment(2)=="manage-footer") active @endif"><i class="fa fa-forumbee" aria-hidden="true"></i><span> Manage Fotter</span></a></li>





            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
