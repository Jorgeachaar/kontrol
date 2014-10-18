<?php

class Category extends Eloquent {

	protected $table = 'category';
	public $timestamps = true;

	public function products()
	{
		return $this->hasMany('Product', 'category_id');
	}

}
