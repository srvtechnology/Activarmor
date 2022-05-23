@extends('admin.layouts.app')


@section('title')
<title>Activarmor | Manage Banner</title>
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
                    <h4 class="pull-left page-title">Manage Banner</h4>
                    <ol class="breadcrumb pull-right">
                        <li class="active"><a href="{{route('admin.manage.heading.banner')}}">Heading Management</a></li>
                        <li class="active"><a href="{{route('admin.manage.sub.heading.banner')}}">Sub Heading Management</a></li>
                        
                    </ol>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="clearfix"></div>
                    <div class="panel panel-default">
                        <div class="panel-heading rm02 rm04">
                            <form role="form" action="{{route('admin.banner.update')}}" method="post" id="banner" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="page" value="" id="page">


                                  
                







                                <div class="form-group rm03">
                                  @if(@$data->image=='')
                                     <img src="{{ URL::to('public/admin/assets/images/videos2.jpg')}}" style="width: 100%;height: 400px" id="img2">
                                  @else
                                    <img src="{{ URL::to('storage/app/public/banner_min')}}/{{@$data->image}}" style="width: 100%;height: 400px" id="img2">
                                  @endif            
                                 </div>

                                

                                  <div class="form-group">
                                        <label for="Email">Image (W X H : 1000 × 541 px)</label>
                                        <div class="uplodimgfil">
                                            <input type="file" name="image" id="icon" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" onchange="fun1()" />
                                           {{--  <input type="file" id="icon" name="image"   class="inputfile inputfile-1" onchange="fun1()">
                                             <input type="hidden" name="profile_picture"  > --}}
                                            <label for="icon">Upload Image<img src="{{ URL::to('public/admin/assets/images/clickhe.png')}}" alt=""></label>
                                        </div>
                                       <div id="err_image"></div>
                                  </div>


                                  {{-- <div class="form-group rm03">
                                        <label for="Email">Heading One</label>
                                        <input type="text" name="banner_heading_one" class="form-control" value="{{@$data->banner_heading_one}}">
                                   </div>

                                   <div class="form-group rm03">
                                        <label for="Email">Heading Two</label>
                                        <input type="text" name="banner_heading_two" class="form-control" value="{{@$data->banner_heading_two}}">
                                   </div>

                                   <div class="form-group rm03">
                                        <label for="Email">Heading Three</label>
                                        <input type="text" name="banner_heading_three" class="form-control" value="{{@$data->banner_heading_three}}">
                                   </div>

                                   <div class="form-group rm03">
                                        <label for="Email">Heading Four</label>
                                        <input type="text" name="banner_heading_four" class="form-control" value="{{@$data->banner_heading_four}}">
                                   </div>




                                  

                                  <div class="form-group rm03">
                                        <label for="Email">Sub Heading One</label>
                                        <textarea class="form-control" name="heading_one" rows="2">{{@$data->heading_one}}</textarea>
                                  </div>

                                  <div class="form-group rm03">
                                        <label for="Email">Sub Heading Two</label>
                                        <textarea class="form-control" name="heading_two" rows="2">{{@$data->heading_two}}</textarea>
                                  </div>

                                   <div class="form-group rm03">
                                        <label for="Email">Sub Heading Three</label>
                                        <textarea class="form-control" name="heading_three" rows="2">{{@$data->heading_three}}</textarea>
                                  </div>

                                  <div class="form-group rm03">
                                        <label for="Email">Sub Heading Four</label>
                                        <textarea class="form-control" name="heading_four" rows="2">{{@$data->heading_four}}</textarea>
                                  </div>

                                  <div class="form-group rm03">
                                        <label for="Email">Sub Heading Five</label>
                                        <textarea class="form-control" name="heading_five" rows="2">{{@$data->heading_five}}</textarea>
                                  </div> --}}



                                
                               <div class="clearfix"></div>
                                <div class="rm05">
                                    <button class="btn btn-primary waves-effect waves-light w-md"
                                        type="submit">Save Changes</button>
                                </div>
                            </form>
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
<script src="{{ URL::to('public/tiny_mce/tinymce.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
        function fun1(){
        var i=document.getElementById('icon').files[0];
        var b=URL.createObjectURL(i);
        $("#img2").attr("src",b);
    }
</script>

             <script type="text/javascript">
                 $(function(){
                  $('#banner').validate({
                  rules:{
                    heading_one:{
                      required:true,
                      // minlength : 10,
                      maxlength:100,
                    },

                    banner_heading_one:{
                      required:true,
                      // minlength : 10,
                      maxlength:100,
                    },

                    banner_heading_two:{
                      required:true,
                      // minlength : 10,
                      maxlength:100,
                    },

                    banner_heading_three:{
                      required:true,
                      // minlength : 10,
                      maxlength:100,
                    },

                    banner_heading_four:{
                      required:true,
                      // minlength : 10,
                      maxlength:100,
                    },

                    heading_two:{
                      required:true,
                      // minlength : 10,
                      maxlength:100,
                    },

                    heading_three:{
                      required:true,
                      // minlength : 10,
                      maxlength:100,
                    },
                    heading_four:{
                      required:true,
                      // minlength : 10,
                      maxlength:100,
                    },
                    description:{
                      required:true,
                    },

                    heading_five:{
                      required:true,
                      // minlength : 10,
                      maxlength:100,
                    },
                  },
                  ignore:[],
                  messages:{
                   
                  },
                  

                })
              })
             </script>





<script src="{{ URL::to('public/tiny_mce/tinymce.min.js') }}"></script>

<script type="text/javascript">
    tinymce.init({
    selector: "#description",
    forced_root_block : "",
    relative_urls : false,
    entity_encoding: 'raw',
    menubar: "",
    
     plugins: [
    
    "searchreplace wordcount visualblocks visualchars code fullscreen",
    "lists",
  
    
    "emoticons template paste textcolor colorpicker textpattern imagetools"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft     aligncenter alignright alignjustify | bullist numlist outdent indent | link     image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    toolbar3: "cut,copy,paste,pastetext,pasteword,|outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,|,insertdate,inserttime,preview",
    toolbar4: "numlist bullist",
    image_advtab: true,
    templates: [
    {title: 'Test template 1', content: 'Test 1'},
    {title: 'Test template 2', content: 'Test 2'}
    ],
    toolbar1: " bold  underline italic |,link,unlink ",
        });
    
    </script>
{{-- <script>
initTineMce();
function initTineMce(selector) {
if(selector == undefined){selector = '#description';}
tinymce.init({

content_css : "{{asset('public/frontend/css/style.css')}},{{asset('public/frontend/css/bootstrap.min.css')}}",

content_style: "@import url('https://fonts.googleapis.com/css2?family=Lato:wght@900&family=Roboto&display=swap'); body { font-family: 'Roboto'; }",
selector:selector,
menubar:false,
statusbar: false,
auto_focus : "elm1",
height: "350px",
plugins: "autoresize lists textcolor advlist table link media code image charmap fullpage spoiler advcode",
file_picker_types: 'file image media',
advlist_bullet_styles: 'disc',
image_caption: true,
inline_boundaries: false,
relative_urls : false,
remove_script_host : false,
convert_urls : true,
font_formats:"Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago;Roboto=roboto; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats",
toolbar: 'code | insertfile undo redo | styleselect | fontselect | fontsizeselect | forecolor backcolor | bold italic underline | superscript subscript | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol | customInsertButton customDateButton',
lists_indent_on_tab: false,
// plugins: 'table',
// menubar: 'table',
setup: function (editor) {
editor.ui.registry.addButton('customInsertButton', {
text: 'Add Button',
onAction: function (_) {
editor.insertContent('&nbsp; <a href="_BTNLINK_" class="save_all_changes_btn">Button</a>&nbsp;');
}
});
},

});


}
</script> --}}
@endsection
