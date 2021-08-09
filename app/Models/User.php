<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // eloquent relationship: a user can have many ideas
    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    // idea user pivot table
    public function votes()
    {
        return $this->belongsToMany(Idea::class, 'votes');
    }

    // get a user's avatar
    public function avatar() 
    {
        // https://en.gravatar.com/site/implement/images for more detailed info about gravatar
        // md5() is php method that hash something
        // s=80 is image size
        // d=identicon is default image based on user's email
        return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?s=80&d=identicon';
    }
}
