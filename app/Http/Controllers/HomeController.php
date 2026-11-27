<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Text;

// Главная и Категория — просто показывают статьи
class HomeController extends Controller
{
    // Главная — все статьи, новые сверху, пагинация
    public function index()
    {
        $texts = Text::latest()->paginate(5);

        return view('home', compact('texts'));
    }

    // Категория — статьи только одной категории
    public function category($id)
    {
        $category = Category::find($id);
        $texts = Text::where('category_id', $id)->latest()->paginate(5);

        return view('category', compact('category', 'texts'));
    }
}
