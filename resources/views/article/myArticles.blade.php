<x-layout>
    @push('title')
        {{ __('ui.profile_title') }}
    @endpush
    <div class="container mt-5 overflow-hidden">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-3 pt-md-5 mt-5 text-title fw-semibold border-custom mb-0 text-color-2">
                    {{ __('ui.hello') }} <span class="text-color-5 text-title">{{ ucfirst(Auth::user()->name) }}</span>,
                    {{ __('ui.profile_intro') }}
                </h1>
            </div>
            <x-success />
        </div>
        <div class="row justify-content-center d-flex mb-5 mx-1 py-5">
            <div class="col-12 col-md-3 col-lg-2 d-flex justify-content-between">
                <div class="bg-2 rounded py-2 col-4 col-md-12">
                    <details class="custom-details">
                        <summary class="custom-summary text-title fw-semibold p-2 text-gradient-title">
                            {{ __('ui.your_articles') }}
                        </summary>
                        <div class="content p-5">
                            @if ($myArticles->isEmpty())
                                <p class="fst-italic text-center p-5 fs-4 text-color-1">
                                    {{ __('ui.no_articles_published') }}
                                </p>
                            @else
                                <div class="row m-2 py-3 justify-content-center">
                                    @foreach ($myArticles as $article)
                                        <div class="col-12 col-md-5 col-lg-3 d-flex justify-content-evenly mb-3">
                                            <x-card :article="$article" />
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </details>
                    <details class="custom-details">
                        <summary class="custom-summary text-title fw-semibold p-2 text-gradient-title">
                            {{ __('ui.my_favorites') }}
                        </summary>
                        <div class="content">
                            @if ($favoriteArticles->isEmpty())
                                <p class="fst-italic text-center p-5 fs-4 text-color-1">
                                    {{ __('ui.no_favorites') }}
                                </p>
                            @else
                                <div class="row m-2 py-3 justify-content-center">
                                    @foreach ($favoriteArticles as $article)
                                        <div class="col-12 col-md-5 col-lg-3 d-flex justify-content-evenly mb-3">
                                            <x-card :article="$article" />
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </details>
                </div>
                @if ($profile)
                    <img src="{{ Storage::url($profile->profile_image) }}" alt=""
                        class="img-profile img-fluid mb-3 ms-2 d-md-none object-fit-cover">
                @endif
            </div>
            <div class="col-12 col-md-9 py-5 px-lg-5 bg-section-home rounded-bottom-3">
                @if ($profile)
                    <div class="d-flex justify-content-between align-items-center">
                        <h3><span class="fw-bold">Nome e Cognome: </span>{{ ucfirst($profile->name) }}
                            {{ ucfirst($profile->surname) }}</h3>
                        <img src="{{ Storage::url($profile->profile_image) }}" alt=""
                            class="img-profile img-fluid mb-3 ms-2 d-none d-md-block object-fit-cover">
                    </div>
                    <p><span class="fw-bold">Email: </span>{{ Auth::user()->email }} <span class="fst-italic">(non
                            modificabile)</span></p>
                    <p><span class="fw-bold">Telefono: </span>{{ $profile->phone }}</p>
                    <p><span class="fw-bold">Città: </span>{{ ucfirst($profile->city) }},
                        {{ ucfirst($profile->country) }}</p>
                    <p><span class="fw-bold">Indirizzo: </span>{{ $profile->address }}</p>
                    <p><span class="fw-bold">Data di nascita: </span>{{ $profile->birth_date }}</p>
                    <div class="d-flex justify-content-between align-items-center col-md-8 col-lg col-12">
                        <p class="mb-0">
                            Modifica profilo
                            <span>
                                <a href="{{ route('profile.edit') }}">
                                    <i class="bi bi-pencil-square update-logo"></i>
                                </a>
                            </span>
                        </p>
                        <form action="{{ route('profile.destroy', compact('profile')) }}" method="POST"
                            onsubmit="return confirm('Sei sicuro di voler eliminare questo profilo?');">
                            @csrf
                            @method('DELETE')
                            <p class="mb-0">
                                Elimina profilo
                                <span>
                                    <button type="submit" class="border-0 bg-transparent"><i
                                            class="bi bi-trash"></i></button>
                                </span>
                            </p>
                        </form>
                    </div>
                @endif
                @if (!auth()->user()->profile)
                    <p>Crea profilo
                        <span>
                            <a href="{{ route('profile.form') }}" class="btn btn-custom2 transition"><i
                                    class="bi bi-person-bounding-box"></i></a>
                        </span>
                    </p>
                @endif

            </div>
        </div>
    </div>
</x-layout>
