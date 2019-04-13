<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;

class CategoryAjaxController extends BaseController
{
    
	public function AjaxDT(Request $request)
    {
		$order_by_index=$request->input("order")[0]["column"];
		$order_by_direction=$request->input("order")[0]["dir"];		
		$columns=array("name","active","created_at");
        
        $q=$request->input("q");     
        $active=$request->input("active");      
        $qs="%".str_replace(" ","%",$q)."%";      
		
        $items = Category::whereRaw("isdelete=0 and (category.name like ?)",[$qs]);
        if($active!=NULL)
            $items=$items->whereRaw("active=?",[$active]);
        
		$Length=$request->input("length");
		$Start=$request->input("start");
		$Draw=$request->input("Draw");
		$totalCount = $items->count();
		
        $items=$items
		->orderby($columns[$order_by_index],$order_by_direction)->take($Length)->skip($Start)->get();
         
		 
		return response()
            ->json(['draw' => $Draw,"recordsTotal"=>$totalCount,
			"recordsFiltered"=>$totalCount,
			"data"=>$items]);
    }
    public function index()
    {
        return view("admin.categoryajax.index");
    }

    public function create()
    {
        return view("admin.categoryajax.create");
    }

    public function store(CategoryRequest $request)
    {        
        $IsExists=Category::whereRaw("isdelete=0 and name=?",$request["name"])->count();
        if($IsExists>0){            
            return response()->json([
                'status' => 0,
                'msg' => "e:".$request["name"]." موجود مسبقا لدينا "
            ]);
        }
        $item = new Category();
        
        $item->name= $request["name"];
        $item->active= $request["active"]?1:0;
        $item->created_by=$this->adminId;
        $item->isdelete=0;
        $item->save();        
                
        return response()->json([
            'status' => 1,
            'msg' => "i:تمت عملية الاضافة بنجاح"
        ]);
    }

    public function edit($id)
    {
        $item=Category::find($id);
        if($item==NULL)
            return redirect("/admin/categoryajax");
        return view("admin.categoryajax.edit",compact("item"));
    }
    public function update(CategoryRequest $request, $id)
    {   
        $IsExists=Category::whereRaw("isdelete=0 and id!=$id and name=?",$request["name"])->count();
        if($IsExists>0){
              
            return response()->json([
                'status' => 0,
                'msg' => "e:".$request["name"]." موجود مسبقا لدينا "
            ]);
        }
        $item = Category::find($id);
        
        $item->name= $request["name"];
        $item->active= $request["active"]?1:0;
        $item->updated_by=$this->adminId;
       
        $item->save();
        
         
        return response()->json([
            'status' => 1,
            'msg' => "i:تمت عملية الحقظ بنجاح"
        ]);
    }
    public function destroy($id)
    {
        $item = Category::find($id);
        if($item==NULL)
            return redirect("/admin/categoryajax");
        $item->isdelete=1;
        $item->updated_by=$this->adminId;       
        $item->save();
        
         
       return response()->json([
           'status' => 1,
            'msg' => "i:تمت عملية الحذف بنجاح"
        ]);
        //return redirect("/admin/categoryajax");
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
