@extends('layouts.main')

@section('main')
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row mb-3 justify-content-center">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-dark" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        {{-- hero post --}}
        <div class="card mb-3 text-center shadow">
            <a href="/posts/{{ $posts[0]->slug }}">
                @php
                    if ($posts[0]->image) {
                        $src = '/storage/' . $posts[0]->image;
                    } else {
                        $src = 'https://source.unsplash.com/random/1200x500?' . $posts[0]->category->name;
                    }
                @endphp
                <div style="max-height: 350px; overflow:hidden">
                    <img src="{{ $src }}" class="img-fluid" alt="{{ $posts[0]->category->name }}">
                </div>
            </a>

            <div class="card-body">
                <h5 class="card-title"><a href="/posts/{{ $posts[0]->slug }}"
                        class="text-decoration-none text-dark">{{ $posts[0]->title }}</a>
                </h5>
                <h6 class="fw-normal text-secondary">
                    By.
                    <small>
                        <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">
                            {{ $posts[0]->author->name }}
                        </a>
                        in
                        <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">
                            {{ $posts[0]->category->name }}
                        </a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </h6>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <p class="card-text"><small class="text-body-secondary"></small>
                </p>
                <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-dark">Read more..</a>
            </div>
        </div>

        {{-- child post --}}
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-3">
                    <article>
                        <div class="card shadow">
                            <a href="/posts?category={{ $post->category->slug }}">
                                <span class="position-absolute text-white px-3 py-1"
                                    style="background-color: rgba(0, 0, 0, 0.6)">
                                    {{ $post->category->name }}
                                </span>
                            </a>
                            <a href="/posts/{{ $post->slug }}">
                                @php
                                    if ($post->image) {
                                        $src = '/storage/' . $post->image;
                                    } else {
                                        $src = 'https://source.unsplash.com/random/1200x800?' . $post->category->name;
                                    }
                                @endphp
                                <img src="{{ $src }}" class="card-img-top" alt="{{ $post->category->name }}">
                            </a>
                            <div class="card-body">
                                <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                </a>

                                <h6 class="text-secondary">
                                    <small class="me-2">
                                        By. <a href="/posts?author={{ $post->author->username }}"
                                            class="text-decoration-none text-primary">{{ $post->author->name }}</a>
                                    </small>
                                    <small class="text-secondary">{{ $post->created_at->diffForHumans() }}</small>
                                </h6>

                                <p class="card-text">{{ $post->excerpt }}</p>

                                <a href="/posts/{{ $post->slug }}" class="btn btn-dark">Read more..</a>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-secondary">Not Found</p>
    @endif

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>

@endsection
