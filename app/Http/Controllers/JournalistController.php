<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Text;
use Illuminate\Http\Request;

// раздел Журналист: форма создания статьи
class JournalistController extends Controller
{
    // форма новой статьи
    public function create()
    {
        $categories = Category::all();

        return view('journalist.create', compact('categories'));
    }

    // сохранение статьи в БД
    public function store(Request $request)
    {
        $data = $request->validate([
            'heading' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'text' => 'required|string',
        ]);

        // автором становится тот, кто заполнил форму
        $data['user_id'] = $request->user()->id;

        Text::create($data);

        return redirect()->route('home')->with('success', 'Статья сохранена.');
    }
}
