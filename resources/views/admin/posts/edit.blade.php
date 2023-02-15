<x-layout>
    <x-setting :heading="'Edit Post:' . $post->title">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            {{-- TITTLE --}}
            <x-form.input name="title" :value="$post->title" ></x-form.input>
            <x-form.input name="slug" :value="$post->slug"></x-form.input>
            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="$post->thumbnail"></x-form.input>
                </div>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" class="rounded-xl ml-6" width="100">

            </div>
            <x-form.text-area name="excerpt">{{ old('excerpt',$post->excerpt) }}</x-form.text-area>
            <x-form.text-area name="body">{{ old('excerpt',$post->excerpt) }}</x-form.text-area>
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
                        {{ old('category_id',$post->category_id) === $category->id  ? 'selected' : ''}}
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