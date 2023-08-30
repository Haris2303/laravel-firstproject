@extends('layouts.main')

@section('main')
    <article>
        <h2>{{ $post->title }}</h2>
        <h6>By. Author in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></h6>
        {!! $post->body !!}
    </article>

    <a href="/posts">Back to blog</a>
@endsection
