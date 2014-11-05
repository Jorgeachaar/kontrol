<?php
// http://laraveles.com/docs/4.1/eloquent
class Product extends Eloquent {

    	protected $table = 'product';
    	public $timestamps = true;


    	public function rules()
	{
		 return array(
		  array('email', 'required|email', 'on' => 'create,update,reset'),
		  array('email', 'unique:users', 'on' => 'create, update'),
		  array('name', 'required|unique:users|min:3', 'on' => 'create,update'),
		  array('password', 'confirmed|min:6|required'),
		 );
	}

    	public function category()
	{
		return $this->belongsTo('Category', 'category_id');
	}

	public function sizes()
	{
		return $this->belongsToMany('Size');
	}

	public function images()
	{
		return $this->hasMany('ProductImg', 'product_id');
	}

}
