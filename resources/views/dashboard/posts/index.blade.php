@extends('dashboard.layouts.main')

@section('main')
    <h1 class="h2">My Posts</h1>

    <div class="table-responsive col-lg-8">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create new post</a>
        <table class="table table-hover">
            <caption>Your Posts result</caption>
            <thead>
                <tr class="table-secondary">
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($posts) --}}
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td class="d-flex gap-2">
                            <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><i
                                    class="bi bi-eye-fill h6"></i></a>
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-success">
                                <i class="bi bi-pencil-fill h6"></i></a>
                            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="badge bg-danger border-0">
                                    <i class="bi bi-x-circle-fill h6"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
