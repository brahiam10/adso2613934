@auth
    <nav class="nav">
        <figure class="avatar">
            <img class="mask" src="{{ asset('images') . '/' . Auth::user()->photo }}" height="160px" alt="Photo">
            <h2>{{ Auth::user()->fullname }}</h2>
            <h4>{{ Auth::user()->role }}</h4>
        </figure>
        <menu>
            <a href="{{ url('myprofile') }}">
                <img src="{{ asset('images/icon-register.svg') }}" alt="">
                My Profile
            </a>
            <a href="{{ url('dashboard') }}">
                <img src="{{ asset('images/icon-name.svg') }}" alt="">
                Dashboard
            </a>
            <a href="javascript:;" onclick="logout.submit();">
                <img src="{{ asset('images/icon-login.svg') }}" alt="">
                Log out
            </a>
            <form id="logout" action="{{ route('logout') }}" method="post">
                @csrf
            </form>
        </menu>
    </nav>
@endauth

@guest
    <nav class="nav">
        <img src="" alt="" class="title-menu">
        <menu>
            <a href="{{ url('login') }}">
                <img src="{{ asset('images/icon-login.svg') }}" alt="Login">Login
            </a>
            <a href= "{{ url('register') }}">
                <img src="{{ asset('images/icon-register.svg') }}" alt="Register">Register
            </a>
            <a href= "{{ url('catalogue') }}">
                <img src="{{ asset('images/icon-catalogue.svg') }}" alt="Catalogue">Catalogue
            </a>
        </menu>
    </nav>
@endguest
