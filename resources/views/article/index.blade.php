<x-layout>
    @push('title')
        AdVibe-Catalogo
    @endpush
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-3 pt-md-5 my-5 text-title text-gradient-title fw-semibold border-custom mb-0">
                    Tutti gli articoli
                </h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center height-custom mb-5 bg-section-home rounded-bottom-3 px-2 py-5 mx-1">
            @forelse ($articles as $article)
                <div class="col-12 col-md-4 justify-content-center d-flex">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="fw-semibold text-center w-md-50">
                        Non sono ancora stati creati articoli
                    </h3>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mb-4">
            <div class="custom-pagination">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</x-layout>
