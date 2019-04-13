	<!DOCTYPE html>
	<html lang="ar" dir="rtl" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="/joblisting/img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>@yield("title")</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			
			<link rel="stylesheet" href="/joblisting/css/linearicons.css">
			<link rel="stylesheet" href="/joblisting/css/font-awesome.min.css">
            <link href="/bootstrap-4.0.0-rtl/dist/css/rtl/bootstrap.min.css" rel="stylesheet" />
			<link rel="stylesheet" href="/joblisting/css/magnific-popup.css">
			<link rel="stylesheet" href="/joblisting/css/nice-select.css">					
			<link rel="stylesheet" href="/joblisting/css/animate.min.css">
			<link rel="stylesheet" href="/joblisting/css/owl.carousel.css">
			<link rel="stylesheet" href="/joblisting/css/main.css">
            <style>                
                .nav-menu > li {
                  float: right;
                }
            </style>
        
            @yield("css")
		</head>
		<body>

			 <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="/home"><img src="/joblisting/img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="/home">الرئيسية</a></li>
				          <li><a href="/about">من نحن</a></li>
				          <li><a href="/jobs">الوظائف</a></li>
				          <li><a href="/contact">اتصل بنا</a></li>
                          @guest
				          <li><a class="ticker-btn" href="/home/register">انضم الينا</a></li>
				          <li><a class="ticker-btn" href="/login">تسجيل دخول</a></li>
                            @else
                            <?php
                                $user = \Auth::user();
                                $isAdmin=\DB::table("admin")->where("user_id",$user->id)->count();
                                $isCompany=\DB::table("company")->where("user_id",$user->id)->count();
                                $adminUrl="/seeker/home/profile";
                                if($isAdmin){
                                    $adminUrl="/admin";
                                }
                                else if($isCompany){
                                    $adminUrl="/company/home/profile";
                                }
                            ?>
                            <li class="nav-item dropdown">
                                <a href="#">
                                    {{ Auth::user()->name }}
                                </a>

                                <ul>
                                    <li>
                                        <a href="{{$adminUrl}}">
                                            لوحة التحكم
                                        </a>
                                    </li>
                                    <li>
                                        <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        تسجيل خروج
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest	          
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->

            @yield("content")
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget">
								<h6>وظائف</h6>
								<ul class="footer-nav">
									<li><a href="/home">الرئيسية</a></li>
									<li><a href="/about">من نحن</a></li>
									<li><a href="/contact">اتصل بنا</a></li>
									<li><a href="/jobs">وظائف</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6  col-md-12">
							<div class="single-footer-widget newsletter">
								<h6>قائمة بريدية</h6>
								<p>التحق بالقائمة البريدية الخاصة بنا الان.</p>
								<div id="mc_embed_signup">
									<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

										<div class="form-group row" style="width: 100%">
											<div class="col-lg-8 col-md-12">
												<input name="EMAIL" placeholder="ادخل بريدك الالكتروني" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
												<div style="position: absolute; right: -5000px;">
													<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
												</div>
											</div> 
										
											<div class="col-lg-4 col-md-12">
												<button class="nw-btn primary-btn">اشتراك<span class="lnr lnr-arrow-right"></span></button>
											</div> 
										</div>		
										<div class="info"></div>
									</form>
								</div>		
							</div>
						</div>
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget mail-chimp">
								<h6 class="mb-20">تابعنا على الانستجرام</h6>
								<ul class="instafeed d-flex flex-wrap">
									<li><img src="/joblisting/img/i1.jpg" alt=""></li>
									<li><img src="/joblisting/img/i2.jpg" alt=""></li>
									<li><img src="/joblisting/img/i3.jpg" alt=""></li>
									<li><img src="/joblisting/img/i4.jpg" alt=""></li>
									<li><img src="/joblisting/img/i5.jpg" alt=""></li>
									<li><img src="/joblisting/img/i6.jpg" alt=""></li>
									<li><img src="/joblisting/img/i7.jpg" alt=""></li>
									<li><img src="/joblisting/img/i8.jpg" alt=""></li>
								</ul>
							</div>
						</div>						
					</div>

					<div class="row footer-bottom d-flex justify-content-between">
						<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> 
                            [جميع الحقوق محفوظة لدورة لارافيل فبراير<i class="fa fa-heart-o" aria-hidden="true"></i> 
						</p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->		

			<script src="/joblisting/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="/joblisting/js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="/joblisting/js/easing.min.js"></script>			
			<script src="/joblisting/js/hoverIntent.js"></script>
			<script src="/joblisting/js/superfish.min.js"></script>	
			<script src="/joblisting/js/jquery.ajaxchimp.min.js"></script>
			<script src="/joblisting/js/jquery.magnific-popup.min.js"></script>	
			<script src="/joblisting/js/owl.carousel.min.js"></script>			
			<script src="/joblisting/js/jquery.sticky.js"></script>
			<script src="/joblisting/js/jquery.nice-select.min.js"></script>			
			<script src="/joblisting/js/parallax.min.js"></script>		
			<script src="/joblisting/js/mail-script.js"></script>	
			<script src="/joblisting/js/main.js"></script>	
            @yield("js")
		</body>
	</html>



