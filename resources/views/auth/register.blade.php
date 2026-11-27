@extends('layout')

@section('content')
    <h1>Регистрация</h1>

    @if ($errors->any())
        <div class="errors">
            @foreach ($errors->all() as $e)
                <p>{{ $e }}</p>
            @endforeach
        </div>
    @endif

    <form method="post" action="{{ route('register') }}" class="form">
        @csrf

        <label>Логин:
            <input type="text" name="login" value="{{ old('login') }}" required>
        </label>

        <label>Пароль:
            <input type="password" name="password" required>
        </label>

        <label>Подтверждение пароля:
            <input type="password" name="password_confirmation" required>
        </label>

        <button type="submit">Зарегистрироваться</button>
    </form>

    <p class="hint">Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
@endsection
