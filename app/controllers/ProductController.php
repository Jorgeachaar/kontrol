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

	public function addproducttocart()
	{
		$id = Input::get('id');
		$prod = Product::find($id);
		if ($prod)
		{
			$carrito = new Carrito();

			$articulo = array(
			        "id"            => $prod->id,
			        "cantidad"  => 1,
			        "precio"     => $prod->price,
			        "nombre"   => $prod->desc
			);

			$carrito->add($articulo);

			$view = View::make('product');		
			$view->product = $prod;

			return $prod ? Redirect::back() : 'No existe el producto';
		}
		else
			return "error";

		

		
	}
}
