<x-layout>
    @push('title')
        AdVibe-{{ __('ui.revisorZone') }}
    @endpush
    <div class="container-fluid mt-5 pt-5">
        <div class="row">

            <div class="col-12 col-md-4">
                <div class="rounded shadow bg-body-secondary">
                    <h1 class="display-5 text-center p-2">
                        {{ __('ui.revisor_dashboard') }}
                    </h1>
                </div>
                <div class="col-6 col-md-12 col-lg-6">
                    <div class="rounded px-1 py-3">
                        <details class="custom-details">
                            <summary class="custom-summary text-title fw-semibold p-2 text-gradient-title">
                                {{ __('ui.reviewed_articles') }}</summary>
                            <div class="content">
                                @if ($articles_to_recheck->isNotEmpty())
                                    <table class="table table-bordered table-striped shadow-sm rounded">
                                        <thead>
                                            <tr>
                                                <th scope="col">{{ __('ui.title') }}</th>
                                                <th scope="col">{{ __('ui.author') }}</th>
                                                <th scope="col">{{ __('ui.last_modified') }}</th>
                                                <th scope="col">{{ __('ui.status') }}</th>
                                                <th scope="col">{{ __('ui.action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($articles_to_recheck as $article)
                                                <tr>
                                                    <td class="text-break">{{ $article->title }}</td>
                                                    <td class="text-break">{{ ucfirst($article->user->name) }}</td>
                                                    <td>{{ $article->updated_at->format('d/m/Y H:i') }}</td>
                                                    <td>
                                                        @if ($article->is_accepted == true)
                                                            {{ __('ui.accepted')}}
                                                        @elseif ($article->is_accepted == false)
                                                            {{ __('ui.rejected')}}
                                                        @endif
                                                    </td>
                                                    <td class="">
                                                        <form
                                                            action="{{ route('revisor.undo', ['article' => $article->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit"
                                                                class="btn btn-sm fw-bold btn-custom2">{{ __('ui.ripristina') }}</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p class="fst-italic text-center p-5 fs-4 text-color-1">
                                        {{ __('ui.no_reviewed_articles') }}</p>
                                @endif
                            </div>
                        </details>
                    </div>
                </div>
            </div>

            @if (session()->has('message'))
                <div class="row justify-content-center mt-3">
                    <div class="col-5 alert alert-success text-center shadow center">
                        {{ session('message') }}
                        <button type="button" class="btn-close position-absolute mt-3 me-3 top-0 end-0"
                            data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        </div>

        @if ($article_to_check)

            <div class="row justify-content-evenly pt-5 heigh-custom">
                <div class="col-md-6 shadow my-5 p-2 rounded">
                    <div class="layout-container ">
                        @if ($article_to_check->images->count())
                            @foreach ($article_to_check->images as $key => $image)
                                <div class="overflow-hidden">
                                    <img src="{{ $image->getUrl(350, 350) }}"
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
                    </div>
                </div>

                <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                    <div>
                        <h1 class="fw-semibold border-revisore-title my-5 my-md-0 text-break">
                            {{ $article_to_check->title }}</h1>
                        <h3 class="border-revisore-seller text-center mt-5">{{ __('ui.author') }}:
                            {{ ucfirst($article_to_check->user->name) }}</h3>
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
                            <button class="btn btn-success py-2 px-5 fw-bold">{{ __('ui.accept') }}</button>
                        </form>

                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger py-2 px-5 fw-bold">{{ __('ui.reject') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center align-items-center height-custom text-center heigh-custom">
                <div class="col-12">
                    <h1 class="fst-italic display-4">{{ __('ui.no_articles_to_review') }}</h1>
                    <a href="{{ route('homepage') }}" class="mt-5 btn btn-custom2">{{ __('ui.return_home') }}</a>
                </div>
            </div>
        @endif

    </div>

</x-layout>
