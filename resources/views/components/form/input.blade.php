@props(['name', 'type' => 'text'])
<x-form.input-group>
    <x-form.label name="{{ $name }}"></x-form.label>
    <input class="border border-gray-200 p-2 w-full rounded"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        required
        {{ $attributes(['value' => old($name)]) }}
        >
    <x-form.error name="{{ $name }}"></x-form.error>
</x-form.input-group>