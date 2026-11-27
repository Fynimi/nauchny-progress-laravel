<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false; // в таблице roles нет created_at/updated_at

    protected $fillable = ['name'];

    // одна роль -> много пользователей
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
