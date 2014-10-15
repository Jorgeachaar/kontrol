<?php

class ProductController extends BaseController {

	public function product($name)
	{
		return View::make('product');
	}
}
