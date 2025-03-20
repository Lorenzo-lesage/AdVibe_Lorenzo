<x-layout>
    @push('title')
        AdVibe-Profilo-Personale-Utente
    @endpush
    <div class="container mt-5 overflow-hidden">
        <div class="row justify-content-center">
            <div class="col-12 text-center"">
                <h1 class="display-3 pt-md-5 my-5 text-title fw-semibold border-custom mb-0 text-color-2 ">Ciao <span
                        class="text-color-5 text-title">{{ ucfirst(Auth::user()->name) }}</span> ecco il tuo profilo
                </h1>
            </div>
        </div>
        <div class="row justify-content-center d-flex my-5 py-5 bg-1 rounded">
            <div class="col-4 col-md-3 col-lg-2">
                <div class="bg-2-op rounded px-1 py-3">
                    <details class="custom-details">
                        <summary class="custom-summary text-title fw-semibold p-2 text-gradient-title">I tuoi
                            articoli</summary>
                        <div class="content p-5">
                            @if ($myArticles->isEmpty())
                                <p class="fst-italic text-center p-5 fs-4 text-color-1">Non hai ancora pubblicato articoli</p>
                            @else
                                <div class="row m-2 py-3 justify-content-center">
                                    @foreach ($myArticles as $article)
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
                            I miei preferiti
                        </summary>
                        <div class="content">
                            @if ($favoriteArticles->isEmpty())
                                <p class="fst-italic text-center p-5 fs-4 text-color-1">Non hai ancora articoli preferiti
                                </p>
                            @else
                                <div class="row m-2 py-3 justify-content-center">
                                    @foreach ($favoriteArticles as $article)
                                        <div class="col-12 col-md-4 col-lg-3  d-flex justify-content-evenly mb-3">
                                            <x-card :article="$article" />
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </details>
                </div>
            </div>
            <div class="col-7 col-md-9 p-lg-5">
                <p class="mt-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia perferendis quidem adipisci veritatis in. Praesentium eveniet fugit esse corporis odit. Nobis a ducimus vel repellat quia, ullam esse officiis quo.</p>
            </div>
        </div>
    </div>
</x-layout>
