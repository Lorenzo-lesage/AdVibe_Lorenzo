<div class="card my-3 text-color-2 border-0 card-container position-relative">
    <div class="card-body bg-card rounded shadow p-0">
        @auth
            @if ($article->user_id !== auth()->id())
                <div class="card-heart">
                    <livewire:wish-list :article="$article" />
                </div>
            @endif
        @endauth
        <p class="card-text fw-bold card-price">€ {{ $article->price }}</p>

        @if ($article->images->count() > 0)
            <a href="{{ route('show.article', compact('article')) }}">
                <div id="carousel{{ $article->id }}" class="carousel carousel-dark slide w-100" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($article->images as $key => $image)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <div class="p-2">
                                    <img src="{{ $image->getUrl(350, 350) }}"
                                        alt="{{ __('ui.image_alt', ['number' => $key + 1, 'title' => $article->title]) }}"
                                        class="img-card w-100 rounded">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if ($article->images->count() > 1)
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#carousel{{ $article->id }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">{{ __('ui.previous') }}</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#carousel{{ $article->id }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">{{ __('ui.next') }}</span>
                        </button>
                    @endif
                </div>
            </a>
        @else
            <div class="p-2">
                <a href="{{ route('show.article', compact('article')) }}">
                    <img src="https://picsum.photos/200"
                        alt="{{ __('ui.no_image') }}"
                        class="img-card w-100 rounded">
                </a>
            </div>
        @endif

        <div class="px-3 py-2 justify-content-center d-flex flex-column align-items-center">
            <h5 class="card-title text-center text-title text-truncate w-100">{{ $article->title }}</h5>
            <div class="d-flex justify-content-between w-100 mt-3">
                <a href="{{ route('show.article', compact('article')) }}"
                    class="btn btn-sm justify-content-center d-flex btn-custom2 transition w-50 text-center">
                    {{ __('ui.details') }}
                </a>
                <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                    class="btn btn-sm btn-custom2 transition">
                    {{ __('ui.' . $article->category->name) }}
                </a>
            </div>
        </div>
    </div>
</div>
