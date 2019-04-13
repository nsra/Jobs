@extends("admin._layout")

@section("title")
وظيفة  {{ $job->title }}
@endsection

@section("subtitle")

@endsection

@section("content")
  <dl class="dl-horizontal">
    <dt>عوان الوظيفة</dt>
    <dd>{{$job->title}}</dd><br>
    <dt>تفاصيل الوظيفة</dt>
    <dd>{{$job->details}}</dd><br>
    <dt>تصنيف الوظيفة</dt>
    <dd>{{$job->category->name}}</dd><br>
    <dt>اسم الشركة</dt>
    <dd>{{$job->company->name}}</dd><br>
    <dt>فعالة؟</dt>
    <dd>{{$job->active?"فعال":"غير فعال"}}</dd><br>
    <dt>تاريخ البدء</dt>
    <dd>{{$job->to_date}}</dd><br>
    <dt>تاريخ الانتهاء</dt>
    <dd>{{$job->from_date}}</dd><br>
  </dl>
    <a class="btn btn-danger" href="/admin/jobs/{{$job->id}}/delete">حذف</a>
    <a class="btn btn-default" href="/admin/jobs">عودة</a>
@endsection
