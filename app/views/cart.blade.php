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

		<table class="table table-striped">
			<thead>
				<tr>
					<th></th>
					<th>Products</th>
					<th>Count</th>
					<th>Unit price</th>
					<th>Total</th>
					<th>Update</th>
					<th>Remove</th>
				</tr>
			</thead>
			<tbody>
				{{Form::open(array(
		                		"method" => "POST",
		                		//"action" => "ProductController@checkout",
		                		"role" => "form",
				))}}
				@foreach( $items as $item)
					 <tr>
					          <th class="text-nowrap"> <a href="#">{{ $item["id"] }}</a> </th>
					          <td>{{ $item["nombre"] }}</td>
						<td>
							<div class="col-xs-3">
								<input type="text" class="form-control" placeholder="" value="{{ $item["cantidad"] }}">
							</div>
						</td>
						<td>{{ $item["precio"] }}</td>
						<td>{{ $item["total"] }}</td>
						<td><a href="{{ $item["unique_id"] }}"><span class ="glyphicon glyphicon-refresh"></span></a></td>
						<td><a href="{{ $item["unique_id"] }}"><span class ="glyphicon glyphicon-trash"></span></a></td>
					</tr>
				@endforeach
		          </tbody>
		</table>

		{{ $cart->precio_total(); }}
		<br>
		{{Form::input("submit", null, "UPDATE", array("class" => "btn btn-default"))}}
		{{Form::input("submit", null, "CHECKOUT", array("class" => "btn btn-default"))}}
		{{Form::close()}}


		@else
			<p>No tiene ningún artículo ingresado en el carrito.</p>
		@endif


	</div>
@stop


@section('script')
	    <script type="text/javascript">

	    </script>
@stop
