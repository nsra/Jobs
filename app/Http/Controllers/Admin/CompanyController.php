<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Company;
class CompanyController extends BaseController
{
    public function index(Request $request)
    {
        $q=$request["q"];
        $active=$request["active"];
        
        
        $items=Company::whereRaw("isdelete=0");
        if($q!=NULL)
            $items=$items->whereRaw("(name like ? or email like ? or mobile like ?)",["%$q%","%$q%","%$q%"]);
        if($active!=NULL)
            $items=$items->whereRaw("active = ?",[$active]);
        
        $items=$items->paginate(7)->appends(["q"=>$q,"active"=>$active]);
        return view("admin.company.index",compact("items","q","active"));
    }	
	
    public function show($id)
    {
        $item=Company::find($id);
        if($item==NULL)
            return redirect("/admin/company");
        return view("admin.company.show",compact("item"));
    }
	
	
    public function destroy($id)
    {
        $item = Company::find($id);
        if($item==NULL)
            return redirect("/admin/company");
        $item->isdelete=1;
        $item->updated_by=$this->adminId;       
        $item->save();
        
        \Session::flash("msg","w:تمت عملية الحذف بنجاح");
        return redirect("/admin/company");
    }
    
    public function active($id)
    {
        $item = Company::find($id);
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