@props(['id' => false])

<input {{ $id ? 'id=' . $id : '' }} {{ $id ? 'name=' . $id : '' }} {!! $attributes->merge(['class' => 'form-control text-dark']) !!} placeholder=" " />
