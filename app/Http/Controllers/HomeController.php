<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;

class HomeController extends Controller
{
	public function showHome(){
		return view('home');
	}
	
	public function showContact(){
		return view('contactmodel');
	}

	public function getContactForm(StoreContactRequest $request){

		// Get all the data and store it inside Store Variable
		$name = $request->input('name');
		$email = $request->input('email');
		$message = $request->input('message');

		//Insert Data into Contact Table
		$contactmodel = new Contact;
		$contactmodel->name = $name;
		$contactmodel->email = $email;
		$contactmodel->message = $message;
		$contactmodel->save();
		$inserteId = $contactmodel->id;

		if($inserteId != ''){
			return Redirect::to('contact')->with('success', 'Submited Query Successfully.');
		}
	}
}
	