@extends("_layout")

@section("title")
Account Details
@endsection



@section("content")
<dl class="dl-horizontal">
    <dt>Full Name</dt>
    <dd>{{$item->fullname}}</dd>
    <dt>Email</dt>
    <dd>{{$item->email}}</dd>
    <dt>Active</dt>
    <dd>{{$item->active}}</dd>
    <dt>Gender</dt>
    <dd>{{$item->gender}}</dd>
    <dt>Country</dt>
    <dd>{{$item->country_id}}</dd>
</dl>
<a class="btn btn-primary" href="/accounteq/{{$item->id}}/edit">Edit</a>
<a class="btn btn-default" href="/accounteq">Cancel</a>
<hr>
<form action="/accounteq/{{$item->id}}" method="post">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="delete" />
    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">Delete</a>
</form>
@endsection