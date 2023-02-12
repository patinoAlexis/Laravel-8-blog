@auth
<x-panel>
    <form method="POST" action="/posts/{{ $post->slug }}/comments" class="">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" class="rounded-full" height="40" alt="">
            <h2 class="ml-4">Want to participate?</h2>
        </header>
        <div class="mt-6">
            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" col="30" rows="5" required placeholder="Give us a comment"></textarea>
            @error('body')
            <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
            <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Submit</button>
        </div>
    </form>
</x-panel>
@endauth
@guest
<x-panel>
    <h3>Log in to be able to make comments</h3>
</x-panel>
@endguest
