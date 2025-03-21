@props(['label', 'name'])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full',
        'rows' => 4, // Default number of rows
    ];
@endphp

<x-forms.field :$label :$name>
    <textarea {{ $attributes->merge($defaults) }}></textarea>
</x-forms.field>
