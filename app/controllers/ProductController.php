<?php

class ProductController extends BaseController {

	public function product($id)
	{
		//return $pro ? $pro->category->desc : "No existe el articulo";
		// return Category::find(1)->products->count();
		
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
