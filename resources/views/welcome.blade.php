<x-layout>
    @push('title')
        AdVibe-Home
    @endpush

    <div class="container-fluid vh-lg-100">
        <div class="row mt-5 py-5">
            @if (session()->has('errorMessage'))
                <div class="row justify-content-center">
                    <div class="col-5 alert alert-danger text-center shadow center">
                        {{ session('message') }}
                        <button type="button" class="btn-close position-absolute mt-3 me-3 top-0 end-0"
                            data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <x-success />
            <div class="col-12 d-flex justify-content-center">
                <img src="./media/header.png" alt="Logo AdVibe header" class="img-header mt-5">
            </div>
            @auth
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 d-flex flex-column justify-content-center mt-5 align-items-center">
                            <h3 class="fw-semibold fs-1 text-center w-md-50">Benvenuto <span
                                    class="text-color-5">{{ ucfirst(auth()->user()->name) }}</span>,
                                clicca qua sotto per iniziare a vendere!</h3>
                        </div>
                        <div class="col-10 col-md-6 col-lg-4 d-flex justify-content-center">
                            <a href="{{ route('create.article') }}"
                                class="btn btn-lg btn-custom2  mt-5 py-3 text-center fw-semibold fs-4">Pubblica
                                un annuncio</a>
                        </div>
                    </div>
                </div>
            @endauth
            @guest
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-12 d-flex flex-column justify-content-center mt-5 align-items-center">
                            <h3 class="fw-semibold fs-1 text-center w-md-50">Benvenuto accedi per pubblicare i tuoi annunci!
                            </h3>
                            {{-- <h4>Inizia subito a pubblicare i tuoi annunci!</h4> --}}
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                            <a href="{{ route('login') }}"
                                class="btn btn-lg btn-custom2 transition mt-5 py-3 text-center fw-semibold fs-4 w-50">Accedi</a>
                        </div>
                    </div>
                </div>
            @endguest
        </div>
    </div>

    {{-- CAROSELLO --}}
    <div class="container-fluid d-none d-lg-block">
        <div class="row height-custom">
            <div class="col-12">
                <div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="carousel"
                    data-bs-pause="false" data-bd-interval="4000" data-aos="fade-down">
                    <div class="carousel-inner carousel carousel-home rounded shadow">
                        <div class="carousel-item active carousel1 position-relative">
                            <div class="carousel-caption carousel-text">
                                <h2 class="fw-bold fs-1 text-title text-gradient-title">Trova il meglio per te!</h2>
                                <p class="fs-4 text-gradient-title">Scopri offerte esclusive e articoli selezionati per
                                    ogni tua esigenza!
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item carousel2 position-relative">
                            <div class="carousel-caption carousel-text">
                                <h2 class="fw-bold fs-1 text-title">Compra e vendi in sicurezza!</h2>
                                <p class="fs-4">Una piattaforma affidabile per mettere in vendita e acquistare
                                    prodotti di qualità!
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item carousel3 position-relative">
                            <div class="carousel-caption carousel-text">
                                <h2 class="fw-bold fs-1 text-title">Unisciti alla nostra community!</h2>
                                <p class="fs-4">Connettiti con migliaia di utenti e trova ciò che cerchi in pochi
                                    click!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ULTIMI ANNUNCI --}}
    <div class="container mt-5 mt-md-0">
        <h2 class="display-5 pt-5 mt-5 mb-0 text-title fw-semibold border-custom2" data-aos="fade-right">
            Ultimi annunci pubblicati
        </h2>
        <div
            class="row heigh-custom justify-content-center align-items-center bg-section-home text-color-2 mx-1 pt-md-5 pt-2">
            @forelse ($articles as $article)
                <div class="col-12 col-lg-3 col-md-5 justify-content-center d-flex my-md-5 mt-2" data-aos="zoom-in">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="fw-semibold text-center w-md-50">
                        Non sono ancora stati pubblicati annunci
                    </h3>
                </div>
            @endforelse
            <h2 class="display-5 pt-md-5 mb-0 mt-5 pt-5 text-title text-gradient-title text-end fw-semibold border-custom"
                data-aos="fade-left">
                Categorie
            </h2>
        </div>
    </div>

    {{-- CATEGORIE --}}
    <div class="container">
        <div class="row mx-1 overflow-hidden pt-5 bg-section-home">
            <div class="col-12">
                <div class="row row-swiper position-relative mb-5 shadow-sm rounded">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="swiper-container p-5">
                            <div class="swiper-wrapper">
                                @foreach ($categories as $category)
                                    @php
                                        $categoryImages = [
                                            'Smartphone' => 'images/smartphone.jpg',
                                            'Tablet' => 'images/tablet.jpg',
                                            'Smartwatch' => 'images/smartwatch.jpg',
                                            'Laptop' => 'images/laptop.jpg',
                                            'Fotocamere' => 'images/fotocamere.jpg',
                                            'Videocamere' => 'images/videocamere.jpg',
                                            'Videogiochi' => 'images/videogiochi.jpg',
                                            'Console' => 'images/console.jpg',
                                            'Stampanti' => 'images/stampante.jpg',
                                            'Droni' => 'images/drone.jpg',
                                        ];

                                        $bgImage = isset($categoryImages[$category->name])
                                            ? $categoryImages[$category->name]
                                            : 'images/default.jpg';
                                    @endphp
                                    <div class="swiper-slide rounded shadow"
                                        style="background-image: url('{{ asset($bgImage) }}');
                                         background-size: cover; background-position: center;">
                                        <a href="{{ route('byCategory', ['category' => $category]) }}"
                                            class="swiper-link rounded shadow">
                                            <div class="category-title">
                                                <h2>{{ $category->name }}</h2>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-scrollbar"></div>
                            <!-- Optional: Add navigation arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="display-5 pt-md-5 mb-0 mt-5 pt-5 text-title text-color-2 fw-semibold border-custom2"
                data-aos="fade-right">
                Perché scegliere Ad<span class="text-gradient-title">Vibe</span>?
            </h2>
        </div>
    </div>

    {{-- PERCHÈ ADVIBE --}}
    <div class="container">
        <div
            class="row heigh-custom justify-content-center align-items-stretch bg-section-home text-color-2  mx-1 pt-5">
            <div class="col-12 col-md-4 mb-4 mt-md-5">
                <div class="card h-100 border-0 shadow rounded text-center card-why-advibe" data-aos="fade-right">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3">
                            <i class="bi bi-shield-check fs-1 text-color-5"></i>
                        </div>
                        <h3 class="card-title fw-bold text-title text-gradient-title2">Sicurezza garantita</h3>
                        <p class="card-text flex-grow-1 text-color-2">Transazioni protette e verifiche utenti per
                            un'esperienza
                            sicura. Tutti gli annunci vengono controllati per garantire l'affidabilità.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4 mt-md-5">
                <div class="card h-100 border-0 shadow rounded bg-1 p-3 text-center card-why-advibe"
                    data-aos="zoom-out">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3">
                            <i class="bi bi-lightning-charge fs-1 text-color-5"></i>
                        </div>
                        <h3 class="card-title fw-bold text-title text-gradient-title2">Velocità e semplicità</h3>
                        <p class="card-text flex-grow-1">Pubblica i tuoi annunci in pochi click. Interfaccia intuitiva
                            che rende facile trovare esattamente ciò che cerchi.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4 mt-md-5">
                <div class="card h-100 border-0 shadow rounded bg-1 p-3 text-center card-why-advibe"
                    data-aos="fade-left">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3">
                            <i class="bi bi-people fs-1 text-color-5"></i>
                        </div>
                        <h3 class="card-title fw-bold text-title text-gradient-title2">Community attiva</h3>
                        <p class="card-text flex-grow-1">Entra a far parte di una rete in crescita di appassionati di
                            tecnologia. Scambia opinioni e trova opportunità uniche.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow rounded bg-1 p-3 text-center card-why-advibe"
                    data-aos="flip-right">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3">
                            <i class="bi bi-star fs-1 text-color-5"></i>
                        </div>
                        <h3 class="card-title fw-bold text-title text-gradient-title2">Prodotti di qualità</h3>
                        <p class="card-text flex-grow-1">Su AdVibe trovi solo prodotti tecnologici selezionati. Dalle
                            ultime novità agli articoli vintage, la qualità è sempre al primo posto.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow rounded bg-1 p-3 text-center card-why-advibe"
                    data-aos="flip-left">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3">
                            <i class="bi bi-graph-up-arrow fs-1 text-color-5"></i>
                        </div>
                        <h3 class="card-title fw-bold text-title text-gradient-title2">Visibilità garantita</h3>
                        <p class="card-text flex-grow-1">I tuoi annunci ottengono la massima visibilità grazie al
                            nostro sistema di categorizzazione intelligente e alla promozione personalizzata.</p>
                    </div>
                </div>
            </div>

            <h2 class="display-5 pt-md-5 mb-0 mt-5 pt-5 text-title text-gradient-title text-end fw-semibold border-custom"
                data-aos="fade-left">
                I Nostri Numeri
            </h2>
        </div>
    </div>

    {{-- I NOSTRI NUMERI --}}
    <div class="container">
        <div class="row heigh-custom justify-content-center align-items-center bg-section-home text-color-2 mx-1 pt-5">
            <div class="col-12 text-center mb-5">
                <h4 class="fw-semibold fs-3 text-color-2 text-title">AdVibe in crescita costante, grazie alla fiducia
                    dei nostri utenti</h4>
            </div>

            <div class="col-6 col-md-3 mb-4">
                <div class="card h-100 border-0 shadow rounded p-3 text-center counter-card">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="counter-icon mb-3">
                            <i class="bi bi-people-fill fs-1 text-color-5"></i>
                        </div>
                        <h3 class="counter-value display-4 fw-bold text-title">25K+</h3>
                        <p class="counter-title text-color-secondary fw-semibold">Utenti Attivi</p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3 mb-4">
                <div class="card h-100 border-0 shadow rounded p-3 text-center counter-card">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="counter-icon mb-3">
                            <i class="bi bi-bag-check-fill fs-1 text-color-5"></i>
                        </div>
                        <h3 class="counter-value display-4 fw-bold text-title">100K+</h3>
                        <p class="counter-title text-color-secondary fw-semibold">Annunci Pubblicati</p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3 mb-4">
                <div class="card h-100 border-0 shadow rounded p-3 text-center counter-card">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="counter-icon mb-3">
                            <i class="bi bi-cart-check-fill fs-1 text-color-5"></i>
                        </div>
                        <h3 class="counter-value display-4 fw-bold text-title">75K+</h3>
                        <p class="counter-title text-color-secondary fw-semibold">Vendite Completate</p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3 mb-4">
                <div class="card h-100 border-0 shadow rounded p-3 text-center counter-card">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="counter-icon mb-3">
                            <i class="bi bi-star-fill fs-1 text-color-5"></i>
                        </div>
                        <h3 class="counter-value display-4 fw-bold text-title">4.8</h3>
                        <p class="counter-title text-color-secondary fw-semibold">Valutazione Media</p>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="card border-0 shadow rounded bg-1 p-4">
                            @guest
                                <div class="card-body text-center">
                                    <h4 class="fw-bold text-title mb-3 text-gradient-title2">Unisciti alla community in
                                        crescita</h4>
                                    <p class="mb-4 text-color-2">Entra a far parte della più grande piattaforma italiana di
                                        compravendita di prodotti tecnologici.</p>
                                    <div class="d-flex justify-content-center gap-3">
                                        <a href="{{ route('login') }}"
                                            class="btn btn-custom2 transition py-2 px-4 fw-semibold d-flex align-items-center">Accedi</a>
                                        <a href="{{ route('index.article') }}"
                                            class="btn btn-custom2 transition py-2 px-4 fw-semibold">Esplora Annunci</a>
                                    </div>
                                </div>
                            @endguest
                            @auth
                                <div class="card-body text-center">
                                    <h4 class="fw-bold text-title mb-3 text-gradient-title2">Bentornato su Advibe!</h4>
                                    <p class="mb-4 text-color-2">Scopri le ultime offerte, pubblica i tuoi annunci o
                                        esplora nuovi
                                        prodotti tecnologici.</p>
                                    <div class="d-flex justify-content-center gap-3">
                                        <a href="{{ route('create.article') }}"
                                            class="btn btn-custom2 transition py-2 px-4 fw-semibold">Pubblica annuncio</a>
                                        <a href="{{ route('index.article') }}"
                                            class="btn btn-custom2 transition py-2 px-4 fw-semibold">Esplora Annunci</a>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="display-5 pt-md-5 mb-0 mt-5 pt-5 text-title text-color-2 fw-semibold border-custom2"
                data-aos="fade-right">Cosa dicono
                i nostri utenti</h2>
        </div>
    </div>

    {{-- RECENSIONI --}}
    <div class="container">
        <div class="row mb-5 py-5 rounded-bottom-3 bg-section-home mx-1">
            <div class="col-md-4 my-md-5 mb-1">
                <div class="review-card p-4 shadow rounded text-center d-flex flex-column justify-content-between">
                    <p class="review-text">"Ottima piattaforma! Ho venduto il mio smartphone in pochi giorni."</p>
                    <h5 class="fw-bold mt-3">Mario Rossi</h5>
                    <span class="text-warning">★★★★★</span>
                </div>
            </div>
            <div class="col-md-4 my-md-5 my-1">
                <div class="review-card p-4 shadow rounded text-center d-flex flex-column justify-content-between">
                    <p class="review-text">"Servizio eccellente! Ho trovato un laptop perfetto a un prezzo super."</p>
                    <h5 class="fw-bold mt-3">Giulia Bianchi</h5>
                    <span class="text-warning">★★★★★</span>
                </div>
            </div>
            <div class="col-md-4 my-md-5 mt-1">
                <div class="review-card p-4 shadow rounded text-center d-flex flex-column justify-content-between">
                    <p class="review-text">"Consigliatissimo! La community è attiva e le transazioni sono sicure."</p>
                    <h5 class="fw-bold mt-3">Luca Verdi</h5>
                    <span class="text-warning">★★★★★</span>
                </div>
            </div>
        </div>
    </div>

</x-layout>
