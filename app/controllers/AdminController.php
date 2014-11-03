<?php

class AdminController extends BaseController {

	public function showProducts()
	{
		$products = Product::all();

		return View::make('admin.product.list')->with('products', $products);
	}

	public function showProduct($id)
	{
		$product = Product::find($id);
		$sizes = Size::all();

		return View::make('admin.product.product')
						->with('product', $product)
						->with('sizes', $sizes);
	}

	public function newProduct()
	{
		return View::make('admin.product.product');
	}

	public function postNewProduct()
	{
		$Desc = Input::get('desc');
		$Desc2 = Input::get('desc2');
		$Desc3 = Input::get('desc3');
		$price = Input::get('price');
		$oldprice = Input::get('oldprice');
		$sizes = Input::get('sizes');

		$result = "Postea producto: <br> <br>
				desc: ". $Desc . "<br>
				desc2: ". $Desc2 . "<br>
				desc3: ". $Desc3 . "<br>
				Price: ". $price . "<br>
				Old price: ". $oldprice . "<br>
			";

			//Size: ". $sizes[] . "<br>
			// foreach ($sizes as $size) {
			// 	$result = $result . $size->value;
			// }

		$newproduct = new Product;

		$newproduct->desc = $Desc;
		$newproduct->desc2 = $Desc2;
		$newproduct->desc3 = $Desc3;
		$newproduct->price = $price;
		$newproduct->old_price = $oldprice;
		$newproduct->category_id = 1;

		// $newproduct->save();

		return $this->showProducts();
	}

	public function deleteProduct($id)
	{
		$product = Product::find($id);

		$product->delete();

		$product->save();

		if (Request::ajax())
		{
		    //
		}
	}



}
