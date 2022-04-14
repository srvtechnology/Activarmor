<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>


    @if(Auth::check())
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script>
    @endif


 <script type="text/javascript">
  $(document).ready(function(){
    $('.loginModal_button').on('click',function(){
      $('#register_model').modal('hide');
      $('#warning').modal('hide');
      // alert('sayan');
      $('#loginModal').modal('show');
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#register_button').on('click',function(){
      $('#register_model').modal('show');
      // alert('sayan');
      $('#loginModal').modal('hide');
      $('#warning').modal('hide');
    });
  });
</script>


<script type="text/javascript">
  $(document).ready(function(){
     @if(Session::has('login_error'))
     $('#loginModal').modal('show');
     @endif
  })
</script>  

<script type="text/javascript">
  $(document).ready(function(){
     @if(Session::has('login_success'))
     $('#loginSuccess').modal('show');
     @endif
  })
</script>   



<script>
    $(document).ready(function(){
      jQuery.validator.addMethod("validate_email", function(value, element) {
            if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
                return true;
            } else {
                return false;
            }
        }, "Please enter your email properly");
       $("#register_form").validate({
         rules: {
            first_name:{
                required:true,
            },
            last_name:{
                required:true,
            },
            email:{
                required:true,
                validate_email:true,
                remote: {
                          url:  '{{route('custom.register.check.mail')}}',
                          type: "POST",
                          data: {
                            email: function() {
                              return $( "#email").val() ;
                            },
                            _token: '{{ csrf_token() }}',
                          }
                   }
            },
            
            phone_number:{
                required:true,
            },
            password:{
                  required: true,
                  // minlength: 8
            },
            password_confirmation:{
                    required: true,
                    // minlength: 8,
                    equalTo: "#password"
            },
         },
            
        messages: {
            first_name:{
              required:'please enter first name',
            }, 
            last_name:{
              required:'Please enter last name',
            },
            email:{
              required:'Please enter email',
              remote:'Someone already used this email.Try another.'
            },
            comment:{
              required:'Please enter comment',
            },
            phone_number:{
              required:'Please enter phone number',
            },
         },
      });
    })
</script>


<script>
    $(document).ready(function(){
      jQuery.validator.addMethod("validate_email", function(value, element) {
            if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
                return true;
            } else {
                return false;
            }
        }, "Please enter your email properly");
       $("#login_form").validate({
         rules: {
            
            email:{
                required:true,
                validate_email:true,
            },
            
            password:{
                  required: true,
                  // minlength: 8
            },
            
         },
            
        messages: {
            
            email:{
              required:'Please enter email',
            },
            password:{
              required:'Please enter password',
            },
         },
      });
    })
</script>