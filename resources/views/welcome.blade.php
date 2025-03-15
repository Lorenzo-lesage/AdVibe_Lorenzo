<x-layout>
    @push('title')
        AdVibe-Home
    @endpush

    <div class="container-fluid bg-image">
        <div class="row my-5 py-lg-5">
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
                        <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                            <a href="{{ route('create.article') }}"
                                class="btn btn-lg btn-custom transition mt-5 py-3 text-center fw-semibold fs-4 w-auto">Pubblica
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
                                class="btn btn-lg btn-custom transition mt-5 py-3 text-center fw-semibold fs-4 w-50">Accedi</a>
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
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false"
                    data-bd-interval="4000">
                    <div class="carousel-inner carousel rounded-0">
                        <div class="carousel-item active carousel1 position-relative">
                            <div class="carousel-caption carousel-text">
                                <h2 class="fw-bold fs-1 text-title">Trova il meglio per te!</h2>
                                <p class="fs-4">Scopri offerte esclusive e articoli selezionati per ogni tua esigenza!
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
    <div class="container my-5">
        <h2 class="display-5 pt-md-5 mt-5 mb-0 text-title text-gradient-title fw-semibold text-center border-custom">
            Ultimi annunci pubblicati
        </h2>
        <div
            class="row heigh-custom justify-content-center align-items-center bg-3-op text-color-2 rounded-bottom-3 shadow mx-1">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3 justify-content-center d-flex">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="fw-semibold text-center w-md-50">
                        Non sono ancora stati pubblicati annunci
                    </h3>
                </div>
            @endforelse
        </div>
    </div>

    {{-- CATEGORIE --}}
    </h2>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2
                    class="display-5 pt-md-5 mt-5 mb-0 text-title text-gradient-title fw-semibold text-center border-custom">
                    Categorie
            </div>
        </div>
    </div>
    <div class="container overflow-hidden mb-5">
        <div class="row bg-3-op swiper-bg mx-1">
            <div class="col-12 col-md-4">
                <div class="swiper-container p-5">
                    <div class="swiper-wrapper">
                        @foreach ($categories as $category)
                            <div class="swiper-slide"
                                style="background-image: url('{{ asset('images/smartphone.jpg') }}'); background-size: cover; background-position: center;">
                                <a href="{{ route('byCategory', ['category' => $category]) }}" class="swiper-link">
                                    <div class="category-title">
                                        <h2>{{ $category->name }}</h2>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- Optional: Add navigation arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
