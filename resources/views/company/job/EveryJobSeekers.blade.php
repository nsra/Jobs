@extends("company._layout")

@section("title")
المقدمين لوظيفه {{$job->title}}
@endsection



@section("content")
  <form class="row">
      
    <div class="col-sm-4">
      <input autofocus value="{{$q}}" class="form-control" type="text" name="q" placeholder="بحث الاسم او الايميل او رقم الجوال ">
    </div>
    <div class="col-sm-2">
      <button class="btn btn-primary " type="submit">
        <i class="glyphicon glyphicon-search"></i>بحث
      </button>
    </div>
    
  </form>
  <br><br>
  @if($jss->count()>0)

  <table class="table table-hover">
    <thead><tr>
    <th>رقم المتقدم</th><th>الاسم</th><th>الايميل</th><th >الجوال</th><th >السيره الذاتيه</th><th>تاريخ التقديم</th><th width="20%">فعال</th>
    </tr></thead>
    <tbody>
      @foreach($jss as $js)
      <tr>
        <td>{{$js->id}}</td>
        <td>{{$js->name}}</td>
        <td>{{$js->email}}</td>
        <td>{{$js->mobile}}</td>
           <td>{{$js->cv}}</td>
          <td>{{$js->created_at}}</td>
         
        <td>
               {{$js->seeker->active==1?"فعال":"غير فعال"}}
         
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <br>
  {{$jss->links()}}
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
endsection

