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
				'id' => 'formProduct',
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

			<!--
			@if ($Editing)
				{{ Form::open(array('url' => 'upload', 'files' => true)) }}
			-->
			<button type="button" class="" data-toggle="collapse" data-target="#demo" aria-expanded="true" aria-controls="demo">
				Ver Imagenes
			</button>
			<div id="demo" class="collapse in">
						<div class="form-group">
							{{ Form::label('Imagenes: ') }}
							{{Form::file('imagehh', array('id' => 'imageLoad'));}} <br>
						</div>

						<div class="imagenes container">
							<div class="row">
					          @foreach ($product->images as $img)
								<div class="col-xs-6 col-md-3 thumb">
									<button class="close">x</button>
									<!-- <a href="#" class="thumbnail"> -->
									<img class="img-responsive" src="../../img/products/{{ $img->url_img }}" data-id="{{ $img->id }}">
									<!-- </a> -->
								</div>
						@endforeach
							</div>
						</div>
			</div>

				<!--
				{{ Form::close() }}-->

			@endif

			<br />
			{{Form::input("hidden", "id", $product->id)}}

			{{ Form::submit('Aceptar', array('class' => 'btn btn-default', 'id' => 'btn')) }}

		{{Form::close()}}
	@else
		No exist product!
	@endif




</div>


@stop


@section('script')

	<script type="text/javascript">

		function CargarImagenes (imagenes) {
			var DivImg = "";
			for(var i=0; i< imagenes.length; i++) {
				// alert(Prod[i].id);
				//DivImg = DivImg + '<div class="row"><div class="col-xs-6 col-md-3"><button class="close">x</button><img src="../../img/products/'+ imagenes[i].url_img +' data-id='+ imagenes[i].id +' ></div></div>';
				DivImg = DivImg + '<div class="col-xs-6 col-md-3 thumb">';
				DivImg = DivImg + 	'<button class="close">x</button>';
				DivImg = DivImg + 	'<img class="img-responsive" src="../../img/products/' +imagenes[i].url_img+ ' " data-id=" ' +imagenes[i].id+' ">';
				DivImg = DivImg +'</div>';
			}
			$('.imagenes').html(DivImg);
			BotonClose();
		}

		function BotonClose(){
			$('.close').click(function() {
				var imgDelete = $(this).next();
				var IDimg = $(imgDelete).data('id');

				$.ajax({
					type: 'POST',
					url: '../deleteimage/'+IDimg,
					dataType: 'json',
					processData: false,
					contentType: false,
					success: function (data) {
						if (data.success)
						{
							CargarImagenes(data.images);
						}
					},
					error: function(errors){
						alert("ERROR: " + errors);
						console.log(errors);
					}
				});
				return false;
			});
		}

		BotonClose();

		//AGREGA NUEVA IMAGEN
		$("#imageLoad").change(function() {
			var form = $('#formProduct');
			var FData = new FormData(form[0]);

			$.ajax({
				type: 'POST',
				//url: 'AdminController@Prueba',
				url: '../prueba',
				dataType: 'json',
				processData: false,
				contentType: false,
				data: FData, //$('#formProduct').serialize(),
				beforeSend: function(){
					//$('.before').append('<img src="imgs/350.gif" />');
				},
				complete: function(data){
					//alert(data.message);
				},
				success: function (data) {
					$('.imagenes').html('');
					CargarImagenes(data.product);
				},
				error: function(errors){
					alert("ERROR: " + errors);
					console.log(errors);
				}
			});
			return false;
    		});








	</script>

@stop
