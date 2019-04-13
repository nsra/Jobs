<?php

namespace App\Http\Controllers\Seeker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class BaseController extends Controller
{
    protected $seekerId=1;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('SeekerRole');
    }
}