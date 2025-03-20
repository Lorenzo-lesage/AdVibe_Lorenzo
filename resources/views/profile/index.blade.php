<x-layout>
    @push('title')
        AdVibe-Lista-Profili
    @endpush
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-3 pt-md-5 my-5 text-title text-gradient-title fw-semibold border-custom mb-0">
                    Lista Utenti
                </h1>
            </div>
        </div>

        <div class="row justify-content-center align-items-center height-custom mb-5 bg-section-home rounded-bottom-3 px-2 py-5 mx-1">
            @foreach ($users as $user)
                @if ($user->id !== auth()->id())
                    <div class="col-12 col-md-4 justify-content-center d-flex">
                        <div class="card text-center p-3 bg-card">
                            <h3 class="fw-bold">{{ ucfirst($user->name) }} </h3>
                            <p>Email: {{ $user->email }}</p>
                            <a href="{{ route('profile.show', $user->id) }}" class="btn btn-custom2">
                                Visualizza Profilo
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-layout>
