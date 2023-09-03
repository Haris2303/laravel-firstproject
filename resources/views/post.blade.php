@extends('layouts.main')

@section('main')
    <div class="row justify-content-center mb-5">
        <div class="col-10">
            <article>
                <h1 class="card-title mb-3">{{ $post->title }}</h1>
                <div class="mb-2">
                    <h6 class="text-secondary d-inline me-2">By. <a href="/posts?author={{ $post->author->username }}"
                            class="text-decoration-none text-primary">{{ $post->author->name }}</a>
                    </h6>
                    <small class="text-body-secondary me-2">{{ $post->created_at->diffForHumans() }}</small>
                    <small class="text-body-secondary d-block">Category
                        <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-primary">
                            {{ $post->category->name }}
                        </a>
                    </small>
                </div>
                <div class="mb-3">
                    @php
                        if ($post->image) {
                            $src = '/storage/' . $post->image;
                        } else {
                            $src = 'https://source.unsplash.com/random/1200x500?' . $post->category->name;
                        }
                    @endphp
                    <div style="max-height: 450px; overflow:hidden">
                        <img src="{{ $src }}" class="img-fluid mb-3" alt="{{ $post->category->name }}">
                    </div>
                    {!! $post->body !!}
                </div>
            </article>
            <a href="/posts">Back to blog</a>
        </div>
    </div>
@endsection
