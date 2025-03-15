<x-layout>
    @push('title')
        AdVibe-Pubblica un articolo
    @endpush
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-3 pt-md-5 my-5 text-title text-gradient-title fw-semibold">
                    Pubblica un annuncio
                </h1>
                <x-success />
            </div>
        </div>
        <div class="row justify-content-center align-items-center height-custom mb-5">
            <div class="col-12 col-lg-6">
                <livewire:create-article-form />
            </div>
        </div>
    </div>
</x-layout>
