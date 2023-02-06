<x-layout>
    
    @include('posts.header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
            <x-posts-grid :posts="$posts"></x-posts-grid>
        @endif
    </main>
</x-layout>