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
            <img src="{{asset('public/frontend/assets/img/home/header/logo.png')}}" alt="" width="100" />
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

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="nav-link @if(Route::is('index')) active @endif" href="{{route('index')}}">Home</a></li>
              <li class="nav-item">
                <a class="nav-link @if(Route::is('doctor.page')) active @endif" href="{{route('doctor.page')}} ">For Doctor</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(Route::is('patient.page')) active @endif" href="{{route('patient.page')}}">For Patients</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://patients.activarmor.me/" target="_blank">Get One</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(Route::is('contact.page')) active @endif" href="{{route('contact.page')}}">Contact</a>
              </li>

          



              @if(!Auth::check())
              <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#loginModal"  href="{{route('contact.page')}}">Login</a>
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
            </ul>
        {{--     <div class="search">
              <i class="fal fa-search"></i>
            </div> --}}
          </div>
        </nav>
      </div>
    </header>