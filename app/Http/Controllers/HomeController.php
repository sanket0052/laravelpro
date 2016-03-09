<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Contact;
use App\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;

class HomeController extends Controller
{
	public function index()
	{
		$mainMenu = $this->frontendMenu();
		$products = Products::with('category', 'brand')->get();
		print_r($products);
		exit;
    	return view('home')->with('mainMenu', $mainMenu);
	}
	
	public function showContact()
	{
		$mainMenu = $this->frontendMenu();

		return view('contact')->with('mainMenu', $mainMenu);
	}

	public function storeContact(ContactRequest $request){

		// Get all the data and store it inside Store Variable
		$contactArr = $request->all();

		//Insert Data into Contact Table
		$contact = Contact::create($contactArr);

		return redirect('contact')->with('success', 'Submited Query Successfully.');
	}

	public function frontendMenu()
	{
		$allcategory = Category::all();

		$count = 0;
		foreach ($allcategory as $category)
		{
			if($category->parent_id == 0)
			{
				$mainMenu[$count]['id'] = $category->id;
				$mainMenu[$count]['name'] = $category->name;
				$mainMenu[$count]['urlname'] = $category->urlname;
				$count++;
			}
			else
			{
				$categorySubList[$category->id] = $category->name;
			}
		}
		$count = 0;
		foreach($allcategory as $key => $value)
		{
			if($value->parent_id != 0)
			{
				foreach ($mainMenu as $k => $v)
				{
					if($value->parent_id == $v['id'])
					{
						$mainMenu[$k]['sub'][] = array(
							'id' => $value->id,
							'name' => $value->name,
							'urlname' => $value->urlname
						);
						$count++;
					}
				}
			}
		}
		return $mainMenu;
	}
}
	