@extends("_Layout")

@section("title")
تسيجل شركة
@endsection
@section("content")
<form action="/home/postcompanyregister" class="form-horizontal" method="post">
    {{csrf_field()}}
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">اسم الشركة</label>
            <div class="col-sm-10">
              <input autofocus type="text" value="{{old("name")}}" class="form-control" name="name" placeholder="ادخل اسم الشركة">
            </div>
          </div>
         <div class="form-group">
            <label for="name" class="col-sm-2 control-label">البريد الالكتروني</label>
            <div class="col-sm-10">
              <input autofocus type="text" value="{{old("name")}}" class="form-control" name="name" placeholder="ادخل البريد الالكتروني">
            </div>
          </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">رقم الجوال</label>
            <div class="col-sm-10">
              <input autofocus type="text" value="{{old("name")}}" class="form-control" name="name" placeholder="ادخل رقم الجوال">
            </div>
          </div>
    <div class="form-group">
            <label for="name" class="col-sm-2 control-label">التفاصيل</label>
            <div class="col-sm-10">
              <input autofocus type="text" value="{{old("name")}}" class="form-control" name="name" placeholder="ادخل تفاصيل الشركة">
            </div>
          </div>
    <div class="form-group">
            <label for="name" class="col-sm-2 control-label">الشعار</label>
            <div class="col-sm-10">
              <input type="file" src="" href"" class="form-control" name="name">
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
                <a class="btn btn-default" href="/company/home/profile/{id}">الغاء الامر</a>
            </div>
          </div>
        </form>
@endsection