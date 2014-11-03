@extends('layouts.base')

@section('head')
<title>Producto</title>
<meta name='title' content='Producto'>
<meta name='description' content='Producto'>
<meta name='keywords' content='palabras, clave'>
<meta name='robots' content='noindex,nofollow'>
@stop

@section('container')

<div class="container">
	@if ($product)
		{{Form::open(array(
			'action' => 'AdminController@postNewProduct',
			'method' => 'POST',
			'role' => 'form',
			'id' => 'form',
			))
		}}
			<h1>Producto: {{$product->id}} - {{$product->desc}}</h1>


			<div class="form-group">
				{{ Form::label('Desc: ') }}
				{{ Form::input('desc', 'desc', $product->desc, array('class' => 'form-control')) }}
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
						{{ Form::checkbox('sizes[]', $size->id, $auxSize); }} {{ $size->desc; }}

						<!-- <input type="checkbox" name="sizes" value="{{ $size->id }}"> {{ $size->desc }} -->
					</label>
				@endforeach
			</div>

			<h1>IMAGENES</h1>

			{{ Form::input('submit', null, 'Aceptar', array('class' => 'btn btn-default', 'id' => 'btn')) }}

		{{Form::close()}}
	@else
		No exist product!
	@endif



</div>

@stop
