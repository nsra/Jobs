<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Requests\JobSeekerRequest;
use App\Http\Requests\JobRequest;
use App\Job;
use App\Jobtype;
use App\Category;
use App\Company;
 use App\JobSeeker;

class JobController extends BaseController
{
    public function index(Request $request)
    {
      // $sum=0; 
      $q = $request["q"];
      $active = $request["active"];
      $jobtype = $request["jobtype"];
      $jobcategory = $request["jobcategory"];
  //$jss =JobSeeker::whereRaw("job.isdelete=0" );     
      $jobs=Job::whereRaw("job.isdelete=0 and company_id = ?",["$this->companyId"] );     
      if ($q!=NULL)
          $jobs=$jobs->whereRaw("(job.title like ? or job.category_id = ?)",["%$q%","%$q%"]);
      if ($jobtype!=NULL)
          $jobs=$jobs->whereRaw("job_type_id like ?",[$jobtype]);
      if($active!=NULL)
          $jobs=$jobs->whereRaw("job.active = ?",[$active]);
      if($jobcategory!=NULL)
          $jobs=$jobs->whereRaw("job.category_id = ?",[$jobcategory]);
        
      $jobs=$jobs->paginate(5)->appends(["q"=>$q , "active"=>$active,"jobtype"=>$jobtype,"jobcategory"=>$jobcategory]);

      $jobtypes=JobType::all();
      $jobcategories=Category::all();
      return view("company.job.index"
                  ,compact("jobtypes","jobcategories","jobs","q","active","jobtype","jobcategory"));
     }
    
    public function EveryJobSeekers(Request $request, $id)
    {
      $job = Job::find($id);
      $q = $request["q"];        
      $jss =JobSeeker::leftJoin("seeker","seeker_id","seeker.id")->whereRaw(" job_id = ?",["$id"] );      
    
      if ($q!=NULL)
          $jss=$jss->where("seeker.name","like","%$q%");
          //$jss=$jss->whereRaw("(name like ? or email like ?  or mobile like ?)",["%$q%","%$q%","%$q%"]);
      
      $jss=$jss->paginate(5)->appends(["q"=>$q]);
      return view("company.job.EveryJobSeekers"
                  ,compact("jss","q","job"));
     }
    
    public function create()
    {
        $jobtypes=JobType::all();
        $jobcategories=Category::all();
        return view("company.job.create",compact("jobtypes","jobcategories"));
    }

    public function store(JobRequest $request)
    {        
        $job = new Job();
        
        $job->title= $request["title"];
        $job->company_id=$this->companyId;
        $job->details= $request["details"];
        $job->category_id= $request["category_id"];
        $job->job_type_id= $request["job_type_id"];
        $job->from_date= $request["from_date"];
        $job->to_date= $request["to_date"];
        $job->active=0;
        $job->updated_by=$this->companyId;
        $job->isdelete=0;
        
        $job->save();
        
        \Session::flash("msg","i:تمت اضافة الوظيفة بنجاح");
        return redirect("/company/job/create");
    }
    public function show($id)
    {
        $j =Job::find($id);
         $jss =JobSeeker::whereRaw("job_id = ?",["$id"] );     
        if($j==NULL)
            return redirect("/company/job");
        if($j->company_id!=$this->companyId)
             return redirect("/company/job");
        return view("company.job.show",compact("j","jss"));
    }

    public function edit($id)
    {        
        $item =Job::find($id);
        if($item==NULL)
            return redirect("/company/job");
        if($item->company_id!=$this->companyId)
             return redirect("/company/job");
        
        if($item->active){
            \Session::flash("msg","e:لا يمكن التعديل على وظيفة معتمدة من الادارة");
            return redirect("/company/job");
        }
        $jobtypes=JobType::get();
        $jobcategories=Category::get();
        return view("company.job.edit",compact("item","jobcategories","jobtypes"));
    }
    public function update(JobRequest $request, $id)
    {                  
        $job = Job::find($id);
        
        if($job==NULL)
            return redirect("/company/job");
        if($job->company_id!=$this->companyId)
             return redirect("/company/job");
        
        $job->title= $request["title"];        
        $job->details= $request["details"];
        $job->category_id= $request["category_id"];
        $job->job_type_id= $request["job_type_id"];
        $job->from_date= $request["from_date"];
        $job->to_date= $request["to_date"];
        $job->updated_by=$this->companyId;
        $job->isdelete=0;
        
        $job->save();
        
        \Session::flash("msg","s:Job updated successfully");
        return redirect("/company/job");
    }
    public function destroy($id)
    {
        $job = Job::find($id);
        if($job==NULL)
            return redirect("/company/job");
        if($job->company_id!=$this->companyId)
             return redirect("/company/job");
        $job->isdelete=1; 
        
        $job->save();
        \Session::flash("msg","w:Job deleted successfully");
        return redirect("/company/job");
    }
}