<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contacts'; // put your table name here

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    	'email',
    	'message' 
    ];

    public function setUpdatedAt($value)
	{
	   //Do-nothing
	}

	public function getUpdatedAtColumn()
	{
	    //Do-nothing
	}
}
