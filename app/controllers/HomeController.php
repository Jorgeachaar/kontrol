
<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
                $products = Product::all();
	   return View::make('index')->with('products', $products);
	}

	public function contacto()
        {
            $mensaje = null;
            if (isset($_POST['contacto']))
            {

                $rules = array
                    (
                    'name' => 'required|regex:/^[a-záéóóúàèìòùäëïöüñ\s]+$/i|min:3|max:80',
                    'email' => 'required|email|between:3,80',
                    'subject' => 'required|regex:/^[a-z0-9áéóóúàèìòùäëïöüñ\s]+$/i|min:3|max:80',
                    'msg' => 'required|between:3,500',
                    'recaptcha_response_field' => 'required|recaptcha',
                    );

                $messages = array
                    (
                    'name.required' => 'El campo es requerido',
                    'name.regex' => 'Sólo se aceptan letras',
                    'name.min' => 'Mínimo 3 caracteres',
                    'name.max' => 'Máximo 80 caracteres',
                    'email.required' => 'El campo es requerido',
                    'email.email' => 'El formato de email es incorrecto',
                    'email.between' => 'Entre 3 y 80 caracteres',
                    'subject.required' => 'El campo es requerido',
                    'subject.regex' => 'Sólo se aceptan letras y números',
                    'subject.min' => 'Mínimo 3 caracteres',
                    'subject.max' => 'Máximo 80 caracteres',
                    'msg.required' => 'El campo es requerido',
                    'msg.between' => 'Entre 3 y 500 caracteres',
                    'recaptcha_response_field.required' => 'El campo captcha es requerido',
                    'recaptcha_response_field.recaptcha' => 'Captcha incorrecto',
                    );

                $validator = Validator::make(Input::All(), $rules, $messages);

                if ($validator->passes())
                {
	                $data = array(
	                    'name' => Input::get('name'),
	                    'email' => Input::get('email'),
	                    'subject' => Input::get('subject'),
	                    'msg' => Input::get('msg')
	                );

	                $fromEmail = 'atrocidades@gmail.com';
	                $fromName = 'Administrador';

	                try {
			            Mail::send('emails.contacto', $data, function($message) use ($fromName, $fromEmail)
			            {
			                $message->to($fromEmail, $fromName);
			                $message->from($fromEmail, $fromName);
			                $message->subject('Nuevo email de contacto');
			            });
	             		$mensaje = 'Mensaje enviado con éxito';
             		} catch (Exception $e) {
					    $mensaje = 'Excepción capturada: '.  $e->getMessage(). "\n";
					}
            	}
             	else
            	{
            		if (Request::ajax())
			{
				return Response::json([
					'success' => false,
					'errors' => $validator->getMessageBag()->toArray()
					]);
			}
			else
			{
				return Redirect::back()->withInput()->withErrors($validator);
			}
           	}
            }

            return View::make('contact', array('mensaje' => $mensaje));
    }

	public function login()
	{
		return View::make('login');
	}

	public function showPrivate()
	{
		return View::make('privado');
	}

	public function Salir()
	{
		Auth::user()->logout();
		return Redirect::to('login');
	}

	public function Register()
	{
		return View::make('register');
	}

	public function Confirmregister()
        {

        }

    public function Recoverpassword()
    {
    	return View::make('HomeController.recoverpassword');
    }

    public function resetpassword($type, $token)
    {
    	return View::make('HomeController.resetpassword')->with('token', $token);
    }

    public function updatepassword()
    {
    }

    public function shop()
    {
        $products = Product::all();
        return View::make('shop')
        ->with("products", $products)
        ;
    }

    public function blog()
    {
    	return View::make('blog');
    }

    public function cart()
    {
    	return View::make('cart');
    }

    public function updatecart()
    {
        $id_unique = Input::get('unique_id');
        $count    = Input::get('count');

        $cart = new Carrito();
        $cart->ModifyCountItem($id_unique, $count);
        // return "Id: " . $id_unique . " Cantidad: " . $count;
        return View::make('cart');
    }

    public function checkout()
    {
        return "checkaout";
        return View::make('cart');
    }



}
