@extends('layouts.app')
@section('title', 'GameApp - User Model')
@section('class', 'users')

@section('content')
    <header>
        <a href={{url('dashboard')}} class="btn-back">
            <img src={{asset("images/btn-back.svg")}} alt="Back">
        </a>
        <img src="images/titulo-Users.svg" alt="">
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('layouts.menuburger')

    <section class="scroll">
        <a href="">
            <img src="images/add.svg" alt="">
        </a>
        <form action="dashboard.html" method="get">
            @foreach ($users as $user)
                <div class="form-group">
                    <label>
                        <img class="users-picture" src={{ asset('images/' . $user->photo) }} alt="user-photo">
                        <p class="gere-add">
                            {{ $user->fullname }}
                            <strong>{{ $user->role }}</strong>
                        </p>
                        <div class="actions">
                            <a href="{{ route('users.show', $user->id) }}" class="edit">
                                <img src="images/busc.svg" alt="">
                            </a>
                            <a href="{{ url('users/' . $user->id . '/edit') }}" class="edit">
                                <img src="images/lapiz.svg" alt="">
                            </a>

                            <a href="" class="delete">
                                <img src="images/elimina.svg" alt="">
                            </a>
                        </div>
                    </label>
                </div>
        </form>
        @endforeach
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('header').on('click', '.btn-burger', '.btn-back', function() {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            })
        });
    </script>
@endsection
