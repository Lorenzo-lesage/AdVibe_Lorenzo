<x-layout>
    @push('title')
        {{ __('ui.login_title') }}
    @endpush
    <div class="container mt-5 mb-5 pb-md-5 pb-lg-0 mb-lg-0">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-3 pt-md-5 my-5 text-title text-gradient-title fw-semibold border-custom">
                    {{ __('ui.login') }}
                </h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center height-custom">
            <div class="col-12 col-lg-6">
                <form method="POST" action="{{ route('login') }}"
                    class="shadow rounded p-md-5 p-3 pb-md-3 pb-3 mb-md-0 mb-5 bg-2-op">
                    @csrf
                    <!-- EMAIL -->
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">{{ __('ui.email_label') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="loginEmail"
                            name="email" value="{{ old('email') }}">
                        @error('email')
                            <p class="fst-italic text-center text-color-1 bg-danger rounded-bottom-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('ui.password') }}</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password">
                        @error('password')
                            <p class="fst-italic text-center text-color-1 bg-danger rounded-bottom-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- BOTTONE LOGIN -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-custom2 fw-bold">{{ __('ui.login_button') }}</button>
                    </div>

                    <!-- LINK REGISTRAZIONE -->
                    <p class="mt-3">{{ __('ui.no_account') }}
                        <a href="{{ route('register') }}" class="fw-bold text-gradient-title bg-2-op px-2 py-1 rounded">
                            {{ __('ui.register') }}
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-layout>
