<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// статьи
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('texts', function (Blueprint $table) {
            $table->id();
            $table->string('heading');                       // заголовок
            $table->text('text');                            // полный текст
            $table->foreignId('category_id')                 // FK -> categories.id
                ->constrained('categories')
                ->restrictOnDelete();                        // нельзя удалить категорию со статьями
            $table->foreignId('user_id')                     // FK -> users.id (автор)
                ->constrained('users')
                ->restrictOnDelete();                        // нельзя удалить пользователя со статьями
            $table->timestamps();

            $table->index('category_id');
            $table->index('user_id');
            $table->index('created_at'); // главная сортируется по дате
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('texts');
    }
};
