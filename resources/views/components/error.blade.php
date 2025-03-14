@if ($errors->any())
    <div class="container m-3">
        <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-center">
                <ul class="alert alert-danger w-50 ps-3 list-unstyled position-relative">
                    @foreach ($errors->all() as $error)
                        <li class="ps-3">{{ $error }}</li>
                    @endforeach
                    <button type="button" class="btn-close position-absolute mt-3 me-3 top-0 end-0"
                        data-bs-dismiss="alert" aria-label="Close" aria-label="{{ __('ui.close') }}"></button>
                </ul>
            </div>
        </div>
    </div>
@endif
