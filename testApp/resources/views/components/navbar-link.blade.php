@props(['active'])

@php
$classes = ($active ?? false)
            ? 'font-medium text-blue-500'
            : 'font-medium text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
