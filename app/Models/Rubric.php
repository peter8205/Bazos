<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Rubric extends Model
{
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
