@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Update password gagal </strong>
        @foreach ($errors->all() as $error)
            <br><span class="font-13"> {{ $error }} </span>
        @endforeach
    </div>

@endif
