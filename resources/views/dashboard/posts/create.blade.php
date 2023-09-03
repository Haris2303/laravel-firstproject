@extends('dashboard.layouts.main')

@section('main')
    <h1 class="h2">Create New Post</h1>

    <div class="col-lg-8 mt-3 mb-5">
        <form action="/dashboard/posts" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label text-capitalize">title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                    value="{{ old('title') }}" autofocus required>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label text-capitalize">Slug</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug"
                    value="{{ old('title') }}" required>
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label text-capitalize">category</label>
                <select name="category_id" class="form-select @error('category_id') is-invalid @enderror"
                    aria-label="Default select example" id="category">
                    <option value="" selected disabled>-- Select Category --</option>
                    @foreach ($categories as $category)
                        @if (old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label text-capitalize">Body</label>
                <input id="body" type="hidden" name="body" class="@error('body') is-invalid @enderror"
                    value="{{ old('body') }}" required>
                <trix-editor input="body"></trix-editor>
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    <script>
        const title = document.querySelector('#title')
        const slug = document.querySelector('#slug')

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })
    </script>
@endsection
