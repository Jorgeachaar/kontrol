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
		$Id = Input::get('id');
		$Desc = Input::get('desc');
		$Desc2 = Input::get('desc2');
		$Desc3 = Input::get('desc3');
		$price = Input::get('price');
		$oldprice = Input::get('oldprice');
		$categorySelected = Input::get('categorys');
		$stock = Input::get('stock');

		$editproduct = new Product;

		$editproduct->desc = $Desc;
		$editproduct->desc2 = $Desc2;
		$editproduct->desc3 = $Desc3;
		$editproduct->price = $price;
		$editproduct->old_price = $oldprice;
		$editproduct->stock = $stock;
		//SAVE CATEGORY
		$editproduct->category_id = $categorySelected;
		//SAVE SIZE
		$sizes = Size::all();


		$editproduct->save();

		$editproduct->sizes()->detach();

		foreach ($sizes as $size)
		{
			$auxSizes = Input::get($size->desc);
			if ($auxSizes)
			{
				$editproduct->sizes()->attach($auxSizes);
			}
		}

		$SeguirEditando =  Input::get('action');
		if ($SeguirEditando == 'Guardad y seguir editando')
		{
			return Redirect::to('admin/product/'.$editproduct->id);
		}
		else
		{
			return Redirect::to('admin/product');
		}
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
		$stock = Input::get('stock');
		$editproduct = Product::find($Id);

		$editproduct->desc = $Desc;
		$editproduct->desc2 = $Desc2;
		$editproduct->desc3 = $Desc3;
		$editproduct->price = $price;
		$editproduct->old_price = $oldprice;
		$editproduct->stock = $stock;
		//SAVE CATEGORY
		$editproduct->category_id = $categorySelected;

		$editproduct->save();

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

		$SeguirEditando =  Input::get('action');
		if ($SeguirEditando == 'Guardad y seguir editando')
		{
			return Redirect::to('admin/product/'.$Id);
		}
		else
		{
			return Redirect::to('admin/product');
		}
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

	public function Prueba()
	{
		$id = Input::get('id');
		$file = Input::file('imagehh');
		$data = Input::all();

		$PATH = 'public/img/products';
		$FileName = $file->getClientOriginalName();

		$file->move($PATH , $id . "_" . $FileName );

		$img = new ProductImg;
		$img->url_img = $id . "_" . $FileName;
		$img->desc = $FileName;
		$img->product_id = $id;

		$img->save();

		$product = Product::find($id);
		$imgProd = $product->images;

		return Response::json(array(
			'success'    => true,
			'product'  => $imgProd,
		));
	}

	public function SetMain($id)
	{
		$resultado = true;

		$img = ProductImg::find($id);
		$idProd = Product::find($img->product_id);
		$images =  $idProd->images;

		foreach ($images as $image) {
			$image->main = false;
			$image->save();
		}

		$img->main = true;
		$img->save();

		$idProd = Product::find($img->product_id);
		$imagessx =  $idProd->images;

		return Response::json(array(
			'success'    => $resultado,
			'images'   => $imagessx,
		));
	}

	public function DeleteImage($id)
	{
		$resultado = false;

		$img = ProductImg::find($id);
		$urlImg = 'public/img/products/' . $img->url_img;
		$Exists  = File::exists($urlImg);

		if ($img)
		{
			if ($Exists)
			{
				File::delete($urlImg);
			}

			$img->delete();
			$imgs = Product::find($img->product_id)->images;
			$resultado = true;
		}

		return Response::json(array(
			'success'    => $resultado,
			'images'  => $imgs,
		));
	}

}
