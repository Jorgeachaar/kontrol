@extends('layouts.base')

@section('head')
<title>Contacto</title>
<meta name='title' content='Shop'>
<meta name='description' content='Shop'>
<meta name='keywords' content='palabras, clave'>
<meta name='robots' content='noindex,nofollow'>
@stop

@section('container')

<div class="container">
	<div class="row">
		<div class="col-lg-6">
			Imagen
			<img src="img/shop/1.png" class="img-responsive" alt="T-Shir">
		</div>
		<div class="col-lg-6">
			<div class="row">
				<h3>Nombre del producto</h3>
				<p>$45</p>
				<p>Detalle del produto o algun tipo de informaciòn adicional.</p>
			</div>
			<div class="row">
				<h3>Size</h3>
			</div>
			<a class="btn btn-default" href="#" role="button">add to cart</a>
		</div>
	</div>
</div>

@stop

