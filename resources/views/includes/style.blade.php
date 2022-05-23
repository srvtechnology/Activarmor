<!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />

    <!-- -- Icon CDN --  -->
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />

    @if(Route::is('index'))
    
    <link href="{{ URL::to('public/frontend/assets/css/index.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('public/frontend/assets/css/main.css')}}" rel="stylesheet" type="text/css">

    @endif

    @if(Route::is('patient.page'))
  
    <link href="{{ URL::to('public/frontend/assets/css/index.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('public/frontend/assets/css/main.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('public/frontend/assets/css/doctor.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('public/frontend/assets/css/patients.css')}}" rel="stylesheet" type="text/css">
    @endif

    @if(Route::is('doctor.page'))
    <link href="{{ URL::to('public/frontend/assets/css/main.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('public/frontend/assets/css/doctor.css')}}" rel="stylesheet" type="text/css">
    


    @endif

    @if(Route::is('contact.page'))
    <link href="{{ URL::to('public/frontend/assets/css/main.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('public/frontend/assets/css/contact.css')}}" rel="stylesheet" type="text/css">
    @endif
     

     @php
     $wp = DB::table('fotter')->where('id',1)->first();
     @endphp
     <a href="https://wa.me/{{$wp->wp}}" class="whatsapp_float" target="_blank"><i class="fab fa-whatsapp" style="margin-top: 14px;"></i></a>

     <style type="text/css">
  /*whatsapp*/
.whatsapp_float {
  position:fixed;
  width:60px;
  height:60px;
  bottom:40px;
  right:40px;
  background-color:#25d366;
  color:#FFF;
  border-radius:50px;
  text-align:center;
        font-size:30px;
  box-shadow: 2px 2px 3px #999;
        z-index:100;
}

.whatsapp-icon {
  margin-top:16px;
}
/* for mobile */
@media screen and (max-width: 767px){
     .whatsapp-icon {
   margin-top:20px;
     }
    .whatsapp_float {
        width: 50px;
        height: 60px;
        bottom: 20px;
        right: 10px;
        font-size: 22px;
    }
}
</style>
@php
$font = DB::table('font')->where('id',1)->first();
@endphp
<style type="text/css">
  *{
    font-family: {{$font->name}};
  }
</style>