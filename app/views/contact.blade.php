@extends('layouts.base')

@section('head')
    <title>Contact - KTRL</title>
    <meta name='title' content='Kontrol'>
    <meta name='description' content='Kontrol'>
    <meta name='keywords' content='palabras, clave'>
    <meta name='robots' content='noindex,nofollow'>

    {{ HTML::style('css/contact.css') }}
@stop

@section('script')
	    <script type="text/javascript">
		$(function(){
			function send_ajax(){
				$.ajax({
					url: 'contact',
					type: 'POST',
					data: $("#form").serialize(),
					success: function(datos)
					{
					 	$('#_email, #_name, #_subject, #_msg, #_recaptcha_response_field').text('');

						if (datos.success == false)
						{
							$.each(datos.errors, function(index, value) {
								$('#_'+index).text(value);
							});
						}
						else
						{
							document.getElementById('form').reset();
							$("#mensaje").text("Mensaje enviado con éxito");
						}
					}
				})
			};

			$("#btn").on("click", function(){
				send_ajax();
			});
		})
	    </script>
@stop

@section('container')
	<div class="container">
		<h1>Contact</h1>
		<hr class="black">
		<div id="mensaje" class="bg-info">{{ $mensaje }}</div>
		{{Form::open(array(
			'action' => 'HomeController@contacto',
			'method' => 'POST',
			'role' => 'form',
			'id' => 'form',
			))
		}}
		<div class="form-group">
			{{ Form::label('Nombre: ') }}
			{{ Form::input('text', 'name', Input::old('name'), array('class' => 'form-control2')) }}
			<div class="bg-danger" id="_name">{{ $errors->first('name') }}</div>
		</div>
		<div class="form-group">
			{{ Form::label('Email: ') }}
			{{ Form::input('email', 'email', Input::old('email'), array('class' => 'form-control2')) }}
			<div class="bg-danger" id="_email">{{ $errors->first('email') }}</div>
		</div>
		<div class="form-group">
			{{ Form::label('Asunto: ') }}
			{{ Form::input('text', 'subject', Input::old('subject'), array('class' => 'form-control2')) }}
			<div class="bg-danger" id="_subject">{{ $errors->first('subject') }}</div>
		</div>
		<div class="form-group">
			{{ Form::label('Mensaje: ') }}
			{{ Form::textarea('msg', Input::old('msg'), array('class' => 'form-control')) }}
			<div class="bg-danger" id="_msg">{{ $errors->first('msg') }}</div>
		</div>

		{{ Form::input('hidden', 'contacto') }}
		<div class="bg-danger" id="_recaptcha_response_field">{{ $errors->first('recaptcha_response_field') }}</div>

		{{ Form::captcha() }}

		<!--{{ Form::input('submit', null, 'Enviar', array('class' => 'btn-primary')) }}-->
		{{ Form::input('button', null, 'Enviar', array('class' => 'btn-primary', 'id' => 'btn')) }}

		{{Form::close()}}
	</div>
@stop
