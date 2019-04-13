@extends("._Layout")

@section("title")
تسيجل فرد
@endsection
@section("content")
<form action="/home/doseekerregister" class="form-horizontal" method="post">
    {{csrf_field()}}
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">اسم الفرد</label>
            <div class="col-sm-10">
              <input autofocus type="text" id="name" value="{{old("name")}}" class="form-control" name="name" placeholder="ادخل اسم الفرد">
            </div>
          </div>
         <div class="form-group">
            <label for="email" class="col-sm-2 control-label">البريد الالكتروني</label>
            <div class="col-sm-10">
              <input autofocus type="text" id="email" value="{{old("email")}}" class="form-control" name="email" placeholder="ادخل البريد الالكتروني">
            </div>
          </div>
    <div class="form-group">
            <label for="password" class="col-sm-2 control-label">كلمة المرور</label>
            <div class="col-sm-10">
              <input autofocus type="password" id="password" value="{{old("password")}}" class="form-control" name="password" placeholder="ادخل كلمة المرور">
            </div>
          </div>
        <div class="form-group">
            <label for="mobile" class="col-sm-2 control-label">رقم الجوال</label>
            <div class="col-sm-10">
              <input autofocus type="text" id="mobile" value="{{old("mobile")}}" class="form-control" name="mobile" placeholder="ادخل رقم الجوال">
            </div>
          </div>
    <div class="form-group">
            <label for="address" class="col-sm-2 control-label">العنوان</label>
            <div class="col-sm-10">
              <input autofocus type="text" id="address" value="{{old("address")}}" class="form-control" name="address" placeholder="ادخل العنوان">
            </div>
          </div>
       <div class="form-group">
           <label for="gender" class="col-sm-2 control-label">الجنس</label>
        <div class="col-sm-2">
            <select class="form-control" id="gender" name="gender">
            <option value="">اي جنس</option>
            <option value="M">ذكر</option>
            <option value="F">انثى</option>
            </select>
        </div>
      </div>
    <div class="form-group">
            <label for="name" class="col-sm-2 control-label">السيرة الذاتية</label>
            <div class="col-sm-10">
              <input type="file" name="cv" src="">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <label><input type="checkbox" name="active" value="1"/> فعال</label>
            </div>
          </div>
    
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">اضافة</button>
                <a class="btn btn-default" href="/seeker/home/profile/{id}">الغاء الامر</a>
            </div>
          </div>
        </form>
@endsection