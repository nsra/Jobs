@extends("_layout")


@section("title")
سجل معنا
@endsection

@section("content")
<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								About Us				
							</h1>	
							<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about-us.html"> About Us</a></p>
						</div>											
					</div>
				</div>
			</section>
<div class="form">

      <ul class="tab-group">
        <li class="tab active"><a href="#seekersignup">افراد</a></li>
        <li class="tab"><a href="#companysignup">شركات</a></li>
      </ul>

      <div class="tab-content">
        <div id="seekersignup">

          <form action="/home/signupseeker" method="POST">
          {{csrf_field()}}
          <div class="top-row">
            <div class="field-wrap">
              <label>
                الاسم<span class="req"> </span>
              </label>
              <input type="text" required autofocus autocomplete="off" name="name" />
            </div>

            <div class="field-wrap">
              <select class="form-control" name="gender">
                <option value="">الجنس</option>
                <option value="1">ذكر</option>
                <option value="0">انثى</option>
              </select>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              البريد الالكتروني<span class="req"> </span>
            </label>
            <input type="email" required autocomplete="off" name="email"/>
          </div>

          <div class="field-wrap">
            <label>
              رقم الجوال<span class="req"> </span>
            </label>
            <input type="text" required autocomplete="off" name="mobile"/>
          </div>

          <div class="field-wrap">
            <label>
              العنوان<span class="req"> </span>
            </label>
            <input type="text" required autocomplete="off" name="address"/>
          </div>

          <div class="field-wrap">
            <label>
              تاريخ الميلاد<span class="req"> </span>
            </label>
            <input type="date" class="date" required autocomplete="off" name="dob"/>
          </div>

          <div class="field-wrap">
            <input class="uploud" type="file" name="cv" accept="image/*">
          </div>
			  
		  <div class="field-wrap">
            <label>
              كلمة المرور<span class="req"> </span>
            </label>
            <input type="password" required autocomplete="off" name="password"/>
          </div>
			  
          <button type="submit" class="button button-block" >سجل</button>

          </form>

        </div>

        <div id="companysignup">
          <form action="/home/signupcompany" method="post">
            {{csrf_field()}}
              
              <div class="field-wrap">
              <label>
                الاسم<span class="req"> </span>
              </label>
              <input type="text" required autocomplete="off" name="name"/>
            </div>

            <div class="field-wrap">
              <label>
                البريد الالكتروني<span class="req"> </span>
              </label>
              <input type="email" required autocomplete="off" name="email"/>
            </div>

            <div class="field-wrap">
              <label>
                رقم الجوال<span class="req"> </span>
              </label>
              <input type="text" required autocomplete="off" name="mobile"/>
            </div>

            <div class="field-wrap">
              <label>
                العنوان<span class="req"> </span>
              </label>
              <input type="text" required autocomplete="off" name="address"/>
            </div>

            <div class="field-wrap">
              <label>
                التفاصيل<span class="req"> </span>
              </label>
              <textarea class="" required  name="details">
              </textarea>
            </div>
            <div class="field-wrap">
              <input class="uploud" type="file" name="logo">
            </div>
            <div class="field-wrap">
              <label>
                كلمة المورو<span class="req"> </span>
              </label>
              <input type="password"required autocomplete="off" name="password"/>
            </div>
            <button type="submit" class="button button-block" >سجل</button>
          </form>

        </div>
          
          
      </div><!-- tab-content -->

</div> <!-- /form -->
@endsection

@section("css")
<style>
select,textarea,.uploud,.date{
    background-color: #2a3943!important;
    color: #959ca1!important;
}
select>option,textarea{
padding-bottom: 0px;
font-size: 22px!important;
}
textarea{
  max-width:100%;
  col:75;
  max-height:200px;
}
.form-control{
padding-bottom: 0px;
font-size: 22px!important;
}
.page-header h1{
  color: #35a7e7;
}

*, *:before, *:after {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

html {
  overflow-y: scroll;
}

body {
  background: #ffffff;
  font-family: 'Titillium Web', sans-serif;
}

a {
  text-decoration: none;
  color: #32a5e7;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
a:hover {
  color: #32a5e7;
}

.form {
  background: rgba(19, 35, 47, 0.9);
  padding: 40px;
  max-width: 600px;
  margin: 40px auto;
  border-radius: 4px;
  -webkit-box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
          box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
}

.tab-group {
  list-style: none;
  padding: 0;
  margin: 0 0 40px 0;
}
.tab-group:after {
  content: "";
  display: table;
  clear: both;
}
.tab-group li a {
  display: block;
  text-decoration: none;
  padding: 15px;
  background: rgba(160, 179, 176, 0.25);
  color: #a0b3b0;
  font-size: 20px;
  float: left;
  width: 50%;
  text-align: center;
  cursor: pointer;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
.tab-group li a:hover {
  background: #32a5e7;
  color: #ffffff;
}
.tab-group .active a {
  background: #32a5e7;
  color: #ffffff;
}

.tab-content > div:last-child {
  display: none;
}

h1 {
  text-align: center;
  color: #ffffff;
  font-weight: 300;
  margin: 0 0 40px;
}

label {
  position: absolute;
  -webkit-transform: translateY(6px);
          transform: translateY(6px);
  left: 13px;
  color: rgba(255, 255, 255, 0.5);
  -webkit-transition: all 0.25s ease;
  transition: all 0.25s ease;
  -webkit-backface-visibility: hidden;
  pointer-events: none;
  font-size: 22px;
}
label .req {
  margin: 2px;
  color: #32a5e7;
}

label.active {
  -webkit-transform: translateY(50px);
          transform: translateY(50px);
  left: 2px;
  font-size: 14px;
}
label.active .req {
  opacity: 0;
}

label.highlight {
  color: #ffffff;
}

input, textarea {
  font-size: 22px;
  display: block;
  width: 100%;
  height: 100%;
  padding: 5px 10px;
  background: none;
  background-image: none;
  border: 1px solid #a0b3b0;
  color: #ffffff;
  border-radius: 0;
  -webkit-transition: border-color .25s ease, -webkit-box-shadow .25s ease;
  transition: border-color .25s ease, -webkit-box-shadow .25s ease;
  transition: border-color .25s ease, box-shadow .25s ease;
  transition: border-color .25s ease, box-shadow .25s ease, -webkit-box-shadow .25s ease;
}
input:focus, textarea:focus {
  outline: 0;
  border-color: #32a5e7;
}

textarea {
  border: 2px solid #a0b3b0;
  resize: vertical;
}

.field-wrap {
  position: relative;
  margin-bottom: 40px;
}

.top-row:after {
  content: "";
  display: table;
  clear: both;
}
.top-row > div {
  float: left;
  width: 48%;
  margin-right: 4%;
}
.top-row > div:last-child {
  margin: 0;
}

.button {
  border: 0;
  outline: none;
  border-radius: 0;
  padding: 15px 0;
  font-size: 2rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .1em;
  background: #32a5e7;
  color: #ffffff;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
  -webkit-appearance: none;
}
.button:hover, .button:focus {
  background: #32a5e7;
}

.button-block {
  display: block;
  width: 100%;
}

.forgot {
  margin-top: -20px;
  text-align: right;
}
</style>
@endsection


@section("js")

<script>
$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight');
			} else {
		    label.removeClass('highlight');
			}
    } else if (e.type === 'focus') {

      if( $this.val() === '' ) {
    		label.removeClass('highlight');
			}
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {

  e.preventDefault();

  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');

  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();

  $(target).fadeIn(600);

});
</script>

<script src="/AdminTemplate/metronic-rtl/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/AdminTemplate/metronic-rtl/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
@endsection
