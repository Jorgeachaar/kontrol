@extends('layouts.base')

@section('head')
<title>Productos</title>
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
        <h4 class="modal-title" id="myModalLabel">Eliminar producto</h4>
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
	<h1>Productos</h1>

	<a href="product/new"><span class="glyphicon glyphicon-plus"></span> Nuevo producto</a>
	@if($products->count() > 0)
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Desc</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					@foreach($products as $product)
						<tr>
							<td>{{ $product->id }}</td>
							<td>{{ $product->desc }}</td>
							<td>
								<a href="{{ URL::to('admin/product/'.$product->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
								<a href="#" class="productDelete" data-id="{{$product->id}}"  data-desc="{{$product->desc}}"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	@else
		<p>No produts</p>
	@endif
</div>
@stop

@section('script')
	<script type="text/javascript">
		$( ".productDelete" ).click(function() {
			var id = $(this).data('id');
			var desc = $(this).data('desc');
			$('#id_prod').val(id);
			$("#modal-body").html("Esta seguro que desea eliminar el producto: " + id + " - " + desc + "?");
			$('#myModal').modal('show');
			return false;
		});

		$("#Delete_ok").click(function()
		{
			$('#myModal').modal('hide');
			return false;
		});
	</script>
@stop
