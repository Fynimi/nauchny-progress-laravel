<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false; // в таблице categories нет timestamps

    protected $fillable = ['name'];

    // одна категория -> много статей
    public function texts()
    {
        return $this->hasMany(Text::class);
    }
}
