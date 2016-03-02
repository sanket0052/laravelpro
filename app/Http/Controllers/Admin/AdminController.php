<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function showDashboard()
    {
        return view('admin.index');
    }
    
    public function getLogin()
    {
    	return view('admin.login');
    }
}
