@extends('layouts.bootstrap')

@section('head')
<title>Página de inicio</title>
<meta name='title' content='Página de inicio'>
<meta name='description' content='Página de inicio'>
<meta name='keywords' content='palabras, clave'>
<meta name='robots' content='All'>
@stop

@section('content')
<h1>Página de inicio</h1>

<hr>
{{ Form::open(array
            (
            'action' => 'HomeController@index', 
            'method' => 'GET',
            'role' => 'form',
            'class' => 'form-inline'
            )) 
}}
{{ Form::input('text', 'buscar', Input::get('buscar'), array('class' => 'form-control') )}}
{{ Form::input('submit', null, 'Buscar', array('class' => 'btn btn-primary'))}}
{{Form::close()}}
<hr>
<label class="label label-info">Página {{$paginacion->getCurrentPage()}} de un total de {{$paginacion->getTotal()}} páginas</label>
<hr>
<?php foreach($paginacion as $row): ?>
<div class="container">
    <ul class="list-inline">
        <li>
            <a href="{{$row->href}}" target="_blank">
            <img src="{{$row->src}}" title="{{$row->titulo}}">
            </a>
        </li>
        <li>{{$row->descripcion}}</li>
    </ul>
</div>
<?php endforeach; ?>

<div class="container">
    {{$paginacion->appends(array("buscar" => Input::get("buscar")))->links()}}
</div>

@stop