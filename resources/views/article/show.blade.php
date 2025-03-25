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
        <div class="row justify-content-center mb-5 rounded-bottom-3 px-2 py-5 mx-1">

            <div class="col-lg-6">
                <div class="layout-container shadow rounded">

                    @if ($article->images->count())
                        @foreach ($article->images as $key => $image)
                            <div class="overflow-hidden">
                                <img src="{{ $image->getUrl(350, 350) }}"
                                    alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article->title }}'"
                                    class="w-100 rounded img-effect-revisor d-block mb-1">
                            </div>
                        @endforeach
                    @else
                        @for ($i = 0; $i < 6; $i++)
                            <div class="overflow-hidden">
                                <img src="https://picsum.photos/300"
                                    class="w-100 rounded img-effect-revisor d-block mb-1" alt="immagine segnaposto">
                            </div>
                        @endfor
                    @endif
                </div>


                <div id="imageModal" class="image-modal">
                    <div class="modal-overlay"></div>
                    <div class="modal-content">
                        <img id="modalImage" src="" alt="Immagine ingrandita">
                        <span class="close-modal">&times;</span>
                        <button class="nav-btn prev-btn">&lt;</button>
                        <button class="nav-btn next-btn">&gt;</button>
                        <div class="image-counter"><span id="currentImageIndex">1</span>/<span id="totalImages">6</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 mb-3 height-custom text-center bg-section-home p-0 p-md-3 rounded mt-lg-0 mt-5">
                <h2 class="display-5 text-break"><span class="fw-bold">{{ __('ui.title') }}:</span>
                    {{ $article->title }}</h2>
                <div
                    class="border border-1 border-black bg-primary bg-opacity-10 d-flex justify-content-between align-items-center px-2 py-4 rounded mb-4">
                    <h3 class="mb-0">{{ __('ui.author') }}:
                        {{ ucfirst($article->user->name) }}</h3>
                    @if ($article->user_id !== auth()->id() && $article->user->profile)
                        <a href="{{ route('profile.show', ['user' => $article->user_id, 'profile' => $article->user->profile->id]) }}"
                            class="btn btn-custom2">
                            {{ __('ui.visit_seller') }}
                        </a>
                    @endif
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <h4 class="fw-bold">{{ __('ui.price') }}: {{ $article->price }} €</h4>
                    <h5>{{ __('ui.description') }}:</h5>
                    <p class="text-break">{{ $article->description }}</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
