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
        $allCategories = Category::all();

        return view('admin.category.index')->with('allcategory', $allCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Category::all();
        return view('admin.category.create')->with('allcategory', $allCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $requestArr['name'] = $request->input('name');
        $requestArr['parent_id'] = $request->input('parent_id');
        $requestArr['description'] = $request->input('description');
        $requestArr['urlname'] = $request->input('urlname');
        $requestArr['status'] = $request->input('status');

        $category = Category::create($requestArr);

        return Redirect::to('admin/category')->with('flash_message', 'Category Added Successfully!');
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
        $category = Category::find($id);
        return view('admin.category.edit')
            ->with('category', $category)
            ->with('allcategory', $allCategories);
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
        $requestArr['name'] = $request->input('name');
        $requestArr['parent_id'] = $request->input('parent_id');
        $requestArr['description'] = $request->input('description');
        $requestArr['urlname'] = $request->input('urlname');
        $requestArr['status'] = $request->input('status');

        $category = Category::where('id', $id)
            ->update($requestArr);

        return Redirect::to('admin/category')->with('flash_message', 'Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return Redirect::to('admin/category')->with('flash_message', 'Category Deleted Successfully!');
    }
}
