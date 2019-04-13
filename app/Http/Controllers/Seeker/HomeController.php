<?php

namespace App\Http\Controllers\Seeker;
use App\JobSeeker;
use App\Seeker;
use Illuminate\Http\Request;
class HomeController extends BaseController
{
    
    public function jobs(Request $request)
    {
      $q = $request["q"];
      $active = $request["active"];        
      $items=JobSeeker::where("seeker_id",$this->seekerId);
    
        
      if ($q!=NULL)
          $items=$items->whereRaw("(job.title like ? or job.details like ?)",["%$q%","%$q%"]);
        
      if($active!=NULL){
          if($active)
              $items=$items->whereRaw("job.to_date>=sysdate()");
          else
              $items=$items->whereRaw("job.to_date<sysdate()");
      }
      $items=$items->paginate(5)->appends(["q"=>$q ,"active"=>$active]); 
      return view("seeker.home.jobs",compact("items","q","active"));
                                           

    }

    
	
    public function destroy($id)
    { 
        $item = JobSeeker::find($id);
        if($item->seeker_id==$this->seekerId){
            $item->delete();
        }
        else{            
            \Session::flash("msg","e:الرجاء التأكد من الرقم المطلوب");
            return redirect("seeker/home/jobs");
        }
        \Session::flash("msg","w:تمت عملية الحذف بنجاح");
        return redirect("seeker/home/jobs");
    }
    
    public function profile(){
        $item=Seeker::find($this->seekerId);
        return view("seeker.home.profile",compact("item"));
    }
    
    public function updateprofile(Request $request)
    {       
        
        $item = Seeker::find($this->seekerId);        
        $item->name= $request["name"];
        $item->mobile= $request["mobile"];
        $item->gender= $request["gender"];
        $item->dob= $request["dob"];
        $item->address= $request["address"];

        $item->save();
        
        \Session::flash("msg","s:Seeker updated successfully");
        return redirect("/seeker/home/profile");
    }
    public function changepassword(){
        return view("seeker.home.changepassword");
    }
}