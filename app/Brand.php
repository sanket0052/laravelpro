<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Brand extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'brands'; // put your table name here

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    	'description',
        'status',
        'logo',
        'thumb',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'brand_category', 'brand_id', 'category_id');
    }
}
