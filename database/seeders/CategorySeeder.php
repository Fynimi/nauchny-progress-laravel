<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

// сидим категории для статей
class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::firstOrCreate(['name' => 'Технологии']);
        Category::firstOrCreate(['name' => 'Наука']);
    }
}
