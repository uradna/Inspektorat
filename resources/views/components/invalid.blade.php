@props(['value'])

<div {{ $attributes->merge(['class' => 'invalid-tooltip']) }}>
    {{ $value ?? $slot }}
</div>
