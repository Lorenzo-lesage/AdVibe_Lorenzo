<x-layout>
    @push('title')
        {{ __('AdVibe-Registazione') }}
    @endpush
    <div class="container mt-5 mb-5 pb-md-5 pb-lg-0 mb-lg-0">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-3 pt-md-5 my-5 text-title text-gradient-title fw-semibold">Registrati</h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center height-custom">
            <div class="col-12 col-lg-6">
                <form method="POST" action="{{ route('register') }}" class="shadow rounded p-md-5 p-3 pb-md-3 pb-3 mb-md-0 mb-5">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">Indirizzo email (@)</label>
                        <input type="email" class="form-control" id="registerEmail" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password"
                            class="form-label w-100 d-flex justify-content-between align-items-center">Password:
                            <span class="text-muted fst-italic fs-7">min. 8 caratteri
                            </span>
                        </label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Conferma la password:</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-custom">Registrati</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
