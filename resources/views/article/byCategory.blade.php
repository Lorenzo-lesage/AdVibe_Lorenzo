<x-layout>
    @push('title')
        AdVibe-Categorie
    @endpush
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-3 pt-md-5 my-5 text-title text-gradient-title fw-semibold border-custom mb-0">
                    Articoli della categoria "
                    <span class="fst-italic fw-bold text-color-2">
                        {{ $category->name }}
                    </span>
                    "
                </h1>
            </div>
        </div>
        <div
            class="row justify-content-center align-items-center height-custom mb-5 bg-section-home rounded-bottom-3  px-2 py-5 mx-1">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3 justify-content-center d-flex">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3 class="fw-semibold w-md-50">
                        Non sono ancora stati creati articoli per questa categoria!
                    </h3>
                    @auth
                        <a class="btn-lg fw-bold my-5 mt-5 btn btn-custom2" href="{{ route('create.article') }}">Pubblica un
                            articolo</a>
                    @endauth
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
