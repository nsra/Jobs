@extends("seeker._layout")

@section("title")
  
الوظائف المقدم عليها
@endsection()

@section("content")
  <form class="row">
    <div class="col-sm-5">
      <input autofocus value="{{$q}}" class="form-control" type="text" name="q" placeholder="بحث بالوظيفة">
    </div>


    

    <div class="col-sm-2">
        <select class="form-control" name="active">
            <option value="">جميع الحالات</option>
            <option {{$active=="1"?"selected":""}} value="1">فعال</option>
            <option {{$active=="0"?"selected":""}} value="0">غير فعال</option>
        </select>
    </div>
    <div class="col-sm-3">
      <button class="btn btn-primary " type="submit">
        <i class="glyphicon glyphicon-search"></i>بحث
      </button>
    </div>
    
  </form>
  <br><br>
  @if($items->count()>0)
  <table class="table table-hover">
    <thead><tr><th>عنوان الوظيفة</th><th>الشركة</th><th width="8%">فعال</th><th width="15%">تاريخ البدء</th><th width="15%">تاريخ الانتهاء</th><th width="3%"></th><th width="3%"></th></tr></thead>
    <tbody>
      @foreach($items as $j)
      <tr>
        <td>{{$j->job->title}}</td>
        <td>{{$j->job->company->name}}</td>
        <td>{{$j->active==1?"فعال":"غير فعال"}}</td>
        <td>{{$j->job->from_date}}</td>
        <td>{{$j->job->to_date}}</td>
        
        <td>
            @if($j->job->to_date>now())
          <a href="/seeker/home/{{$j->id}}/delete" class="Confirm btn btn-danger btn-xs">
                <i class="fa fa-trash"></i>
          </a>
            @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <br>
  {{$items->links()}}
  @else
  <div class="alert alert-warning">لا يوجد بيانات لعرضها </div>
  @endif
@endsection

@section("js")
  <script>
      $(document).ready(function () { //
          $(".longString").each(function () {
              var maxwidth = 8;
              if ($(this).text().length > maxwidth) {
                  $(this).text($(this).text().substring(0, maxwidth));
                  $(this).html($(this).html() + '...');
              }
          });
      });
  </script>
@endsection
