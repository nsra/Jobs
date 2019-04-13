@extends("admin._layout")

@section("title")
الوظائف
@endsection

@section("subtitle")

@endsection

@section("content")
  <form class="row">
    <div class="col-sm-2">
      <input autofocus value="{{$q}}" class="form-control" type="text" name="q" placeholder="بحث بالوظيفة">
    </div>
    <div class="col-sm-2">
      <input value="{{$company}}" class="form-control" type="text" name="company" placeholder="اسم الشركة">
    </div>
    <div class="col-sm-2">
      <select class="form-control" name="jobtype">
        <option value="">جميع الانواع</option>
        @foreach($jobtypes as $jt)
          <option {{($jobtype==$jt->id)?"selected":""}} value="{{$jt->id}}">{{$jt->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-sm-2">
      <select class="form-control" name="jobcategory">
        <option value="">جميع التصنيفات</option>
        @foreach($jobcategories as $jc)
          <option {{($jobcategory==$jc->id)?"selected":""}} value="{{$jc->id}}">{{$jc->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-sm-2">
      <select class="form-control" name="active">
        <option value="">جميع الحالات</option>
        <option {{$active=="1"?"selected":""}} value="1">فعال</option>
        <option {{$active=="0"?"selected":""}} value="0">غير فعال</option>
      </select>
    </div>
    <div class="col-sm-2">
      <button class="btn btn-primary " type="submit">
        <i class="glyphicon glyphicon-search"></i>بحث
      </button>
    </div>
    
  </form>
  <br><br>
  @if($jobs->count()>0)
  <table class="table table-hover">
    <thead><tr><th>عنوان الوظيفة</th><th>الشركة</th><th>نوع الوظيفة</th><th>تصنيف الوظيفة</th><th width="8%">فعال</th><th width="15%">تاريخ البدء</th><th width="15%">تاريخ الانتهاء</th><th width="3%"></th><th width="3%"></th></tr></thead>
    <tbody>
      @foreach($jobs as $j)
      <tr>
        <td>{{$j->title}}</td>
        <td>{{$j->company->name}}</td>
        <td>{{$j->jobtype->name}}</td>
        <td>{{$j->category->name}}</td>
        <td><input type="checkbox" class="cbActive" data-id="{{$j->id}}" {{$j->active==1?"checked":""}} /></td>
        <td>{{$j->from_date}}</td>
        <td>{{$j->to_date}}</td>
        <td>
          <a href="/admin/jobs/{{$j->id}}" class="btn btn-info btn-xs">
                <i class="fa fa-tv"></i>
          </a>
        </td>
        <td>
          <a href="/admin/jobs/{{$j->id}}/delete" class="confirm btn btn-danger btn-xs">
                <i class="fa fa-trash"></i>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <br>
  {{$jobs->links()}}
  @else
  <div class="alert alert-warning">لا يوجد بيانات لعرضها </div>
  @endif
@endsection

@section("js")
  <script>
      $(function() {
          $(".longString").each(function () {
              var maxwidth = 8;
              if ($(this).text().length > maxwidth) {
                  $(this).text($(this).text().substring(0, maxwidth));
                  $(this).html($(this).html() + '...');
              }
          });
          $(".cbActive").click(function(){
              var id=$(this).data("id");
              $.get("/admin/jobs/active/"+id,function(json){
                ShowMessage(json.msg,"ادارة المستخدمين");
                },"json");
          });
      });
  </script>
@endsection
