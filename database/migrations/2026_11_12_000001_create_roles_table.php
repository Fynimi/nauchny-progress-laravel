<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// таблица ролей: user, journalist, admin
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // роль одна и та же не может повторяться
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
