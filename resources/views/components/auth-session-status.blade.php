@props(['status'])

@if ($status)
    <div class="alert alert-danger alert-dismissible bg-info text-white border-0 fade show" role="alert">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ $status }}
    </div>
@endif
