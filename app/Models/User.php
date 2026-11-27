<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['role_id', 'login', 'password'];

    // пароль всегда хешируем, в открытом виде не храним
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // пользователь относится к роли
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // пользователь -> его статьи
    public function texts()
    {
        return $this->hasMany(Text::class);
    }

    // проверка роли, нужна в blade и в middleware
    public function hasRole(string $name): bool
    {
        return $this->role && $this->role->name === $name;
    }
}
