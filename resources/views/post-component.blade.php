{{-- <x-layout>
    <x-slot name="content">
        <article>
            <h1>
                {{ $post->title  }}
            </h1>
            <div>
                {!! $post->body !!}
            </div>
        </article>
        <a href="/">Go back</a>
    </x-slot>
</x-layout> --}}
<x-layout>
    <article>
        <h1>
            {{ $post->title  }}
        </h1>
        <div>
            {!! $post->body !!}
        </div>
    </article>
    <a href="/">Go back</a>
</x-layout>
