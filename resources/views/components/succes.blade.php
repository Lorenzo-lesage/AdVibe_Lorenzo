@if (session('success'))
    <div class="container m-3">
        <div class="row justify-content-center">
            <div class="col d-flex justify-content-center">
                <div
                    class="alert alert-success ps-3 list-unstyled d-flex justify-content-between w-50 position-relative">
                    {{__('ui.success') }}
                    <button type="button" class="btn-close position-absolute mt-3 me-3 top-0 end-0"
                        data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
@endif
