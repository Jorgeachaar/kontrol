<?php

class ProductImg extends Eloquent {

	protected $table = 'product_img';
	public $timestamps = true;

	public function products()
	{
		return $this->belongsTo('Product', 'product_id');
	}

}
