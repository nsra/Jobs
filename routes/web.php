<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
Route::get('/', function () {
    return redirect('/home');
});

Route::get('/admin/home', function () {
    return redirect('/admin');
});

Route::get('/company/home/profile/%7Bid%7D', function () {
    return redirect('/company/home/profile');
});


Route::get("/accounteq/{id}/delete","AccountEQController@destroy");
Route::get("/accounteq/paging","AccountEQController@paging");
Route::get("/accounteq/searchpagingadv","AccountEQController@searchpagingadv");
Route::get("/accounteq/searchpaging","AccountEQController@searchpaging");
Route::get("/accounteq/search","AccountEQController@search");
Route::resource("/accounteq","AccountEQController");



Route::get("/admin","Admin\HomeController@index");
Route::get("/admin/categoryajax/{id}/delete","Admin\CategoryAjaxController@destroy");
Route::get("/admin/categoryajax/active/{id}","Admin\CategoryAjaxController@active");
Route::post("/admin/categoryajax/AjaxDT","Admin\CategoryAjaxController@AjaxDT");
Route::resource("/admin/categoryajax","Admin\CategoryAjaxController");


Route::get("/admin/category/{id}/delete","Admin\CategoryController@destroy");
Route::get("/admin/category/active/{id}","Admin\CategoryController@active");
Route::resource("/admin/category","Admin\CategoryController");//read+show +update +creat
Route::get("/admin/admin/{id}/delete","Admin\AdminController@destroy");
Route::get("/admin/admin/active/{id}","Admin\AdminController@active");
Route::resource("/admin/admin","Admin\AdminController");
Route::get("/admin/admin/{id}/delete","Admin\AdminController@destroy");
Route::get("/admin/admin/active/{id}","Admin\AdminController@active");
//Route::resource("/admin/admin","Admin\AdminController");
Route::get("/admin/seeker/{id}/delete","Admin\SeekerController@destroy");
Route::get("/admin/seeker/active/{id}","Admin\SeekerController@active");
Route::resource("/admin/seeker","Admin\SeekerController");
Route::get("/admin/company/{id}/delete","Admin\CompanyController@destroy");
Route::get("/admin/company/active/{id}","Admin\CompanyController@active");
Route::resource("/admin/company","Admin\CompanyController");
Route::get("/admin/jobs/{id}/delete","Admin\JobController@destroy");
Route::get("/admin/jobs/active/{id}","Admin\JobController@active");
Route::resource("/admin/jobs","Admin\JobController");
Route::get("/admin/home/changepassword","Admin\HomeController@changepassword");
Route::post("/admin/home/changepassword","Admin\HomeController@postChangepassword");



Route::get("/seeker/home/jobs","Seeker\HomeController@jobs");
Route::get("/seeker/home/profile","Seeker\HomeController@profile");
Route::post("/seeker/home/profile","Seeker\HomeController@updateprofile");
Route::get("/seeker/home/changepassword","Seeker\HomeController@changepassword");
Route::post("/seeker/home/changepassword","Seeker\HomeController@postChangepassword");
Route::get("/seeker/home/{id}/delete","Seeker\HomeController@destroy");


Route::get("/company/home/profile","Company\HomeController@profile");
Route::post("/company/home/profile","Company\HomeController@updateprofile");
Route::get("/company/home/changepassword","Company\HomeController@changepassword");
Route::post("/company/home/changepassword","Company\HomeController@postChangepassword");
Route::get("/company/job/{id}/delete","Company\JobController@destroy");
Route::get("/company/job/active/{id}","Company\JobController@active");
Route::get("/company/job/{id}/seeker","Company\JobController@EveryJobSeekers");
Route::resource("/company/job","Company\JobController");



Route::post("/home/doseekerregister","HomeController@doseekerregister");
Route::post("/home/postcompanyregister","HomeController@postcompanyregister");
Route::get("/home/seekerregister","HomeController@seekerregister");
Route::get("/home/companyregister","HomeController@companyregister");

Route::get("/home/register","HomeController@register");
Route::post("/home/signupseeker","HomeController@signupseeker");
Route::post("/home/signupcompany","HomeController@signupcompany");


Auth::routes();

Route::get('/redirect', 'HomeController@redirect');
Route::get('/home', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
Route::get('/jobs', 'HomeController@jobs');
Route::get('/job/{id}', 'HomeController@job');
Route::middleware(['auth', 'SeekerRole'])->get('/job/{id}/apply', 'HomeController@apply');

Route::middleware(['auth', 'SeekerRole'])->post('/job/{id}/apply', 'HomeController@doapply');

