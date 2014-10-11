@extends('layouts.base')

@section('head')
<title>Shop</title>
	<meta name='title' content='Shop'>
	<meta name='description' content='Shop'>
	<meta name='keywords' content='palabras, clave'>
	<meta name='robots' content='noindex,nofollow'>
	{{ HTML::style('css/ViewProducto.css') }}
@stop

@section('beforeContainer')
<!-- Modal -->
<div class="modal fade" id="sizeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">WHAT SIZE AM I?</h4>
      </div>
      <div class="modal-body">
      		<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
					        <tr>
					          <th>##</th>
					          <th>INCHES</th>
					          <th>CM</th>
					          <th>INCHES</th>
					          <th>CM</th>
					      </thead>
					      <tbody>
					        <tr>
					          <th class="text-nowrap">XS</th>
					          <td>30 - 32</td>
					          <td>30 - 32</td>
					          <td>30 - 32</td>
					          <td>30 - 32</td>
					        </tr>
					        <tr>
					          <th class="text-nowrap">S</th>
					          <td>34 - 36</td>
					          <td>34 - 36</td>
					          <td>34 - 36</td>
					          <td>34 - 36</td>
					        </tr>
					        <tr>
					          <th class="text-nowrap">M</th>
					          <td>36 - 38</td>
					          <td>36 - 38</td>
					          <td>36 - 38</td>
					          <td>36 - 38</td>
					        </tr>
					        <tr>
					          <th class="text-nowrap">L</th>
					          <td>40 - 42</td>
					          <td>40 - 42</td>
					          <td>40 - 42</td>
					          <td>40 - 42</td>
					        </tr>
					        <tr>
					          <th class="text-nowrap">XL</th>
					          <td>44 - 46</td>
					          <td>44 - 46</td>
					          <td>44 - 46</td>
					          <td>44 - 46</td>
					        </tr>
					      </tbody>
				</table>
			</div>
        	<!-- 	TO FIT CHEST	 	TO FIT WAIST	
				INCHES	CM	INCHES	CM
			XS	30 - 32	76 - 81	28 - 30	71 - 76
			S	34 - 36	86 - 91	30 - 32	76 - 81
			M	36 - 38	92 - 97	32 - 34	81 - 86
			L	40 - 42	102 - 107	34 - 36	86 - 91
			XL	44 - 46	112- 117	36 - 38	91 - 96
  -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
@stop

@section('container')

<div class="container">
	<div class="row">
		<!-- IMAGENEN PRINCIPAL -->
		<div class="col-lg-6">
			<img src="img/shop/1.png" class="img-responsive" alt="T-Shir">
			<!-- THUMBAIN -->
			<div class="row text-center">
			  <div class="col-xs-2 col-md-2">
			    <a href="#" class="thumbnail">
			      <img data-src="img/shop/1.png" src="img/shop/1.png" alt="...">
			    </a>
			  </div><div class="col-xs-2 col-md-2">
			    <a href="#" class="thumbnail">
			      <img data-src="img/shop/1.png" src="img/shop/2.png" alt="...">
			    </a>
			  </div><div class="col-xs-2 col-md-2">
			    <a href="#" class="thumbnail">
			      <img data-src="img/shop/1.png" src="img/shop/3.png" alt="...">
			    </a>
			  </div><div class="col-xs-2 col-md-2">
			    <a href="#" class="thumbnail">
			      <img data-src="img/shop/1.png" src="img/shop/4.png" alt="...">
			    </a>
			  </div><div class="col-xs-2 col-md-2">
			    <a href="#" class="thumbnail">
			      <img data-src="img/shop/1.png" src="img/shop/5.png" alt="...">
			    </a>
			  </div>
			</div><!-- END THUMBAIN -->
		</div>
		
		<!-- DESC DE COMPRA -->
		<div class="col-lg-6 text-left">
			<div class="producttitle">
				<h1>Product name</h1>
				<hr class="black">
					<h3>  
					$45.00
					<span class="oldprice">$88.00</span>
					</h3>
				<hr class="black">
				<p>Detalle del produto o algun tipo de informaciòn adicional.</p>
			</div>			
					
			<label>COUNT</label>
			<input type="number" class="form-control" placeholder="" value="1"><br>		

			<label>SIZE <a href=""  data-toggle="modal" data-target="#sizeModal">(WHAT SIZE AM I?)</a></label><br>
			<div class="btn-group" data-toggle="buttons">
				<label class="btn btn-tool" data-toggle="tooltip" data-placement="left" title="S SMALL">
					<input type="radio" name="options" id="option1" checked> XS
				</label>
				<label class="btn btn-tool" data-toggle="tooltip" data-placement="top" title="SMALL">
				 	<input type="radio" name="options" id="option2"> S
				</label>
				<label class="btn btn-tool" data-toggle="tooltip" data-placement="top" title="MEDIUN">
				  	<input type="radio" name="options" id="option3"> M
				</label>
				<label class="btn btn-tool" data-toggle="tooltip" data-placement="top" title="LARGE">
				  	<input type="radio" name="options" id="option4"> L
				</label>
				<label class="btn btn-tool" data-toggle="tooltip" data-placement="right" title="S LARGE">
				  	<input type="radio" name="options" id="option5"> XL
				</label>
			</div><br><br>
     		<a class="btn btn-default" href="#" role="button">add to cart</a>
     		<hr class="black">

     		<p>
     			This stone knitted crewneck sweater has an applied patch design on the front and on the left sleeve.
				Also features a woven neck label with an inserted size tag.
     		</p>

				-100% Cotton.<br>
				-Model is 5'11" and is wearing a Medium.<br>
				-Medium measures 53cm chest / 73cm length.<br>
				-Machine washable. Do not tumble dry. View inside label for care instructions.<br>
		</div><!-- END DESC DE PRODUCTO -->
	</div>
</div>

@stop

@section('script') 
<script type="text/javascript">
	$('.btn-tool').tooltip();
	// $('#sizeModal').modal();
</script>
@stop

