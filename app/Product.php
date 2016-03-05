<?php

namespace App;

use File;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\ImageManagerStatic as Image;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products'; // put your table name here

    protected $productImagePath = '/assets/images/uploads/products';

    protected $productThumbPath = '/assets/images/uploads/products/thumbils';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    	'category_id',
		'brand_id',
		'description',
		'model',
		'stock',
		'price',
		'status',
		'image',
		'thumb'
    ];

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
