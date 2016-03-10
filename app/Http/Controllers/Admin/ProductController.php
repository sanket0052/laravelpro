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
        return view('admin.product.index')
            ->with('allproducts', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Category::all();

        foreach ($allCategories as $category)
        {
            $categoryList[$category->id] = $category->name;
        }
        $brandList = array();

        return view('admin.product.create')
            ->with('categoryList', $categoryList)
            ->with('brandList', $brandList);
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

        $data['brand_id'] = $request->brand_id =='' ? 0 : $request->brand_id;

        $image = $request->file('image');
        // Store the product logo in upload folder
        $storeImage = $this->saveProductImage($image);

        $data['image'] = $storeImage['imageName'];
        $data['thumb'] = $storeImage['imageThumbName'];
            
        // Store data in Database
        $product = Product::create($data);

        return redirect('admin/product')->with('flash_message', 'Product Added Successfully!');
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
        $product = Product::with('category', 'brand')->find($id);
        
        if(!$product)
        {
            abort(404);
        }

        $allCategories = Category::all();
        $allbrands = Brand::all();

        foreach ($allCategories as $category)
        {
            $categoryList[$category->id] = $category->name;
        }

        foreach ($allbrands as $brand)
        {
            $brandList[$brand->id] = $brand->name;
        }

        return view('admin.product.edit')
            ->with('brandList', $brandList)
            ->with('categoryList', $categoryList)
            ->with('product', $product);
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

        if(!$product)
        {
            abort(404);
        }

        $data = $request->all();
        unset($data['_method']);
        unset($data['_token']);

        $image = $request->file('image');
        
        if ($request->hasFile('image'))
        {
            $storeProductImage = $this->saveProductImage($image);

            $data['image'] = $storeProductImage['imageName'];
            $data['thumb'] = $storeProductImage['imageThumbName'];
        }

        // Store data in Database
        $product->where('id', $id)
                ->update($data);

        return redirect('admin/product')->with('flash_message', 'Product Updated Successfully!');
        
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

        if($product)
        {
            abort(404);
        }

        $removeProduct = $this->deleteBrand($id);

        if($removeProduct)
        {
            return redirect('admin/product')->with('flash_message', 'Product Deleted Successfully!');
        }
        else
        {
            return redirect('admin/product')->with('flash_message', 'Error Accured While Deleting Brand. Please try again.');
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
        
        foreach ($categoryarray->brands as $brand)
        {   
            $brandlistarray[$brand->id] = $brand->name;
        }

        if(!empty($brandlistarray))
        {
            return $brandlistarray;
        }
        else
        {
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
        $file->move(public_path().$this->productImagePath, $imageFileName);

        $thumbFileName = strtotime("now").'_thumb.'.$imageExtension;

        // Create Logo Thumb 
        $thumb = Image::make(file_get_contents(public_path().$this->productImagePath.'/'.$imageFileName))->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumb->save(public_path().$this->productThumbPath.'/'.$thumbFileName);

        $filesName = array(
                'imageName' => $imageFileName,
                'imageThumbName' => $thumbFileName
            );

        return $filesName;
    }

    /**
     * Delete the specify product and its image and thumb file. 
     * @param  int $id pass the product id
     * @return boolean     return the boolean true/false.
     */
    protected function deleteProduct($id)
    {
        $product = Brand::find($id);
        $productImage = $product->image;
        $productThumb = $product->thumb;
        $productImagePath = public_path().$this->productImagePath."/".$productImage;
        $productThumbPath = public_path().$this->productThumbPath."/".$productThumb;
        File::delete($productImagePath, $productThumbPath);
        $product->destroy($id);
        return true;
    }
}
