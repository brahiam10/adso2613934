@extends('layouts.app')
@section('title', 'GameApp - Login')
@section('class', 'login')

@section('content')
        <header>
            <a href="javascript:;" class="btn-back">
                <img src="images/btn-back.svg" alt="Back">
            </a>
            <img src="images/Login.svg" alt="">
            <svg class="btn-burger" viewBox="0 0 100 100" width="80">
                <path class="line top"
                    d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
                <path class="line middle" d="m 70,50 h -40" />
                <path class="line bottom"
                    d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
            </svg>
        </header>
    @include('layouts.menuburger')
        <section>
            <form action="{{ route('login') }}" method="post">
            @csrf
                @if (count( $errors->all()) > 0)
                @foreach ( $errors->all() as $message )
                <li> {{$message}}</li>                    
                @endforeach
                @endif
               <div class="form-group">
                    <label>
                        <img src="images/email.svg" alt="Email" >
                        EMAIL:
                    </label>
                    <input type="email" name="email" placeholder="gru@gmail.com">
                </div>
                <div class="form-group">
                    <label>
                        <img src="images/mdi_password-check.svg" alt="Password">
                         PASSWORD:
                    </label>
                    <img class="icon-eye" src="images/icon-eye.svg" alt="Eye">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <button type="submit">
                        <img src="images/btn.login.svg" alt="Login">
                    </button>
                    <a href="">Forgot your password?</a>
                </div>
            </form>
        </section>
   @endsection

   @section('js')
    <script>

            //-------------------------------------------------
            $('header').on('click','.btn-burger', function(){
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            });
            //-------------------------------------------------
                //este sirve para el ojito de la contraseña
            //-------------------------------------------------
            $togglePass = false
            $('section').on('click','.icon-eye', function(){

                !$togglePass ? $(this).next().attr('type', 'text')
                             : $(this).next().attr('type', 'password')

                !$togglePass ? $(this).next().attr('src', 'images/ico-eye-close.svg')
                             : $(this).next().attr('src', 'images/ico-eye.svg')
                
                             $togglePass = !$togglePass     
            });
            //--------------------------------------------
    </script>
@endsection