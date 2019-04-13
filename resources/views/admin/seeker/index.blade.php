@extends("admin._layout")

@section("title")
ادارة الافراد
@endsection



@section("content")
<form class="row">
    <div class="col-sm-3">
      <input value="{{$q}}" type="text" autofocus name="q" placeholder="كلمة البحث" class="form-control" />
    </div>
    <div class="col-sm-2">
        <select class="form-control" name="active">
            <option value="">جميع الحالات</option>
            <option {{$active=="1"?"selected":""}} value="1">فعال</option>
            <option {{$active=="0"?"selected":""}} value="0">غير فعال</option>
        </select>
    </div>
	
	<div class="col-sm-2">
        <select class="form-control" name="gender">
            <option value="">اي جنس</option>
            <option {{$gender=="M"?"selected":""}} value="M">ذكر</option>
            <option {{$gender=="F"?"selected":""}} value="F">انثى</option>
        </select>
    </div>
    
    <div class="col-sm-2">
      <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i> بحث</button>
    </div>
	
	
	
</form> 

@if($items->count()>0)
<table class="table table-striped table-hover">
    <thead>
        <tr><th>اسم الشركه</th><th>البريد الالكتروني</th><th>رقم الجوال</th><th width="5%">فعال؟</th><th width="10%">الجنس</th><th width="15%">تاريخ الانشاء</th>
            <th width="15%"></th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($items as $i)
        <tr>
            <td>{{$i->name}}</td>
            <td>{{$i->email}}</td>
            <td>{{$i->mobile}}</td>
			
            <td><input class="cbActive" value="{{$i->id}}" type="checkbox" 
                       {{$i->active?"checked":""}} /></td>
			<td>{{strtoupper($i->gender)=="M"?"ذكر":"انثى"}}</td>
            <td>{{$i->created_at}}</td>
            <td>
				 <a href="/admin/seeker/{{$i->id}}" class="btn btn-info btn-xs">
                    <i class="glyphicon glyphicon-info-sign"></i>
                </a>
                   
                    
                    <a href="/admin/seeker/{{$i->id}}/delete" class="Confirm btn btn-danger btn-xs">
                        <i class="fa fa-trash"></i>
                    </a>
            </td>
        </tr>
        @endforeach
        
        </tbody>
</table>
{{$items->links()}}
@else
<br><br>
<div class="alert alert-warning">لا يوجد بيانات لعرضها </div>
@endif
@endsection

@section("js")
<script>
    $(function(){
        $(".cbActive").click(function(){
            var id=$(this).val();
            $.get("/admin/seeker/active/"+id,function(json){
                ShowMessage(json.msg,"ادارة الافراد");
            },"json");
        });
    });
</script>
@endsection


