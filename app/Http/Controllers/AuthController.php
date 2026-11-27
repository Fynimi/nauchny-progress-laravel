<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// регистрация, вход, выход
class AuthController extends Controller
{
    // форма регистрации
    public function showRegister()
    {
        return view('auth.register');
    }

    // обработка регистрации: сразу роль user
    public function register(Request $request)
    {
        $data = $request->validate([
            'login' => 'required|string|max:50|unique:users,login',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // ищем роль user и создаём пользователя (пароль хеширует каст в модели)
        $user = User::create([
            'role_id' => Role::where('name', 'user')->value('id'),
            'login' => $data['login'],
            'password' => $data['password'],
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    // форма входа
    public function showLogin()
    {
        return view('auth.login');
    }

    // обработка входа по логину и паролю
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('login', $credentials['login'])->first();

        // сверяем хеш пароля
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withInput()->withErrors(['login' => 'Неверный логин или пароль.']);
        }

        $request->session()->regenerate();
        Auth::login($user);

        return redirect()->route('home');
    }

    // выход
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
