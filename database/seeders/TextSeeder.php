<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Text;
use App\Models\User;
use Illuminate\Database\Seeder;

// сидим тестовые статьи
class TextSeeder extends Seeder
{
    public function run(): void
    {
        $cat = Category::where('name', 'Технологии')->first();
        $user = User::where('login', 'admin1')->first();

        if (!$cat || !$user) {
            return;
        }

        Text::create([
            'heading' => 'Новые модели нейросетей 2026',
            'text' => 'В этом году появились новые архитектуры трансформеров, которые работают быстрее и точнее. Исследователи активно обсуждают их применение в промышленности.',
            'category_id' => $cat->id,
            'user_id' => $user->id,
        ]);

        Text::create([
            'heading' => 'Квантовые компьютеры приближаются',
            'text' => 'Фирмы Google и IBM представили процессоры с рекордным количеством кубитов. Практическое применение ожидается в ближайшие годы.',
            'category_id' => $cat->id,
            'user_id' => $user->id,
        ]);

        Text::create([
            'heading' => 'Open-source технологии набирают силу',
            'text' => 'Крупные корпорации всё чаще открывают исходный код своих продуктов. Это ускоряет развитие ИИ и позволяет малым компаниям использовать передовые решения.',
            'category_id' => $cat->id,
            'user_id' => $user->id,
        ]);
    }
}
