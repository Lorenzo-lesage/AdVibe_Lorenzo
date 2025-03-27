<x-layout>
    @push('title')
        {{ __('ui.search_title') }}
    @endpush
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-3 pt-md-5 my-5 text-title text-gradient-title fw-semibold border-custom mb-0">
                    {{ __('ui.search_results') }} "
                    <span class="fst-italic fw-bold text-color-2">
                        {{ $query }}
                    </span>
                    "
                </h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center height-custom mb-5 bg-section-home rounded-bottom-3 px-2 py-5 mx-1">
            @forelse ($articles as $article)
                <div class="col-12 col-md-5 col-lg-4 d-flex justify-content-center">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3 class="fw-semibold w-md-50">
                        {{ __('ui.no_results') }}
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
