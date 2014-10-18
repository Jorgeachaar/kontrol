<?php

class ProductController extends BaseController {

	public function product($id)
	{
		// return Product::find($id)->images->first()->url_img;
		
		$view = View::make('product');		
		$pro = Product::find($id);
		$view->product = $pro;

		return $pro ? $view : 'No existe el producto';
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
