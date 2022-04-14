<div class="modal fade" id="loginSuccess" tabindex="-1" role="dialog" aria-labelledby="loginSuccess" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginSuccess">Login Successfull</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <h1 style="text-align: center;
    
"><i class="fa fa-check" aria-hidden="true" style="border: 2px solid green;
    border-radius: 50%;
    padding: 22px;"></i></h1>
       <p style="text-align: center;"> Hi , {{@Auth::user()->first_name}} {{@Auth::user()->last_name}} you are successfully logged in.</p>
      </div>
      
      <div class="modal-footer">
       
        <button type="submit" class="btn btn-primary" class="close" data-dismiss="modal">Ok</button>
      </div>
    
    </div>
  </div>
</div>

















{{-- LOGIN --}}

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginlable" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginlable">Login Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload();">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('custom.login')}}" id="login_form">
      @csrf  
      <div class="modal-body">
         @if(Session::has('login_error'))
                  <div class="alert alert-success alert-dismissible" style="text-align: center; margin-top: 10px;">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                      <strong>
                          {!!Session::get('login_error')!!}
                      </strong>
                  </div>
              @endif
        
        <div class="col-md-12 col-12">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Email" name="email"  />
                </div>
              </div>

              <div class="col-md-12 col-12">
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
              </div>



      </div>
      <div class="modal-footer">
        <h5 style="font-size: 13px;">Don't Have Account ?<a href="#" id="register_button">Click Here To Create .</a></h5>
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>
    </div>
  </div>
</div>


<div class="modal fade" id="register_model" tabindex="-1" role="dialog" aria-labelledby="register" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="register">Please register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload();">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      @csrf  
      <div class="modal-body">
        <div class="modal-body">
          <div class="modal-body">
           <div class="form-card">
            @include('admin.includes.message')
             <form method="post" action="{{route('custom.register')}}" enctype="multipart/form-data" id="register_form">
              @csrf
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="First Name" name="first_name" 

                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Last Name" name="last_name" 
                  />
                </div>
              </div>
              <div class="col-md-12 col-12">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Phone Number"  name="phone_number" 
                  />
                </div>
              </div>
              <div class="col-md-12 col-12">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Email" name="email" id="email" />
                </div>
              </div>

              <div class="col-md-12 col-12">
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password" name="password" id="password"  />
                </div>
              </div>

              <div class="col-md-12 col-12">
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Cofirm Password" name="password_confirmation"  />
                </div>
              </div>
              
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <h5 style="font-size: 13px;">If you are a existing user.<a href="#" class="loginModal_button">Click Here To Login .</a></h5>
        <button type="submit" class="btn btn-primary">Register</button>
      </div>
    
    </div>
    </form>
  </div>
</div>