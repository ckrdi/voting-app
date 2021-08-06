<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory, Sluggable;

    public const PAGINATION_COUNT = 10;

    protected $guarded = [];

    // eloquent relationship: an idea belongs to only one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // eloquent sluggable for slug in url
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // eloquent relationship: an idea belongs to only one category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
