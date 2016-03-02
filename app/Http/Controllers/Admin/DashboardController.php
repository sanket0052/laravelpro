<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	public function __construct()
	{
		// $this->beforeFilter('auth');
	 //    $this->middleware('admin');
	}

    public function showDashboard()
    {
    	return view('admin.index');
    }
}
