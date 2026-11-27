<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Role;
use App\Models\Text;
use App\Models\User;
use Illuminate\Http\Request;

// Админка: статьи (редактирование/удаление) и роли пользователей
class AdminController extends Controller
{
    // список всех статей
    public function index()
    {
        $texts = Text::latest()->paginate(10);

        return view('admin.index', compact('texts'));
    }

    // форма редактирования статьи
    public function edit($id)
    {
        $text = Text::find($id);
        $categories = Category::all();

        return view('admin.edit', compact('text', 'categories'));
    }

    // сохранить изменения статьи
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'heading' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'text' => 'required|string',
        ]);

        $text = Text::find($id);
        $text->update($data);

        return redirect()->route('admin.index')->with('success', 'Статья обновлена.');
    }

    // удалить статью
    public function destroy($id)
    {
        Text::find($id)->delete();

        return redirect()->route('admin.index')->with('success', 'Статья удалена.');
    }

    // список пользователей с их ролями
    public function users()
    {
        $users = User::all();
        $roles = Role::all();

        return view('admin.users', compact('users', 'roles'));
    }

    // сменить роль пользователя
    public function updateUserRole(Request $request, $id)
    {
        $data = $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::find($id);
        $user->update(['role_id' => $data['role_id']]);

        return redirect()->route('admin.users')->with('success', 'Роль изменена.');
    }
}
