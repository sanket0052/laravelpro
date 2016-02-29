<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;

class HomeController extends Controller
{
	public function showHome(){
		return view('home');
	}
	
	public function showContact(){
		return view('contact');
	}

	public function getContactForm(StoreContactRequest $request){

		// Get all the data and store it inside Store Variable
		$name = $request->input('name');
		$email = $request->input('email');
		$message = $request->input('message');
		echo $name . $email .$message;
		
	}
}
