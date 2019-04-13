@extends("company._layout")

@section("title")
عرض تفاصيل الوظيفة
@endsection



@section("content")
<dl class="dl-horizontal">
    <dt>#</dt>
    <dd>{{$j->id}}</dd>
     <dt>عدد المقدمين اليها</dt>
    <dd>{{$jss->count()}}</dd>
    <dt>اسم الوظيفة</dt>
    <dd>{{$j->title}}</dd>
     <dt>التخصص</dt>
    <dd>{{$j->category->name}}</dd>
    <dt>نوع الدوام</dt>
    <dd>{{$j->jobtype->name}}</dd>
    <dt>متاحة من </dt>
    <dd>{{$j->from_date}}</dd>
    <dt>الى تاريخ </dt>
    <dd>{{$j->to_date}}</dd>
    <dt>تفعيل </dt>
    <dd>{{$j->active}}</dd>
    <dt>التفاصيل</dt>
    <dd>{{$j->details}}</dd>
   
</dl>
<a class="btn btn-primary" href="/company/job/{{$j->id}}/edit">تعديل</a>
<a class="btn btn-default" href="/company/job/">الغاء الامر</a>
<hr>
<form action="/company/job/{{$j->id}}" method="post">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="delete" />
    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">حذف</a>
</form>
@endsection