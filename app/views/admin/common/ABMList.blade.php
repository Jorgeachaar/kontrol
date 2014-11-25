@extends('layouts.base')

@section('head')
<title>{{ $title }}</title>
<meta name='title' content='Productos'>
<meta name='description' content='Productos'>
<meta name='keywords' content='palabras, clave'>
<meta name='robots' content='noindex,nofollow'>
@stop

@section('container')

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar</h4>
      </div>
      <div class="modal-body" id="modal-body">
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id_prod" id="id_prod" value="">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="Delete_ok">Delete</button>
      </div>
    </div>
  </div>
</div>

<div class="container">
	<h1>{{ $title }}</h1>

	<a href="{{ $newUrl}}"><span class="glyphicon glyphicon-plus"></span> Nuevo </a>

	@if($products->count() > 0)
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<?php
							foreach ($fields as $Field => $value)
							{
								echo "<th>". $Field .  "</th>";
							}
						?>
						<th>Options</th>
					</tr>
				</thead>
				<tbody id="registros">

				</tbody>
			</table>
		</div>
	@else
		<p>No produts</p>
	@endif
	<!-- <p id="info">Hollaaa</p> -->
</div>
@stop

@section('script')
	<script type="text/javascript">
		function SetearBotones()
		{
			$( ".productDelete" ).click(function() {
				var id = $(this).data('id');
				var desc = $(this).data('desc');
				$('#id_prod').val(id);
				$("#modal-body").html("Esta seguro que desea eliminar el elemento: " + id + " - " + desc + "?");
				$('#myModal').modal('show');
				return false;
			});

			$("#Delete_ok").click(function()
			{
				var valor =  $("#id_prod").val();
				// $("#info").html(valor);

				$.ajax({
					type: 'POST',
					url: '/admin/category/delete/' + valor,
					dataType: 'json',
					processData: false,
					contentType: false,
					data: '',
					success: function (data) {
						CargarRegistros();
					},
					error: function(errors){
						alert("ERROR: " + errors);
						console.log(errors);
					}
				});

				$('#myModal').modal('hide');
				return false;
			});
		}

		function CargarRegistros ()
		{
			$.ajax({
				type: 'POST',
				url: '/admin/category/ShowList/',
				dataType: 'json',
				processData: false,
				contentType: false,
				data: '',
				success: function (data) {
					$("#registros").html(data.categorys);
					SetearBotones();
				},
				error: function(errors){
					alert("ERROR: " + errors);
					console.log(errors);
				}
			});
		}

		CargarRegistros();
	</script>
@stop
