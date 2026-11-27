@extends('layout')

@section('content')
    <h1>Вход</h1>

    @if ($errors->any())
        <div class="errors">
            @foreach ($errors->all() as $e)
                <p>{{ $e }}</p>
            @endforeach
        </div>
    @endif

    <form method="post" action="{{ route('login') }}" class="form">
        @csrf
        <label>Логин:
            <input type="text" name="login" value="{{ old('login') }}" required>
        </label>

        <label>Пароль:
            <input type="password" name="password" required>
        </label>

        <button type="submit">Войти</button>
    </form>

    <p class="hint">Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a></p>
@endsection
