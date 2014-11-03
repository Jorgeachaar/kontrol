
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href={{ URL::asset('img/KontrolB.png') }}>

    <link href='http://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Khand' rel='stylesheet' type='text/css'>

    <!-- <title>Starter Template for Bootstrap</title> -->

    <!-- Bootstrap core CSS -->
    {{ HTML::style('bootstrap/css/bootstrap.min.css') }}

    <!-- Custom styles for this template -->
    {{ HTML::style('css/starter-template.css') }}
    {{ HTML::style('css/rhombus.css') }}
    {{ HTML::style('css/font-awesome.min.css') }}

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

<?php
    $cart = new Carrito();
?>

  <body id="home">
    <?php
            $vista = Route::currentRouteName();
            $current = array(
                    'index' => '',
                    'contact' => '',
                    'login' => '',
                    'register' => '',
                    'shop' => '',
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
            }else if ($vista == 'shop')
            {
                $current['shop'] = 'active';
            };
    ?>


    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href={{URL::route('index')}}><img src={{ URL::asset('img/Kontrol.png')}} >   KTRL</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="{{ $current['shop']}}"><a href={{URL::route('shop')}}>SHOP</a></li>
            <li class=""><a href="/#story">STORY</a></li>
            <li class=""><a href={{URL::route('blog')}}>BLOG</a></li>
            <li class="{{ $current['contact']}}"><a href={{URL::route('contact')}}>Contact</a></li>
          </ul>
               <ul class="nav navbar-nav navbar-right">
                      <li><a class="social" href="#"><span class="fa fa-twitter"></span></a></li>
                      <li><a class="social" href="#"><span class="fa fa-facebook"></span></a></li>
                      <?php if(Auth::user()->guest()){ ?>
                        <li class="{{ $current['login'] }}"><a href={{URL::route('login')}}><span class="glyphicon glyphicon-user"></span></a></li>
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
                                      <a href="{{ URL::to('admin/product') }}"><i class="fa fa-fw fa-gear"></i> Settings</a>
                                  </li>
                                  <li class="divider"></li>
                                  <li>
                                      <a href="{{ URL::route('salir') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                  </li>
                              </ul>
                          </li>

                        <?php } ?>
                        <li><a href="{{ URL::route('cart') }}" class="btn-dangerNO" title="items"><span class ="glyphicon glyphicon-shopping-cart"></span>
                        <span class="badge badge-cart">{{ $cart->articulos_total() }} - ${{ $cart->precio_total() }}</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    @yield('beforeContainer')
    <div class="container-fluid container-page">

      <!-- <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div> -->
      @yield('container')

    </div><!-- /.container -->

<div class="footer">
    <div class="container text-center">
        <div class="row text-center">
            <a href="#home"><img class="glyph" width="40" src={{ URL::asset('img/Kontrol.png') }}></a>
        </div>
        <div class="row">
            <div class="col-lg-4 text-center"><!-- PROJECT --></div>

            <div class="col-lg-4 text-center">
                <h1>
                    <a href=""><span class="fa fa-twitter"></span></a>
                    <a href=""><span class="fa fa-facebook"></span></a>
                </h1>
            </div>
            <div class="col-lg-4 text-center"><!-- BROWSER --></div>
        </div>
            <hr class="featurette-divider">
            <p>© 2014 Kontrol Designer</p>

    </div>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    {{ HTML::script('bootstrap/js/bootstrap.min.js') }}
    {{ HTML::script('js/jquery.easing.min.js') }}

    <!-- EFECTO DE SCROLL -->
    <script type="text/javascript">
    $(document).ready(function(){

      $('a[href*=#]').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
        && location.hostname == this.hostname && this.hash != "#myCarousel") {
          var $target = $(this.hash);
          $target = $target.length && $target
          || $('[name=' + this.hash.slice(1) +']');
          if ($target.length) {
            var targetOffset = $target.offset().top;
            $('html,body')
            .stop().animate({scrollTop: targetOffset}, 1000, 'easeOutQuart');
           return false;
          }
        }
      });
    });
    </script>
    @yield('script')
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>-->
  </body>
</html>
