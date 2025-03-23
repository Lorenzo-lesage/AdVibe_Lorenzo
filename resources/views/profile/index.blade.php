<x-layout>
    @push('title')
        AdVibe {{ __('ui.titleProfile') }}
    @endpush

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-3 pt-md-5 my-5 text-title text-gradient-title fw-semibold border-custom mb-0">
                    {{ __('ui.user_list') }}
                </h1>
            </div>
        </div>

        <div
            class="row justify-content-center align-items-center height-custom mb-5 bg-section-home rounded-bottom-3 px-2 py-5 mx-1">
            @forelse ($profiles as $profile)
                @if ($profile->user_id !== auth()->id())
                    <div class="col-12 col-md-4 justify-content-center d-flex">
                        <div class="card text-center p-3 bg-card">
                            <img src="{{ Storage::url($profile->profile_image) }}" alt=""
                                class="img-profile img-fluid mb-3">
                            <h3 class="fw-bold">{{ ucfirst($profile->name) }} {{ ucfirst($profile->surname) }}</h3>
                            <a href="{{ route('profile.show', ['user' => $profile->user_id, 'profile' => $profile->id]) }}"
                                class="btn btn-custom2">
                                {{ __('ui.view_profile') }}
                            </a>
                        </div>
                    </div>
                @endif
            @empty
                <div class="col-12">
                    <h3 class="fw-semibold text-center w-md-50">
                        Nessun profilo presente
                    </h3>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
