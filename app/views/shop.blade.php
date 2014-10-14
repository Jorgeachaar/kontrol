@extends('layouts.base')

@section('head')
	<title>Shop - KTRL</title>
	<meta name='title' content='Shop'>
	<meta name='description' content='Shop'>
	<meta name='keywords' content='palabras, clave'>
	<meta name='robots' content='noindex,nofollow'>
	{{ HTML::style('') }}
@stop

@section('beforeContainer')
@stop

@section('container')

<div class="container">
	<h1>Shop</h1>
	<hr class="black">
    <ul class="centerlist">
        <li><a href="{{URL::route('product')}}"><div id="box"><div class="boxcontenedor" style="background-image:url(../img/list/3.jpg)"><h3>Comentario 1</h3></div></div></a></li>
        <br>
        <li><a href="{{URL::route('product')}}"><div id="box"><div class="boxcontenedor" style="background-image:url(../img/list/2.jpg)"><h3>Nueva temporada</h3></div></div></a></li>
        <li><a href="{{URL::route('product')}}"><div id="box"><div class="boxcontenedor" style="background-image:url(../img/list/4.jpg)"><h3>Comentario 1</h3></div></div></a></li>
        <li><a href="{{URL::route('product')}}"><div id="box"><div class="boxcontenedor" style="background-image:url(../img/list/5.jpg)"><h3>COMENTARIO Q!</h3></div></div></a></li>
        <li><a href="{{URL::route('product')}}"><div id="box"><div class="boxcontenedor" style="background-image:url(../img/list/6.jpg)"><h3>KKK</h3></div></div></a></li>
        <li><a href="{{URL::route('product')}}"><div id="box"><div class="boxcontenedor" style="background-image:url(../img/list/7.jpg)"><h3>PUBLICIDAD</h3></div></div></a></li>
        <li><a href="{{URL::route('product')}}"><div id="box"><div class="boxcontenedor" style="background-image:url(../img/list/8.jpg)"><h3>METAL PARA TODOS</h3></div></div></a></li>
        <li><a href="{{URL::route('product')}}"><div id="box"><div class="boxcontenedor" style="background-image:url(../img/list/9.jpg)"><h3>WACHIN!</h3></div></div></a></li>
    </ul>
</div>

@stop

@section('script')

@stop

