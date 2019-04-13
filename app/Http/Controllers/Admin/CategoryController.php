<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;

class CategoryController extends BaseController
{
    public function index(Request $request)
    {
        $q=$request["q"];
        $active=$request["active"];
        
        
        $items=Category::whereRaw("isdelete=0");
        if($q!=NULL)
            $items=$items->whereRaw("(name like ?)",["%$q%"]);
        if($active!=NULL)
            $items=$items->whereRaw("active = ?",[$active]);
        
        $items=$items->paginate(7)->appends(["q"=>$q,"active"=>$active]);
        return view("admin.category.index",compact("items","q","active"));
    }

    public function create()
    {
        return view("admin.category.create");
    }

    public function store(CategoryRequest $request)
    {        
        /*$IsExists=Category::where("isdelete",0)
            ->where("name",$request["name"])->count();*/
        $IsExists=Category::whereRaw("isdelete=0 and name=?",$request["name"])->count();
        if($IsExists>0){
            \Session::flash("msg","e:".$request["name"]." موجود مسبقا لدينا ");
            return redirect("/admin/category/create")->withInput();  
        }
        $item = new Category();
        
        $item->name= $request["name"];
        $item->active= $request["active"]?1:0;
        $item->created_by=$this->adminId;
        $item->isdelete=0;
        $item->save();
        
        \Session::flash("msg","i:تمت عملية الاضافة بنجاح");
        return redirect("/admin/category/create");
    }

    public function edit($id)
    {
        $item=Category::find($id);
        if($item==NULL)
            return redirect("/admin/category");
        return view("admin.category.edit",compact("item"));
    }
    public function update(CategoryRequest $request, $id)
    {   
        $IsExists=Category::whereRaw("isdelete=0 and id!=$id and name=?",$request["name"])->count();
        if($IsExists>0){
            \Session::flash("msg","e:".$request["name"]." موجود مسبقا لدينا ");
            return redirect("/admin/category/$id/edit");  
        }
        $item = Category::find($id);
        
        $item->name= $request["name"];
        $item->active= $request["active"]?1:0;
        $item->updated_by=$this->adminId;
       
        $item->save();
        
        \Session::flash("msg","s:تمت عملية الحفظ بنجاح");
        return redirect("/admin/category");
    }
    public function destroy($id)
    {
        $item = Category::find($id);
        if($item==NULL)
            return redirect("/admin/category");
        $item->isdelete=1;
        $item->updated_by=$this->adminId;       
        $item->save();
        
        \Session::flash("msg","w:تمت عملية الحذف بنجاح");
        return redirect("/admin/category");
    }
    
    public function active($id)
    {
        $item = Category::find($id);
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
