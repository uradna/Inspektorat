@props(['id', 'label', 'type', 'placeholder', 'value', 'tooltip', 'pattern'])

<label class="form-label fs-7" for="{{ $id }}">
    {{ $label }}
</label>
<input class="form-control form-control-sm text-dark" type="{{ $type }}" id="{{ $id }}"
    name="{{ $id }}" placeholder="{{ $placeholder }}" value="{{ $value }}" required=""
    @isset($pattern) pattern="{{ $pattern }}" @endisset />
<div class="invalid-tooltip">
    {{ $tooltip }}
</div>
