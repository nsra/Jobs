@extends("_layout")
@section("content")
<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								{{$job->title}}
							</h1>	
							<p class="text-white link-nav"><a href="/">الرئيسية </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/jobs"> الوظائف</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
				
			<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-8 post-list">
							<div class="single-post d-flex flex-row">
								<div class="thumb">
									<img width="250" src="/data/images/{{$job->company->logo}}" alt="">
									<ul class="tags">
										<li>
											<a>{{$job->jobtype->name}}</a>
										</li>
										<li>
											<a>{{$job->category->name}}</a>					
										</li>
									</ul>
								</div>
								<div style="width:100%" class="details">
                                    
										<ul style="float:left" class="btns">                                            
											<li><a href="/job/{{$job->id}}/apply">التحق الان</a></li>
										</ul>
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="#"><h4>{{$job->title}}</h4></a>
											<h6>{{$job->company->name}}</h6>					
										</div>
									</div>
									<h5>من قبل:</h5>
									<h5><a href="mailto:{{$job->company->email}}">{{$job->company->email}}</a></h5>
									
									<p class="address"><span class="lnr lnr-database"></span> {{$job->from_date}} - {{$job->to_date}}</p>
								</div>
							</div>	
							<div class="single-post job-details">
								<h4 class="single-title">التفاصيل</h4>
								{{$job->details}}
							</div>
                            
						</div>
					</div>
				</div>	
			</section>

    @endsection()