{{-- <nav class="navbar navbar-expand-lg border-bottom border-body bg-2 fixed-top transition" data-bs-theme="dark"
    id="navbar">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('homepage') }}">
            <img class="logo transition" src="{{ asset('./media/logo.png') }}" alt="Logo Navbar">
        </a>

        <!-- Bottone per aprire il menu laterale -->
        <button class="navbar-toggler border-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="bi bi-gear-fill" id="settings"></i></span>
        </button>

        <!-- Offcanvas (menu laterale) con larghezza ridotta -->
        <div class="offcanvas offcanvas-end custom-offcanvas" tabindex="-1" id="navbarNav"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-color-1" id="offcanvasNavbarLabel">Menù</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Chiudi" id="settings2">
                </button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-color-1 {{ Route::currentRouteName() == 'homepage' ? 'active' : '' }}"
                            aria-current="page" href="{{ route('homepage') }}">Home</a>
                    </li>
                </ul>
                @guest
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-color-1 {{ Route::currentRouteName() == 'login' ? 'active' : '' }}"
                                href="{{ route('login') }}">Accedi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-color-1 {{ Route::currentRouteName() == 'register' ? 'active' : '' }}"
                                href="{{ route('register') }}">Registrati</a>
                        </li>
                    </ul>
                @endguest
                @auth
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Ciao, {{ ucfirst(Auth::user()->name) }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end bg-2 mt-custom border-0 transition" id="dropdown-user">
                                <li>
                                    <a class="dropdown-item {{ Route::currentRouteName() == 'create.article' ? 'active' : '' }}" href="{{ route('create.article') }}">
                                        Pubblica annuncio
                                        </a>
                                    </li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="d-flex justify-content-center">
                                    <div class="btn btn-danger btn-sm p-0 w-100 mx-2 mt-2">
                                        <a class="dropdown-item text-color-2 logout-link transition" href="#"
                                            onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">
                                            Logout
                                        </a>
                                    </div>
                                </li>
                                <form action="{{ route('logout') }}" method="post" class="d-none" id="form-logout">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav> --}}

<nav class="navbar navbar-expand-lg border-bottom border-body bg-2 fixed-top transition" data-bs-theme="dark"
    id="navbar">
    <div class="container-fluid d-flex justify-content-start">
        <!-- Bottone per aprire il menu laterale -->
        <button class="navbar-toggler" type="button" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span><i class="bi bi-gear-fill" id="settings" data-bs-toggle="offcanvas"
                    data-bs-target="#navbarNav"></i></span>
        </button>

        <!-- Icona della lente (visibile solo su mobile e tablet) -->
        <button id="searchIcon" class="btn text-color-1 d-lg-none me-0">
            <i class="bi bi-search"></i>
        </button>

        <!-- Barra di ricerca -->
        <div id="searchBar" class="d-none">
            <input type="text" id="searchInput" placeholder="Cerca..." class="form-control w-auto me-auto">
        </div>

        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('homepage') }}">
            <img class="logo transition" src="{{ asset('./media/logo.png') }}" alt="Logo Navbar">
        </a>

        <!-- Offcanvas (menu laterale) con larghezza ridotta -->
        <div class="offcanvas offcanvas-start custom-offcanvas" tabindex="-1" id="navbarNav"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-color-1" id="offcanvasNavbarLabel">Menù</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Chiudi"
                    id="settings2"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-color-1 {{ Route::currentRouteName() == 'homepage' ? 'active' : '' }}"
                            href="{{ route('homepage') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-color-1 {{ Route::currentRouteName() == 'index.article' ? 'active' : '' }}"
                            href="{{ route('index.article') }}">Catalogo</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Categorie
                        </a>
                        <ul class="dropdown-menu dropdoen-menu-endr">
                            @foreach ($categories as $category)
                                <li>
                                    <a class="dropdown-item text-capitalize" href="{{ route('byCategory',['category' => $category])}}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                @guest
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-color-1 {{ Route::currentRouteName() == 'login' ? 'active' : '' }}"
                                href="{{ route('login') }}">Accedi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-color-1 {{ Route::currentRouteName() == 'register' ? 'active' : '' }}"
                                href="{{ route('register') }}">Registrati</a>
                        </li>
                    </ul>
                @endguest
                @auth
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Ciao, {{ ucfirst(Auth::user()->name) }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end bg-2 mt-custom border-0 transition"
                                id="dropdown-user">
                                <li><a class="dropdown-item {{ Route::currentRouteName() == 'create.article' ? 'active' : '' }}"
                                        href="{{ route('create.article') }}">Pubblica annuncio</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="d-flex justify-content-center">
                                    <div class="btn btn-danger btn-sm p-0 w-100 mx-2 mt-2">
                                        <a class="dropdown-item text-color-2 logout-link transition" href="#"
                                            onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                                    </div>
                                </li>
                                <form action="{{ route('logout') }}" method="post" class="d-none" id="form-logout">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>
