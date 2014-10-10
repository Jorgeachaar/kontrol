@extends('layouts.base')

@section('head')
<title>Shop</title>
<meta name='title' content='Shop'>
<meta name='description' content='Shop'>
<meta name='keywords' content='palabras, clave'>
<meta name='robots' content='noindex,nofollow'>
<link href="css/ViewProducto.css" rel="stylesheet">
@stop

@section('container')

<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<img src="img/shop/1.png" class="img-responsive" alt="T-Shir">
		</div>
		<div class="col-lg-6">
			<div class="row">
				<h3>Nombre del producto</h3>
				<p>$45</p>
				<p>Detalle del produto o algun tipo de informaciòn adicional.</p>
			</div>
			<div class="row">
				<div class="col-lg-2">
				COUNT:<input type="number" class="form-control" placeholder="Text input" value="1">
				</div>
			</div>
			<div class="row">
				<label>SIZE</label><br>
				<div class="btn-group" data-toggle="buttons">
					<label class="btn">
						<input type="radio" name="options" id="option1" checked> XS
					</label>
					<label class="btn">
					 	<input type="radio" name="options" id="option2"> S
					</label>
					<label class="btn">
					  	<input type="radio" name="options" id="option3"> M
					</label>
					<label class="btn">
					  	<input type="radio" name="options" id="option3"> L
					</label>
					<label class="btn">
					  	<input type="radio" name="options" id="option3"> XL
					</label>
				</div>
			</div>
			<div class="row">
				<h1><a class="btn btn-default" href="#" role="button">add to cart</a></h1>
			</div>
		</div>
	</div>
</div>

@stop

