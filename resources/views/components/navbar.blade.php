<nav class="navbar navbar-expand-lg border-bottom border-body bg-2 fixed-top transition" data-bs-theme="dark"
    id="navbar">
    <div class="container-fluid d-flex justify-content-start">
        <!-- Bottone per aprire il menu laterale -->
        <button class="navbar-toggler" type="button" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation" id="btn-settings">
            <span><i class="bi bi-list" id="settings" data-bs-toggle="offcanvas"
                    data-bs-target="#navbarNav"></i></span>
        </button>

        <!-- Icona della lente (visibile solo su mobile e tablet) -->
        <button id="searchIcon" class="btn text-color-1 d-lg-none me-0">
            <i class="bi bi-search"></i>
        </button>

        <li class="d-flex align-items-center">
            <form action="{{ route('search.article') }}" class="d-none" role="search" method="GET" id="searchBar">
                <div class="input-group">
                    <input type="search" name="query" class="form-control input-search-navbar"
                        placeholder="Search..." aria-lable="search" id="searchInput">
                    <button type="submit" class="input-group-text btn btn-footer btn-input-search-bar"
                        id="basic-addon2">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </li>

        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('homepage') }}">
            <img class="logo transition" src="{{ asset('./media/logo.png') }}" alt="Logo Navbar">
        </a>

        <!-- Offcanvas (menu laterale) con larghezza ridotta -->
        <div class="offcanvas offcanvas-start custom-offcanvas" tabindex="-1" id="navbarNav"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a class="nav-link text-color-1 offcanvas-title {{ Route::currentRouteName() == 'homepage' ? 'active' : '' }}"
                    href="{{ route('homepage') }}" id="offcanvasNavbarLabel">Menù</a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Chiudi"
                    id="settings2"></button>
            </div>
            <div class="offcanvas-body d-lg-flex align-items-center">
                <ul class="navbar-nav">
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

                {{-- PARTE DESTRA NAVBAR --}}
                <ul class="navbar-nav ms-auto">
                    @php
                        $currentLang = session('locale', 'it'); // Lingua corrente (default: IT)
                        $languages = [
                            'it' => 'Italiano',
                            'en' => 'English',
                            'es' => 'Español',
                            'fr' => 'Français',
                            'de' => 'Deutsch',
                            'pt' => 'Português',
                            'ru' => 'Русский',
                            'zh' => '中文',
                            'ja' => '日本語',
                            'ar' => 'العربية',
                            'hi' => 'हिन्दी',
                            'nl' => 'Nederlands',
                            'sv' => 'Svenska',
                            'pl' => 'Polski',
                            'ko' => '한국어',
                            'tr' => 'Türkçe',
                        ];
                    @endphp
                    <li class="dropdown d-flex align-items-center">
                        <a class="nav-link dropdown-toggle position-relative" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" id="languageDropdown">
                            <img src="{{ asset('vendor/blade-flags/language-' . $currentLang . '.svg') }}"
                                width="25" height="25" />
                        </a>
                        <ul class="dropdown-menu transition mt-custom border-0" id="dropdown-language"
                            aria-labelledby="languageDropdown">
                            @foreach ($languages as $lang => $name)
                                @if ($lang !== $currentLang)
                                    <!-- Evita di ripetere la lingua attuale -->
                                    <li>
                                        <form action="{{ route('setLocale', $lang) }}" method="POST"
                                            class="d-flex align-items-center">
                                            @csrf
                                            <button type="submit"
                                                class="dropdown-item d-flex align-items-center transition">
                                                <img src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg') }}"
                                                    width="24" height="24" class="me-2" />
                                                <span
                                                    class="text-color-1 dropdown-item-language transition dropdown-item">{{ $name }}</span>
                                            </button>
                                        </form>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    <li class="d-flex align-items-center">
                        <form action="{{ route('search.article') }}" class="d-none d-lg-block mx-2" role="search"
                            method="GET">
                            <div class="input-group">
                                <input type="search" name="query" class="form-control input-search-navbar"
                                    placeholder="Search..." aria-lable="search">
                                <button type="submit" class="input-group-text btn btn-footer btn-input-search-bar"
                                    id="basic-addon2">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </li>
                    @guest
                        <li class="nav-item d-flex align-items-center ms-lg-2">
                            <a class="nav-link text-color-1 login-icon {{ Route::currentRouteName() == 'login' ? 'active' : '' }}"
                                href="{{ route('login') }}">
                                Accedi
                                <i class="bi bi-box-arrow-in-right"></i>
                            </a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center position-relative p-0" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{-- Ciao, {{ ucfirst(Auth::user()->name) }} --}}
                                <i class="bi bi-person-circle"></i>
                                @if (App\Models\Article::toBeRevisedCount() > 0)
                                    @if (Auth::user()->is_revisor)
                                        <span class="notifica translate-middle badge rounded-pill">
                                            {{ \App\Models\Article::toBeRevisedCount() }}
                                        </span>
                                    @endif
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end bg-2 mt-custom border-0 transition"
                                id="dropdown-user">
                                @if (Auth::user()->is_revisor)
                                    <li>
                                        <a class="dropdown-item {{ Route::currentRouteName() == 'revisor.index' ? 'active' : '' }} position-relative @if (App\Models\Article::toBeRevisedCount() > 0) vibrate @endif"
                                            href="{{ route('revisor.index') }}">Zona revisore
                                            @if (App\Models\Article::toBeRevisedCount() > 0)
                                                <span
                                                    class="position-absolute top-0 start-0 translate-middle badge rounded-pill notifica2">
                                                    {{ \App\Models\Article::toBeRevisedCount() }}
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
                                            Logout <i class="bi bi-box-arrow-right"></i>
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
                                    Logout <i class="bi bi-box-arrow-right"></i>
                                </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>
