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

    // eloquent sluggable for slug in url
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // eloquent relationship: an idea belongs to only one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // eloquent relationship: an idea belongs to only one category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // an idea belongs to only one status
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    // idea user pivot table
    public function votes()
    {
        return $this->belongsToMany(User::class, 'votes');
    }

    public function isVotedByUser(?User $user)
    {
        if (!$user) {
            return false;
        }
        
        // return Vote::where('user_id', $user->id)
        //     ->where('idea_id', $this->id)
        //     ->exists();
        return $this->votes()->where('user_id', $user->id)->exists();
    }
}
