<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');

    //     $this->middleware('log', ['only' => ['fooAction', 'barAction']]);

    //     $this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);
    // }

    public function showDashboard()
    {
    	return view('admin/index.php');
    }
    
    public function showLogin()
    {
    	return view('admin/login.php');
    }
    

}
