@extends('layout')

@section('content')
    <h1>Создать статью</h1>

    @if ($errors->any())
        <div class="errors">
            @foreach ($errors->all() as $e)
                <p>{{ $e }}</p>
            @endforeach
        </div>
    @endif

    <form method="post" action="{{ route('journalist.store') }}" class="form">
        @csrf

        <label>Заголовок:
            <input type="text" name="heading" value="{{ old('heading') }}" required>
        </label>

        <label>Категория:
            <select name="category_id" required>
                <option value="">— выберите —</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </label>

        <label>Текст статьи:
            <textarea name="text" rows="10" required>{{ old('text') }}</textarea>
        </label>

        <button type="submit">Сохранить</button>
    </form>
@endsection
