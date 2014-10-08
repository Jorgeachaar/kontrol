@extends('layouts.bootstrap')

@section('head')
<title>Contacto</title>
<meta name='title' content='Página de contacto'>
<meta name='description' content='Página de contacto'>
<meta name='keywords' content='palabras, clave'>
<meta name='robots' content='All'>
<script>
    $(function(){
              function send_ajax()
            {
               $.ajax({
                    url: 'contacto',
                    type: 'POST',
                    data:  $("#form").serialize(),
                    success: function(datos) 
                    {
                        $("#_email, #_name, #_subject, #_msg, #_recaptcha_response_field").text('');
                        if (datos.success == false)
                        {
                        $.each(datos.errors, function(index, value)
                        {
                            $("#_"+index).text(value);
                        });
                        }
                        else
                        {
			    document.getElementById('form').reset();
                            $("#mensaje").text("Mensaje enviado con éxito");
                        }
                    }
                  });  
            }
            
            $("#btn").on("click", function()
            {
                send_ajax();
            });
    });
</script>
@stop

@section('content')
<h1>Contacto</h1>
<div id="mensaje" class="bg-info">{{$mensaje}}</div>
{{ Form::open(array
            (
            'action' => 'HomeController@contacto', 
            'method' => 'POST',
            'role' => 'form',
            'id' => 'form'
            /*'files' => true*/
            )) 
}}
<div class="form-group">
  {{ Form::label('Nombre:') }}
  {{ Form::input('text', 'name', Input::old('name'), array('class' => 'form-control') )}}
  <div class="bg-danger" id="_name">{{$errors->first('name')}}</div>
</div>
<div class="form-group">
  {{ Form::label('Email:') }}
  {{ Form::input('email', 'email', Input::old('email'), array('class' => 'form-control') )}}
  <div class="bg-danger" id="_email">{{$errors->first('email')}}</div>
</div>
<div class="form-group">
  {{ Form::label('Asunto:') }}
  {{ Form::input('text', 'subject', Input::old('subject'), array('class' => 'form-control') )}}
  <div class="bg-danger" id="_subject">{{$errors->first('subject')}}</div>
</div>
<div class="form-group">
  {{ Form::label('Mensaje:')}}
  {{ Form::textarea('msg', Input::old('msg'), array('class' => 'form-control') )}}
  <div class="bg-danger" id="_msg">{{$errors->first('msg')}}</div>
</div>

 {{ Form::captcha() }}
 <div class="bg-danger" id="_recaptcha_response_field">{{$errors->first('recaptcha_response_field')}}</div>

 {{ Form::input('hidden', 'contacto') }}
 {{ Form::input('button', null, 'Enviar', array('class' => 'btn btn-primary', 'id' => 'btn'))}}

{{ Form::close() }}
<br><br><br><br>
@stop