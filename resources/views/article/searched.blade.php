<x-layout>
    @push('title')
        AdVibe-Ricerca
    @endpush
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-3 pt-md-5 my-5 text-title text-gradient-title fw-semibold border-custom mb-0">
                    Risultati per la ricerca "
                    <span class="fst-italic fw-bold text-color-2">
                        {{ $query }}
                    </span>
                    "
                </h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center height-custom mb-5 bg-section-home rounded-bottom-3  px-2 py-5 mx-1">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3 class="fw-semibold w-md-50">
                        Nessun articolo corrisponde alla tua ricerca
                    </h3>
                </div>
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center mb-4">
        <div class="custom-pagination">
            {{ $articles->links() }}
        </div>
    </div>
</x-layout>
