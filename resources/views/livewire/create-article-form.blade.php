<div>
    <form class="shadow rounded p-md-5 p-4 pb-md-3 pb-3 mb-lg-0 mb-5 bg-2-op" wire:submit="store">
        <div class="mb-3">
            <label for="title" class="form-label mb-0">Titolo:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                wire:model.blur="title">
            @error('title')
                <p class="fst-italic text-center text-color-1 bg-danger rounded-bottom-2">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label mb-0">Descrizione:</label>
            <textarea id="description" cols="30" rows="2" class="form-control @error('description') is-invalid @enderror"
                wire:model.blur="description"></textarea>
            @error('description')
                <p class="fst-italic text-center text-color-1 bg-danger rounded-bottom-2">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label mb-0">Prezzo:</label>
            <div class="input-group">
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                    wire:model.blur="price" placeholder="0.00">
                <span class="input-group-text">€</span>
            </div>
            @error('price')
                <p class="fst-italic text-center text-color-1 bg-danger rounded-bottom-2">
                    {{ $message }}
                </p>
            @enderror
        </div>
        {{-- IMMAGINI --}}
        <div class="mb-3">
            <label for="category" class="form-label mb-0">Categoria:</label>
            <select id="category" wire:model.blur="category"
                class="form-control @error('category') is-invalid @enderror">
                <option label disabled>Seleziona una categoria:</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <p class="fst-italic text-center text-color-1 bg-danger rounded-bottom-2">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="temporary_images"
                class="form-label w-100 d-flex justify-content-between align-items-center m-0">
                Immagine: <span class="fst-italic text-muted">max: 10 img</span>
            </label>
            <input type="file" wire:model.live="temporary_images" multiple
                class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img" />
            @error('temporary_images.*')
                <p class="fst-italic text-center text-color-1 bg-danger rounded-bottom-2">
                    {{ $message }}
                </p>
            @enderror
            @error('temporary_images')
                <p class="fst-italic text-center text-color-1 bg-danger rounded-bottom-2">
                    {{ $message }}
                </p>
            @enderror
        </div>
        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>Photo</p>
                    <div class="row border-preview-custom roundedpy-4">
                        @foreach ($images as $key => $image)
                            <div class="col d-flex flex-column align-items-center my-3">
                                <div class="img-preview mx-auto shadow rounded position-relative"
                                    style="background-image: url({{ $image->temporaryUrl() }});">
                                    <button type="button" class="btn mt-1 btn-delete-img d-flex align-items-center justify-content-center"
                                        wire:click="removeImage({{ $key }})">X</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        {{-- button submit --}}
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-form fw-bold">Pubblica annuncio</button>
        </div>
    </form>
</div>
