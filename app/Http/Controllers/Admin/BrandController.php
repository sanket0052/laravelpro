<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use File;
use Session;
use App\Brand;
use App\Category; 
use App\Http\Requests;
use App\Http\Requests\BrandRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\ImageManagerStatic as Image;

class BrandController extends Controller
{
    /**
     * Brand logo path to public folder.
     * @var string
     */
    protected $destinationLogoPath = '/assets/images/uploads/brands';

    /**
     * Brand logo thumb path.
     * @var string
     */
    protected $destinationLogoThumbPath = '/assets/images/uploads/brands/thumbils';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCategories = Category::all(array('id', 'name'));
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

        $data = $request->all();

        $data['category_list'] = implode(',', $request->category_list);

        $logo = $request->file('logo');

        // Store the brand logo in upload folder
        $storeLogo = $this->saveBrandLogo($logo, $request->name);

        $data['logo'] = $storeLogo['logoName'];
        $data['thumb'] = $storeLogo['logoThumbName'];
        
        // Store data in Database
        $brand = Brand::create($data);

        return redirect('admin/brand')->with('flash_message', 'Brand Added Successfully!');
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
        $brand = Brand::find($id);

        if(!$brand)
        {

            abort(404);
        }

        $allCategories = Category::all();
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
        $brand = Brand::find($id);

        if(!$brand)
        {
            abort(404);
        }

        $brandArr = $request->all();
        $brandArr['category_list'] = implode(',', $request->category_list);

        $logo = $request->file('logo');

        if ($request->hasFile('logo'))
        {
            $storeLogo = $this->saveBrandLogo($logo, $brandArr['name']);
            $brandArr['logo'] = $storeLogo['logoName'];
            $brandArr['thumb'] = $storeLogo['logoThumbName'];
        }
        // Store data in Database
        $brand->update($brandArr);
        return redirect('admin/brand')->with('flash_message', 'Brand Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);

        if (!$brand)
        {
            abort(404);
        }

        $brandResult = $this->deleteBrand($id);

        if($brandResult)
        {
            return redirect('admin/brand')->with('flash_message', 'Brand Deleted Successfully!');
        }
        else
        {
            return redirect('admin/brand')->with('flash_message', 'Error Accured While Deleting Brand. Please try again.');
        }
    }

    /**
     * Save the brand logo image file in folder
     * @param  UploadedFile $file      File array
     * @param  string       $brandName Pass the brandname
     * @return array                  return array of the logo file name and thumb name.
     */
    protected function saveBrandLogo(UploadedFile $file, $brandName)
    {
        $logoExtension = $file->getClientOriginalExtension();
        $logoFileName = $brandName.'.'.$logoExtension;
        $file->move(public_path().$this->destinationLogoPath, $logoFileName);

        $thumbFileName = $brandName.'_thumb.'.$logoExtension;

        // Create Logo Thumb 
        $thumb = Image::make(file_get_contents(public_path().$this->destinationLogoPath.'/'.$logoFileName))->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumb->save(public_path().$this->destinationLogoThumbPath.'/'.$thumbFileName);

        $filesName = array(
                'logoName' => $logoFileName,
                'logoThumbName' => $thumbFileName
            );

        return $filesName;
    }

    /**
     * Delete the brand and its logo and its thumb file.
     * @param  int $id Brand id.
     * @return boolean     return the booleand.
     */
    protected function deleteBrand($id)
    {
        $brand = Brand::find($id);
        $brandLogo = $brand->logo;
        $brandThumb = $brand->thumb;
        $brandLogoPath = public_path().$this->destinationLogoPath."/".$brandLogo;
        $brandThumbPath = public_path().$this->destinationLogoThumbPath."/".$brandThumb;
        File::delete($brandLogoPath, $brandThumbPath);
        $brand->destroy($id);
        return true;
    }
}
