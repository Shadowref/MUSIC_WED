@props(['href', 'active'])

@php
    // Lớp CSS khi active vs bình thường
    $base = 'flex items-center px-4 py-2 mb-1 rounded transition-colors duration-200';
    $linkClass = $active
        ? "$base bg-white text-blue-600"
        : "$base hover:bg-white/20 text-white";
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $linkClass]) }}>
    {{ $slot }}
</a>
