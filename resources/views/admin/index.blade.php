@extends('layout')

@section('content')
    <h1>Управление статьями</h1>

    @if ($texts->isEmpty())
        <p>Статей нет.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Заголовок</th>
                    <th>Категория</th>
                    <th>Автор</th>
                    <th>Дата</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($texts as $text)
                    <tr>
                        <td>{{ $text->heading }}</td>
                        <td>{{ $text->category->name }}</td>
                        <td>{{ $text->user->login }}</td>
                        <td>{{ $text->created_at->format('d.m.Y H:i') }}</td>
                        <td class="actions">
                            <a href="{{ route('admin.texts.edit', $text->id) }}">Ред.</a>
                            <form method="post" action="{{ route('admin.texts.destroy', $text->id) }}" class="inline-form">
                                @csrf
                                <button type="submit" onclick="return confirm('Удалить статью?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $texts->links('pagination::bootstrap-5') }}
    @endif
@endsection
