<style type="text/css">
  .active{
    color: #006ba1 !important;
  }
</style>
<style>
.dropdown-toggle::after {
   display: none;
}
.user {
    display: flex;
    align-items: center;
    gap: 10px;
}
.user i {
    margin-top: -15px;
}
</style>
<header class="fixed-top">
      <div class="max-theme-width">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="{{route('index')}}">

            @php
            $data = DB::table('image')->where('id',1)->first();
            @endphp
            <img src="{{ URL::to('storage/app/public/logo')}}/{{@$data->logo}}" alt="" width="100" />
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          @php
          $navbar = DB::table('navbar')->get();
          @endphp



          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

              @if($navbar[0]->status=="A")
              <li class="nav-item"><a class="nav-link @if(Route::is('index')) active @endif" href="{{route('index')}}">{{$navbar[0]->name}}</a></li>
              @endif


              @if($navbar[1]->status=="A")
              <li class="nav-item">
                <a class="nav-link @if(Route::is('doctor.page')) active @endif" href="{{route('doctor.page')}} ">{{$navbar[1]->name}}</a>
              </li>
              @endif

              @if($navbar[2]->status=="A")
              <li class="nav-item">
                <a class="nav-link @if(Route::is('patient.page')) active @endif" href="{{route('patient.page')}}">{{$navbar[2]->name}}</a>
              </li>
              @endif

              @if($navbar[3]->status=="A")
              <li class="nav-item">
                <a class="nav-link" href="http://patients.activarmor.me/" target="_blank">{{$navbar[3]->name}}</a>
              </li>
              @endif


              @if($navbar[4]->status=="A")
              <li class="nav-item">
                <a class="nav-link @if(Route::is('contact.page')) active @endif" href="{{route('contact.page')}}">{{$navbar[4]->name}}</a>
              </li>
              @endif

          


               @if($navbar[5]->status=="A")
              @if(!Auth::check())
              <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#loginModal"  href="{{route('contact.page')}}">{{$navbar[5]->name}}</a>
              </li>
              @endif
              @if(Auth::check())

             <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle user"
                              href="#"
                              id="navbarDropdown1"
                              role="button"
                              data-bs-toggle="dropdown"
                              aria-expanded="false"
                            >
                              <i class="fas fa-user"></i>
                              <p>Hi,{{Auth::user()->first_name}} </p>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                              <li><a class="nav-link" href="{{route('logout')}}" style="color: black;">Logout</a></li>
                              {{-- <li><a class="dropdown-item" href="index.html">Logout</a></li> --}}
                            </ul>
              </li>


             {{--  <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">Logout</a>
              </li> --}}
              @endif

              @endif
            </ul>
        {{--     <div class="search">
              <i class="fal fa-search"></i>
            </div> --}}
          </div>
        </nav>
      </div>
    </header>