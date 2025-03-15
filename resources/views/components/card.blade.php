<div class="card my-3 rounded shadow bg-1 text-color-2 border-0 card-container">
    <div class="card-body bg-card rounded shadow p-0">
        <div class="bg-none d-flex justify-content-center p-2">
            <img src="https://picsum.photos/300" alt="{{ $article->title }}" class="img-card w-100 rounded shadow">
        </div>
        <div class="px-3 py-2 justify-content-center d-flex flex-column align-items-center">
            <h5 class="card-title text-center text-truncate text-title">{{ $article->title }}</h5>
            <div class="d-flex justify-content-between w-custom align-items-center mb-3">
                <p class="card-text fw-bold m-0">€ {{ $article->price }}</p>
                <p class="card-text">
                    <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                        class="btn btn-sm btn-category transition">
                        {{ $article->category->name }}
                    </a>
                </p>
            </div>
            <a href="{{ route('show.article', compact('article')) }}"
                class="btn btn-sm justify-content-center d-flex btn-card transition w-50 text-center">Dettaglio</a>
        </div>
    </div>
</div>
