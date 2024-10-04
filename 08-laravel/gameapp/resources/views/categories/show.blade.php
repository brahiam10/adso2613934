@extends('layouts.app')
@section('title', 'GameApp - View Game')
@section('class', 'my-profile')

@section('content')
        <header>
            <a href="{{ url('/categories') }}" class="btn-back">
                <img src="{{ asset('images/btn-back.svg')}}" alt="Back">
            </a>
            {{-- show user imagen (Cambiar)--}}
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
             <img  class="img-jhon" src="{{ asset('images') . '/' . $category->image }}" height="160px" alt="Photo">
            </figure>
            <h2>{{ $category->name }}</h2>
            <div class="grid">
                <span class="data data-id">
                <img src="{{ asset ('images/icon-name.svg')}}" alt="Id">
                <b>{{ $category->manufacturer}}</b>
                </span>
                <span class="data data-phone-number">
                    <img src="{{ asset('images/icon-name.svg')}}" alt="Phone Number">
                    <b>{{ $category->releasedate }}</b>
                </span>
                <span class="data data-birth-date">
                    <img src="{{ asset('images/icon-name.svg')}}" alt="Birth Date">
                    <b>{{ $category->description }}</b>
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