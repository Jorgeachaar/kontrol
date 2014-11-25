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
				'action' => $action,
				'method' => 'POST',
				'role' => 'form',
				'id' => 'formProduct',
				'files' => true
			))
		}}
			<h1>{{$Title}}</h1>
			<hr class="black">

			@foreach ($FieldTypes as $FieldType => $value)
				@if ($value == 'text')
					<div class="form-group">
						{{ Form::label($FieldType . ': ') }}
						{{ Form::input('desc', 'desc', $product->$FieldType, array('class' => 'form-control')) }}
						<div class="bg-danger" id="_{{ $FieldType}}">{{ $errors->first($FieldType) }}</div>
					</div>
				@endif
			@endforeach

			<br /><hr class="black">
			{{Form::input("hidden", "id", $product->$keyfield)}}

			{{ Form::submit('Aceptar', array('class' => 'btn btn-default', 'id' => 'btn')) }}
			{{ Form::submit('Guardad y seguir editando', array('class' => 'btn btn-default', 'name' => 'action')) }}
			<a href="{{ URL::to($urlCancel) }}" class="btn btn-default" role="button">Cancelar</a>

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
				DivImg = DivImg + 	'<button class="close"><span class="glyphicon glyphicon-remove"></span></button>';
				if (imagenes[i].main) {
					DivImg = DivImg + '<span class="glyphicon glyphicon-eye-open mainImg"></span>';
				}
				else
				{
					DivImg = DivImg + '<span class="glyphicon glyphicon-eye-close mainImg"></span>';
				}
				DivImg = DivImg + 	'<img class="img-responsive" src="../../img/products/' +imagenes[i].url_img+ ' " data-id=" ' +imagenes[i].id+' ">';
				DivImg = DivImg +'</div>';
			}
			$('.imagenes').html(DivImg);
			BotonClose();
			BotonMain();
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

           	function BotonMain(){
			$('.mainImg').click(function() {
				var imgDelete = $(this).next();
				var IDimg = $(imgDelete).data('id');

				$.ajax({
					type: 'POST',
					url: '../setmain/'+IDimg,
					dataType: 'json',
					processData: false,
					contentType: false,
					success: function (data) {
						console.log(data.success);
						CargarImagenes(data.images);
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
		BotonMain();

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
