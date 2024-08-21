@extends('layouts.app')
@section('title', 'GameApp - View Game')
@section('class', 'my-profile')

@section('content')
        <header>
            <a href="{{ url('/') }}" class="btn-back">
                <img src="images/btn-back.svg" alt="Back">
            </a>
            <img src="images/My Profile.svg" alt="">
            <svg class="btn-burger" viewBox="0 0 100 100" width="80">
                <path
                    class="line top"
                    d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
                <path
                    class="line middle"
                    d="m 70,50 h -40" />
                <path
                    class="line bottom"
                    d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
            </svg>
        </header>
    @include('layouts.menuburger')
        <section>
            <figure class="avatar" >
             <img  class="img-jhon" src="{{ asset('images') . '/' . Auth::user()->photo }}" height="160px" alt="Photo">
            </figure>
            <h2>{{ Auth::user()->fullname }}</h2>
            <span class="email"><b>{{ Auth::user()->email }}</b></span>
            <span class="role">
                
                <b>{{ Auth::user()->role }}</b>
            </span>
            <div class="grid">
                <span class="data data-id">
                <img src="images/icon-name.svg" alt="Id">
                <b>{{ Auth::user()->document }}</b>
                </span>
                <span class="data data-phone-number">
                    <img src="images/icon-name.svg" alt="Phone Number">
                    <b>{{ Auth::user()->phone }}</b>
                </span>
                <span class="data data-birth-date">
                    <img src="images/icon-name.svg" alt="Birthdate">
                    <b>{{ Auth::user()->birthdate }}</b>
                </span>
                <span class="data data-gender">
                    <img src="images/icon-name.svg" alt="Gender">
                    <b>{{ Auth::user()->gender }}</b>
                </span>
            </div>
        </section>
@endsection
  
@section('js')
    <script>
        $(document).ready(function () {
            
            $('header').on('click', '.btn-burger', function(){
            $(this).toggleClass('active')
            $('.nav').toggleClass('active')
            })
        //----------------------------       
        })
    </script>
@endsection