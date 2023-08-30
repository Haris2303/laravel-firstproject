@extends('layouts.main')

@section('main')
    <h1 class="mb-5">Post Categories</h1>

    <ul>
        @foreach ($categories as $category)
            <li>
                <h3>
                    <a href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
                </h3>
            </li>
        @endforeach
    </ul>
@endsection
