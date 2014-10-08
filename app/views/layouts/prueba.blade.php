
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <!-- <title>Starter Template for Bootstrap</title> -->

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">

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

<div id="nav-main" class="navbar-inverse navbar-fixed-top" role="navigation">
      <div class="row visible-xs">
        <div class="col-xs-4 text-right">
          <ul class="nav navbar-nav">
                  <li>
                       <a href="/cart" title="items"><i class="fa fa-shopping-cart"></i> <span class ="glyphicon glyphicon-shopping-cart"></span>  Cart (0)</a>
                  </li>
          </ul>
        </div>
                <div class="col-xs-4 text-center">
                    <a href="/" title="Home">
                    <img src="//cdn.shopify.com/s/files/1/0303/2465/t/16/assets/ss-projects-logo.png?1714" alt="S&amp;S-Projects" />
                    </a><!-- #logo -->
        </div>
                <div class="col-xs-4 text-left">
                  <div class="menu-toggle">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-responsive"><i class="fa fa-bars"></i> Menu</button>
                    </div>
        </div>
                <div id="navbar-responsive" class="collapse navbar-collapse col-xs-12">
                    <ul class="nav navbar-nav">
                        <li>
                        <a href="/#products" title="">Products</a>
                        </li>
                        <li>
                        <a href="/#about" title="">About</a>
                        </li>
                        <li>
                        <a href="/#stores" title="">Stores</a>
                        </li>
                        <li>
                        <a href="/#contact" title="">Contact</a>
                        </li>
                        <li>
                        <a href="/#planet-ss" title="">Planet-SS</a>
                        </li>
                    </ul>
                </div>
      </div>
      <div class="row hidden-xs">
        <div class="col-sm-2 col-md-2 col-lg-1 text-right">
                    <a href="/" title="Home">
                    <img src="//cdn.shopify.com/s/files/1/0303/2465/t/16/assets/ss-projects-logo.png?1714" alt="S&amp;S-Projects" />
                    </a><!-- #logo -->
        </div>
        <div class="col-sm-8 col-md-8 col-lg-10 text-center">
            <ul class="nav navbar-nav">
                    <li><a href="/#products" title="">Products</a></li>
                    <li><a href="/#about" title="">About</a></li>
                    <li><a href="/#stores" title="">Stores</a></li>
                    <li><a href="/#contact" title="">Contact</a></li>
                    <li><a href="/#planet-ss" title="">Planet-SS</a></li>
            </ul>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-1">
          <ul class="nav navbar-nav">
                  <li>
                       <a href="/cart" title="items"><i class="fa fa-shopping-cart"></i> <span class ="glyphicon glyphicon-shopping-cart"></span>  Cart (0)</a>
                  </li>
          </ul>
        </div>
      </div>
  </div>
      @yield('container')
        <!-- <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p> -->
      </div>

    <div class="container">

       <div class="starter-template">

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    @yield('script')
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>-->
  </body>
</html>
