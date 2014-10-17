<?php

class ProductController extends BaseController {

	public function product($name)
	{
		return View::make('product');
	}

	public function addproducttocart($name)
	{
		$carrito = new Carrito();

		$articulo = array(
		        "id"            => 14,
		        "cantidad"  => 1,
		        "precio"     => 50,
		        "nombre"   => "camisetas"
		);

		$carrito->add($articulo);

		return View::make('product');
	}
}
