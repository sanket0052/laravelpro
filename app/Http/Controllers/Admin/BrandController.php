<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Session;
use Input;
use App\Brand;
use App\Category; 
use App\Http\Requests;
use App\Http\Requests\BrandRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCategories = Category::all();
        $allBrands = Brand::all();

        return view('admin.brand.index')
            ->with('allbrands', $allBrands)
            ->with('allcategory', $allCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Category::all();
        return view('admin.brand.create')->with('allcategory', $allCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $brandArr['name'] = $request->input('name');
        $brandArr['description'] = $request->input('description');
        $brandArr['category_list'] = implode(',', $request->input('category_list'));
        $brandArr['status'] = $request->input('status');
        $logo = $request->file('logo');
        
            $destinationPath = public_path().'/assets/images/uploads/brands';
            $destinationThumbilPath = public_path().'/assets/images/uploads/brands/thumbils';
            $logoextension = $logo->getClientOriginalExtension();
            $fileName = $brandArr['name'].'.'.$logoextension;
            $logo->move($destinationPath, $fileName);

            $thumbilFileName = $brandArr['name'].'_thumb.'.$logoextension;

            // Create Logo Thumb 
            Image::make(file_get_contents($destinationPath.'/'.$fileName))->resize(100, 100)->save($destinationThumbilPath.'/'.$thumbilFileName);
            

        $brandArr['logo'] = $fileName;
        $brandArr['thumb'] = $thumbilFileName;
        
        // Store data in Database
        $brand = Brand::create($brandArr);

        return Redirect::to('admin/brand')->with('flash_message', 'Brand Added Successfully!');
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
        $brand = Brand::find($id);
        return view('admin.brand.edit')
            ->with('brand', $brand)
            ->with('allcategory', $allCategories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        // echo '<pre>';
        // print_r($request->all());
        // exit;
        $brandArr['name'] = $request->input('name');
        $brandArr['description'] = $request->input('description');
        $brandArr['category_list'] = implode(',', $request->input('category_list'));
        $brandArr['status'] = $request->input('status');
        $logo = $request->file('logo');
        
        if(!empty($request->file('logo')))
        {
            $destinationPath = public_path().'/assets/images/uploads/brands';
            $destinationThumbilPath = public_path().'/assets/images/uploads/brands/thumbils';
            $logoextension = $logo->getClientOriginalExtension();
            $fileName = $brandArr['name'].'.'.$logoextension;
            $logo->move($destinationPath, $fileName);

            $thumbilFileName = $brandArr['name'].'_thumb.'.$logoextension;

            // Create Logo Thumb 
            Image::make(file_get_contents($destinationPath.'/'.$fileName))->resize(100, 100)->save($destinationThumbilPath.'/'.$thumbilFileName);

            $brandArr['logo'] = $fileName;
            $brandArr['thumb'] = $thumbilFileName;
        }

        // Store data in Database
        $brand = Brand::where('id', $id);

        return Redirect::to('admin/brand')->with('flash_message', 'Brand Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
