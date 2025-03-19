    <div class="card my-3 text-color-2 border-0 card-container">
        <div class="card-body bg-card rounded shadow p-0">

            @if ($article->images->count() > 0)
                <div id="carouselExample1" class="carousel carousel-dark slide">
                    <div class="carousel-inner position-relative ">
                        <p class="card-text fw-bold card-price">€ {{ $article->price }}</p>
                        @foreach ($article->images as $key => $image)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <div class="p-2">
                                    <img src="{{ Storage::url($image->path) }}"
                                        alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}"
                                        class="img-card w-100 rounded">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($article->images->count() > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample1"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample1"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif
                </div>
            @else
                <div class="p-2">
                    <img src="https://picsum.photos/200" alt="Nessuna foto inserita dall'utente"
                        class="img-card w-100 rounded">
                </div>
            @endif
            <div class="px-3 py-2 justify-content-center d-flex flex-column align-items-center">
                <h5 class="card-title text-center text-title text-truncate w-100">{{ $article->title }}</h5>
                <div class="d-flex justify-content-between w-100 mt-3">
                    <a href="{{ route('show.article', compact('article')) }}"
                        class="btn btn-sm justify-content-center d-flex btn-card transition w-50 text-center">
                        Dettaglio
                    </a>
                    <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                        class="btn btn-sm btn-category transition">
                        {{ $article->category->name }}
                    </a>
                </div>

            </div>
        </div>
    </div>
