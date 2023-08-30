@extends('layouts.main')

@section('main')
    <h1 class="mb-5">Post Categories</h1>

    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-4">
                <a href="/categories/{{ $category->slug }}">
                    <div class="card">
                        <img src="https://source.unsplash.com/random/1500x1500?{{ $category->name }}"
                            class="img-fluid rounded" alt="{{ $category->name }}">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title flex-fill text-white text-center py-3 text-uppercase"
                                style="background-color: rgba(0, 0, 0, 0.7)">
                                {{ $category->name }}
                            </h5>
                        </div>

                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
