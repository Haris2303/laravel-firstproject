@extends('dashboard.layouts.main')

@section('main')
    <h1 class="h2 mb-3">Categories</h1>

    <div class="table-responsive col-lg-8">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <form action="/dashboard/categories/" method="post" class="d-flex align-items-center gap-3 mb-3">
            @csrf
            <div class="col-lg-4">
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>
            <button class="btn btn-primary">Create new category</button>
        </form>
        <table class="table table-hover">
            <caption>{{ count($categories) }} categories result</caption>
            <thead>
                <tr class="table-secondary">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $category->name }}</td>
                        <td class="d-flex gap-2">
                            <form action="/dashboard/categories/{{ $category->id }}" method="post" class="d-inline">
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
