@extends('layouts.app')
@section('title', 'GameApp - Catalogue')
@section('class', 'catalogue')

@section('content')
<header>
    <a href={{url('/')}} class="btn-back">
        <img src="images/btn-back.svg" alt="Back">
    </a>
    <img src="images/logo-welcom.svg" alt="Logo" class="logo-top">
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom" d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>
<nav class="nav">
    <img src="" alt="" class="title-menu">
    <menu>
        <a href="login.html">
            <img src="images/icon-login.svg" alt="">login
        </a>
        <a href="register.html">
            <img src="images/icon-register.svg" alt="">Register
        </a>
        <a href="catalogue.html">
            <img src="images/icon-catalogue.svg" alt="">Catalogue
        </a>
    </menu>
</nav>
<section class="scroll">
    <form action="" method="post">
        <input type="text">
    </form>
    <article>
        <h2>
            <img src="" alt="">
            Category
        </h2>
        <div class="owl-carousel owl-theme">
            <figure>
                <img src="images/slide-01.png" alt="" class="slide">
                title Game
                <a href="view-game.html" class="btn-more">
                    <img src="images/ico-more.svg" alt="">Ingresar
                </a>
            </figure>
            <figure>
                <img src="images/slide-02.png" alt="" class="slide">
                title Game
                <a href="view-game.html" class="btn-more">
                    <img src="images/ico-more.svg" alt="">Ingresar
                </a>
            </figure>
            <figure>
                <img src="images/slide-03.png" alt="" class="slide">
                title Game
                <a href="view-game.html" class="btn-more">
                    <img src="images/ico-more.svg" alt="">Ingresar
                </a>
            </figure>
            <figure>
                <img src="images/slide-04.png" alt="" class="slide">
                title Game
                <a href="view-game.html" class="btn-more">
                    <img src="images/ico-more.svg" alt="">Ingresar
                </a>
            </figure>
        </div>
    </article>
    <article>
        <h2>
            <img src="" alt="">
            Category 02
        </h2>
        <div class="owl-carousel owl-theme">
            <figure>
                <img src="images/slide-01.png" alt="" class="slide">
                title Game
                <a href="view-game.html" class="btn-more">
                    <img src="images/ico-more.svg" alt="">Ingresar
                </a>
            </figure>
            <figure>
                <img src="images/slide-02.png" alt="" class="slide">
                title Game
                <a href="view-game.html" class="btn-more">
                    <img src="images/ico-more.svg" alt="">Ingresar
                </a>
            </figure>
            <figure>
                <img src="images/slide-03.png" alt="" class="slide">
                title Game
                <a href="view-game.html" class="btn-more">
                    <img src="images/icon-more.svg" alt="">Ingresar

                </a>
            </figure>
            <figure>
                <img src="images/slide-04.png" alt="" class="slide">
                title Game
                <a href="view-game.html" class="btn-more">
                    <img src="images/ico-more.svg" alt="">Ingresar
                </a>
            </figure>
        </div>
    </article>
    <article>
        <h2>
            <img src="" alt="">
            Category 03
        </h2>
        <div class="owl-carousel owl-theme">
            <figure>
                <img src="images/slide-01.png" alt="" class="slide">
                title Game
                <a href="view-game.html" class="btn-more">
                    <img src="images/ico-more.svg" alt="">Ingresar
                </a>
            </figure>
            <figure>
                <img src="images/slide-02.png" alt="" class="slide">
                title Game
                <a href="view-game.html" class="btn-more">
                    <img src="images/ico-more.svg" alt="">Ingresar
                </a>
            </figure>
            <figure>
                <img src="images/slide-03.png" alt="" class="slide">
                title Game
                <a href="view-game.html" class="btn-more">
                    <img src="images/icon-more.svg" alt="">Ingresar

                </a>
            </figure>
            <figure>
                <img src="images/slide-04.png" alt="" class="slide">
                title Game
                <a href="view-game.html" class="btn-more">
                    <img src="images/ico-more.svg" alt="">Ingresar
                </a>
            </figure>
        </div>
    </article>
</section>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 18,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 2
                }
            }
        })
        $('header').on('click', '.btn-burger', '.btn-back', function() {
            $(this).toggleClass('active')
            $('.nav').toggleClass('active')
        })
    })
</script>
@endsection