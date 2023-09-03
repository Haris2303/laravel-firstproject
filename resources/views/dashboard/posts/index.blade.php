@extends('dashboard.layouts.main')

@section('main')
    <h1 class="h2">My Posts</h1>

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
                        <a href="/dashboard/posts/" class="badge bg-success"><i class="bi bi-pencil-fill h6"></i></a>
                        <a href="/dashboard/posts/" class="badge bg-danger"><i class="bi bi-x-circle-fill h6"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
@endsection
