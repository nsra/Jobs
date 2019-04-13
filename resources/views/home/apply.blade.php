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
				@include("_msg")
			<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
                    <form method="post" enctype="multipart/form-data" action="/job/{{$item->id}}/apply" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="fullname" class="col-sm-2 control-label">الاسم</label>
                            <div class="col-sm-10">
                              <input autofocus type="text" value="{{$item->name}}" class="form-control" id="name" name="name" placeholder="Seeker Name">
                            </div>
                          </div>


                          <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">البريد االالكتروني</label>
                            <div class="col-sm-10">
                              <input type="email" value="{{$item->email}}" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="country_id" class="col-sm-2 control-label">جوال</label>
                            <div class="col-sm-10">
                                <input type="number" value="{{$item->mobile}}" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
                            </div>
                          </div>
                        
                        
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">السيرة الذاتية</label>
        <div class="col-sm-10">
            <input type="file" name="cv" />
            <span>يجب أن يكون الملف من نوع PDF, doc, docx</span>
            @if($item->cv!=NULL)
            <br><br>
            <a target="_blank" class="btn btn-info btn-sm" href="/data/cvs/{{$item->cv}}">سيتم التقدم بالسيرة الذاتية الحالية</a>
            @endif
        </div>
    </div>
    
                        <hr>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                @if($js==NULL)
              <button type="submit" class="btn btn-lg btn-primary">التحق الان</button>
                @else
                <span class="alert alert-success">لقد تم التقدم لهذه الوظيفة بنجاح</span>
                @endif
            </div>
          </div>
                    </form>
				</div>	
			</section>

    @endsection()