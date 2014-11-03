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

			<table class="table table-condensed">
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
					@foreach( $items as $item)
						{{Form::open(array(
				                		"method" => "POST",
				                		"action" => "HomeController@updatecart",
				                		"role" => "form",
						))}}
						 <tr>
						          <!-- <th class="text-nowrap"> <a href="{{URL::to('product/'.$item["id"])}}">{{ $item["id"] }}</a> </th> -->
						          <td><a href="{{URL::to('product/'.$item["id"])}}">{{ $item["nombre"] }}</a></td>
							<td>
								<div class="col-xs-4 table-input">
									{{ Form::input('text', 'count', $item["cantidad"], array('class' => 'form-control')) }}
								</div>
							</td>
							<td>${{ $item["precio"] }}</td>
							<td>${{ $item["total"] }}</td>
							<td><button type="submit" class="btn btn-link"><span class ="glyphicon glyphicon-refresh"></span></button></td>
							<td><a href="{{URL::to('deleteproducttocart/'. $item["unique_id"] )}}"><span class ="glyphicon glyphicon-trash"></span></a></td>
							{{ Form::hidden ('unique_id',  $item["unique_id"]) }}
						</tr>
						{{Form::close()}}
					@endforeach
					<td>TOTAL</td><td>{{ $cart->articulos_total(); }}</td><td></td><td>${{ $cart->precio_total(); }}</td><td></td><td></td>
			          </tbody>
			</table>
			<div class="row text-right">
				<a class="btn btn-default" href="{{URL::route('checkout')}}" role="button">CHECKOUT</a>
			</div>
		@else
			<p>No tiene ningún artículo ingresado en el carrito.</p>
		@endif


	</div>
@stop


@section('script')
	    <script type="text/javascript">
		    $('.updatecart').click(function() {
	  			alert($(this).attr('id'));
	  			return false;
			});
	    </script>
@stop
