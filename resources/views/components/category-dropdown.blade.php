<x-droopdown>
    <x-slot name="trigger">
        <button  class=" py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-40 text-left flex lg:inline-flex ">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            <x-down-arrow class="absolute pointer-events-none" style="right: 12px;"></x-down-arrow>
        </button>
    </x-slot>
    @if(isset($currentCategory))
    <x-droopdown-item href="/" >All Categories</x-droopdown-item>
    @endif

    @foreach($categories as $category)
        <x-droopdown-item href="/?category={{ $category->slug }}"
            :active="isset($currentCategory) && $currentCategory->is($category)"
        >{{ ucwords($category->name) }}</x-droopdown-item>
{{-- 
    <a href="/categories/{{ $category->slug }}" class="
         block text-left px-3 text-sm leading-6 hover:bg-blue-500 
         focus:bg-blue-500 hover:text-white focus:text-white
         {{ isset($currentCategory) && $currentCategory->is($category) ? 'bg-blue-500 text-white' : '' }}
         ">{{ ucwords($category->name) }}</a> --}}
    @endforeach
</x-droopdown>