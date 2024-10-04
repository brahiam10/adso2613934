@extends('layouts.app')
@section('title', 'GameApp - Edit-categories')
@section('class', 'register')

@section('content')
    <header>
        <a href={{ url('categories') }} class="btn-back">
            <img src={{ asset('images/btn-back.svg') }} alt="Back">
        </a>
        <img class="img-add" src="{{ asset('images/Edit.svg') }}" alt="">
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('layouts.menuburger')
    <section class="scroll">
        <form action="{{ url('categories/' . $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            @if (count($errors->all()) > 0)
                @foreach ($errors->all() as $message)
                    <li> {{ $message }} </li>
                @endforeach
            @endif

            <div class="form-group">
                <img id="upload" class="mask" name="image" src={{ asset('images/' . $category->image) }} alt="Photo">
                <img class="border" src="{{ asset('images/shape-border-photo.svg') }}" alt="Border">
                <input id="photo" type="file" name="image" accept="images/*">
                <input type="hidden" name="originphoto" value="{{ $category->image }}">
                <input type="hidden" name="id" value="{{ $category->id }}">
            </div>
            <div class="form-group">
                <label>
                    <img src="{{ asset('images/icon-document.svg') }}" alt="NAMEE">
                    NAME:
                </label>
                <input type="text" name="name" placeholder="1053838444"
                    value="{{ old('name', $category->name) }}">
            </div>
            <div class="form-group">
                <label>
                    <img src="{{ asset('images/icon.email.svg') }}" alt="manufacturer">
                    MANUFACTURER
                </label>
                <input type="text" name="manufacturer" placeholder="gru@gmail.com" value={{ old('manufacturer', $category->manufacturer) }}>
            </div>
            <div class="form-group">
                <label>
                    <img src="{{ asset('images/icon-phone.svg') }}" alt="releasedate">
                    RELEASEDATE:
                </label>
                <input type="date" name="releasedate" placeholder="3452345" value={{ old('releasedate', $category->releasedate) }}>
            </div>
            <div class="form-group">
                <label>
                    <img src="{{ asset('images/calendar-date.svg') }}" alt="description">
                    DESCRIPTION:
                </label>
                <input type="text" name="description" value={{ old('description', $category->description) }}>
            </div>
            <button type="submit" value="Edit">
                <img src="{{ asset('images/Edit.svg') }}" alt="Register">
            </button>
        </form>
    </section>
@endsection

@section('js')
    <script>
        //-------------------------------------------------
        $('header').on('click', '.btn-burger', function() {
            $(this).toggleClass('active')
            $('.nav').toggleClass('active')
        });
        //-------------------------------------------------
        //-------------------------------------------------
        //este sirve para escoger la imagen desde la parte local en el registro
        //-------------------------------------------------
        $('.border').click(function(e) {
            $('#photo').click()
        });

        $('#photo').change(function(e) {
            e.preventDefault()
            let reader = new FileReader()
            reader.onload = function(evt) {
                $('#upload').attr('src', event.target.result)
            }
            reader.readAsDataURL(this.files[0])
        })
        //--------------------------------------------
        @if ($errors->any())
            @php $error = '' @endphp
            @foreach ($errors->all() as $message)
                @php $error .= '<li>' . $message . '</li>' @endphp
            @endforeach

            <
            script >
                $(document).ready(function() {
                    Swal.fire({
                        position: 'top',
                        title: 'Ops !',
                        html: '<ul>{!! $error !!}</ul>',
                        icon: 'error',
                        toast: true,
                        showConfirmButton: false,
                        timer: 5000
                    })
                })
    </script>


    @endif
    </script>
@endsection
