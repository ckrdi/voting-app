<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public function ideas()
    {
        $this->hasMany(Idea::class);
    }

    // status class to change tailwind class in the idea container
    public function statusClass()
    {
        if ($this->name == 'In Progress') {
            return 'bg-yellow text-white';
        }

        if ($this->name == 'Closed') {
            return 'bg-red text-white';
        }

        if ($this->name == 'Implemented') {
            return 'bg-green text-white';
        }

        if ($this->name == 'Considering') {
            return 'bg-purple text-white';
        }

        return 'bg-gray-200';
    }
}
