



<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Seeker;
class SeekerController extends BaseController
{
    public function index(Request $request)
    {
        $q=$request["q"];
        $active=$request["active"];
        $gender=$request["gender"];
        
        $items=Seeker::whereRaw("isdelete=0");
		
		 if($gender!=NULL)
            $items=$items->whereRaw("gender = ?",[$gender]);
        if($q!=NULL)
            $items=$items->whereRaw("(name like ? or email like ? or mobile like ?)",["%$q%","%$q%","%$q%"]);
        if($active!=NULL)
            $items=$items->whereRaw("active = ?",[$active]);
        
        $items=$items->paginate(7)->appends(["q"=>$q,"active"=>$active,"gender"=>$gender]);
        return view("admin.seeker.index",compact("items","q","active","gender"));
    }
	
    public function show($id)
    {
        $item=Seeker::find($id);
        if($item==NULL)
            return redirect("/admin/seeker");
        return view("admin.seeker.show",compact("item"));
    }
	
    public function destroy($id)
    {
        $item = Seeker::find($id);
        if($item==NULL)
            return redirect("/admin/seeker");
        $item->isdelete=1;
        $item->updated_by=$this->adminId;       
        $item->save();
        
        \Session::flash("msg","w:تمت عملية الحذف بنجاح");
        return redirect("/admin/seeker");
    }
    
    public function active($id)
    {
        $item = Seeker::find($id);
        if($item==NULL)
            return "Invalid ID";
        //$item->active=1-$item->active;
        $item->active=!$item->active;
        $item->updated_by=$this->adminId;       
        $item->save();
        
        return response()->json([
            'status' => 1,
            'msg' => 's:تمت عملية الحفظ بنجاح'
        ]);
    }
}