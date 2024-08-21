@extends('layouts.app')
@section('title', 'GameApp - Register')
@section('class', 'register')

@section('content')
       <header>
            <a href="javascript:;" class="btn-back">
                <img src="images/btn-back.svg" alt="Back">
            </a>
            <img src="images/fondo-register.png" alt="">
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
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
             @csrf
                @if (count( $errors->all()) > 0)
                @foreach ( $errors->all() as $message )
                <li> {{$message}}</li>                    
                @endforeach
                @endif
                    <div class="form-group">
                        <img id="upload" class="mask" src="images/bg-upload-photo.svg" alt="Photo">
                        <img class="border" src="images/shape-border-photo.svg" alt="Border">
                        <input id="photo" type="file" name="photo" accept="images/*">
                    </div>
                
                <div class="form-group">
                    <label>
                        <img src="images/icon-name.svg" alt="Document" >
                        DOCUMENT:
                    </label>
                    <input type="text" name="document" placeholder="2576545">
                </div>
                
                <div class="form-group">
                    <label>
                        <img src="images/icon-name.svg" alt="Fullname" >
                        FULLNAME:
                    </label>
                    <input type="text" name="fullname" placeholder="Jeremias Springfield">
                </div>
            
                <div class="form-group">
                    <label>
                        <img src="images/icon-name.svg" alt="Gender" >
                        GENDER:
                    </label>
                    <input type="text" name="gender" placeholder="Masculino">
                </div>

                <div class="form-group">
                        <label>
                            <img src="images/calendar-date.svg" alt="Birthdate">
                            BIRTH DATE:
                        </label>
                        <input type="text" name="birthdate" placeholder="1980-10-10">
                    </div>

                    <div class="form-group">
                        <label>
                            <img src="images/icon-phone.svg" alt="Phone" >
                            PHONE NUMBER:
                        </label>
                        <input type="text" name="phone" placeholder="3201231234">
                    </div>

                     <div class="form-group">
                        <label>
                            <img src="images/icon-phone.svg" alt="Email" >
                            EMAIL:
                        </label>
                        <input type="text" name="email" placeholder="jaime@gmail.com">
                    </div>
                    
                <div class="form-group">
                    <label>
                        <img src="images/mdi_password-check.svg" alt="Password">
                         PASSWORD:
                    </label>
                    <img class="icon-eye" src="images/icon-eye.svg" alt="Eye">
                    <input type="text" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>
                        <img src="images/mdi_password-check.svg" alt="Password">
                         CONFIRMATION PASSWORD:
                    </label>
                    <img class="icon-eye" src="images/icon-eye.svg" alt="Eye">
                    <input type="text" name="password_confirmation" placeholder="Password">
                </div>
                <div class="form-group">
                    <button type="submit">
                        <img src="images/registro.png" alt="register">
                    </button>
                </div>
            </form>
        </section>
    </main>
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
            });

            $('#photo').change(function (e) {
                e.preventDefault()
                let reader = new FileReader()
                reader.onload = function(evt) {
                    $('#upload').attr('src', event.target.result)
                }
                reader.readAsDataURL(this.files[0])
            })
            //--------------------------------------------

    </script>
@endsection