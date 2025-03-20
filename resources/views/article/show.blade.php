<x-layout>
    @push('title')
        AdVibe-Dettaglio
    @endpush
    <div class="container">
        <div class="row justify-content-center align-items-center text-center  my-5">
            <div class="col-12 mt-5 pt-md-5 justify-content-start d-flex align-items-center border-custom">
                @auth
                    @if ($article->user_id !== auth()->id())
                        <livewire:wish-list :article="$article" />
                    @endif
                @endauth
                <h1 class="display-3  text-title text-gradient-title fw-semibold mb-0">
                    Informazioni articolo</h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center mb-5 rounded-bottom-3 px-2 py-5 mx-1">
            <div class="col-12 col-md-6 mb-3">
                <div class="layout-container">
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
                    <div id="imageModal" class="image-modal">
                        <div class="modal-overlay"></div>
                        <div class="modal-content">
                            <img id="modalImage" src="" alt="Immagine ingrandita">
                            <span class="close-modal">&times;</span>
                            <button class="nav-btn prev-btn">&lt;</button>
                            <button class="nav-btn next-btn">&gt;</button>
                            <div class="image-counter"><span id="currentImageIndex">1</span>/<span
                                    id="totalImages">6</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3 height-custom text-center bg-1 p-3 rounded">
                <h2 class="display-5 text-break"><span class="fw-bold">Titolo:</span> {{ $article->title }}</h2>
                @if ($article->user_id !== auth()->id())
                    <a href="{{ route('profile.show', ['user' => $article->user_id]) }}" class="btn btn-custom2 mt-3">
                        Visita il profilo del venditore
                    </a>
                @endif
                <div class="d-flex flex-column justify-content-center h-75">
                    <h4 class="fw-bold">Prezzo: {{ $article->price }} €</h4>
                    <h3 class="border-revisore-seller text-center mt-5">Autore: {{ ucfirst($article->user->name) }}
                    </h3>
                    <h5>Descrizione:</h5>
                    <p class="text-break">{{ $article->description }}</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
