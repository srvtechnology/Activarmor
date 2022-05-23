    <!-- -- footer --  -->

    @php
           $social = DB::table('fotter')->where('id',1)->first();
           @endphp
    <footer class="section-padding">
      <div class="main-footer max-theme-width">
        <div class="row">
          <div class="col-lg-3 col-md-6 mb-4 col-12">
            @php
            $data = DB::table('image')->where('id',1)->first();
            @endphp

            <div class="f-logo">
              <img src="{{ URL::to('storage/app/public/footer_logo')}}/{{@$data->footer_logo}}" alt="" />
            </div>
            <p class="p-1">
              {{@$social->description}}
            </p>
            <style type="text/css">
              ul li{
                display: inline-block;
              }
            </style>
            <ul style="list-style: none;display: inline-block;margin-top: 5px;" class="f-social">
              <li><a href="{{@$social->twitter}}"><i class="fab fa-twitter"></i></a></li>
              <li><a href="{{@$social->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="{{@$social->twitter}}"><i class="fab fa-instagram"></i></a></li>
              <li><a href="{{@$social->youtube}}"><i class="fab fa-youtube"></i></a></li>
            </ul>
          </div>

          @php
          $navbar = DB::table('navbar')->get();
          @endphp


          <div class="col-12 col-lg-3 col-md-6 mb-4 footer-links">
            <div class="f-c-list">
              @if($navbar[0]->status=="A")
              <div class="f-list-item">
                <img src="./assets/img/footer/arrow.png" alt="" />
                <a class=" @if(Route::is('index')) active @endif" href="{{route('index')}}">{{$navbar[0]->name}}</a>
              </div>
              @endif

              @if($navbar[1]->status=="A")
              <div class="f-list-item">
                <img src="./assets/img/footer/arrow.png" alt="" />
                <a class=" @if(Route::is('doctor.page')) active @endif" href="{{route('doctor.page')}} ">{{$navbar[1]->name}}</a>
              </div>
              @endif

              @if($navbar[2]->status=="A")
              <div class="f-list-item">
                <img src="./assets/img/footer/arrow.png" alt="" />
                <a class=" @if(Route::is('patient.page')) active @endif" href="{{route('patient.page')}}">{{$navbar[2]->name}}</a>
              </div>
              @endif

              @if($navbar[3]->status=="A")
              <div class="f-list-item">
                <img src="./assets/img/footer/arrow.png" alt="" />
                <a  href="http://patients.activarmor.me/" target="_blank">{{$navbar[3]->name}}</a>
              </div>
              @endif

              @if($navbar[4]->status=="A")
              <div class="f-list-item">
                <img src="./assets/img/footer/arrow.png" alt="" />
                <a class="@if(Route::is('contact.page')) active @endif" href="{{route('contact.page')}}">{{$navbar[4]->name}}</a>
              </div>
              @endif




            </div>
          </div>

          @php
          $contact = DB::table('contact')->where('id',1)->first();
          @endphp


          <div class="col-lg-3 col-md-6 mb-4 col-12 my-3">
            <table>
              <tbody>
                <tr>
                  <td>
                    <img src="./assets/img/footer/map.png" alt="" />
                  </td>
                  <td>{{@$contact->address}}</td>
                </tr>
                <tr>
                  <td>
                    <img src="./assets/img/footer/email.png" alt="" />
                  </td>
                  <td>
                    <a href="mailto:$contact->email">{{$contact->email}}</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>


          
          <div class="col-lg-3 col-md-6 mb-4 col-12 my-3">

            <div class="sharethis-inline-share-buttons" style="margin-right: 55px;"></div>
            <div class="f-social-btn">
              
              <button class="btn btn-outline-warning btn-sm" >share now</button>
            </div>

      
            {{-- <div class="f-social">
              <a href="{{@$social->twitter}}"><i class="fab fa-twitter"></i></a>
              <a href="{{@$social->facebook}}"><i class="fab fa-facebook-f"></i></a>
              <a href="{{@$social->twitter}}"><i class="fab fa-instagram"></i></a>
              <a href="{{@$social->youtube}}"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="f-social-btn">
              
              <button class="btn btn-outline-warning btn-sm">share now</button>
            </div> --}}
          </div>
        </div>
        <div class="dropdown-divider"></div>
        <div class="f-last">
          <div>
            <p class="p-last">{{@$social->copyright}}</p>
          </div>
          <div>
            <a class="f-a-last" href="https://www.google.com/">T&C</a>
            <span class="f-s-last">|</span>
            <a class="f-a-last" href="https://www.google.com/">PRIVACY AND POLICY</a>
          </div>
        </div>
      </div>
    </footer>