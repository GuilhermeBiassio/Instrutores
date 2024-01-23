@if (session('success.message'))
    <div class="alert alert-success">
        {{ session('success.message') }}
    </div>
@endif

@if (session('error.message'))
    <div class="alert alert-danger">
        {{ session('error.message') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <ul class="text-white font-bold">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
