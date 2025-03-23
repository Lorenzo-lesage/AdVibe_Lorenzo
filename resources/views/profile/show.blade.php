<x-layout>
    @push('title')
        AdVibe-{{ __('ui.schedaUser') }}
    @endpush
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1
                    class="display-3 pt-md-5 my-5 text-title text-gradient-title fw-semibold border-custom mb-0 text-color-2">
                    {{ __('ui.profile') }} <span class="text-color-5 text-title">{{ ucfirst($user->name) }}</span>
                </h1>
            </div>
        </div>

        <div class="row justify-content-center d-flex mb-5 py-5 mx-1">
            <div class="col-4 col-md-3 col-lg-2">
                <div class="bg-2-op rounded px-1 py-3">
                    <details class="custom-details">
                        <summary class="custom-summary text-title fw-semibold p-2 text-gradient-title">
                            {{ __('ui.profile_articles') }} {{ ucfirst($user->name) }}
                        </summary>
                        <div class="content p-5">
                            @if ($profileArticles->isEmpty())
                                <p class="fst-italic text-center p-5 fs-4 text-color-1">{{ __('ui.no_articles') }}</p>
                            @else
                                <div class="row m-2 py-3 justify-content-center">
                                    @foreach ($profileArticles as $article)
                                        <div class="col-12 col-md-4 col-lg-3 d-flex justify-content-evenly mb-3">
                                            <x-card :article="$article" />
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </details>
                    <details class="custom-details mt-3">
                        <summary class="custom-summary text-title fw-semibold p-2 text-gradient-title">
                            {{ ucfirst($user->name) }} <span><i class="bi bi-heart-fill text-danger"></i></span>
                        </summary>
                        <div class="content">
                            @if ($favoriteArticles->isEmpty())
                                <p class="fst-italic text-center p-5 fs-4 text-color-1">{{ __('ui.no_favorites') }}</p>
                            @else
                                <div class="row m-2 py-3 justify-content-center">
                                    @foreach ($favoriteArticles as $article)
                                        <div class="col-12 col-md-4 col-lg-3 d-flex justify-content-evenly mb-3">
                                            <x-card :article="$article" />
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </details>
                </div>
            </div>
            <div class="col-7 col-md-9 p-lg-5 bg-section-home rounded-bottom-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h3><span class="fw-bold">Nome e Cognome: </span>{{ ucfirst($profile->name) }}
                        {{ ucfirst($profile->surname) }}</h3>
                    <img src="{{ $profile->profile_image ? Storage::url($profile->profile_image) : Storage::url('profile_image/default.jpg') }}"
                        alt="" class="img-profile img-fluid mb-3">
                </div>
                <p><span class="fw-bold">Email: </span>{{ $user->email }}</p>
                <p><span class="fw-bold">Telefono: </span>{{ $profile->phone }}</p>
                <p><span class="fw-bold">Città: </span>{{ ucfirst($profile->city) }},
                    {{ ucfirst($profile->country) }}</p>
                <p><span class="fw-bold">Indirizzo: </span>{{ $profile->address }}</p>
                <p><span class="fw-bold">Data di nascita: </span>{{ $profile->birth_date }}</p>
            </div>
        </div>
    </div>
</x-layout>

