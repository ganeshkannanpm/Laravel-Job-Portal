@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-gray-200 border  text-gray-900 border-white/10 px-3 py-2 w-full',
        'value' => old($name)
];
@endphp

<x-forms.field :$label :$name>
    <input {{ $attributes($defaults) }} >
</x-forms.field>