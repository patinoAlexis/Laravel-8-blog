@props(['name'])
<x-form.input-group>
    <x-form.label name="{{ $name }}"></x-form.label>
    <textarea class="border border-gray-200 p-2 w-full rounded"
        name="{{ $name }}"
        id="{{ $name }}"
        required>{{ $slot ?? old($name) }}</textarea>
    <x-form.error name="{{ $name }}"></x-form.error>
</x-form.input-group>