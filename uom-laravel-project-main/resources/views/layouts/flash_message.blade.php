@if (session('success'))
    <div class="col-md-12 pe-md-0 text-center">
        <div class="authlogin-side-wrapper">
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@elseif(session('error'))
    <div class="col-md-12 pe-md-0 text-center">
        <div class="authlogin-side-wrapper">
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
