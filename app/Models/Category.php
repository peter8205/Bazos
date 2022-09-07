<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rubric;

class Category extends Model
{
    public function rubric()
    {
        return $this->belongsTo(Rubric::class);
    }
}
