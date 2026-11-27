@extends('layout')

@section('content')
    <h1>Категория: {{ $category ? $category->name : '—' }}</h1>

    @forelse ($texts as $text)
        @include('partials.text-card')
    @empty
        <p>В этой категории статей пока нет.</p>
    @endforelse

    {{ $texts->links('pagination::bootstrap-5') }}
@endsection
