@extends("_layout")

@section("title")
Edit Account
@endsection



@section("content")
<form action="/accounteq/{{$item->id}}" class="form-horizontal" method="post">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="put"/>
          <div class="form-group">
            <label for="fullname" class="col-sm-2 control-label">Full Name</label>
            <div class="col-sm-10">
              <input autofocus type="text" value="{{$item->fullname}}" class="form-control" id="fullname" name="fullname" placeholder="Account Full Name">
            </div>
          </div>
    
    
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" value="{{$item->email}}" class="form-control" id="email" name="email" placeholder="Email">
            </div>
          </div>
    
          <div class="form-group">
            <label for="country_id" class="col-sm-2 control-label">Country</label>
            <div class="col-sm-10">
                <select class="form-control" name="country_id" id="country_id">
                    <option value="">Select Country</option>
                    @foreach($countries as $c)
                    <option {{$item->country_id==$c->id?"selected":""}} value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
          </div>
    
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Gender</label>
            <div class="col-sm-10">
                <div class="radio">                
                <label><input {{$item->gender=="M"?"checked":""}} type="radio" name="gender" value="M"/> Male</label>
                <label><input {{$item->gender=="F"?"checked":""}} type="radio" name="gender" value="F"/> Female</label>
                </div>
            </div>
          </div>
    
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <label><input {{$item->active?"checked":""}}  type="checkbox" name="active" value="1"/> Active</label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-default" href="/accounteq">Cancel</a>
            </div>
          </div>
        </form>
@endsection