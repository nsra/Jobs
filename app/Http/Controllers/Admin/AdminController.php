<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Admin;
use App\User;
use Illuminate\Support\Facades\Hash;
class AdminController extends BaseController
{
    public function index(Request $request)
    {
        $q=$request["q"];
        $active=$request["active"];
        
        
        $items=Admin::whereRaw("isdelete=0");
        if($q!=NULL)
            $items=$items->whereRaw("(name like ? or email like ? or mobile like ?)",["%$q%","%$q%","%$q%"]);
        if($active!=NULL)
            $items=$items->whereRaw("active = ?",[$active]);
        
        $items=$items->paginate(7)->appends(["q"=>$q,"active"=>$active]);
        return view("admin.admin.index",compact("items","q","active"));
    }

    public function create()
    {
        return view("admin.admin.create");
    }

    public function store(AdminRequest $request)
    {      
        if($request["password"]=="" || strlen($request["password"])<6){            
            \Session::flash("msg","e:يجب ادخال كلمة المرور6 أحرف");
            return redirect("/admin/admin/create")->withInput();  
        }
        $IsExists=User::whereRaw("email=?",$request["email"])->count();
        if($IsExists>0){
            \Session::flash("msg","e:".$request["name"]." موجود مسبقا لدينا ");
            return redirect("/admin/admin/create")->withInput();  
        }
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        
        $IsExists=Admin::whereRaw("isdelete=0 and email=?",$request["email"])->count();
        if($IsExists>0){
            \Session::flash("msg","e:".$request["name"]." موجود مسبقا لدينا ");
            return redirect("/admin/admin/create")->withInput();  
        }
        $item = new Admin();
        $item->user_id=$user->id;
        $item->name= $request["name"];
        $item->email= $request["email"];
        $item->mobile= $request["mobile"];
        $item->active= $request["active"]?1:0;
        $item->created_by=$this->adminId;
        $item->isdelete=0;
        $item->save();
        
        \Session::flash("msg","i:تمت عملية الاضافة بنجاح");
        return redirect("/admin/admin/create");
    }

    public function edit($id)
    {
        $item=Admin::find($id);
        if($item==NULL)
            return redirect("/admin/admin");
        return view("admin.admin.edit",compact("item"));
    }
    public function update(AdminRequest $request, $id)
    {           
        $item = Admin::find($id);
        $user = User::find($item->user_id);
        $user->name = $request["name"];
        if($request["password"]!=""){
            $user->password=Hash::make($request['password']);
        }
        $user->save();
        $item->name= $request["name"];
        $item->mobile= $request["mobile"];        
        $item->active= $request["active"]?1:0;
        $item->updated_by=$this->adminId;
       
        $item->save();
        
        \Session::flash("msg","s:تمت عملية الحفظ بنجاح");
        return redirect("/admin/admin");
    }
    public function destroy($id)
    {
        $item = Admin::find($id);
        if($item==NULL)
            return redirect("/admin/admin");
        $item->isdelete=1;
        $item->updated_by=$this->adminId;       
        $item->save();
        
        \Session::flash("msg","w:تمت عملية الحذف بنجاح");
        return redirect("/admin/admin");
    }
    
    public function active($id)
    {
        $item = Admin::find($id);
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
