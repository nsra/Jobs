@extends("admin._layout")

@section("title")
تعديل الفرد
@endsection



@section("content")
<dl class="dl-horizontal">
    <dt>الاسم</dt>
    <dd>{{$item->name}}</dd>
    <dt>الايميل</dt>
    <dd>{{$item->email}}</dd>
    <dt>فعال؟</dt>
    <dd>{{$item->active}}</dd>
    <dt>رقم الجوال</dt>
    <dd>{{$item->mobile}}</dd>
    <dt>السيره الذاتيه</dt>
    <dd>{{$item->cv}}</dd>
	<dt>تاريخ الانشاء</dt>
    <dd>{{$item->created_at}}</dd>
	<dt>تاريخ التعديل</dt>
    <dd>{{$item->updated_at}}</dd>
	<dt>Id</dt>
    <dd>{{$item->id}}</dd>
	<dt>UserId</dt>
    <dd>{{$item->user_id}}</dd>
	<dt>ISDelete</dt>
    <dd>{{$item->isdelete}}</dd>
	<dt>العنوان</dt>
    <dd>{{$item->address}}</dd>
	<dt>تاريخ الميلاد</dt>
    <dd>{{$item->dob}}</dd>
	<dt>الجنس</dt>
    <dd>{{$item->gender}}</dd>
</dl>


<a class="btn btn-default" href="/admin/seeker">رجوع</a>
<hr>
 <a class="btn btn-danger Confirm btn-md" href="/admin/seeker/{{$item->id}}/delete" >
	 <i class="fa fa-trash"></i>حزف الفرد</a>
@endsection