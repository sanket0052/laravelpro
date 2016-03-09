<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories'; // put your table name here

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    	'description',
    	'urlname',
    	'status'
    ];

    public function product()
    {
        return $this->hasMany('App\Product');
    }

    public function brands()
    {
        return $this->belongsToMany('App\Category', 'brand_category', 'brand_id', 'category_id');
    }
}
