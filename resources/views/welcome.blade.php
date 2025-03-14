<x-layout>
    @push('title')
        {{ __('AdVibe') }}
    @endpush

    <div class="container-fluid bg-image">
        <div class="row my-5 py-lg-5">
            <div class="col-12 d-flex justify-content-center">
                <img src="./media/header.png" alt="Logo AdVibe header" class="img-header mt-5">
            </div>
            @auth
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 d-flex flex-column justify-content-center mt-5 align-items-center">
                            <h3 class="fw-semibold fs-1 text-center w-md-50">Benvenuto <span
                                    class="text-color-5">{{ ucfirst(auth()->user()->name) }}</span>,
                                clicca qua sotto per iniziare a vendere!</h3>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                            <a href="{{ route('create.article') }}"
                                class="btn btn-lg btn-custom transition mt-5 py-3 text-center fw-semibold fs-4 w-auto">Pubblica
                                un annuncio</a>
                        </div>
                    </div>
                </div>
            @endauth
            @guest
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-12 d-flex flex-column justify-content-center mt-5 align-items-center">
                            <h3 class="fw-semibold fs-1 text-center w-md-50">Benvenuto accedi per pubblicare i tuoi annunci!</h3>
                            {{-- <h4>Inizia subito a pubblicare i tuoi annunci!</h4> --}}
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                            <a href="{{ route('login') }}"
                                class="btn btn-lg btn-custom transition mt-5 py-3 text-center fw-semibold fs-4 w-50">Accedi</a>
                        </div>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</x-layout>
