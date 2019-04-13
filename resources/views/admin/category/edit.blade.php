@extends("admin._layout")

@section("title")
تعديل تصنيف 
@endsection



@section("content")
<form action="/admin/category/{{$item->id}}" class="form-horizontal" method="post">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="put" />
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">التصنيف</label>
            <div class="col-sm-10">
              <input autofocus type="text" value="{{$item->name}}" class="form-control" name="name" placeholder="ادخل اسم التصنيف">
            </div>
          </div>
    
    
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <label><input {{$item->active?"checked":""}}  type="checkbox" name="active" value="1"/> فعال</label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">حفظ</button>
                <a class="btn btn-default" href="/admin/category">الغاء الامر</a>
            </div>
          </div>
        </form>
@endsection