@extends('layouts.app')
@section('title', 'GameApp - Dashboard')
@section('class', 'users')

@section('content')
    <header>
        <a href={{ url('dashboard') }} class="btn-back">
            <img src={{ asset('images/btn-back.svg') }} alt="Back">
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
    
        <a href={{ url('users/create') }} class="btn-add">
              <img src="images/add.svg" alt="">
        </a>

        <div class="options-info-resources">

        <a href={{ url('export/users/pdf') }} class="pdf">
            <img src={{ asset('images/ico-pdf.svg') }} alt="" class="btn-short-img">
        </a>

        <input name="qsearch" id="form-filter-input" type="text" placeholder="Filter" class="qsearch">

        <a href={{ url('export/users/excel') }} class="excel">
            <img src={{ asset('images/ico-excel.svg') }} alt="" class="btn-short-img">
        </a>


    </div>
    
    <div class="loader"></div>
    <div id="list">
    <section class="scroll">
            @foreach ($users as $user)
                <div class="form-group">
                    <label>
                        <img class="users-picture" src="{{ asset('images/' . $user->photo) }}" alt="user-photo">
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
                            <a href="javascript:;" class="btn-delete" data-fullname="{{ $user->fullname }}">
                                <img src="images/elimina.svg" alt="">
                            </a>
                            <form action="{{ url('users/'. $user->id) }}" method="post" style="display:none">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </label>
                </div>
        @endforeach
    </section>
    </div>
@endsection
@section('js')
    <script>
       $(document).ready(function() {
            $('.loader').hide()
            //-------------------------------------------------
            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            });
            //---------------------------------------
            @if (session('message'))
                Swal.fire({
                    position: "top",
                    title: '{{ session('message') }}',
                    icon: "success",
                    toast: true,
                    timer: 5000
                })
            @endif

            //-------------------------------------------------
            
            //--------------------------------------------
            $('.btn-delete').on('click', function() {
                var $this = $(this);
                var $fullname = $this.attr('data-fullname');
                Swal.fire({
                    title: "Estas seguro?",
                    text: "Deseas eliminar a: " + $fullname,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminar",
                    cancelButtonText:"Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $this.next('form').submit()
                    }
                });
            })

            //-------------------------------------------------
            $('body').on('keyup', '#form-filter-input', function (e){
                e.preventDefault()
                $query = $(this).val()
                $token = $('input[name=_token]').val()
                $model = 'users'

                $('.loader').show()
                $('#list').hide()

                setTimeout(() => {
                    $.post($model + '/search',
                    { q: $query,  _token: $token },
                    function (data){
                        $('#list').html(data)
                        $('.loader').hide()
                        $('#list').fadeIn('slow')
                    }
                )
                }, 1000);
                
            //--------------------------------------------
        })
                });
    </script>
@endsection
