    <div class="card my-3 text-color-2 border-0 card-container">
        <div class="card-body bg-card rounded shadow p-0">
            <div class="bg-none d-flex justify-content-center p-2 position-relative overflow-hidden">
                <p class="card-text fw-bold card-price">€ {{ $article->price }}</p>
                <img src="https://picsum.photos/300" alt="{{ $article->title }}" class="img-card w-100 rounded">
            </div>
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
