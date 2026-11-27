<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

// сидим тестовых пользователей
class UserSeeder extends Seeder
{
    public function run(): void
    {
        // обычный пользователь
        User::firstOrCreate(
            ['login' => 'user1'],
            [
                'role_id' => Role::where('name', 'user')->value('id'),
                'password' => Hash::make('password'),
            ]
        );

        // журналист
        User::firstOrCreate(
            ['login' => 'journalist1'],
            [
                'role_id' => Role::where('name', 'journalist')->value('id'),
                'password' => Hash::make('password'),
            ]
        );

        // админ
        User::firstOrCreate(
            ['login' => 'admin1'],
            [
                'role_id' => Role::where('name', 'admin')->value('id'),
                'password' => Hash::make('password'),
            ]
        );
    }
}
