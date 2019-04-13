<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\JobRequest;
use App\Job;
use App\Jobtype;
use App\Category;
use App\Company;

class JobController extends BaseController
{
    public function index(Request $request)
    {

      $q = $request["q"];
      $company = $request["company"];
      $active = $request["active"];
      $jobtype = $request["jobtype"];
      $jobcategory = $request["jobcategory"];

      $jobs=Job::whereRaw("job.isdelete=0");
      if ($company!=NULL)
          $jobs=$jobs->whereRaw("(company.name like ?)",["%$company%"]);
      if ($q!=NULL)
          $jobs=$jobs->whereRaw("(job.title like ? or job.details like ?)",["%$q%","%$q%"]);
      if ($jobtype!=NULL)
          $jobs=$jobs->whereRaw("job_type_id like ?",[$jobtype]);
      if($active!=NULL)
          $jobs=$jobs->whereRaw("job.active = ?",[$active]);
      if($jobcategory!=NULL)
          $jobs=$jobs->whereRaw("job.category_id = ?",[$jobcategory]);
      $jobs=$jobs->paginate(5)->appends(["q"=>$q , "active"=>$active,"jobtype"=>$jobtype,"jobcategory"=>$jobcategory,"company"=>$company]);

      $jobtypes=Jobtype::all();
      $jobcategories=Category::all();
      return view("admin.job.index",compact("jobtypes","jobcategories","jobs","q","active","jobtype","jobcategory",
                                           "company"));

    }

    public function show($id)
    {
        $job=Job::find($id);
        if($job==NULL)
            return redirect("admin/job");
        else
            return view("admin.job.show",compact("job"));

    }
    public function active($id)
    {
        $job=Job::find($id);
        $job->active=!$job->active;
        $job->save();
        
        return response()->json([
            'status' => 1,
            'msg' => 's:تمت عملية '.(
                $job->active?
                "التفعيل":
                "التعطيل"
            ).' بنجاح'
        ]);
    }
    public function destroy($id)
    {
        $job=Job::find($id);
        $job->isdelete=1;
        $job->save();
        \Session::flash("msg","s:تمت عملية الحذف بنجاح");
        return redirect("admin/job");
    }
}
