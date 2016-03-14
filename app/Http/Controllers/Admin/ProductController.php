<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use File;
use Session;
use App\Brand;
use App\Category; 
use App\Product; 
use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Product Image Path to public folder.
     * @var string
     */
    protected $productImagePath = '/assets/images/uploads/products';

    /**
     * Product Image Thumb Path
     * @var string
     */
    protected $productThumbPath = '/assets/images/uploads/products/thumbils';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category', 'brand')->get();

        return view('admin.product.index', [
            'allproducts' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryList = Category::lists('name', 'id')->toArray();

        return view('admin.product.create',[
            'categoryList' => $categoryList,
            'brandList' => []
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $collection = collect($data);

        $data['brand_id'] = $request->brand_id =='' ? 0 : $request->brand_id;
        $image = $request->file('image');

        $data = $collection
                ->merge($this->saveProductImage($image))
                ->toArray();

        // Store data in Database
        $product = Product::create($data);

        return Redirect::to('admin/product')
            ->with('flash_message', 'Product Added Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('category', 'brand')->find($id);
        
        if(!$product){
            abort(404);
        }

        $categoryList = Category::lists('name', 'id')->toArray();

        $brandList = Brand::lists('name', 'id')->toArray();
        
        return view('admin.product.edit', [
            'brandList' => $brandList,
            'categoryList' => $categoryList,
            'product' => $product
        ]);
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
        $product = Product::find($id);

        if(!$product){
            abort(404);
        }

        $data = $request->all();
        unset($data['_method']);
        unset($data['_token']);

        $image = $request->file('image');
        
        if ($request->hasFile('image')){
            $collection = collect($data);
            $data = $collection
                    ->merge($this->saveProductImage($image))
                    ->toArray();
        }

        // Store data in Database
        $product->where('id', $id)
                ->update($data);

        return Redirect::to('admin/product')
            ->with('flash_message', 'Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        
        if(!$product){
            abort(404);
        }

        $productImagePath = public_path($this->productImagePath."/".$product->image);
        $productThumbPath = public_path($this->productThumbPath."/".$product->thumb);

        File::delete($productImagePath, $productThumbPath);
        $product->destroy($id);

        if($product){
            return Redirect::to('admin/product')
                ->with('flash_message', 'Product Deleted Successfully!');
        }else{
            return Redirect::to('admin/product')
                ->with('flash_message', 'Error Accured While Deleting Brand. Please try again.');
        }
    }

    /**
     * For get brand list from the given category.
     * @param  Request $request [description]
     * @return array         Brand List  
     */
    public function getBrandList(Request $request)
    {   
        $category_id = $request->categoryid;

        $categoryarray = Category::with('brands')->find($category_id);
        
        $brandlistarray = $categoryarray->brands->lists('name', 'id')->toArray();
        
        if(!empty($brandlistarray)){
            return $brandlistarray;
        }else{
            return 0;
        }
    }

    /**
     * Save the product image in folder and also store that thumbnail in sub directory.
     * @param  UploadedFile $file Files Array passin this function
     * @return array             Image name and thumbnail name.
     */
    protected function saveProductImage(UploadedFile $file)
    {
        $imageExtension = $file->getClientOriginalExtension();
        $imageFileName = strtotime("now").'.'.$imageExtension;
        $file->move(public_path($this->productImagePath, $imageFileName));

        $thumbFileName = strtotime("now").'_thumb.'.$imageExtension;

        // Create Logo Thumb 
        $thumb = Image::make(
                file_get_contents(public_path($this->productImagePath.'/'.$imageFileName)))
                    ->resize(100, null, function ($constraint) {
                        $constraint->aspectRatio();
                });

        $thumb->save(public_path($this->productThumbPath.'/'.$thumbFileName));

        return [
            'image' => $imageFileName,
            'thumb' => $thumbFileName
        ];
    }