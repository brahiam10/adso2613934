@extends('layouts.app')
@section('title','gameapp-create_category')
@section('class', 'register')
@section('content')

  
        <header>
            <a href="{{ url('catgories') }}" class="btn-back">
                <img src="images/btn-back.svg" alt="Back">
            </a>
            <img src="images/Add.png" alt="">
            <svg class="btn-burger" viewBox="0 0 100 100" width="80">
                <path class="line top"
                    d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
                <path class="line middle" d="m 70,50 h -40" />
                <path class="line bottom"
                    d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
            </svg>
        </header>
        @include('layouts.menuburger')
        <section class="scroll">
            <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
            @csrf
                    <div class="form-group">
                        <img id="upload" class="mask" src="{{asset('images/bg-upload-photo.svg')}}" alt="Photo">
                        <img class="border" src="{{asset('images/shape-border-photo.svg')}}" alt="Border">
                        <input id="photo" type="file" name="image" accept="image/*">
                    </div>
                <div class="form-group">
                    <label>
                        <img src="images/icon-name.svg" alt="name" >
                        NAME:
                    </label>
                    <input type="text" name="name" placeholder="Jeremias Springfield">
                </div>
            
                <div class="form-group">
                    <label>
                        <img src="images/email.svg" alt="manufacturer" >
                        MANUFACTURER:
                    </label>
                    <input type="text" name="manufacturer" placeholder="gru@gmail.com">
                </div>
                    <div class="form-group">
                        <label>
                            <img src="images/icon-phone.svg" alt="releasedate" >
                            RELEASEDATE:
                        </label>
                        <input type="date" name="releasedate" placeholder="320 1231234">
                    </div>
                    <div class="form-group">
                        <label>
                            <img src="images/calendar-date.svg" alt="description">
                        DESCRIPTION:
                        </label>
                        <input type="text" name="description" placeholder="1980-10-10">
                    </div>
                <div class="form-group">
                    <button type="submit">
                        <img src="images/add.svg" alt="register">
                    </button>
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
//-------------------------------------------------
                //este sirve para escoger la imagen desde la parte local en el registro
            //-------------------------------------------------
            $('.border').click(function (e) {
                $('#photo').click()
            })

            $('#photo').change(function (e) {
                e.preventDefault()
                let reader = new FileReader()
                reader.onload = function(event) {
                    $('#upload').attr('src', event.target.result)
                };
                reader.readAsDataURL(this.files[0])
            })
            //--------------------------------------------

    </script>
@endsection