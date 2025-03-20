<x-layout>
    @push('title')
        AdVibe-Profilo
    @endpush
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center"">
                <h1 class="display-3 pt-md-5 my-5 text-title fw-semibold border-custom mb-0 text-color-2 ">Profilo di
                    <span class="text-color-5 text-title">{{ ucfirst($user->name) }}</span>
                </h1>
            </div>
        </div>
        <div class="row justify-content-center d-flex my-5 py-5 bg-1 rounded">
            <div class="col-4 col-md-3 col-lg-2">
                <div class="bg-2-op rounded px-1 py-3">
                    <details class="custom-details">
                        <summary class="custom-summary text-title fw-semibold p-2 text-gradient-title">Articoli di
                            {{ ucfirst($user->name) }}</summary>
                        <div class="content p-5">
                            @if ($profileArticles->isEmpty())
                                <p class="fst-italic text-center p-5 fs-4 text-color-1">Nessun articolo pubblicato</p>
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
                                <p class="fst-italic text-center p-5 fs-4 text-color-1">Nessun articolo nei preferiti
                                </p>
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
            <div class="col-7 col-md-9 p-lg-5">
                <p class="mt-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia perferendis quidem adipisci veritatis
                    in. Praesentium eveniet fugit esse corporis odit. Nobis a ducimus vel repellat quia, ullam esse
                    officiis quo.</p>
            </div>
        </div>
    </div>
</x-layout>
