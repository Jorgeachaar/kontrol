
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/KontrolBlack.png">

    <!-- <title>Starter Template for Bootstrap</title> -->

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
    <link href="css/rhombus.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('head')
  </head>

  <body>
    <?php
            $vista = Route::currentRouteName();
            $current = array(
                    'index' => '',
                    'contact' => '',
                    'login' => '',
                    'register' => '',
                );

            if ($vista == 'index' || $vista == '') {
                $current['index'] = 'active';
            }else  if ($vista == 'contact')
            {
                $current['contact'] =  'active';
            }else if ($vista == 'login')
            {
                $current['login'] = 'active';
            }else if ($vista == 'register')
            {
                $current['register'] = 'active';
            };
    ?>

    <div class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href={{URL::route('index')}}><img src="img/Kontrol.png">  Kontrol</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href={{URL::route('index')}}>MEN</a></li>
            <li class=""><a href={{URL::route('index')}}>WOMAN</a></li>
            <li class=""><a href={{URL::route('index')}}>BLOG</a></li>
            <li class=""><a href={{URL::route('index')}}>ABOUT</a></li>
            <li class="{{ $current['contact'] }}"><a href={{URL::route('contact')}}>Contact</a></li>
          </ul>
               <ul class="nav navbar-nav navbar-right">
                      <?php if(Auth::user()->guest()){ ?>
                        <li class="{{ $current['login'] }}"><a href={{URL::route('login')}}>Iniciar sesion</a></li>
                        <li class="{{ $current['register'] }}"><a href={{URL::route('register')}}>Registrarme</a></li>
                        <?php } else { ?>


                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i> {{ Auth::user()->get()->user }}  <b class="caret"></b></a>
                              <ul class="dropdown-menu">
                                  <li>
                                      <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                                  </li>
                                  <li>
                                      <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                                  </li>
                                  <li>
                                      <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                                  </li>
                                  <li class="divider"></li>
                                  <li>
                                      <a href="{{ URL::route('salir') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                  </li>
                              </ul>
                          </li>



                        <?php } ?>
                        <li><a href="#" title="items"><span class ="glyphicon glyphicon-shopping-cart"></span>Cart (0)</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    @yield('beforeContainer')
    <div class="container-fluid">

      <!-- <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div> -->
      @yield('container')

    </div><!-- /.container -->

    <div class="footer">
        <div class="container text-center">

            <div class="col-lg-4 text-center">BROWSER</div>
            <div class="col-lg-4 text-center">PROJECT</div>
            <div class="col-lg-4 text-center">LOGO</div>
        <hr class="featurette-divider">
        <p>© 2014 Kontrol Designer</p>
        </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/grayscale.js"></script>
    @yield('script')
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>-->
  </body>
</html>
