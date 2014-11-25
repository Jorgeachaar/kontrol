<?php

class CategoryController extends BaseController {

	public function showCategory()
	{
		$products = Category::all();
		$title = "Categorias";
		$Fields = array('#' => 'id',  'Descripción' => 'desc');
		$KeyField = "id";
		$newUrl = '/admin/category/new/';
		$editUrl = '/admin/category/edit/';

		return View::make('admin.common.ABMList')
		->with('title', $title)
		->with('products', $products)
		->with('fields', $Fields)
		->with('keyfield', $KeyField)
		->with('newUrl', $newUrl)
		->with('editUrl', $editUrl)
		;
	}

	public function ShowList()
	{
		$Fields = array('#' => 'id',  'Descripción' => 'desc');
		$categorys = Category::all();
		$resultado = "";
		$editUrl = '/admin/category/edit/';

		foreach ($categorys as $category) {
			$resultado = $resultado . "<tr>";
				foreach ($Fields as $Field => $value)
				{
					$resultado = $resultado . "<td>". $category->$value .  "</td>";
				}
				$resultado = $resultado . "<td>";
				$resultado = $resultado . '<a href=" '. URL::to($editUrl .$category->id) .' "><span class="glyphicon glyphicon-edit"></span></a>';
				$resultado = $resultado . ' <a href="#" class="productDelete" data-id=" '. $category->id .' "  data-desc=" '. $category->desc .' "><span class="glyphicon glyphicon-trash"></span></a>';
				$resultado = $resultado . "</td>";
			$resultado = $resultado . "</tr>";
		}

		return Response::json(array(
			'success'    => true,
			'categorys'  => $resultado,
		));
	}

	public function NewCateogry()
	{
		//return "Hola";

		$product = new Category;
		$Title = "Nueva Categoria";
		$FieldTypes = array('id' => 'text', 'desc' => 'text', ); //label
		$KeyField = "id";
		$Action = "CategoryController@save";
		$urlCancel = "admin/category";

		return View::make('admin.common.edit')
		 ->with('Title', $Title)
		 ->with('FieldTypes', $FieldTypes)
		 ->with('product', $product)
		 ->with('keyfield', $KeyField)
		 ->with('action', $Action)
		 ->with('urlCancel', $urlCancel)
		;
	}

	public function EditCateogry($id)
	{
		//return "Hola";

		$product = Category::find($id);
		$Title = "Editar categoria: " . $product->id .  " - " . $product->desc;
		$FieldTypes = array('id' => 'text', 'desc' => 'text', ); //label
		$KeyField = "id";
		$Action = "CategoryController@save";
		$urlCancel = "admin/category";

		return View::make('admin.common.edit')
		 ->with('Title', $Title)
		 ->with('FieldTypes', $FieldTypes)
		 ->with('product', $product)
		 ->with('keyfield', $KeyField)
		 ->with('action', $Action)
		 ->with('urlCancel', $urlCancel)
		;
	}

	public function save()
	{
		//$ModoEdicion =  Input::get('Editing');
		$Id = Input::get('id');

		if($Id)
		{
			$element = Category::find($Id);
		}
		else
		{
			$element = new Category;
		}

		$Desc = Input::get('desc');

		$element->desc = $Desc;

		$element->save();


		$SeguirEditando =  Input::get('action');
		if ($SeguirEditando == 'Guardad y seguir editando')
		{
			return Redirect::to('admin/category/edit/'.$element->id);
		}
		else
		{
			return Redirect::to('admin/category');
		}
	}

	public function delete($id)
	{
		$category = Category::findOrFail($id);
		$category->delete();

		return Response::json(array(
			'success'    => true,
		));
	}

}
