@props(['disabled' => false, 'id' => false])

<input {{ $disabled ? 'disabled' : '' }} {{ $id ? 'id=' . $id : '' }} {{ $id ? 'name=' . $id : '' }}
    {!! $attributes->merge(['class' => 'form-control form-control-sm text-dark']) !!} />
