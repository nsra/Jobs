@extends("_layout")

@section("title")
Create Account
@endsection



@section("content")
<form action="/accounteq" class="form-horizontal" method="post">
    {{csrf_field()}}
          <div class="form-group">
            <label for="fullname" class="col-sm-2 control-label">Full Name</label>
            <div class="col-sm-10">
              <input autofocus type="text" value="{{old("fullname")}}" class="form-control" name="fullname" placeholder="Account Full Name">
            </div>
          </div>
    
    
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" value="{{old("email")}}" class="form-control" id="email" name="email" placeholder="Email">
            </div>
          </div>
    
          <div class="form-group">
            <label for="country_id" class="col-sm-2 control-label">Country</label>
            <div class="col-sm-10">
                <select class="form-control" name="country_id" id="country_id">
                    <option value="">Select Country</option>
                    @foreach($countries as $c)
                    <option {{old("country_id")==$c->id?"selected":""}} value="{{$c->id}}">{{$c->name}} 
                        ({{$c->accounts->count()}})</option>
                    @endforeach
                </select>
            </div>
          </div>
    
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Gender</label>
            <div class="col-sm-10">
                <div class="radio">                
                <label><input {{old("gender")=="M"?"checked":""}} type="radio" name="gender" value="M"/> Male</label>
                <label><input {{old("gender")=="F"?"checked":""}} type="radio" name="gender" value="F"/> Female</label>
                </div>
            </div>
          </div>
    
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <label><input {{old("active")?"checked":""}}  type="checkbox" name="active" value="1"/> Active</label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Create</button>
                <a class="btn btn-default" href="/accounteq">Cancel</a>
            </div>
          </div>
        </form>
@endsection