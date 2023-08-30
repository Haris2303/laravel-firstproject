@extends('layouts.main')

@section('main')
    <article>
        <h2>{{ $post->title }}</h2>
        <h6>By. {{ $post->author }}</h6>
        {!! $post->body !!}
    </article>

    <a href="/posts">Back to blog</a>
@endsection
