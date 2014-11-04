<?php

class AdminController extends BaseController {

	public function showProducts()
	{
		$products = Product::all();

		return View::make('admin.product.list')->with('products', $products);
	}
	
	private function ShowPrductBy($prod)
	{
		$sizes = Size::all();
		$categorys = Category::all()->lists('desc', 'id');
		$categorySelected = $prod->category_id;
		
		return View::make('admin.product.product')
						->with('product', $prod)
						->with('sizes', $sizes)
						->with('categorys', $categorys)
						->with('categorySelected', $categorySelected);	
	}

	public function showProduct($id)
	{
		 $product = Product::find($id);
		 return $this->ShowPrductBy($product);
	}

	public function newProduct()
	{
		$product = new Product;
		return $this->ShowPrductBy($product);
	}

	public function postNewProduct()
	{
		$Desc = Input::get('desc');
		$Desc2 = Input::get('desc2');
		$Desc3 = Input::get('desc3');
		$price = Input::get('price');
		$oldprice = Input::get('oldprice');
		$sizes = Input::get('sizes');


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

		$newproduct->save();

		return Redirect::to('admin/product');
	}

	public function postEditProduct()
	{
		$Id = Input::get('id');
		$Desc = Input::get('desc');
		$Desc2 = Input::get('desc2');
		$Desc3 = Input::get('desc3');
		$price = Input::get('price');
		$oldprice = Input::get('oldprice');
		$categorySelected = Input::get('categorys');

		$editproduct = Product::find($Id);

		$editproduct->desc = $Desc;
		$editproduct->desc2 = $Desc2;
		$editproduct->desc3 = $Desc3;
		$editproduct->price = $price;
		$editproduct->old_price = $oldprice;
		//SAVE CATEGORY
		$editproduct->category_id = $categorySelected;
		//SAVE SIZE
		$sizes = Size::all();
		$editproduct->sizes()->detach();
		foreach ($sizes as $size) 
		{
			$auxSizes = Input::get($size->desc);
			if ($auxSizes) 
			{
				$editproduct->sizes()->attach($auxSizes);
			}			
		}

		$editproduct->save();

		return Redirect::to('admin/product');
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
