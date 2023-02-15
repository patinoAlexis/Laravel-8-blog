<x-layout>
    <x-setting heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            {{-- TITTLE --}}
            <x-form.input name="title"></x-form.input>
            <x-form.input name="slug"></x-form.input>
            <x-form.input name="thumbnail" type="file"></x-form.input>
            <x-form.text-area name="excerpt"></x-form.text-area>
            <x-form.text-area name="body"></x-form.text-area>
            {{-- CATEGORIES --}}
            <x-form.input-group>
                <x-form.label name="category"></x-form.label>
                <select class="border border-gray-400 p-2 w-full"
                    name="category_id"
                    id="category_id"
                    required>
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp
                    @foreach($categories as $category)
                        <option 
                        value="{{ $category->id }}"
                        {{ old('category_id') === $category->id  ? 'selected' : ''}}
                        >{{ ucwords($category->name) }}</option>
                        
                    @endforeach
                </select>
                <x-form.error name="category_id"></x-form.error>
            </x-form.input-group>
            <x-form.input-group>
                <x-form.button>Submit</x-form.button>
            </x-form.input-group>
        </form>
    </x-setting>
</x-layout>