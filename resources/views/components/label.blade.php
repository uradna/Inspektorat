@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label fs-7']) }}>
    {{ $value ?? $slot }}
</label>
