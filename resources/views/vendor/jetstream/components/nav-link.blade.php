@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-sky-400 text-sm font-medium leading-5 text-sky-900 focus:outline-none focus:border-sky-700 transition'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-sky-500 hover:text-sky-700 hover:border-sky-300 focus:outline-none focus:text-sky-700 focus:border-sky-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
