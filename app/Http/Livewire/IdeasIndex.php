<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Vote;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class IdeasIndex extends Component
{
    use WithPagination;

    public function render()
    {
        /**  
         * with() for eager loading related tables
         * addSelect() for advanced subquery -> subquery selects
         * withCount() get related records amount -> votes_count
         * simplePaginate() using tailwind 
         * PAGINATION_COUNT const for not using magic number
        */
        $data = Idea::with('user', 'category', 'status')
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
