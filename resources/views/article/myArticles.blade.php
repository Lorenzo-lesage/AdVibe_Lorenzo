<x-layout>
    @push('title')
        AdVibe-Profilo-Utente
    @endpush
    <div class="bg-page-form min-vh-100">
        <div class="container-fuild overflow-hidden">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center mt-5 text-title text-color-2 ">Ciao <span
                            class="text-color-5 text-title">{{ ucfirst(Auth::user()->name) }}</span> ecco il tuo profilo
                    </h1>
                </div>
                <div class="col-12">
                    <h2 class="ms-4 text-title fs-1 fw-semibold mt-3 py-4 text-gradient-title">I tuoi articoli</h2>
                </div>
            </div>
            @if ($myArticles->isEmpty())
                <p class="fst-italic text-center p-5">Non hai ancora pubblicato articoli</p>
            @else
                <div class="row m-2 py-3 justify-content-center">
                    @foreach ($myArticles as $article)
                        <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-evenly mb-3">
                            <x-card :article="$article" />
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <h2 class="ms-4 text-title fs-1 fw-semibold mt-3 py-4 text-gradient-title">
                        I tuoi articoli preferiti</h2>
                </div>
            </div>
            @if ($favoriteArticles->isEmpty())
                <p class="fst-italic text-center p-5">Non hai ancora articoli preferiti</p>
            @else
                <div class="row m-2 py-3 justify-content-center">
                    @foreach ($favoriteArticles as $article)
                        <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-evenly mb-3">
                            <x-card :article="$article" />
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-layout>
