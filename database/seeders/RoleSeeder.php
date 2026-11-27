<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

// сидим роли: user, journalist, admin
class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['user', 'journalist', 'admin'];

        foreach ($roles as $name) {
            Role::firstOrCreate(['name' => $name]);
        }
    }
}
