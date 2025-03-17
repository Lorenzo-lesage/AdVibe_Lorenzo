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
            <div class="offcanvas-body d-lg-flex align-items-center">
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
                        <ul class="dropdown-menu dropdown-menu-end bg-2 mt-custom border-0 transition"
                            id="dropdown-menu">
                            @foreach ($categories as $category)
                                <li>
                                    <a class="dropdown-item text-capitalize"
                                        href="{{ route('byCategory', ['category' => $category]) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                @guest
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-color-1 login-icon {{ Route::currentRouteName() == 'login' ? 'active' : '' }}"
                                href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right"></i>
                            </a>
                        </li>
                    </ul>
                @endguest
                @auth
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center position-relative" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{-- Ciao, {{ ucfirst(Auth::user()->name) }} --}}
                                <i class="bi bi-person-circle"></i>
                                @if (App\Models\Article::toBeRevisedCount() > 0)
                                    @if (Auth::user()->is_revisor)
                                        <span class="notifica translate-middle badge rounded-pill">
                                            {{ \App\Models\Article::toBeRevisedCount() > 0 }}
                                        </span>
                                    @endif
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end bg-2 mt-custom border-0 transition  mt-custom2"
                                id="dropdown-user">
                                @if (Auth::user()->is_revisor)
                                    <li>
                                        <a class="dropdown-item {{ Route::currentRouteName() == 'revisor.index' ? 'active' : '' }} position-relative @if (App\Models\Article::toBeRevisedCount() > 0) vibrate @endif"
                                            href="{{ route('revisor.index') }}">Zona revisore
                                            @if (App\Models\Article::toBeRevisedCount() > 0)
                                                <span
                                                    class="position-absolute top-0 start-0 translate-middle badge rounded-pill notifica2">
                                                    {{ \App\Models\Article::toBeRevisedCount() > 0 }}
                                                </span>
                                            @endif
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <a class="dropdown-item {{ Route::currentRouteName() == 'create.article' ? 'active' : '' }}"
                                        href="{{ route('create.article') }}">Pubblica annuncio
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Another action
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="d-none d-lg-block">
                                    <form id="form-logout" class="ps-2" action="{{ route('logout') }}" method="POST"
                                        onsubmit="return confirm('Sei sicuro di voler fare logout?');">
                                        @csrf
                                        <button class="logout-icon transition" type="submit">
                                            <i class="bi bi-box-arrow-right"></i>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li class="d-block d-lg-none">
                            <form id="form-logout" action="{{ route('logout') }}" method="POST"
                                onsubmit="return confirm('Sei sicuro di voler fare logout?');">
                                @csrf
                                <button class="logout-icon transition" type="submit">
                                    <i class="bi bi-box-arrow-right"></i>
                                </button>
                            </form>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </div>
</nav>
