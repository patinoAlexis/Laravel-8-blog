@props(['posts'])

<x-post-feature :post="$posts[0]"></x-post-feature>
@if($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach($posts->skip(1) as $post)
        <x-post-card :post="$post" class="{{ $loop->iteration >  2  ? 'col-span-2' : 'col-span-3'}}"></x-post-card>
        @endforeach
    </div>
@endif

