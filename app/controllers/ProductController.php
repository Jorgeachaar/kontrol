<?php

class ProductController extends BaseController {

	public function product($name)
	{
		return View::make('product');
	}

	public function addproducttocart($name)
	{
		Cart::add(array('id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 9.99, 'options' => array('size' => 'large')));

		return View::make('product');
	}
}
