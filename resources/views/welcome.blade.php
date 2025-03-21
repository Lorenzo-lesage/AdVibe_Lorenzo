<x-layout>
    @push('title')
        AdVibe-{{ __('ui.welcome') }}
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
                            <h3 class="fw-semibold fs-1 text-center w-md-50">{{ __('ui.welcome') }} <span
                                    class="text-color-5">{{ ucfirst(auth()->user()->name) }}</span>,
                                {{ __('ui.start_selling') }}</h3>
                        </div>
                        <div class="col-10 col-md-6 col-lg-4 d-flex justify-content-center">
                            <a href="{{ route('create.article') }}"
                                class="btn btn-lg btn-custom2 mt-5 py-3 text-center fw-semibold fs-4">{{ __('ui.publish_ad') }}</a>
                        </div>
                    </div>
                </div>
            @endauth
            @guest
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-12 d-flex flex-column justify-content-center mt-5 align-items-center">
                            <h3 class="fw-semibold fs-1 text-center w-md-50">{{ __('ui.welcome_guest') }}</h3>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                            <a href="{{ route('login') }}"
                                class="btn btn-lg btn-custom2 transition mt-5 py-3 text-center fw-semibold fs-4 w-50">{{ __('ui.login') }}</a>
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
                    data-bs-pause="false" data-bs-interval="4000" data-aos="fade-down">
                    <div class="carousel-inner carousel carousel-home rounded shadow">

                        <div class="carousel-item active carousel1 position-relative">
                            <div class="carousel-caption carousel-text">
                                <h2 class="fw-bold fs-1 text-title text-gradient-title">{{ __('ui.find_best') }}</h2>
                                <p class="fs-4 text-gradient-title">{{ __('ui.exclusive_offers') }}</p>
                            </div>
                        </div>

                        <div class="carousel-item carousel2 position-relative">
                            <div class="carousel-caption carousel-text">
                                <h2 class="fw-bold fs-1 text-title">{{ __('ui.buy_sell_safe') }}</h2>
                                <p class="fs-4">{{ __('ui.trust_platform') }}</p>
                            </div>
                        </div>

                        <div class="carousel-item carousel3 position-relative">
                            <div class="carousel-caption carousel-text">
                                <h2 class="fw-bold fs-1 text-title">{{ __('ui.join_community') }}</h2>
                                <p class="fs-4">{{ __('ui.connect_users') }}</p>
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
            {{ __('ui.latest_ads') }}
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
                        {{ __('ui.no_ads') }}
                    </h3>
                </div>
            @endforelse
            <h2 class="display-5 pt-md-5 mb-0 mt-5 pt-5 text-title text-gradient-title text-end fw-semibold border-custom"
                data-aos="fade-left">
                {{ __('ui.categories') }}
            </h2>
        </div>
    </div>

    {{-- CATEGORIE --}}
    <div class="container">
        <div class="row mx-1 overflow-hidden pt-5 bg-category">
            <div class="col-12">
                <div class="row row-swiper position-relative mb-5">
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
                {{ __('ui.why_choose_advibe') }}
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
                        <h3 class="card-title fw-bold text-title text-gradient-title2">
                            {{ __('ui.guaranteed_security') }}</h3>
                        <p class="card-text flex-grow-1 text-color-2">{{ __('ui.secure_transactions') }}</p>
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
                        <h3 class="card-title fw-bold text-title text-gradient-title2">
                            {{ __('ui.speed_and_simplicity') }}</h3>
                        <p class="card-text flex-grow-1 text-color-2">{{ __('ui.publish_ads_in_few_clicks') }}</p>
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
                        <h3 class="card-title fw-bold text-title text-gradient-title2">{{ __('ui.active_community') }}
                        </h3>
                        <p class="card-text flex-grow-1 text-color-2">
                            {{ __('ui.growing_network_of_tech_enthusiasts') }}</p>
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
                        <h3 class="card-title fw-bold text-title text-gradient-title2">{{ __('ui.quality_products') }}
                        </h3>
                        <p class="card-text flex-grow-1 text-color-2">{{ __('ui.only_selected_tech_products') }}</p>
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
                        <h3 class="card-title fw-bold text-title text-gradient-title2">
                            {{ __('ui.visibility_guaranteed') }}</h3>
                        <p class="card-text flex-grow-1 text-color-2">{{ __('ui.max_visibility_for_your_ads') }}</p>
                    </div>
                </div>
            </div>

            <h2 class="display-5 pt-md-5 mb-0 mt-5 pt-5 text-title text-gradient-title text-end fw-semibold border-custom"
                data-aos="fade-left">
                {{ __('ui.our_numbers') }}
            </h2>
        </div>
    </div>

    {{-- I NOSTRI NUMERI --}}
    <div class="container">
        <div class="row heigh-custom justify-content-center align-items-center bg-section-home text-color-2 mx-1 pt-5">
            <div class="col-12 text-center mb-5">
                <h4 class="fw-semibold fs-3 text-color-2 text-title">{{ __('ui.advibe_growth') }}</h4>
            </div>

            <div class="col-6 col-md-3 mb-4">
                <div class="card h-100 border-0 shadow rounded p-3 text-center counter-card">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="counter-icon mb-3">
                            <i class="bi bi-people-fill fs-1 text-color-5"></i>
                        </div>
                        <h3 class="counter-value display-4 fw-bold text-title">25K+</h3>
                        <p class="counter-title text-color-secondary fw-semibold">{{ __('ui.active_users') }}</p>
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
                        <p class="counter-title text-color-secondary fw-semibold">{{ __('ui.published_ads') }}</p>
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
                        <p class="counter-title text-color-secondary fw-semibold">{{ __('ui.completed_sales') }}</p>
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
                        <p class="counter-title text-color-secondary fw-semibold">{{ __('ui.average_rating') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="card border-0 shadow rounded bg-1 p-4">
                            @guest
                                <div class="card-body text-center">
                                    <h4 class="fw-bold text-title mb-3 text-gradient-title2">{{ __('ui.join_community') }}
                                    </h4>
                                    <p class="mb-4 text-color-2">{{ __('ui.join_largest_tech_platform') }}</p>
                                    <div class="d-flex justify-content-center gap-3">
                                        <a href="{{ route('login') }}"
                                            class="btn btn-custom2 transition py-2 px-4 fw-semibold d-flex align-items-center">{{ __('ui.login') }}</a>
                                        <a href="{{ route('index.article') }}"
                                            class="btn btn-custom2 transition py-2 px-4 fw-semibold">{{ __('ui.explore_ads') }}</a>
                                    </div>
                                </div>
                            @endguest
                            @auth
                                <div class="card-body text-center">
                                    <h4 class="fw-bold text-title mb-3 text-gradient-title2">{{ __('ui.welcome_back') }}
                                    </h4>
                                    <p class="mb-4 text-color-2">{{ __('ui.explore_new_offers_or_publish_ads') }}</p>
                                    <div class="d-flex justify-content-center gap-3">
                                        <a href="{{ route('create.article') }}"
                                            class="btn btn-custom2 transition py-2 px-4 fw-semibold">{{ __('ui.publish_ad') }}</a>
                                        <a href="{{ route('index.article') }}"
                                            class="btn btn-custom2 transition py-2 px-4 fw-semibold">{{ __('ui.explore_ads') }}</a>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="display-5 pt-md-5 mb-0 mt-5 pt-5 text-title text-color-2 fw-semibold border-custom2"
                data-aos="fade-right">{{ __('ui.what_our_users_say') }}</h2>
        </div>
    </div>

    {{-- RECENSIONI --}}
    <div class="container">
        <div class="row mb-5 py-5 rounded-bottom-3 bg-section-home mx-1">
            <div class="col-md-4 my-md-5 mb-1">
                <div class="review-card p-4 shadow rounded text-center d-flex flex-column justify-content-between">
                    <p class="review-text">{{ __('ui.review_1') }}</p>
                    <h5 class="fw-bold mt-3">{{ __('ui.name_1') }}</h5>
                    <span class="text-warning">★★★★★</span>
                </div>
            </div>
            <div class="col-md-4 my-md-5 my-1">
                <div class="review-card p-4 shadow rounded text-center d-flex flex-column justify-content-between">
                    <p class="review-text">{{ __('ui.review_2') }}</p>
                    <h5 class="fw-bold mt-3">{{ __('ui.name_2') }}</h5>
                    <span class="text-warning">★★★★★</span>
                </div>
            </div>
            <div class="col-md-4 my-md-5 mt-1">
                <div class="review-card p-4 shadow rounded text-center d-flex flex-column justify-content-between">
                    <p class="review-text">{{ __('ui.review_3') }}</p>
                    <h5 class="fw-bold mt-3">{{ __('ui.name_3') }}</h5>
                    <span class="text-warning">★★★★★</span>
                </div>
            </div>
        </div>
    </div>

</x-layout>
