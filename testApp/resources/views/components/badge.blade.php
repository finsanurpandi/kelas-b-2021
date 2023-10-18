@props([
    'type'
])

@php
    switch ($type) {
        case 'success':
            $color = 'green';
            break;
        case 'danger':
            $color = 'red';
            break;
        case 'warning':
            $color = 'yellow';
            break;
    }
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-'.$color.'-500 text-white']) }} >
    <strong>{{ $header }}</strong>
    {{ $slot }}
</span>
