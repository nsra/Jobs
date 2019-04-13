<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class BaseController extends Controller
{
    protected $companyId=1;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CompanyRole');
    }
}