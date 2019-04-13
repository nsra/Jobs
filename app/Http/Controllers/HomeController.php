<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Seeker;
use App\Jobtype;
use App\Category;
use App\Company;
use App\User;
use App\Job;
use App\JobSeeker;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SeekerRequest;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function home()
    {
        return view('home');
    }
    public function redirect(){
        $user = \Auth::user();
        if($user!=NULL){
            $isAdmin=\DB::table("admin")->where("user_id",$user->id)->count();
            $isCompany=\DB::table("company")->where("user_id",$user->id)->count();
            if($isAdmin)
                return redirect("/admin");
            else if($isCompany)
                return redirect("/company/home/profile");
        }
        return redirect("/home");
    }
    
    public function index(Request $request)
    {
        // $jobtypes=Jobtype::all();
        // $jobcategories=Category::all();
        // $topJobs=Job::whereRaw("isdelete=0 and active=1 and to_date > (NOW() - INTERVAL 1 DAY) ")->orderby("id","asc")->limit(4)->get();

        $q=$request["q"];
        $type=$request["type"];
        $category=$request["category"];
        
        $items=Job::whereRaw("isdelete=0 and active=1 ");
        if($q!=NULL)
            $items=$items->whereRaw("(title like ? or details like ?)",["%$q%","%$q%"]);
        if($type!=NULL)
            $items=$items->whereRaw("job_type_id = ?",[$type]);
        if($category!=NULL)
            $items=$items->whereRaw("category_id = ?",[$category]);
        
        
        $jobtypes=Jobtype::all();
        $jobcategories=Category::all();
        $topJobs=$items->orderby("id","asc")->paginate(7)->appends(["q"=>$q,"type"=>$type,"category"=>$category]);
        
        return view('home.index',compact("jobtypes","jobcategories","topJobs"));
    }
    
    public function jobs(Request $request)
    {
        $q=$request["q"];
        $type=$request["type"];
        $category=$request["category"];
        
        $items=Job::whereRaw("isdelete=0 and active=1 ");
        if($q!=NULL)
            $items=$items->whereRaw("(title like ? or details like ?)",["%$q%","%$q%"]);
        if($type!=NULL)
            $items=$items->whereRaw("job_type_id = ?",[$type]);
        if($category!=NULL)
            $items=$items->whereRaw("category_id = ?",[$category]);
        
        
        $jobtypes=Jobtype::all();
        $jobcategories=Category::all();
        $topJobs=$items->orderby("id","asc")->paginate(7)->appends(["q"=>$q,"type"=>$type,"category"=>$category]);
        return view('home.jobs',compact("jobtypes","jobcategories","topJobs","q","type","category"));
    }
    public function job($id)
    {
        $job=Job::whereRaw("id=? and isdelete=0 and active=1",[$id])->first();
        if($job==NULL)
            return redirect("/jobs");
        return view('home.job',compact("job"));
    }
    public function apply($id)
    {
        $job=Job::whereRaw("id=? and isdelete=0 and active=1",[$id])->first();
        if($job==NULL)
            return redirect("/jobs");
        $item=Seeker::where("user_id",\Auth::user()->id)->first();
        $js=JobSeeker::where("job_id",$id)->where("seeker_id",$item->id)->first();
        return view('home.apply',compact("job","item","js"));
    }
    function guidv4()
    {
        if (function_exists('com_create_guid') === true)
            return trim(com_create_guid(), '{}');
        $data = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
    public function doapply(Request $request,$id)
    {
        $item=Seeker::where("user_id",\Auth::user()->id)->first();
        $uploadedCv="";
        $cv = $request->file('cv');
        if($cv!=NULL){
            $type = strtolower($cv->getClientOriginalExtension());
            if(!($type=="pdf"||$type=="doc"||$type=="docx")){
                \Session::flash("msg","e:الرجاء اختر سيرة ذاتية باحد الامتدادات pdf,doc,docx");
                return redirect("/job/$id/apply");
            }
            else{
                $uploadedCv=$this->guidv4().".".$cv->getClientOriginalExtension();
                $cv->move("data/cvs/",$uploadedCv);
            }
        }
        if($item->cv==NULL && $uploadedCv==""){
            \Session::flash("msg","e: الرجاء التأكد من وجود سيرة ذاتية خاصة بك للتقديم");
            return redirect("/job/$id/apply");            
        }
        if($uploadedCv!=""){
            $item->cv=$uploadedCv;$item->save();
        }
        $js=new JobSeeker();
        $js->job_id=$id;
        $js->seeker_id=$item->id;
        $js->name=$request["name"];
        $js->email=$request["email"];
        $js->mobile=$request["mobile"];
        $js->cv=$item->cv;
        $js->save();
        //\Session::flash("msg","s: تم تقديم طلبك بنجاح");
        return redirect("/job/$id/apply");      
    }
    
    public function contact()
    {
        return view('home.contact');
    }
    public function about()
    {
        return view('home.about');
    }
    
    
    
    
	public function register()
    {
        return view("home.register");
    }

    public function signupseeker(SeekerRequest $request)
    {

	      $newseeker= User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
		  ]);

		  $IsExists=Seeker::whereRaw("isdelete=0 and email=?",$request["email"])->count();
		  if($IsExists>0){
			\Session::flash("msg","e:".$request["name"]." موجود مسبقا لدينا ");
			return redirect("/signup");
		  }
		  $seeker = new Seeker ();
		  $seeker->active = 1;
		  $seeker->name = $request["name"];
		  $seeker->email = $request["email"];
		  $seeker->mobile = $request["mobile"];
		  $seeker->address= $request["address"];
		  $seeker->gender= $request["gender"]?1:0;
		  $seeker->dob = $request["dob"];
		  $seeker->cv = $request["cv"];
		  $seeker->isdelete=0;
		  $seeker->save();
          \Session::flash("msg","s:تمت عملية التسجيل بنجاح");
        return redirect("/login");
    }

    public function signupcompany(CompanyRequest $request)
    {
        $newcompany= User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

      $IsExists=Company::whereRaw("isdelete=0 and email=?",$request["email"])->count();
      if($IsExists>0){
        \Session::flash("msg","e:".$request["name"]." موجود مسبقا لدينا ");
        return redirect("/signup");
      }
      $company = new Company ();
      $company->active =1;
      $company->name = $request["name"];
      $company->email = $request["email"];
      $company->details = $request["details"];
      $company->mobile = $request["mobile"];
      $company->address= $request["address"];
      $company->logo = $request["logo"];
      $company->isdelete=0;
      $company->save();
          \Session::flash("msg","s:تمت عملية التسجيل بنجاح");
        return redirect("/login");
    }
}
