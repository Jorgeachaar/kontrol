@extends('layouts.base')

@section('head')
    <title>Contact - KTRL</title>
    <meta name='title' content='Kontrol'>
    <meta name='description' content='Kontrol'>
    <meta name='keywords' content='palabras, clave'>
    <meta name='robots' content='noindex,nofollow'>

    {{ HTML::style('') }}
@stop

<?php
    $cart = new Carrito();
?>

@section('container')
	<div class="container" id="">
		<h1>Cart</h1>
		<hr class="black">

		@if($cart->articulos_total() > 0)
			<?php $items = $cart->get_content(); ?>
			@foreach( $items as $item)
				{{ $item["id"] ." - ". $item["nombre"]." - ". $item["precio"]." - ". $item["cantidad"] ; }}
				<br>
			@endforeach
		@else
			<p>No tiene ningún artículo ingresado en el carrito.</p>
		@endif
		

	</div>
@stop


@section('script')
	    <script type="text/javascript">

	    </script>
@stop
