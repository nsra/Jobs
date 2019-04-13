@extends("company._layout")

@section("title")

الملف الشخصي
@endsection

@section("content")
<form enctype="multipart/form-data" action="/company/home/profile" class="form-horizontal" method="post">
    {{csrf_field()}}
    
    <div class="form-group">
        <label for="fullname" class="col-sm-2 control-label">الاسم</label>
        <div class="col-sm-10">
            <input autofocus type="text" value="{{$item->name}}" class="form-control" id="name" name="name" placeholder="company Name">
        </div>
    </div>
    
    <div class="form-group">
        <label for="country_id" class="col-sm-2 control-label">وصف</label>
        <div class="col-sm-10">
            <textarea rows="5" class="form-control" id="detailsdetails" name="details" placeholder="details">{{$item->details}}</textarea>
        </div>
    </div>
        
    
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">البريد االالكتروني</label>
        <div class="col-sm-10">
            <input type="email" value="{{$item->email}}" class="form-control" id="email" name="email" placeholder="Email">
        </div>
    </div>
    
    <div class="form-group">
        <label for="country_id" class="col-sm-2 control-label">جوال</label>
        <div class="col-sm-10">
            <input type="number" value="{{$item->mobile}}" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
        </div>
    </div>
    
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">العنوان</label>
        <div class="col-sm-10">
            <input type="text" value="{{$item->address}}" class="form-control" id="address" name="address" placeholder="Address">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">لتغيير الشعار</label>
        <div class="col-sm-10">
            <input type="file" name="img" />
            @if($item->logo!=NULL)
            <hr>
            <img width="200" src="/data/images/{{$item->logo}}" class="img-responsive img-thumbnail" />
            @endif
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">تحديث</button>
            <a class="btn btn-default" href="/company/home/profile/{id}">إلغاء</a>
        </div>
    </div>
</form>

@endsection()