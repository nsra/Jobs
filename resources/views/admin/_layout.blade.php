<!DOCTYPE html>
<html lang="en" dir="rtl">

    <head>
        <meta charset="utf-8" />
        <title>Jobs | لوحة التحكم | @yield("title")</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

        <link href="/metronic-rtl/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/metronic-rtl/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/metronic-rtl/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="/metronic-rtl/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="/metronic-rtl/assets/global/css/components-md-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/metronic-rtl/assets/global/css/plugins-md-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="/metronic-rtl/assets/layouts/layout/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="/metronic-rtl/assets/layouts/layout/css/themes/darkblue-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="/metronic-rtl/assets/layouts/layout/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="/nprogress-master/nprogress.css" rel="stylesheet" type="text/css" />
        <link href="/metronic-rtl/assets/global/plugins/bootstrap-toastr/toastr-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        @yield("css")
    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="index.html">
                        <img src="/metronic-rtl/assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="/metronic-rtl/assets/layouts/layout/img/avatar3_small.jpg" />
                                <span class="username username-hide-on-mobile"> {{ Auth::user()->name }} </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="/admin/home/changepassword">
                                        <i class="icon-user"></i> تغيير كلمة المرور </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="icon-lock"></i>
                                        خروج
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                
                <div class="page-sidebar navbar-collapse collapse">
                    
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <li class="nav-item start ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title">مستخدمي النظام</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="/admin/admin" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">ادارة المستخدمين</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="/admin/admin/create" class="nav-link ">
                                        <i class="icon-bulb"></i>
                                        <span class="title">اضافة مستخدم</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        
                        <li class="nav-item start ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-file"></i>
                                <span class="title">الوظائف</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="/admin/categoryajax" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">تصنيفات الوظائف</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="/admin/jobs" class="nav-link ">
                                        <i class="icon-bulb"></i>
                                        <span class="title">الوظائف</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        
                        <li class="nav-item start ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-tv"></i>
                                <span class="title">الزبائن</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="/admin/company" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">الشركات</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="/admin/seeker" class="nav-link ">
                                        <i class="icon-bulb"></i>
                                        <span class="title">الافراد</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    
                    <h3 class="page-title"> @yield("title")
                        <small>@yield("subtitle")</small>
                    </h3>
                    
                    @include("_msg")
                    @yield("content")
                </div>
                <!-- END CONTENT BODY -->
            </div>
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> {{date("Y")}} &copy; جميع الحقوق محفوظة.
                
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        

    <div id="Confirm" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">تأكيد</h4>
              </div>
              <div class="modal-body">
                <p>هل أنت متأكد من الاستمرار في العملية؟</p>
              </div>
              <div class="modal-footer">
                <a type="button" class="btn btn-default" data-dismiss="modal">الغاء الأمر</a>
                <a type="button" class="btn btn-danger">نعم متأكد</a>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        
     <div id="Popup" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
        <script src="/metronic-rtl/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="/metronic-rtl/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/metronic-rtl/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="/metronic-rtl/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="/metronic-rtl/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="/metronic-rtl/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="/metronic-rtl/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="/metronic-rtl/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="/metronic-rtl/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="/metronic-rtl/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="/metronic-rtl/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="/nprogress-master/nprogress.js" type="text/javascript"></script>
        
        <script src="/metronic-rtl/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
        <script src="/metronic-rtl/assets/pages/scripts/ui-toastr.min.js" type="text/javascript"></script>
        
        <script src="/js/jquery.form.min.js"></script>
         @yield("js")
        <script>
        
          toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
              "positionClass": "toast-bottom-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
           }
           function ShowMessage(msg,title="Jobs"){			
               var color="info";
               if(msg.substring(0,2)=="s:"){
                   color="success";msg=msg.substring(2);
               }
               else if(msg.substring(0,2)=="w:"){
                   color="warning";msg=msg.substring(2);
               }
               else if(msg.substring(0,2)=="e:"){
                   color="error";msg=msg.substring(2);
               }
               else if(msg.substring(0,2)=="i:"){
                   color="info";msg=msg.substring(2);
               }
               Command: toastr[color](msg,title);
           }
          $(function(){
                $(document).on("click",".Popup",function(){
                    $("#Popup .modal-body").html
                    ("<h1 class='text-center'><i style='font-size:48px;' class='fa fa-spinner fa-spin'></i></h1>");
                    $("#Popup .modal-title").text($(this).attr("title"));
                    $("#Popup .modal-body").load($(this).attr("href"));
                    $("#Popup").modal("show");
                    return false;	
                });
                //$(".Confirm").click(function(){
                $(function(){
                //$("#Confirm").modal("show");
                $(document).on("click",".Confirm",function(){
                    $("#Confirm").modal("show");
                    $("#Confirm .btn-danger").attr("href",$(this).attr("href"));
                    return false;
                });
            });
                $( document ).ajaxStart(function() {
                  NProgress.start() 
                });

                $( document ).ajaxStop(function() {
                  NProgress.done() 
                });


                $( document ).ajaxError(function() {
                   NProgress.done() 
                });
              
              
                if($('#tblAjax').size()>0){
                    $("#Confirm .btn-danger").click(function(e) {
                        $.ajax({
                            url:$("#Confirm .btn-danger").attr("href"),
                            success:function(json){
                                if(json.status==1){
                                    ShowMessage(json.msg,"لوحة التحكم");
                                }
                                else{
                                    ShowMessage(json.msg,"لوحة التحكم");
                                }						
                                BindDataTable();
                            },
                            type:"get",
                            dataType: "JSON",
                            error:function(){                                
                                ShowMessage("e: لا يمكن الحذف موجودة مسبقا","لوحة التحكم");		
                            }
                        });
                        $("#Confirm").modal("hide");
                        return false;
                    });
                }
          });
            
          function PageLoadMethods(){
              $(".ajaxForm").ajaxForm({
				success:function(json) { 	
					$(".ajaxForm :submit").prop("disabled",false);
					if(json.status==1){
						$('.ajaxForm').resetForm();
						ShowMessage(json.msg,"لوحة التحكم");
						BindDataTable();
					}
					else{
						ShowMessage(json.msg,"لوحة التحكم");				
					}
					if(json.redirect!=null)
						window.location=json.redirect;
					if(json.close!=null)
						$("#Popup").modal("hide");
				}
				,beforeSubmit:function(){
					$(".ajaxForm :submit").prop("disabled",true);
				}
				,error: function(json) {          
					$(".ajaxForm :submit").prop("disabled",false);
					var errorsHtml="e:<ul>";
					$.each( json.responseJSON.errors, function( key, value ) {
						errorsHtml += '<li>' + value[0] + '</li>';
					});
					errorsHtml+="</ul>";
					ShowMessage(errorsHtml,"لوحة التحكم");
				}
			}); 
          }
      </script>
       
    </body>

</html>