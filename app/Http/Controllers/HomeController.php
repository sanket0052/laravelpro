<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Contact;
use App\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;

class HomeController extends Controller
{
	public function index()
	{
		$products = Product::with('category', 'brand')->get();
    	return view('home', [
			'products'=> $products,
		]);
	}
	
	public function showContact()
	{
		return view('contact');
	}

	public function storeContact(ContactRequest $request){

		// Get all the data and store it inside Store Variable
		$data = $request->all();

		// Insert Data into Contact Table
		$contact = Contact::create($data);

		return redirect('contact', [
			'success' => 'Submited Query Successfully.'
		]);
	}
}
	