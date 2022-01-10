<nav class="navbar navbar-expand-lg custom_nav-container">
    <a class="navbar-brand " href="{{route('home')}}"> Ice Cream Finder </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            @auth
            <li class="nav-item active">
                <a class="nav-link" href="{{route('dashboard')}}">Twój Profil</a>
            </li>
            @endauth
            <li class="nav-item active">
                <a class="nav-link" href="{{route('shops.index')}}">Lodziarnie</a>
            </li>

            @auth()
                @if(auth()->user()->role == "seller")
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('seller.add')}}">Dodaj Lodziarnie</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('shops.my')}}">Moje lodziarnie</a>
                    </li>
                @endif

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            Wyloguj się
                        </a>
                    </form>
                </li>
            @endauth

            @guest()
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Zaloguj się</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Zarejestruj się</a>
                </li>
            @endguest

        </ul>
    </div>
</nav>
