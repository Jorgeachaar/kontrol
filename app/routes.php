<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'index', 'uses' =>'HomeController@showWelcome') );

/*CONTACT*/
Route::get('/contact', array('as' => 'contact', 'uses' =>'HomeController@contacto') );
Route::post('/contact', array('as' => 'contact', 'uses' =>'HomeController@contacto') );

/*PRIVADO*/
Route::get('/private', array('as' => 'private', 'uses' =>'HomeController@showPrivate'))->before('auth_user');

/*LOGUEO*/
Route::get('/login', array('as' => 'login', 'uses' =>'HomeController@login'))->before('guest_user');

Route::post('/login', array('before' => 'csrf', function(){
	$user = array(
		'email' => Input::get('email'),
		'password' => Input::get('password'),
		'active' => 1,
	);

	$remember = Input::get('remember');
	$remember == 'On' ? $remember = true : $remember = false;

	if (Auth::user()->attempt($user,  $remember))
	{
		return Redirect::route("private");
	}
	else
	{
		return Redirect::route("login");
	}
}));

Route::get('/salir', array('as' => 'salir', 'uses' =>'HomeController@Salir'))->before('auth_user');
Route::post('/salir', array('as' => 'salir', 'uses' =>'HomeController@Salir'))->before('auth_user');

/*REGISTER*/
Route::get('/register', array('as' => 'register', 'uses' =>'HomeController@Register'))->before('guest_user');
//Route::post('/register', array('as' => 'register', 'uses' =>'HomeController@Register'))->before('guest_user');
Route::post('/register', array('before' => 'csrf', function(){

    $rules = array
    (
    'user' => 'required|regex:/^[a-záéóóúàèìòùäëïöüñ\s]+$/i|min:3|max:50',
    'email' => 'required|email|unique:users|between:3,80',
    'password' => 'required|regex:/^[a-z0-9]+$/i|min:8|max:16',
    'repetir_password' => 'required|same:password',
    'terminos' => 'required',
    );

    $messages = array
    (
        'user.required' => 'El campo nombre es requerido',
        'user.regex' => 'Sólo se aceptan letras',
        'user.min' => 'El mínimo permitido son 3 caracteres',
        'user.max' => 'El máximo permitido son 50 caracteres',
        'email.required' => 'El campo email es requerido',
        'email.email' => 'El formato de email es incorrecto',
        'email.unique' => 'El email ya se encuentra registrado',
        'email.between' => 'El email debe contener entre 3 y 80 caracteres',
        'password.required' => 'El campo password es requerido',
        'password.regex' => 'El campo password sólo acepta letras y números',
        'password.min' => 'El mínimo permitido son 8 caracteres',
        'password.max' => 'El máximo permitido son 16 caracteres',
        'repetir_password.required' => 'El campo repetir password es requerido',
        'repetir_password.same' => 'Los passwords no coinciden',
        'terminos.required' => 'Tienes que aceptar los términos',
    );

    $validator = Validator::make(Input::All(), $rules, $messages);

    if ($validator->passes())
    {
        //Guardar los datos en la tabla users
        $user = input::get('user');
        $email = input::get('email');
        $password = Hash::make(input::get('password'));

        $conn = DB::connection('mysql');
        $sql = "INSERT INTO users(user, email, password) VALUES (?, ?, ?)";
        $conn->insert($sql, array($user, $email, $password));

        // Crear cookies para luego verificar el link de registro
        // String alfanumérico de 32 caracteres de longitud
        $key = Str::random(32);
        Cookie::queue('key', $key, 60*24);
        // Almacenar el email
        Cookie::queue('email', $email, 60*24);

        // Crear la url de confirmación para el mensaje del email
        $msg = "<a href='".URL::to("/confirmregister/$email/$key")."'>Confirmar cuenta</a>";

        //Enviar email para confirmar el registro
        $data = array(
            'user' => $user,
            'msg' => $msg,
          );

          $fromEmail = 'atrocidades@gmail.com';
          $fromName = 'Administrador';

          Mail::send('emails.register', $data, function($message) use ($fromName, $fromEmail, $user, $email)
          {
             $message->to($email, $user);
             $message->from($fromEmail, $fromName);
             $message->subject('Confirmar registro en Laravel');
          });

          $message = '<hr><label class="label label-info">'.$user.' le hemos enviado un email a su cuenta de correo electrónico para que confirme su registro</label><hr>';

          return Redirect::route('register')->with("message", $message);
    }
    else
    {
        return Redirect::back()->withInput()->withErrors($validator);
    }

}));

Route::get('/confirmregister/{email}/{key}', function($email, $key){

    if (urldecode($email) == Cookie::get("email") && urldecode($key) == Cookie::get("key"))
    {
        $conn = DB::connection("mysql");
        $sql = "UPDATE users SET active=1 WHERE email=?";
        $conn->update($sql, array($email));
        $message = "<hr><label class='label label-success'>Enhorabuena tu registro se ha llevado a cabo con éxito.</label><hr>";
        return Redirect::route("login")->with("message", $message);
    }
    else
    {
        return Redirect::route("register");
    }
});

/*Recoverpassword*/

Route::get('/recoverpassword', array('as' => 'recoverpassword', 'uses' =>'HomeController@Recoverpassword'))->before('guest_user');
Route::post('/recoverpassword', array('before' => 'csrf', function(){

    $rules = array(
        "email" => "required|email|exists:users",
    );

    $messages = array(
        "email.required" => "El campo email es requerido",
        "email.email" => "El formato de email es incorrecto",
        "email.exists" => "El email seleccionado no se encuentra registrado",
    );

    $validator = Validator::make(Input::All(), $rules, $messages);

    if ($validator->passes())
    {
        Password::user()->remind(Input::only("email"), function($message) {
        $message->subject('Recuperar password en Laravel');
        });

        $message = '<hr><label class="label label-info">Le hemos enviado un email a su cuenta de correo electrónico para que pueda recuperar su password</label><hr>';
        return Redirect::route('recoverpassword')->with("message", $message);
    }
    else
    {
        return Redirect::back()->withInput()->withErrors($validator);
    }

}));

Route::any('/confirmregister', array('as' => 'confirmregister', 'uses' => 'HomeController@confirmregister'));

Route::get('/resetpassword/{type}/{token}', 'HomeController@resetpassword', function(){
    return View::make("resetpassword");
});
Route::any('/resetpassword/{type}/{token}', array('as' => 'resetpassword', 'uses' => 'HomeController@resetpassword'))->before('guest_user');

Route::get('/updatepassword', 'HomeController@updatepassword', function(){});
Route::any('/updatepassword', array('as' => 'updatepassword', 'uses' => 'HomeController@updatepassword'))->before('guest_user');
Route::post('/updatepassword', array('before' => 'csrf', function(){
    $credentials = array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'password_confirmation' => Input::get('repetir_password'),
            'token' => Input::get('token'),
                );

            Password::user()->reset($credentials, function($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
            });

            $message = '<hr><label class="label label-info">Password cambiado con éxito, ya puedes iniciar sesión</label><hr>';
            return Redirect::to('login')->with('message', $message);
}));
/*ERRORS*/
App::missing(function($exception)
{
    return Response::view('Error.error404', array(), 404);
});



/*NUEVOS*/

Route::get('/product/{id}', array('as' => 'product', 'uses' =>'ProductController@product'));
//Route::get('product/{id}', 'ProductController@product');
Route::post('/product/', array('as' => 'product', 'uses' =>'ProductController@addproducttocart'));

Route::get('/shop', array('as' => 'shop', 'uses' =>'HomeController@shop'));
Route::get('/blog', array('as' => 'blog', 'uses' =>'HomeController@blog'));

Route::get('/cart', array('as' => 'cart', 'uses' =>'HomeController@cart'));
Route::post('/cart', array('as' => 'updatecart', 'uses' =>'HomeController@updatecart'));
Route::get('/checkout', array('as' => 'checkout', 'uses' =>'HomeController@checkout'));

//CARRITO
//ELIMINA PRODUCTO
Route::get('/deleteproducttocart/{id}', array('as' => 'deleteproducttocart', 'uses' =>'ProductController@deleteproducttocart'));



Route::group(array('before' => 'auth_user'), function()
{
    //PRODUCT
    Route::get('admin/product', array('as' => 'admin/products', 'uses' => 'AdminController@showProducts'));

    Route::get('admin/product/new', array('uses' => 'AdminController@newProduct'));
    Route::post('admin/product/new', array('uses' => 'AdminController@postNewProduct'));
    Route::post('admin/product/edit', array('uses' => 'AdminController@postEditProduct'));

    Route::get('admin/product/{id}', array('uses' => 'AdminController@showProduct'));


    // Route::get('/', function()
    // {
    //    // Tiene el filtro Auth
    // });

    // Route::get('user/profile', function()
    // {
    //     // Tiene el filtro Auth
    // });
});

