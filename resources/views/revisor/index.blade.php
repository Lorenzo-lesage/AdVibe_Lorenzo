<x-layout>
    @push('title')
        AdVibe-Zona-Revisore
    @endpush
    <div class="container-fluid mt-5 pt-5">
        <div class="row">

            <div class="col-12 col-md-4">
                <div class="rounded shadow bg-body-secondary">
                    <h1 class="display-5 text-center p-2">
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

            <div class="row justify-content-evenly pt-5">

                <div class="col-md-6 shadow my-5 p-2 rounded">
                    <div class="layout-container ">
                        @if ($article_to_check->images->count())
                            @foreach ($article_to_check->images as $key => $image)
                                <div class="overflow-hidden">
                                    <img src="{{ Storage::url($image->path) }}"
                                        alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->title }}'"
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

                <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                    <div>
                        <h1 class="fw-semibold border-revisore-title my-5 my-md-0 text-break">
                            {{ $article_to_check->title }}</h1>
                        <h3 class="border-revisore-seller text-center mt-5">Autore: {{ ucfirst($article_to_check->user->name) }}
                        </h3>
                        <div class="d-flex justify-content-between my-lg-5 my-4">
                            <h4>{{ $article_to_check->price }} €</h4>
                            <h4 class="fst-italic text-muted">#{{ $article_to_check->category->name }}</h4>
                        </div>
                        <p class="text-break">{{ $article_to_check->description }}</p>
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
                    <a href="{{ route('homepage') }}" class="mt-5 btn btn-custom2">Torna all'homepage</a>
                </div>
            </div>

        @endif

    </div>

</x-layout>
