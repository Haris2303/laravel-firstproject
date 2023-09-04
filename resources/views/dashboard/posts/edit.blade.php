@extends('dashboard.layouts.main')

@section('main')
    <h1 class="h2">Edit Post</h1>

    <div class="col-lg-8 mt-3 mb-5">
        <form action="/dashboard/posts/{{ $post->slug }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label text-capitalize">title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                    value="{{ old('title', $post->title) }}" autofocus required>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label text-capitalize">Slug</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug"
                    value="{{ old('slug', $post->slug) }}" required>
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
                        @if (old('category_id', $post->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="hidden" name="oldImage" value="{{ $post->image }}">
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                    id="image" onchange="previewImage()">
                @if ($post->image)
                    <img src="/storage/{{ $post->image }}" alt="Image" class="img-preview img-fluid col-sm-4">
                @else
                    <img class="img-preview img-fluid col-sm-4" alt="Preview Image">
                @endif
                <label class="input-group-text" for="image">Upload Image</label>
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label text-capitalize">Body</label>
                <input id="body" type="hidden" name="body" class="@error('body') is-invalid @enderror"
                    value="{{ old('body', $post->body) }}" required>
                <trix-editor input="body"></trix-editor>
                @error('body')
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

        const previewImage = () => {
            const image = document.querySelector('#image');
            const img_preview = document.querySelector('.img-preview');

            img_preview.style.display = 'block';

            const fileReader = new FileReader();
            fileReader.readAsDataURL(image.files[0]);

            fileReader.onload = function(oFREvent) {
                img_preview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
