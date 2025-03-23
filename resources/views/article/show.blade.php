<x-layout>
    @push('title')
        {{ __('ui.detail_title') }}
    @endpush
    <div class="container">
        <div class="row justify-content-center align-items-center text-center my-5">
            <div class="col-12 mt-5 pt-md-5 justify-content-start d-flex align-items-center border-custom">
                @auth
                    @if ($article->user_id !== auth()->id())
                        <livewire:wish-list :article="$article" />
                    @endif
                @endauth
                <h1 class="display-3 text-title text-gradient-title fw-semibold mb-0">
                    {{ __('ui.article_info') }}
                </h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center mb-5 rounded-bottom-3 px-2 py-5 mx-1">
            <div class="col-12 col-md-6 mb-3">
                <div class="layout-container">
                    @if ($article->images->count())
                        @foreach ($article->images as $key => $image)
                            <div class="overflow-hidden">
                                <img src="{{ $image->getUrl(350, 350) }}"
                                    alt="{{ __('ui.article_image_alt', ['num' => $key + 1, 'title' => $article->title]) }}"
                                    class="w-100 rounded img-effect-revisor d-block mb-1">
                            </div>
                        @endforeach
                    @else
                        @for ($i = 0; $i < 6; $i++)
                            <div class="overflow-hidden">
                                <img src="https://picsum.photos/300"
                                    class="w-100 rounded img-effect-revisor d-block mb-1"
                                    alt="{{ __('ui.placeholder_image') }}">
                            </div>
                        @endfor
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3 height-custom text-center bg-1 p-3 rounded">
                <h2 class="display-5 text-break"><span class="fw-bold">{{ __('ui.title') }}:</span> {{ $article->title }}</h2>
                @if ($article->user_id !== auth()->id())
                    <a href="{{ route('profile.show', ['user' => $article->user_id, 'profile' => $article->user->profile->id]) }}" class="btn btn-custom2 mt-3">
                        {{ __('ui.visit_seller') }}
                    </a>
                @endif
                <div class="d-flex flex-column justify-content-center h-75">
                    <h4 class="fw-bold">{{ __('ui.price') }}: {{ $article->price }} €</h4>
                    <h3 class="border-revisore-seller text-center mt-5">{{ __('ui.author') }}: {{ ucfirst($article->user->name) }}</h3>
                    <h5>{{ __('ui.description') }}:</h5>
                    <p class="text-break">{{ $article->description }}</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
