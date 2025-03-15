<div>
    <form class="shadow rounded p-md-5 p-4 pb-md-3 pb-3 mb-lg-0 mb-5 bg-card" wire:submit="store">
        <div class="mb-3">
            <label for="title" class="form-label mb-0">Titolo:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                wire:model.blur="title">
            @error('title')
                <p class="fst-italic text-danger">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label mb-0">Descrizione:</label>
            <textarea id="description" cols="30" rows="2" class="form-control @error('description') is-invalid @enderror"
                wire:model.blur="description"></textarea>
            @error('description')
                <p class="fst-italic text-danger">
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
                <p class="fst-italic text-danger">
                    {{ $message }}
                </p>
            @enderror
        </div>
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
                <p class="fst-italic text-danger">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-custom">Pubblica annuncio</button>
        </div>
    </form>
</div>

