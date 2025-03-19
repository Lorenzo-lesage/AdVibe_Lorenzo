<x-layout>
    @push('title')
        AdVibe-Dettaglio
    @endpush
    <div class="container">
        <div class="row height-custom justify-content-center align-items-center text-center">
            <div class="col-12 mt-5">
                <h1 class="display-3 pt-md-5 my-5 text-title text-gradient-title fw-semibold border-custom mb-0">
                    Informazioni articolo</h1>
            </div>
        </div>
        <div
            class="row justify-content-center align-items-center mb-5 rounded-bottom-3 px-2 py-5 mx-1">
            <div class="col-12 col-md-6 mb-3">
                <div class="layout-container">
                    @if ($article->images->count())
                        @foreach ($article->images as $key => $image)
                            <div class="overflow-hidden">
                                <img src="{{ $image->getUrl(350, 350)}}"
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
            <div class="col-12 col-md-6 mb-3 height-custom text-center bg-section-home">
                <h2 class="display-5 text-break"><span class="fw-bold">Titolo:</span> {{ $article->title }}</h2>
                <div class="d-flex flex-column justify-content-center h-75">
                    <h4 class="fw-bold">Prezzo: {{ $article->price }} €</h4>
                    <h5>Descrizione:</h5>
                    <p class="text-break">{{ $article->description }}</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
