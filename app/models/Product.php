<?php
// http://laraveles.com/docs/4.1/eloquent
class Product extends Eloquent {

    protected $table = 'product';
    public $timestamps = true;

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