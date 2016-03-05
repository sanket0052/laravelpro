<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Session;
use App\Brand;
use App\Category; 
use App\Product; 
use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCategories = Category::get(array('id', 'name'));
        $allBrands = Brand::all(array('id', 'name'));
        $allProducts = Product::all();

        return view('admin.product.index')
            ->with('allbrands', $allBrands)
            ->with('allcategory', $allCategories)
            ->with('allproducts', $allProducts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Category::all();
        return view('admin.product.create')->with('allcategory', $allCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // echo '<pre>';
        // print_r($request->all());
        // exit;
        $productArr['name'] = $request->input('name');
        $productArr['category_id'] = $request->input('category_id');
        $productArr['brand_id'] = $request->input('brand_id')=='' ? 0 : $request->input('brand_id');
        $productArr['description'] = $request->input('description');
        $productArr['model'] = $request->input('model');
        $productArr['stock'] = $request->input('stock');
        $productArr['price'] = $request->input('price');
        $productArr['status'] = $request->input('status');

        $image = $request->file('image');
        // Store the brand logo in upload folder
        $storeImage = Product::saveProductImage($image, $productArr['name']);

        $productArr['image'] = $storeImage['imageName'];
        $productArr['thumb'] = $storeImage['imageThumbName'];
            
        // print_r($productArr);
        // exit;
        // Store data in Database
        $product = Product::create($productArr);

        return Redirect::to('admin/product')->with('flash_message', 'Product Added Successfully!');
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
        return view('admin.product.edit')
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
    public function update(Request $request, $id)
    {
        $brandArr['name'] = $request->input('name');
        $brandArr['description'] = $request->input('description');
        $brandArr['category_list'] = implode(',', $request->input('category_list'));
        $brandArr['status'] = $request->input('status');
        $logo = $request->file('logo');
        
        if ($request->hasFile('logo'))
        {
            $storeLogo = Product::saveBrandLogo($logo, $brandArr['name']);

            $brandArr['logo'] = $storeLogo['logoName'];
            $brandArr['thumb'] = $storeLogo['logoThumbName'];
        }

        // Store data in Database
        $brand = Product::where('id', $id)
                ->update($brandArr);

        return Redirect::to('admin/brand')->with('flash_message', 'Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::deleteBrand($id);
        if($product)
        {
            return Redirect::to('admin/product')->with('flash_message', 'Product Deleted Successfully!');
        }
        else
        {
            return Redirect::to('admin/product')->with('flash_message', 'Error Accured While Deleting Brand. Please try again.');
        }
    }
}
