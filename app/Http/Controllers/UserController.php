<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserLogin;
use App\Http\Requests\UserRegister;

class UserController extends Controller
{
    public function showLogin(){
		return view('login');
	}

	public function getLoginForm(UserLogin $request){

		// Get all the data and store it inside Store Variable
		$name = $request->input('name');
		$password = $request->input('password');
		echo $name.$password;
		// //Insert Data into Contact Table
		// $usermodel = new Contact;

		// $contactmodel->save();
		// $inserteId = $contactmodel->id;

		// if($inserteId != ''){
		// 	return Redirect::to('contact')->with('success', 'Submited Query Successfully.');
		// }
	}

	public function showRegister(){
		return view('register');
	}

	public function getRegisterForm(UserRegister $request){

		// Get all the data and store it inside Store Variable
		$name = $request->input('name');
		$password = $request->input('password');
		echo $name.$password;
		// //Insert Data into Contact Table
		// $usermodel = new Contact;

		// $contactmodel->save();
		// $inserteId = $contactmodel->id;

		// if($inserteId != ''){
		// 	return Redirect::to('contact')->with('success', 'Submited Query Successfully.');
		// }
	}

}
