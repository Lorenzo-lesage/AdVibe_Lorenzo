<x-layout>
    @push('title')
        AdVibe - {{ __('ui.title') }}
    @endpush
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-3 pt-md-5 my-5 text-title text-gradient-title fw-semibold border-custom mb-0">
                    {{ __('ui.category_articles') }} "
                    <span class="fst-italic fw-bold text-color-2">
                        {{ __('ui.' . $category->name) }}
                    </span>
                    "
                </h1>
            </div>
        </div>
        <div
            class="row justify-content-center align-items-center height-custom mb-5 bg-section-home rounded-bottom-3  px-2 py-5 mx-1">
            @forelse ($articles as $article)
                <div class="col-12 col-lg-4 col-md-5 justify-content-center d-flex">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3 class="fw-semibold w-md-50">
                        {{ __('ui.no_articles') }}
                    </h3>
                    @auth
                        <a class="btn-lg fw-bold my-5 mt-5 btn btn-custom2"
                            href="{{ route('create.article') }}">{{ __('ui.create_article') }}</a>
                    @endauth
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
