@extends('layouts.app')
@section('title', 'GameApp - dashboard')
@section('class', 'dashboard')

@section('content')
    <header>
        <a class="btn-back" href="{{ url('/') }}">
            <img src="images/btn-back.png" alt="Back" class="arrow-back">
        </a>
        <img src="images/Dashboard.svg" alt="" style="margin-top: 20px;">

        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('layouts.menuburger')
    <section class="scroll">
        <img src="images/dashboard-title.png" alt="">
        <article class="module">
            <aside>
                <img class="icon" src="images/ico-users.svg" alt="">
                <span class="rows">20 users.</span>
            </aside>
            <img class="title" src="images/module-users.svg" alt="">
            <a href={{url('users')}}>
                <img src="images/view-users.svg" alt="View">
            </a>
        </article>
        <article class="module">
            <aside>
                <img class="icon" src="images/figuras.svg" alt="">
                <span class="rows">250 categ.</span>
            </aside>
            <img class="title" src="images/module-categories.svg" alt="">
            <a href='{{url('categories')}}'>
                <img src="images/view-users.svg" alt="View">
            </a>
        </article>
        <article class="module">
            <aside>
                <img class="icon" src="images/games.svg" alt="">
                <span class="rows">1000 games.</span>
            </aside>
            <img class="title" src="images/module-games.svg" alt="">
            <a href='users/games.html'>
                <img src="images/view-users.svg" alt="View">
            </a>
        </article>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                center: false,
                loop: true,
                dots: false,
                responsive: {
                    0: {
                        items: 2
                    }
                }
            })
            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            })
        })
    </script>
@endsection
