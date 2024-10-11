@props([
    'tag',
    'size' => 'base',
])

@php
    $class = "bg-white/10 hover:bg-white/30 rounded-xl font-bold transition-colors duration-300";

    if ($size === 'base') {
        $class .= " text-sm px-7 py-1";
    }
    if ($size === 'small') {
        $class .= " text-2xs px-5 py-1";
    }
@endphp

<a {{ $attributes->merge([
    'class' => $class,
    'href' => '/tags/' . strtolower($tag->name),
]) }}>
    {{ $tag->name }}
</a>
