@extends('dashboard.layouts.main')

@section('main')
    <div class="row my-3">
        <div class="col-lg-10">
            <article>
                <h1 class="card-title mb-3">{{ $post->title }}</h1>
                <div class="mb-2">
                    <a href="/dashboard/posts" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle-fill"></i> Back to posts
                    </a>
                    <a href="/dashboard/posts" class="btn btn-success">
                        <i class="bi bi-pencil-fill"></i> Edit
                    </a>
                    <a href="/dashboard/posts" class="btn btn-danger">
                        <i class="bi bi-x-circle-fill"></i> Delete
                    </a>

                    <small class="text-body-secondary d-block mt-2">Category
                        <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-primary">
                            {{ $post->category->name }}
                        </a>
                    </small>
                </div>
                <div class="mb-3">
                    <img src="https://source.unsplash.com/random/1200x500?{{ $post->category->name }}"
                        class="img-fluid mb-3" alt="{{ $post->category->name }}">
                    {!! $post->body !!}
                </div>
            </article>
        </div>
    </div>
@endsection
