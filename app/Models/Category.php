<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // eloquent relationship: a category can have many ideas
    public function ideas()
    {
        $this->hasMany(Idea::class);
    }
}
