@extends('layouts.base')

@section('head')
<title>Producto</title>
<meta name='title' content='Producto'>
<meta name='description' content='Producto'>
<meta name='keywords' content='palabras, clave'>
<meta name='robots' content='noindex,nofollow'>
@stop

@section('container')

	<?php
		$Editing = $product->id != "";

		$Title = $Editing ? "Producto: ". $product->id ." - " . $product->desc : "Nuevo Producto";
		$action = $Editing ? "AdminController@postEditProduct" : "AdminController@postNewProduct";
	?>

<div class="container">
	@if ($product)
		{{Form::open(array(
				'action' => $action,
				'method' => 'POST',
				'role' => 'form',
				'id' => 'form',
				'files' => true
			))
		}}
			<h1>{{$Title}}</h1>

			<div class="form-group">
				{{ Form::label('Desc: ') }}
				{{ Form::input('desc', 'desc', $product->desc, array('class' => 'form-control')) }}
				<div class="bg-danger" id="_desc">{{ $errors->first('desc') }}</div>
			</div>

			<div class="form-group">
				{{ Form::label('Categoria: ') }} <br>
				{{ Form::select('categorys', $categorys, $categorySelected) }}
				<div class="bg-danger" id="_desc">{{ $errors->first('desc') }}</div>
			</div>

			<div class="form-group">
				{{ Form::label('Desc2: ') }}
				{{ Form::input('desc2', 'desc2', $product->desc2, array('class' => 'form-control')) }}
				<div class="bg-danger" id="_desc2">{{ $errors->first('desc2') }}</div>
			</div>

			<div class="form-group">
				{{ Form::label('Desc3: ') }}
				{{ Form::textarea('desc3', $product->desc3, array('class' => 'form-control')) }}
				<div class="bg-danger" id="_desc3">{{ $errors->first('desc3') }}</div>
			</div>

			<div class="form-group">
				{{ Form::label('Price: ') }}
				{{ Form::input('number', 'price', $product->price, array('class' => 'form-control')) }}
				<div class="bg-danger" id="_price">{{ $errors->first('price') }}</div>
			</div>

			<div class="form-group">
				{{ Form::label('Old price: ') }}
				{{ Form::input('number', 'oldprice', $product->old_price, array('class' => 'form-control')) }}
				<div class="bg-danger" id="_oldprice">{{ $errors->first('oldprice') }}</div>
			</div>


			<div class="form-group">
				{{ Form::label('Size: ') }} <br>
				@foreach ($sizes as $size)
					<label class="checkbox-inline">
						<?php
							$auxSize = $product->sizes->find($size->id);
						?>
						{{ Form::checkbox($size->desc, $size->id, $auxSize); }} {{ $size->desc; }}
					</label>
				@endforeach
			</div>

			<div class="form-group">
				{{ Form::label('Stock: ') }}
				{{ Form::input('number', 'stock', $product->stock, array('class' => 'form-control')) }}
				<div class="bg-danger" id="_stock">{{ $errors->first('stock') }}</div>
			</div>


			@if ($Editing)
				{{ Form::open(array('url' => 'upload', 'files' => true)) }}

						<div class="form-group">
							{{ Form::label('Imagenes: ') }}
							{{Form::file('image', array('id' => 'image'));}} <br>
							{{ Form::submit('Regístrarme', array("class" => "btn btn-default")) }}
							{{ Form::input('button', null, 'Cargar Imagen', array('class' => 'btn btn-default', 'id' => 'updateimage')) }}
							<div class="bg-danger" id="_oldprice">{{ $errors->first('oldprice') }}</div>
							<br>
						</div>

					          @foreach ($product->images as $img)
							<img src="../../img/products/{{ $img->url_img }}"> <br>
						@endforeach
						<br />


				{{ Form::close() }}

			@endif

			{{Form::input("hidden", "id", $product->id)}}

			{{ Form::input('submit', null, 'Aceptar', array('class' => 'btn btn-default', 'id' => 'btn')) }}

		{{Form::close()}}
	@else
		No exist product!
	@endif



</div>

@stop


@section('script')

	<script type="text/javascript">
		$('#updateimage').click(function(){
			var input = document.getElementById ("image");
            		alert (input.value);
		});

	</script>

@stop
