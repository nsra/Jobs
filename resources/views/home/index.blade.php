

@extends("_layout")
@section("content")

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-center">
						<div class="banner-content col-lg-12">
							<h1 class="text-white">
								<span>1500+</span> عدد الوظائف				
							</h1>	
							<form action="/jobs" method="get" class="serach-form-area">
								<div class="row justify-content-center form-wrap">
									<div class="col-lg-4 form-cols">
										<input type="text" class="form-control" name="q" placeholder="اكتب كلمة البحث">
									</div>
									<div class="col-lg-3 form-cols">
										<div class="default-select" id="default-selects">
											<select name="type">
												<option value="">نوع الوظيفة</option>
												 @foreach($jobtypes as $jt)
                                                  <option value="{{$jt->id}}">{{$jt->name}}</option>
                                                @endforeach
											</select>
										</div>
									</div>
									<div class="col-lg-3 form-cols">
										<div class="default-select" id="default-selects2">
											<select class="">
												<option value="">تصنيفات الوظيفة</option>
                                                 @foreach($jobcategories as $jc)
                                                  <option value="{{$jc->id}}">{{$jc->name}}</option>
                                                @endforeach
											</select>
										</div>										
									</div>
									<div class="col-lg-2 form-cols">
									    <button type="submit" class="btn btn-info">
									      <span class="lnr lnr-magnifier"></span> بحث
									    </button>
									</div>								
								</div>
							</form>	
						</div>											
					</div>
				</div>
			</section>

			<section class="post-area section-gap">
				<div class="container">
            @include("_msg")
					<div class="row justify-content-center d-flex">
						<div class="col-lg-8 post-list">		
                            
                            @foreach($topJobs as $j)
							<div class="single-post d-flex flex-row">
								<div class="thumb">
									<img style="max-width:150px;" src="/data/images/{{$j->company->logo}}" alt="">
									
								</div>
								<div style="width:100%" class="details">
                                    
										<ul style="float:left" class="btns">
											<li><a href="/job/{{$j->id}}/apply">التحق الان</a></li>
										</ul>
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="/job/{{$j->id}}"><h4>{{$j->title}}</h4></a>
											<h6>{{$j->company->name}}</h6>					
										</div>
									</div>
									<p>
										{{substr($j->details,0,200)}}...
									</p>
									<h5><a href="mailto:{{$j->company->email}}">{{$j->company->email}}</a></h5>
									
									<p class="address"><span class="lnr lnr-database"></span> {{$j->from_date}} - {{$j->to_date}}</p>
                                    
                                    <ul style="float:left" class="btns">
											<li><a href="#">{{$j->jobtype->name}}</a></li>
											<li><a href="#">{{$j->category->name}}</a></li>
										</ul>
								</div>
							</div>
                            @endforeach()
                            
						</div>
						<div class="col-lg-4 sidebar">
							<div class="single-slidebar">
								<h4>أنواع الوظائف</h4>
								<ul class="cat-list">
                                    @foreach($jobtypes as $jt)
                                      <li><a class="justify-content-between d-flex" href="/jobs?type={{$jt->id}}"><p>{{$jt->name}}</p></a></li>
                                    @endforeach
								</ul>
							</div>
							<div class="single-slidebar">
								<h4>تصنيفات الوظائف</h4>
								<ul class="cat-list">
                                    @foreach($jobcategories as $jc)
                                      <li><a class="justify-content-between d-flex" href="/jobs?category={{$jc->id}}"><p>{{$jc->name}}</p></a></li>
                                    @endforeach
								</ul>
							</div>
					

						</div>
					</div>
				</div>	
			</section>
			<!-- End post Area -->
				

		@endsection()