<x-layout>
    @push('title')
        AdVibe-Zona-Revisore
    @endpush
    <div class="container-fluid mt-5 pt-5">
        <div class="row">

            <div class="col-3">
                <div class="rounded shadow bg-body-secondary">
                    <h1 class="display-5 text-center pb-2">
                        Revisor dashboard
                    </h1>
                </div>
            </div>
            @if (session()->has('message'))
                <div class="row justify-content-center">
                    <div class="col-5 alert alert-success text-center shadow center">
                        {{ session('message') }}
                        <button type="button" class="btn-close position-absolute mt-3 me-3 top-0 end-0"
                            data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        </div>

        @if ($article_to_check)

            <div class="row justify-content-center pt-5">

                <div class="col-md-8">
                    <div class="row justify-content-center">

                        @for ($i = 0; $i < 6; $i++)
                            <div class="col-6 col-md-4 mb-4 col-img-revisor">
                                <img src="https://picsum.photos/300" class="img-fluid w-100 rounded img-effect-revisor"
                                    alt="immagine segnaposto">
                            </div>
                        @endfor
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

                <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                    <div>
                        <h1>{{ $article_to_check->title }}</h1>
                        <h3>Autore: {{ $article_to_check->user->name }}</h3>
                        <h4>{{ $article_to_check->price }} €</h4>
                        <h4 class="fst-italic text-muted">#{{ $article_to_check->category->name }}</h4>
                        <p class="h6">{{ $article_to_check->description }}</p>
                    </div>

                    <div class="d-flex pb-4 justify-content-around">

                        <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success py-2 px-5 fw-bold">Accetta</button>
                        </form>

                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger py-2 px-5 fw-bold">Rifiuta</button>
                        </form>

                    </div>
                </div>

            </div>
        @else
            <div class="row justify-content-center align-items-center height-custom text-center">
                <div class="col-12">
                    <h1 class="fst-italic display-4">
                        Nessun articolo da revisionare
                    </h1>
                    <a href="{{ route('homepage') }}" class="mt-5 btn btn-success">Torna all'homepage</a>
                </div>
            </div>

        @endif

    </div>

</x-layout>
