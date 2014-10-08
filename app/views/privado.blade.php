@extends('layouts.base')

@section('head')
<title>Contacto</title>
<meta name='title' content='Login'>
<meta name='description' content='Login'>
<meta name='keywords' content='palabras, clave'>
<meta name='robots' content='noindex,nofollow'>
@stop

@section('container')

<h1>Bienvenido {{Auth::user()->get()->user}}</h1>
<p>{{Auth::user()->get()->email}}</p>

@stop

