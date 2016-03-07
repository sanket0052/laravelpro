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
}
