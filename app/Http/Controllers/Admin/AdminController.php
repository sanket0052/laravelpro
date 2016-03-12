<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
	/**
	 * Admin Dashboard
	 * @return [type] [description]
	 */
    public function index()
    {
        return view('admin.index');
    }
}
