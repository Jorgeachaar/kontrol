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
						<!-- <th></th> -->
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
			                		"action" => "HomeController@updatecart",
			                		"role" => "form",
					))}}
					@foreach( $items as $item)
						 <tr>
						          <!-- <th class="text-nowrap"> <a href="{{URL::to('product/'.$item["id"])}}">{{ $item["id"] }}</a> </th> -->
						          <td><a href="{{URL::to('product/'.$item["id"])}}">{{ $item["nombre"] }}</a></td>
							<td>
								<div class="col-xs-4">
									{{ Form::input('text', 'count,'.$item["id"], $item["cantidad"], array('class' => 'form-control')) }}
								</div>
							</td>
							<td>${{ $item["precio"] }}</td>
							<td>${{ $item["total"] }}</td>
							<td><a href="{{URL::route('updatecart')}}"><span class ="glyphicon glyphicon-refresh"></span></a></td>
							<td><a href="{{URL::to('deleteproducttocart/'. $item["unique_id"] )}}"><span class ="glyphicon glyphicon-trash"></span></a></td>
						</tr>
						{{ Form::hidden ('unique_id',  $item["unique_id"]) }}
					@endforeach
					<td>TOTAL</td><td>{{ $cart->articulos_total(); }}</td><td></td><td>${{ $cart->precio_total(); }}</td><td></td><td></td>
			          </tbody>
			</table>
			<div class="row text-right">
				<a class="btn btn-default" href="{{URL::route('updatecart')}}" role="button">UPDATE</a>
				<a class="btn btn-default" href="{{URL::route('checkout')}}" role="button">CHECKOUT</a>

				{{Form::input("submit", null, "Iniciar sesión", array("class" => "btn btn-default"))}}
			</div>
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
