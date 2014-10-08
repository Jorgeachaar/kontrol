@extends('layouts.base')

@section('head')
    <title>Error</title>
@stop

@section('container')
  <h1><span class ="glyphicon glyphicon-fire"></span> Error 404</h1>
  <a href="{{ URL::route('index') }}"></a>
@stop
