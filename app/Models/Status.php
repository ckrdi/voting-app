<?php

namespace App\Models;

use App\Models\Idea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public static function getCount()
    {
        return Idea::query()
            ->selectRaw('count(*) as all_statuses')
            ->selectRaw('count(case when status_id = 1 then 1 end) as open')
            ->selectRaw('count(case when status_id = 2 then 1 end) as considering')
            ->selectRaw('count(case when status_id = 3 then 1 end) as in_progress')
            ->selectRaw('count(case when status_id = 4 then 1 end) as implemented')
            ->selectRaw('count(case when status_id = 5 then 1 end) as closed')
            ->first()
            ->toArray();
    }
}
