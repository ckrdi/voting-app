<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;

class CreateIdea extends Component
{
    public $title;
    public $category = 1;
    public $body;

    protected $rules = [
        'title' => 'required|min:6|max:255',
        'category' => 'required|exists:categories,id',
        'body' => 'required|min:6|max:255',
    ];

    public function render()
    {
        return view('livewire.create-idea', [
            'categories' => Category::all()
        ]);
    }

    public function createIdea()
    {
        if (!auth()->check()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->validate();

        Idea::create([
            'user_id' => auth()->id(),
            'category_id' => $this->category,
            'status_id' => 1,
            'title' => $this->title,
            'body' => $this->body
        ]);

        session()->flash('success_message', 'Idea was added successfully');

        $this->reset();

        return redirect()->route('index');
    }
}
