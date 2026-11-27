@extends('layout')

@section('content')
    <h1>Роли пользователей</h1>

    @if ($users->isEmpty())
        <p>Пользователей нет.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Логин</th>
                    <th>Текущая роль</th>
                    <th>Новая роль</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->login }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>
                            <form method="post" action="{{ route('admin.users.role', $user->id) }}" class="inline-form">
                                @csrf
                                <select name="role_id" required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit">Изменить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
