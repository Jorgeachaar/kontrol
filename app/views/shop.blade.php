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
    <ul class="centerlist grid effect-4" id="grid">
        <?php $band = true; ?>
        @foreach ($products as $prod)
            <?php
                $urlImage = $prod->images()->where('main', '=', true)->first();
                if($urlImage)
                {
                    $urlImage = $urlImage["url_img"];
                }
                else
                {
                    $urlImage =$prod->images[0]->url_img;
                }
            ?>
            <li><a href="{{URL::to('product/'.$prod->id)}}"><div id="box"><div class="boxcontenedor" style="background-image:url(../img/products/{{ $urlImage }})"><h3>{{ $prod->desc }}</h3></div></div></a></li>
            @if ($band)
                <br>
                <?php  $band =false; ?>
            @endif
        @endforeach
    </ul>
</div>

@stop

@section('script')

@stop

