<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // порядок важен: сначала справочники, потом пользователи и статьи
        $this->call([
            RoleSeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
            TextSeeder::class,
        ]);
    }
}

