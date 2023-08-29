@extends('layouts.main')

@section('main')
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <img src="img/{{ $img_name }}" alt="Gambar Profile" class="rounded-circle" width="118rem" height="118rem">
@endsection
