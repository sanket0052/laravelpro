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

    protected $productImagePath = '/assets/images/uploads/products';

    protected $productThumbPath = '/assets/images/uploads/products/thumbils';

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
        $data = $request->all();

        $data['brand_id'] = $request->brand_id =='' ? 0 : $request->brand_id;

        $image = $request->file('image');
        // Store the brand logo in upload folder
        $storeImage = $this->saveProductImage($image, $productArr['name']);

        $data['image'] = $storeImage['imageName'];
        $data['thumb'] = $storeImage['imageThumbName'];
            
        // Store data in Database
        $product = Product::create($data);

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
        $product = Product::find($id);
        if($product)
        {
            $allCategories = Category::all();
            $allbrands = Brand::all();
            $product = Product::find($id);
    
            return view('admin.product.edit')
                ->with('allbrands', $allbrands)
                ->with('allcategory', $allCategories)
                ->with('product', $product);
        }
        else
        {
            abort(404);
        }
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

        if($product)
        {
            $data = $request->all();
            
            $data['category_list'] = implode(',', $request->category_list);

            $logo = $request->file('logo');
            
            if ($request->hasFile('logo'))
            {
                $storeLogo = Product::saveBrandLogo($logo, $brandArr['name']);

                $data['logo'] = $storeLogo['logoName'];
                $data['thumb'] = $storeLogo['logoThumbName'];
            }

            // Store data in Database
            $brand = Product::where('id', $id)
                    ->update($data);

            return Redirect::to('admin/brand')->with('flash_message', 'Product Updated Successfully!');
        }
        else
        {

        }
        
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
        else
        {
            abort(404);
        }
    }

    public function getBrandList(Request $request)
    {   
        $category_id = $request->input('categoryid');
        $brandarray = Brand::where('category_list', 'LIKE', '%,'.$category_id.'%')->get(['id', 'name']);
        foreach ($brandarray as $brandlist)
        {
            $brandlistarray[$brandlist->id] = $brandlist->name;
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

    protected function deleteBrand($id)
    {
        $brand = Brand::find($id);
        $brandLogo = $brand->logo;
        $brandThumb = $brand->thumb;
        $brandLogoPath = public_path().$this->productImagePath."/".$brandLogo;
        $brandThumbPath = public_path().$this->productThumbPath."/".$brandThumb;
        File::delete($brandLogoPath, $brandThumbPath);
        $brand->destroy($id);
        return true;
    }
}
