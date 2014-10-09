@extends('layouts.base')

@section('head')
    <title>Kontrol</title>

    <link href="css/grayscale.css" rel="stylesheet">

@stop

@section('beforeContainer')
	 <!-- Carousel
    ================================================== -->
    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
            <li data-target="#myCarousel" data-slide-to="6"></li>
            <li data-target="#myCarousel" data-slide-to="7"></li>
            <li data-target="#myCarousel" data-slide-to="8"></li>
            <li data-target="#myCarousel" data-slide-to="9"></li>
            <li data-target="#myCarousel" data-slide-to="10"></li>
            <li data-target="#myCarousel" data-slide-to="11"></li>
            <li data-target="#myCarousel" data-slide-to="12"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/1.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Caption 1</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/2.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Caption 2</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/3.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/4.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/5.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/6.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/7.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/8.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/9.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/10.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/11.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/12.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/13.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>
@stop

@section('container')
<div class="container">
    <ul class="centerlist">
        <li><a href=""><div id="box"><div class="boxcontenedor" style="background-image:url(../img/list/2.jpg)"><h3>Nueva temporada</h3></div></div></a></li></br>
        <li><a href=""><div id="box"><div class="boxcontenedor" style="background-image:url(../img/list/3.jpg)"><h3>Comentario 1</h3></div></div></a></li>
        <li><a href=""><div id="box"><div class="boxcontenedor" style="background-image:url(../img/list/4.jpg)"><h3>Comentario 1</h3></div></div></a></li>
        <li><a href=""><div id="box"><div class="boxcontenedor" style="background-image:url(../img/list/5.jpg)"><h3>COMENTARIO Q!</h3></div></div></a></li>
        <li><a href=""><div id="box"><div class="boxcontenedor" style="background-image:url(../img/list/6.jpg)"><h3>KKK</h3></div></div></a></li>
        <li><a href=""><div id="box"><div class="boxcontenedor" style="background-image:url(../img/list/7.jpg)"><h3>PUBLICIDAD</h3></div></div></a></li>
        <li><a href=""><div id="box"><div class="boxcontenedor" style="background-image:url(../img/list/8.jpg)"><h3>METAL PARA TODOS</h3></div></div></a></li>
        <li><a href=""><div id="box"><div class="boxcontenedor" style="background-image:url(../img/list/9.jpg)"><h3>WACHIN!</h3></div></div></a></li>
    </ul>
</div>

<div class="container-fluid container-about">
    <div class="container">
        <div class="col-lg-4"><h3>The Story  KTRL</h3></div>
        <div class="col-lg-8">
            <p>
                Locals Apparel is that lazy hot afternoon when you suddenly feel a cool breeze. Smoky air at some BBQ party. Vague bruises from a awesome ride. Dedicated delicate design. Rather indy than indie. Tanned legs. Daydreams of swaying palms. Working hard and playing harder. A perfect grind. Sun-warmed concrete. Kidney shaped pools. Rebels without causes. Solo but soulful. Venice's winding boardwalks.
            </p>
            <p>
                Home is where the art is. A dream of doing something for the likeminded.
            </p>
            <strong>"Working hard and playing harder"</strong>
            <p>
                Locals is not only a brand but a lifestyle. It's a little piece of California, from the Swedish west coast, Gothenburg.
            </p>
            <strong>Johan Magnusson</strong>
            <strong>CEO/Founder</strong>
    </div>
</div>
</div>

@stop

@section('script')

@stop

