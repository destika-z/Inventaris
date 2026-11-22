@props([
    'name',
    'label' => null,
    'value' => null,
    'type' => 'text',
    'disabled' => false
])

@if ($label)
    <label for="{{ $name }}" class="form-label">
        {{ $label }}
    </label>
@endif

@php
    $value = $type === 'password' || $type === 'file'
        ? null
        : old($name, $value ?? '');
@endphp

<input
    type="{{ $type }}"
    id="{{ $name }}"
    name="{{ $name }}"
    class="form-control @error($name) is-invalid @enderror"
    value="{{ $value }}"
    autocomplete="off"
    @disabled($disabled)
    {{ $attributes }}
>

@error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror