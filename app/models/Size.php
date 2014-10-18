<?php

class Size extends Eloquent {

    protected $table = 'size';

    public function sizes()
	{
		return $this->belongsToMany('Product');
	}

}
