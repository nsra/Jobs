
@if ($errors->any())
<div class="alert alert-danger">
<ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif

@if(Session::get("msg")!=NULL)
<?php
    $msgClass="alert-info";
    $msg=Session::get("msg");
    $f2l=strtolower(substr($msg,0,2));
    if($f2l=="s:"){
        $msgClass="alert-success"; $msg=substr($msg,2);
    }
    else if($f2l=="e:"){
        $msgClass="alert-danger"; $msg=substr($msg,2);
    }
    else if($f2l=="i:"){
        $msgClass="alert-info"; $msg=substr($msg,2);
    }
    else if($f2l=="w:"){
        $msgClass="alert-warning"; $msg=substr($msg,2);
    }
?>
<div class="alert {{$msgClass}}">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{$msg}}
</div>
@endif
    