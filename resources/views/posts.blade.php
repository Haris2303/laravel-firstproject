@extends('layouts.main')

@section('main')
    <h1 class="mb-5">Halaman Blog Posts</h1>

    @foreach ($posts as $post)
        <article class="mb-3 border-bottom">
            <h2>
                <a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
            </h2>
            <h6>By. <a href="#" class="text-decoration-none">{{ $post->user->name }}</a> in <a
                    href="/categories/{{ $post->category->slug }}"
                    class="text-decoration-none">{{ $post->category->name }}</a>
            </h6>
            <p>{{ $post->excerpt }}</p>

            <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read more..</a>
        </article>
    @endforeach
@endsection
