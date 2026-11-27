<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// пользователи: логин, пароль (хеш) и роль
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')          // FK -> roles.id
                ->constrained('roles')
                ->restrictOnDelete();             // нельзя удалить роль, пока есть такие пользователи
            $table->string('login')->unique();    // логин уникальный
            $table->string('password');           // хеш пароля
            $table->timestamps();

            $table->index('role_id');
        });

        // сессии нужны, потому что SESSION_DRIVER=database
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('users');
    }
};
