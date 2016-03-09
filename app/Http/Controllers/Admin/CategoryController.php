<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Category;
use App\Http\Requests;
use Session;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $allCategories = Category::with('brands', 'product')->get();

        foreach ($allCategories as $key => $value)
        {
            $categoryList[$value->id] = $value->name;
        }

        return view('admin.category.index')
            ->with('allcategory', $allCategories)
            ->with('categoryList', $categoryList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Category::get(['id', 'name']);

        foreach ($allCategories as $key => $value)
        {
            $categoryList[$value->id] = $value->name;
        }
        return view('admin.category.create')->with('categoryList', $categoryList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        $category = Category::create($requestArr);

        return redirect('admin/category')->with('flash_message', 'Category Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allCategories = Category::all();

        $category = $allCategories->find($id);
        
        if(!$category)
        {
            abort(404);
        }
        
        foreach ($allCategories as $key => $value)
        {
            $categoryList[$value->id] = $value->name;
        }

        return view('admin.category.edit')
            ->with('category', $category)
            ->with('categoryList', $categoryList);        
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);

        if(!$category)
        {
            abort(404);
        }

        $data = $request->all();

        $category->update($data);

        return redirect('admin/category')->with('flash_message', 'Category Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if(!$category)
        {
            abort(404);
        }

        $category->destroy($id);

        return redirect('admin/category')->with('flash_message', 'Category Deleted Successfully!');
    }
}