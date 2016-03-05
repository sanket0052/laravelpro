<?php

namespace App;

use File;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\ImageManagerStatic as Image;

class Brand extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'brands'; // put your table name here

    protected $destinationLogoPath = '/assets/images/uploads/brands';

    protected $destinationLogoThumbPath = '/assets/images/uploads/brands/thumbils';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    	'description',
        'status',
        'category_list',
        'logo',
    	'thumb',
    ];

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
