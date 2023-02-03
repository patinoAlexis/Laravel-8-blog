@extends('layout')

@section('content')
    @foreach ($posts as $post)
    <article>
        <h1>
            <a href="/posts/{{ $post->slug }}">
                {{ $post->title }}
            </a>
        </h1>
        <div>
            {{ $post->excerpt }}
        </div>
    </article>

    @endforeach
@endsection
    <!-- <h1>Hello world</h1> -->

    
</body>
