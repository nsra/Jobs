
<form action="/admin/categoryajax" class="ajaxForm form-horizontal" method="post">
    {{csrf_field()}}
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">التصنيف</label>
            <div class="col-sm-10">
              <input autofocus type="text" value="{{old("name")}}" class="form-control" name="name" placeholder="ادخل اسم التصنيف">
            </div>
          </div>
    
    
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <label><input {{old("active")?"checked":""}}  type="checkbox" name="active" value="1"/> فعال</label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">اضافة</button>
                <a class="btn btn-default" data-dismiss="modal" href="/admin/categoryajax">الغاء الامر</a>
            </div>
          </div>
        </form>
<script>
    PageLoadMethods();
</script>