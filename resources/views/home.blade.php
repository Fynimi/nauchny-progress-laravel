@extends('layout')

@section('content')
    <h1>Все статьи</h1>

    @forelse ($texts as $text)
        @include('partials.text-card')
    @empty
        <p>Статей пока нет.</p>
    @endforelse

    {{ $texts->links('pagination::bootstrap-5') }}
@endsection
