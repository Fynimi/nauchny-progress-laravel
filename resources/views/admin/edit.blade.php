@extends('layout')

@section('content')
    <h1>Редактировать статью</h1>

    @if ($errors->any())
        <div class="errors">
            @foreach ($errors->all() as $e)
                <p>{{ $e }}</p>
            @endforeach
        </div>
    @endif

    <form method="post" action="{{ route('admin.texts.update', $text->id) }}" class="form">
        @csrf

        <label>Заголовок:
            <input type="text" name="heading" value="{{ old('heading', $text->heading) }}" required>
        </label>

        <label>Категория:
            <select name="category_id" required>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id', $text->category_id) == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </label>

        <label>Текст статьи:
            <textarea name="text" rows="10" required>{{ old('text', $text->text) }}</textarea>
        </label>

        <button type="submit">Сохранить</button>
        <a href="{{ route('admin.index') }}">Отмена</a>
    </form>
@endsection
