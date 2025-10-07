@props(['name', 'label'])

<div class="inline-flex items-center gap-x-2">
    <span class="w-2 h-2 bg-indigo-600 inline-block rounded-full"></span>
    <label class="font-semibold  text-gray-900" for="{{ $name }}">{{ $label }}</label>
</div>