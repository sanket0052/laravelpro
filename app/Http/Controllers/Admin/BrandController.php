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
use Symfony\Component\HttpFoundation\File\UploadedFile;


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
        // Store the brand logo in upload folder
        $storeLogo = Brand::saveBrandLogo($logo, $brandArr['name']);

        $brandArr['logo'] = $storeLogo['logoName'];
        $brandArr['thumb'] = $storeLogo['logoThumbName'];
        
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
        $brandArr['name'] = $request->input('name');
        $brandArr['description'] = $request->input('description');
        $brandArr['category_list'] = implode(',', $request->input('category_list'));
        $brandArr['status'] = $request->input('status');
        $logo = $request->file('logo');
        
        if ($request->hasFile('logo'))
        {
            $storeLogo = Brand::saveBrandLogo($logo, $brandArr['name']);

            $brandArr['logo'] = $storeLogo['logoName'];
            $brandArr['thumb'] = $storeLogo['logoThumbName'];
        }

        // Store data in Database
        $brand = Brand::where('id', $id)
                ->update($brandArr);

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
        
        $brand = Brand::deleteBrand($id);
        if($brand)
        {
            return Redirect::to('admin/brand')->with('flash_message', 'Brand Deleted Successfully!');
        }
        else
        {
            return Redirect::to('admin/brand')->with('flash_message', 'Error Accured While Deleting Brand. Please try again.');
        }
    }
}
