@extends("admin._layout")

@section("title")
تفاصيل الشركه
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
    <dt>الشعار</dt>
    <dd>{{$item->logo}}</dd>
	<dt>تاريخ الانشاء</dt>
    <dd>{{$item->created_at}}</dd>	
	<dt>العنوان</dt>
    <dd>{{$item->address}}</dd>
	<dt>التفاصيل</dt>
    <dd>{{$item->details}}</dd>
</dl>

<a class="btn btn-default" href="/admin/company">الغاء</a>
<hr>
 <a class="btn btn-danger Confirm btn-md" href="/admin/company/{{$item->id}}/delete" >
	 <i class="fa fa-trash"></i>حذف الشركه</a>
@endsection