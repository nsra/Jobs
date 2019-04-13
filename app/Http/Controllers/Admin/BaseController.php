<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class BaseController extends Controller
{
    protected $adminId=1;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('AdminRole');
    }
}