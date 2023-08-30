@extends('layouts.main')

@section('main')
    <h1 class="mb-5">{{ $title }}</h1>

    {{-- hero post --}}
    <div class="card mb-3 text-center">
        <a href="/posts/{{ $posts[0]->slug }}">
            <img src="https://source.unsplash.com/random/1200x500?{{ $posts[0]->category->name }}" class="card-img-top"
                alt="{{ $posts[0]->category->name }}">
        </a>

        <div class="card-body">
            <h5 class="card-title"><a href="/posts/{{ $posts[0]->slug }}"
                    class="text-decoration-none text-dark">{{ $posts[0]->title }}</a>
            </h5>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            <p class="card-text"><small class="text-body-secondary">{{ $posts[0]->created_at->diffForHumans() }}</small>
            </p>
            <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">Read more..</a>
        </div>
    </div>

    {{-- child post --}}
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4 mb-3">
                <article>
                    <div class="card">
                        <a href="/categories/{{ $post->category->slug }}">
                            <span class="position-absolute text-white px-3 py-1"
                                style="background-color: rgba(0, 0, 0, 0.6)">{{ $post->category->name }}</span>
                        </a>
                        <a href="/posts/{{ $post->slug }}">
                            <img src="https://source.unsplash.com/random/500x350?{{ $post->category->name }}"
                                class="card-img-top" alt="{{ $post->category->name }}">
                        </a>
                        <div class="card-body">
                            <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">
                                <h5 class="card-title">{{ $post->title }}</h5>
                            </a>

                            <h6 class="text-secondary">
                                <small class="me-2">
                                    By. <a href="/authors/{{ $post->author->username }}"
                                        class="text-decoration-none text-primary">{{ $post->author->name }}</a>
                                </small>
                                <small class="text-secondary">{{ $post->created_at->diffForHumans() }}</small>
                            </h6>

                            <p class="card-text">{{ $post->excerpt }}</p>

                            <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more..</a>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
@endsection
