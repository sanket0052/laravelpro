<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Hash;
use Session;
use App\Http\Requests\UserLogin;
use App\Http\Requests\UserRegister;

class UserController extends Controller
{
	public function showLogin()
	{
		return view('auth.login');
	}

	public function getLoginForm(UserLogin $request)
	{

		// Get all the data and store it inside Store Variable
		$username = $request->input('username');
		$password = $request->input('password');
			
		$user = User::where('username', '=', $username)->first();
		if(Hash::check($password, $user->password))
		{
			$userid = $user->id;

			Session::put('userid', $userid);
			Session::put('username', $username);
			return Redirect::to('home');
		}
		else
		{
			return Redirect::to('user/login')->with('error', 'Invalid Username And Password.');
		}
		
	}

	public function showRegister()
	{
		return view('auth.register');
	}

	public function getRegisterForm(UserRegister $request)
	{

		// Get all the data and store it inside Store Variable
		$username = $request->input('username');
		$email = $request->input('email');
		$password = $request->input('password');
		$password = Hash::make($password);
		
		//Insert Data into Contact Table
		$usermodel = new User;
		$usermodel->username = $username;
		$usermodel->email = $email;
		$usermodel->password = $password;

		if($usermodel->save())
		{
			// Get the last inserted id
			$inserteId = $usermodel->id;

			Session::put('userid', $inserteId);
			Session::put('username', $username);

			return Redirect::to('/');
		}
		else
		{
			return Redirect::to('user/register')->with('error', 'Error Accured While Insterting Data.');
		}
	}

	public function userLogout()
	{
		Session::flush();
		return Redirect::to('/');
	}

}
