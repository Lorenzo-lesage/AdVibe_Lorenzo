<x-layout>
    @push('title')
        AdVibe-Categorie
    @endpush
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-3 pt-md-5 my-5 text-title text-gradient-title fw-semibold border-custom mb-0">Articoli della categoria "<span
                        class="fst-italic fw-bold text-category-title">{{ $category->name }}</span>"</h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center height-custom mb-5 bg-3-op rounded-bottom-3 shadow px-2 py-5 mx-1">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3 class="fw-semibold w-md-50">
                        Non sono ancora stati creati articoli per questa categoria!
                    </h3>
                    @auth
                        <a class="btn btn-custom btn-lg fw-bold my-5" href="{{ route('create.article') }}">Pubblica un articolo</a>
                    @endauth
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
