<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $fillable = ['heading', 'text', 'category_id', 'user_id'];

    // статья относится к категории
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // статья относится к автору
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
