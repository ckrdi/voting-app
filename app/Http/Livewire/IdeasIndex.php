<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Vote;
use Livewire\Component;
use App\Models\Category;
use App\Models\Status;
use Livewire\WithPagination;

class IdeasIndex extends Component
{
    // use WithPagination;

    public function render()
    {
        /**  
         * with() for eager loading related tables
         * when() request status is not 'All' or null, run a query where idea's status_id matches $statuses' id
         * addSelect() for advanced subquery -> subquery selects
         * withCount() get related records amount -> votes_count
         * simplePaginate() using tailwind 
         * PAGINATION_COUNT const for not using magic number
        */
        $statuses = Status::all()->pluck('id', 'name');
        $data = Idea::with('user', 'category', 'status')
            ->when(request()->status && request()->status !== 'All', function($query) use ($statuses) {
                return $query->where('status_id', $statuses->get(request()->status));
            })
            ->addSelect([ 'voted_by_user' => Vote::select('id')
                ->where('user_id', auth()->id())
                ->whereColumn('idea_id', 'ideas.id') ])
            ->withCount('votes')
            ->latest()
            ->simplePaginate(Idea::PAGINATION_COUNT);

        /**
         * Fetch all categories for category option
         */
        $categories = Category::all();
        
        return view('livewire.ideas-index', compact('data', 'categories'));
    }
}
