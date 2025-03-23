<x-layout>
    @push('title')
        AdVibe-Crea Profilo
    @endpush
    <div class="container mt-5 overflow-hidden">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-3 pt-md-5 my-5 text-title text-gradient-title fw-semibold border-custom mb-0">Inserisci i tuoi dati</h1>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card-header bg-primary bg-opacity-10 py-3">
                    <h4 class="card-title mb-0 text-center">Informazioni Personali</h4>
                </div>
                {{-- inizio form --}}
                <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome*</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}" required>
                                <div class="form-text">Massimo 255 caratteri</div>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="surname" class="form-label">Cognome*</label>
                                <input type="text" class="form-control @error('surname') is-invalid @enderror"
                                    id="surname" name="surname" value="{{ old('surname') }}" required>
                                <div class="form-text">Massimo 255 caratteri</div>
                                @error('surname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Numero di Telefono*</label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone" value="{{ old('phone') }}" pattern="[0-9]{10,15}" required
                            placeholder="Es. 3401234567">
                        <div class="form-text">Inserisci solo numeri (da 10 a 15 cifre)</div>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="birth_date" class="form-label">Data di Nascita*</label>
                        <input type="date" class="form-control @error('birth_date') is-invalid @enderror"
                            id="birth_date" name="birth_date" value="{{ old('birth_date') }}"
                            max="{{ now()->subYears(18)->format('Y-m-d') }}" required>
                        <div class="form-text">Devi essere maggiorenne per registrarti</div>
                        @error('birth_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4 mt-4">
                        <h5 class="border-bottom pb-2">Indirizzo</h5>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="city" class="form-label">Città*</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror"
                                    id="city" name="city" value="{{ old('city') }}" required>
                                <div class="form-text">Massimo 255 caratteri</div>
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="country" class="form-label">Nazione*</label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror"
                                    id="country" name="country" value="{{ old('country') }}" required>
                                <div class="form-text">Massimo 255 caratteri</div>
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Indirizzo*</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                            name="address" value="{{ old('address') }}" required>
                        <div class="form-text">Massimo 255 caratteri</div>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="profile_image" class="form-label">Immagine del Profilo</label>
                        <input class="form-control @error('profile_image') is-invalid @enderror" type="file"
                            id="profile_image" name="profile_image" accept="image/jpeg,image/png,image/jpg">
                        <div class="form-text">
                            <ul class="mb-0 ps-3 small">
                                <li>Formati accettati: JPG, PNG</li>
                                <li>Dimensione massima: 2MB</li>
                                <li>Campo opzionale</li>
                            </ul>
                        </div>
                        @error('profile_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    <div class=" mt-4">
                        <button type="submit" class="btn btn-custom2 py-2">
                            <i class="bi bi-check-circle me-1"></i> Salva profilo
                        </button>
                    </div>
                </form>
                {{-- fine form --}}
            </div>
        </div>
    </div>
</x-layout>
